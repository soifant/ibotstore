@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content col-12"> 
 <form action="{{ route('pesanan') }}" method="get" class="mb-2"> 
  <div class="title d-flex align-items-center justify-content-between tulisan" id="bayarin">
    Nomor Invoice 
  </div> 
  <div> 
   <input type="text" autofocus name="invoice" id="invoice" required class="form-control d-block" value="{{ $invoice ?? '' }}"> 
  </div> 
  <div class="mt-3"> 
   <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-arrows-alt"></i> Lihat Detail</button> 
  </div> 
 </form>
@if($transaksi)
 <div class="details-body" id="areacetak">
    <div class="card mb-3 p-3"> 
        <div class="row g-0"> 
            <div class="col-4"> 
             <img data-src="{{ img('products',$transaksi->products->logo) }}" alt="{{ $transaksi->products->name }}" class="img-fluid rounded-start lozad" src="{{ img('products',$transaksi->products->logo) }}" data-loaded="true"> 
            </div> 
            <div class="col-8"> 
             <div class="card-body"> 
              <h6 class="card-title">Status Transaksi</h6> 
              <p class="card-text">{{ $transaksi->products->category->name }}</p> 
              <p class="card-text"><small class="text-muted">{{ $transaksi->products->name }}</small></p> 
             </div> 
            </div> 
        </div>
      </div>
        <div class="card mb-3 p-3"> 
           <div class="row g-0"> 
            <div class="alert alert-danger" role="alert">
              Simpan Nomor Invoice Transaski Anda! 
            </div> 
           </div>
        <section class="customer-info py-12"> 
            <div class="title mb-16"> 
                <h6>Informasi Pembeli</h6> 
            </div> 
            <ul> 
                <li class="d-flex align-items-center justify-content-between"> <p>Email</p> <p>{{ $transaksi->users->email }}</p> </li> 
                <li class="d-flex align-items-center justify-content-between"> <p>Nomor</p> <p>{{ $transaksi->users->phone }}</p> </li> 
                <li class="d-flex align-items-center justify-content-between"> <p>Q-RIS</p> <p> <img src="https://api.qrserver.com/v1/create-qr-code/?data=00020101021226610016ID.CO.SHOPEE.WWW01189360091800205803210208205803210303UME51440014ID.CO.QRIS.WWW0215ID10221861301600303UME5204594553033605409106622.005802ID5905Gagat6015KAB. PURBALINGG61055339262230519SP25430CX1M3ZOXNQS7630434D5&amp;size=250x250" id="qrcode"> </p> </li> 
            </ul> 
        </section>
        <hr class="my-3">
        <section class="customer-info order-info py-12"> 
            <div class="title mb-16"> 
               <h6>Detail Transaski</h6> 
            </div> 
            <ul class="pb-24"> 
               <li class="d-flex align-items-center justify-content-between"> <p>Nomor Invoice</p> <p> {{ $transaksi->inv_order }} </p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Tanggal</p> <p> {{ $transaksi->created_at }} </p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Produk</p> <p> {{ $transaksi->products->category->name }} <br> {{ $transaksi->products->name }} </p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Metode Pembayaran</p> <p> <img data-src="{{ img('payment',$transaksi->payments->logo) }}" style="max-width: 120px;" class="lozad"> </p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>ID Tujuan</p> <p> <a style="color: blue;" href="javascript:;" onclick="copied(this)" data-value="rafael222004@gmail.com"><i class="fa fa-clipboard"></i> {{ $transaksi->id_pelanggan }}</a> </p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Status Pembayaran</p> <p> @if($transaksi->status_bayar == 2) <span class="badge bg-success">Sudah Bayar</span> @else <span class="badge bg-warning">Belum Bayar</span> @endif </p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Status Pembelian</p> <p> {!! $transaksi->statusBadge !!} </p> </li> 
            </ul> 
            <hr class="my-3"> 
            <div class="title mb-16"> 
               <h6>Rincian Pembayaran</h6> 
            </div> 
            <ul class="pb-24"> 
               <li class="d-flex align-items-center justify-content-between"> <p>Harga</p> <p>Rp. {{ number_format($transaksi->biaya, 0, ',', '.') }}</p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Biaya Admin</p> <p>Rp. 741</p> </li> 
               <li class="d-flex align-items-center justify-content-between"> <p>Diskon</p> <p>Rp. 0</p> </li>
             </ul> 
            <hr class="my-3"> 
            <div class="price border-t d-flex align-items-center justify-content-between pt-24"> 
             <p> <font size="3">Total Bayar</font> </p> 
             <p><span>Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</span></p> 
            </div> 
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3"> 
                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-credit-card"></i> Bayar sekarang</a> 
            </div> 
        </section>  
      </div>
    </div>
  </div> 
</div>
@endif
@endsection