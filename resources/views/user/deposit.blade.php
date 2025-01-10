@extends('layouts.app')

@section('title', $pageName)

@section('content')
<form action="{{ route('buy') }}" method="post" id="ftransaksi" onsubmit="return confirm(Anda yakin untuk melanjutkan transaksi tersebut?)" accept-charset="utf-8"> 
<div class="page-content"> 
    @csrf
    <section class="details-body"> 
        <section class="d-flex align-items-center gap-8 details-title"> 
            <div class="flex-grow"> 
                <h3>Deposit</h3> 
            </div>
            <span class="d-flex align-items-center justify-content-center rounded-full shrink-0"> <img src="https://gagat.id/template/travgo/assets/svg/heart-red-light.svg" alt=""> </span> 
        </section>
        <section class="details-info py-16"> 
            <p> <b>Saldo akun kamu hanya dapat digunakan untuk pembelian produk yang tersedia di ibotstore</b> </p> 
        </section>
        <section class="reviews py-16">
            <input type="hidden" name="id_gateway" id="id_gateway" readonly value=""> 
            <div class="title d-flex align-items-center justify-content-between"> 
                <h6 class="shrink-0"> <i class="fas fa-arrow-alt-circle-right"></i> Nominal</h6> 
            </div>
            <div class="d-flex flex-column gap-16"> 
                <div class="form-floating mb-3"> 
                    <input type="number" min="1000" minlength="4" name="nominal" id="nominal" class="form-control d-block" placeholder="Masukkan Nominal" value=""> 
                    <label for="nama">Masukkan Nominal</label> 
                    <span class="error"></span> 
                </div>
                <div class="title d-flex align-items-center justify-content-between" id="bayarin"> 
                    <h6 class="shrink-0"> <i class="fas fa-arrow-alt-circle-right"></i> Pilih Pembayaran </h6> 
                </div>
                
                <div> 
                    <ul class="list-group">
                        
                    @if(count($payment) > 0)
                        @foreach($payment as $pay)
                            @if(count($pay->payments) > 0)
                                <h7 class="mb-2">
                                    {{ $pay->name }}
                                </h7>
                                @foreach($pay->payments as $py)
                                    @if($py->status)
                                        <a href="javascript:;" class="list-group-item d-flex justify-content-between align-items-start mb-3 list-item text-center bg-light payment border border-dark" id="pymnt_{{ $py->code }}" data-gw="5d7d47da6424e717b2cea84667a56ee22b8ebdf07f6a8f01835380df4a9e2ae862bce6b4ac7cea8419543f18fd9050449ed7cb4d534c58142c2e074f49ae0270g8cJeldy7k3Yvx2+mMydwyLwswsjRNvpar1JlEQ6QZw=" data-kode="{{ $py->code }}" data-min="1" data-fee="" data-persen="1.7" data-price="0"> 
                                         <div class="ms-2 me-auto"> 
                                          <div class="fw-bold"> 
                                           <img src="{{ img('payment', $py->logo) }}" data-src="{{ img('payment', $py->logo) }}" style="max-height: 35px;" alt="{{ $py->name }}" class="img-responsive gbr lozad"> 
                                          </div> 
                                         </div> <span class="badge bg-secondary rounded-pill harga fs-5 harga_{{ $py->code }}">Rp. 0</span>
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @else
                       <b>Payment tidak tersedia</b>
                    @endif
                    </ul>
                </div>
            </div>
        </section>
    </section>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $('#nominal').on('input', function () {
      let inputText = $(this).val();
      $('.harga').text(rupiah(inputText))
    });
  });
</script>
@endpush
