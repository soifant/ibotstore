<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Category;
use App\Models\RecomenProduct;
use App\Models\Price;
use App\Models\PaymentMetod;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Transaction;
use App\Models\ContackUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SenderMail;

class PageController extends Controller
{
    public function index()
    {
        $pageName = 'top up game home';
        $promo = Promo::where('status',1)->get();
        $category = Category::where('status',1)->with('products')->get();
        $rekomen = RecomenProduct::with('products')->get();
        
        return view('home', compact('promo','category','rekomen','pageName'));
    }

    public function pesanan(Request $request)
    {
        $transaksi = null;
        $invoice = null;
        if($invoice = $request->get('invoice')) {
            $transaksi = Transaction::where('inv_order',$invoice)->with(['payments','users','products' => function ($query) {
                $query->with(['category']);
            }])->first();

            if(!$transaksi) {
                return back()->with('error', "Invoice tidak ditemukan");
            }
        }

        $pageName = 'Status Transaksi';
        return view('pesanan', compact('pageName','transaksi','invoice'));
    }

    public function promo()
    {
        $pageName = 'Vocher promo';
        $today = wib();
        $vocher = Voucher::where('start_at', '<=', $today)
            ->where('end_at', '>=', $today)
            ->get();

        return view('promo', compact('pageName','vocher')); 
    }

    public function login()
    {
        $pageName = 'Login';
        return view('login', compact('pageName')); 
    }

    public function registrasi()
    {
        $pageName = 'Registrasi';
        return view('registrasi', compact('pageName')); 
    }

    public function lupaPassword(Request $request)
    {
        try {
            $pageName = 'Lupa password';
            $data = $request->all();

            if(isset($data['verify_code'])) {
                $user = User::where('verify_token',$data['verify_code'])->where('verify_expire', '>', now());

            }

            if(isset($data['email'])) {

                $user = User::where('email',$data['email'])->first();

                if(!$user) {
                    return back()->with('error', "Email tidak ditemukan");
                }

                $verificationCode = mt_rand(100000, 999999);
                $user->verify_token = $verificationCode;
                $user->verify_expire = Carbon::now()->addMinutes(15);
                $user->save();

                $urlVerify = route('newpw').'?verify_code='.$verificationCode;
                $dataMail = [
                    'title' => 'Reset password',
                    'message' => 'Ubah password kamu di '.$urlVerify,
                ];
            
                Mail::to($data['email'])->send(new SenderMail($dataMail));            
                
                return back()->with('success', "Email reset password berhasil dikirim");
            }
            return view('lupaPassword', compact('pageName'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', $e->getMessage() ?? 'Failed. Please try again.');
        }
    }

    public function newPassword(Request $request)
    {
        $pageName = 'Ubah password';
        $data = $request->all();

        if(isset($data['password'])) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
        
            $user = User::where('id',$data['id'])->first();
            if(!$user) {
                return back()->with('error', 'Kesalahan saat mencoba mengubah password. Silahkan ulangi');
            }

            $user->password = bcrypt($request->password);
            $user->save();
        
            return redirect()->route('login')->with('status', 'Password berhasil diubah.');
        }
        if(isset($data['verify_code'])) {
            $user = User::where('verify_token',$data['verify_code'])->where('verify_expire', '>', now())->first();
            $status = $user ? $user->id : false;
            return view('newpassword', compact('pageName','status'));
        }
    }

    public function hubungiKami(Request $request)
    {
        try {
            $pageName = 'Hubungi kami';
            $data = $request->all();
    
            if(count($data) > 0) {
                $transaksi = Transaction::where('inv_order', $data['kd_transaksi'])->first();
                if(!$transaksi) {
                    return back()->with('error', 'Nomor invoice tidak ditemukan');
                }
    
                $imageName = null;
                if($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('images/upload'), $imageName);
                }
    
                $user = Auth::user();
                $cs = new ContackUs();
                $cs->user_id = $user->id;
                $cs->fullname = $data['nama'];
                $cs->email = $data['email'];
                $cs->no_wa = $data['telepon'];
                $cs->invoice = $data['kd_transaksi'];
                $cs->keterangan = $data['keterangan'];
                $cs->lampiran = '/'.$imageName;
                $cs->save();
    
                return back()->with('success', 'Berhasil mengirim pesan ke cs');
    
            } else {
                return view('hubungiKami', compact('pageName'));
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', $e->getMessage() ?? 'Failed. Please try again.');
        }
    }

    public function tentang()
    {
        $pageName = 'Tentang kami';
        return view('tentang', compact('pageName')); 
    }

    public function product(Request $request, $page = 'produk', $slug=null)
    {

        $pageName = 'Daftar produk';
        $with = ['products'];
        $view = 'listProduct';
        $category = [];
        $product = [];
        $payment = [];

        if($page == 'list-harga') {
            $view = 'listHarga';
            $category = Category::where('status', 1)
            ->with(['products' => function ($query) {
                $query->with(['prices' => function ($subQuery) {
                    $subQuery->select('id', 'product_id','data');
                }]);
            }])
            ->get();
        }else if($page == 'detail'){
            $product = Product::where('slug',$slug)->where('status',1)->with('prices')->firstOrFail();
            if(count($product->prices) > 0) {
                $price = json_decode($product->prices[0]->data) ?? [];
                foreach($price as $item) {
                    $kategori = $item->category;
                    if(!isset($category[$kategori])) {
                      $category[$kategori] = [];
                    }

                    $category[$kategori][] = [
                        'name' => $item->name,
                        'price' => $item->price
                    ];
                }
            }
            $payment = PaymentMetod::where('status',1)->with('payments')->get();
            $view = 'product';
        }else if($page == 'search'){
            $search = $request->input('search');
            $category = Category::where('status',1)->with(['products' => function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }])->get();
        }else{
            $category = Category::where('status',1)->with($with)->get();
        }
        
        return view($view, compact('pageName','category','product','payment')); 
    }

    public function buy(Request $request)
    {
        return back()->with('error', 'Metode pembayaran belum tersedia');
    }
}