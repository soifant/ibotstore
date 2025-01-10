<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Models\PaymentMetod;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {

        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'phone' => 'nullable|string|max:15',
                'gander' => 'required|max:1',
            ]);
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
    
            return redirect()->route('login')->with('success', 'Berhasil mendaftar');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage() ?? 'Failed to register. Please try again.');
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('beranda')->with('success', 'Berhasil login');
            }
    
            return redirect()->back()->with('error', 'Kesalahan email atau password');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage() ?? 'Failed to login. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil logout');
    }

    public function profil()
    {
        $pageName = 'Akun ku';
        $user = Auth::user();
        if(!$user) {
            return redirect()->route('login');
        }
        return view('user/profil', compact('pageName','user'));
    }

    public function updateProfil(Request $request)
    {
        try {
            $user = Auth::user();
            if(!$user) {
                return redirect()->route('login');
            }

            $data = $request->validate([
                'name' => 'required|string|max:255',
                'gander' => 'required|max:1',
            ]);

            if($user->phone != $request->phone) {
                $request->validate(['phone' => 'required|string|max:15|unique:users,phone']);
            }

            if($user->email != $request->email) {
                $request->validate(['email' => 'required|email|unique:users,email']);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            if($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if($request->filled('birtday')) {
                $user->birtday = $request->birtday;
            }

            $user->save();

            return redirect()->route('profile')->with('success', 'Profile berhasil di update');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage() ?? 'Failed to update profile. Please try again.');
        }
    }

    public function deposit()
    {
        $pageName = 'Akun ku';
        $user = Auth::user();
        $payment = PaymentMetod::where('status',1)->with('payments')->get();
        return view('user/deposit', compact('pageName','user','payment'));
    }

    public function history(Request $request)
    {
        $pageName = 'Transaksi ku';
        $data = Transaction::query();

        if ($search = $request->get('search')) {
            $data->where('produk', 'like', "%$search%")
                 ->orWhere('id_pelanggan', 'like', "%$search%")
                 ->orWhere('status', 'like', "%$search%");
        }

        $perPage = $request->get('length', 10);
        $data = $data->paginate($perPage);

        return view('user.history', compact('pageName','data','perPage'));
    }

    public function saldo(Request $request)
    {
        $pageName = 'Saldo ku';
        $perPage = 10;
        $data = [];

        return view('user.saldo', compact('pageName','data','perPage'));
    }

}

