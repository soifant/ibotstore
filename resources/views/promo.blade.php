@extends('layouts.app')

@section('title', $pageName)

@section('content')
<style type="text/css">
  .coupon {
    border: 5px dotted #bbb; /* Dotted border */
    width: 80%;
    border-radius: 15px; /* Rounded border */
    margin: 0 auto; /* Center the coupon */
    max-width: 600px;
  }

  .container-coupon {
    padding: 2px 16px;
  }

  .promo {
    background: #ccc;
    padding: 3px;
  }

  .expire {
    color: red;
  }
</style>

<!--start to header-->
<div class="page-content">
  <p class="text-center">DIGUNAKAN MELALUI MEMBER AREA</p>
  <hr class="my-1">
  <div class="details-body" id="areacetak">
    <!-- order item -->
    <section class="order-info pb-5">
      <div class="item d-flex align-items-center mt-4">
        <div class="row">
          @if(count($vocher) > 0)
          @foreach($vocher as $voc)
          <div class="col-sm-20">
            <div class="coupon mt-1 ml-1 mr-1">
              <div class="container">
                <br>
                <p>{{ $voc->description }}</p>
              </div>
              <div class="container-coupon">
                <hr class="my-3">
                <p>Kode Promo: <span class="promo">{{ $voc->code }}</span></p>
                <p class="expire">Berakhir: {{ readableDate($voc->end_at) }}</p>
              </div>
            </div>
          </div>
          @endforeach
          @else
            <b>Promo tidak tersedia</b>
          @endif
        </div>
      </div>
    </section>
  </div>
</div>

<script type="text/javascript">
  function GoToHomePage() {
    window.location = '/';
  }
</script>

@endsection