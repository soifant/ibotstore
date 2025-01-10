@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content">
    <section class="product-info p-0 position-relative"> 
      <div class="product-rating"> 
       <img data-src="{{ img('products',$product->baner) }}" alt="{{ $product->name }}" class="w-100 img-fluid lozad" src="{{ img('products',$product->baner) }}" data-loaded="true"> 
       <!-- title --> 
       <h5 class="main-title mt-3">{{ $product->name }}</h5> 
      </div>
    </section>

    <hr class="my-3"> 
    <form action="{{ route('buy') }}" method="post" id="ftransaksi" onsubmit="return confirm(`Anda yakin untuk melanjutkan transaksi tersebut?`)" accept-charset="utf-8"> 
        @csrf
        <div class="product-info p-0 mb-4">
            <div class="description" id="description" style="max-width: 100% !important;">
                {{ $product->description }}
            </div>
            <div class="mt-2 mb-2"> 
              <span class="read-more" onclick="toggleReadMore()">Selengkapnya</span> 
            </div>

            <hr class="my-3"> 
            <div class="form-group"> 
                <input type="hidden" name="id_gateway" id="id_gateway" readonly value=""> 
                <input type="hidden" name="id_produk_item" id="id_produk_item" readonly value=""> 
                <label class="h6 fw-bold text-dark"><i class="fas fa-arrow-alt-circle-right"></i> Masukkan ID</label> 
                <input type="number" name="idtujuan" required id="idtujuan" placeholder="Masukkan Player ID" class="form-control" value="" input="validasi()"> 
                <span class="error"></span> 
            </div>

            <hr class="my-3">
            <div class="form-group"> 
                <label class="h6 fw-bold text-dark"><i class="fas fa-arrow-alt-circle-right"></i> Pilih Item</label> 
                <div class="row mt-2">
                    @if(count($category) > 0)
                        @foreach($category as $key => $item)
                            <div class="mt-1 mb-0 col-12"> 
                                <h7>
                                    {{ $key }}
                                </h7> 
                            </div>
                            @if(count($item) > 0)
                                @foreach($item as $itm)
                                    @php
                                       $itm = json_decode(json_encode($itm));
                                    @endphp
                                    <div class="d-grid mt-1 mb-0 col-6 col-6 text-start"> 
                                        <a href="#bayarin" data-price="{{ $itm->price }}" data-id="" class="justify-content-center item btn btn-md list-item btn-secondary"> <font color="white" size="2" style="padding-left: 0px;"><img class="lozad" align="right" data-src="https://gagat.id/uploads/photo/2f81227d76a100aa1a740737fcb4b589.png" alt="{{ $itm->name }}" style="width: 30px; padding: 0px; height: auto;" src="https://gagat.id/uploads/photo/2f81227d76a100aa1a740737fcb4b589.png" data-loaded="true"> {{ $itm->name }} </font> <br> <font color="#D9D9D9" size="1" style="padding-left: 0px;">Rp. {{ $itm->price }}</font> </a> 
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        <b> Item tidak tersedia </b>
                    @endif
                </div>
            </div>

            <hr class="my-3"> 
            <div class="form-group" id="bayarin"> 
                <label class="h6 fw-bold text-dark"><i class="fas fa-arrow-alt-circle-right"></i> Pilih Pembayaran</label> 
                <ul class="list-group">
                    @if(count($payment) > 0)
                        @foreach($payment as $pay)
                            @if(count($pay->payments) > 0)
                                <h7 class="mb-2">
                                    {{ $pay->name }}
                                </h7>
                                @foreach($pay->payments as $py)
                                    @if($py->status)
                                        <a href="#emailin" class="list-group-item d-flex justify-content-between align-items-start mb-3 list-item text-center bg-light payment border border-dark" id="pymnt_{{ $py->code }}" data-gw="8189242d13f07592088ad3d545b1376b497ad304e7b6e219fa77dd7227df4d2c51be4837cd20a9357203d2c8f9a9933d24b2da7ec7c1ae79b25fd7cee481f8ccVutwZE7hRzSpzIWf1uH7inb21d+KcUDqY/csR56/DVk=" data-kode="{{ $py->code }}" data-min="1" data-max="10000000" data-fee="" data-persen="2" data-price="0"> 
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"> 
                                                <span class="badge bg-primary rounded-pill harga fs-6 harga_{{ $pay->code }}">Rp. 0</span> 
                                            </div> 
                                        </div>
                                        <img src="{{ img('payment',$py->logo) }}" data-src="{{ img('payment',$py->logo) }}" style="max-height: 35px;" alt="{{ $py->name }}" class="img-responsive gbr lozad"> </a> 
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @else
                       <b>Payment tidak tersedia</b>
                    @endif
                </ul>
            </div>
            <hr class="my-3"> 
            <div class="form-group" id="emailin"> 
                <label class="h6 fw-bold text-dark"><i class="fas fa-arrow-alt-circle-right"></i> Email</label> 
                <br>
                <small>* Menerima bukti pembayaran</small> 
                <input type="email" name="email" id="email" class="form-control d-block" minlength="3" placeholder="contoh@gmail.com" required value=""> 
                <span class="error"></span> 
            </div> 
            <hr class="my-3"> 
            <div class="form-group" id="nomorin"> 
                <label class="h6 fw-bold text-dark"><i class="fas fa-arrow-alt-circle-right"></i> Nomor WhatsApp</label> 
                <br>
                <small>* Menerima status pesanan</small> 
                <input type="number" name="no_hp" id="no_hp" minlength="9" maxlength="15" class="form-control d-block" placeholder="628xxxxxxxxx" required value=""> 
                <span class="error"></span> 
            </div>
        </div>
</div>
@endsection
@push('scripts')
<script>
$('.item').on('click', function () {
    const price = $(this).data('price');
    $('.harga').text(rupiah(price))
});
</script>
@endpush