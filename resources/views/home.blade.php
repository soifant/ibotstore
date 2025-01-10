@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content"> 
     @if(count($promo) > 0)
       <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
           <div class="carousel-inner">
               @foreach($promo as $key => $p)
               <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                   <a href="javascript:;">
                       <img src="{{ img('promo',$p->baner) }}" class="d-block w-100 img-fluid rounded-3" alt="{{ $p->title }}">
                   </a>
               </div>
               @endforeach
           </div>
           
           <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
           </button>
           <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
           </button>
       
           <div class="carousel-indicators text-center">
               @foreach($promo as $key => $p)
               <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
               @endforeach
           </div>
       </div>
      @endif
     <!--end banner slider--> 
     <!--start brands slider--> 
     <div class="sales-category-wrapper mb-3 mt-3">
      <h4 class="text-center fw-bold section-title"></h4> 
      <div id="salesAccessoriesCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              @foreach($rekomen->chunk(2) as $index => $rekomenChunk)
              <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                  <div class="row">
                      @foreach($rekomenChunk as $rek)
                      <div class="col-md-6">
                          <a href="/produk/detail/{{ $rek->products->slug }}" class="card rounded-0 rounded-3 overflow-hidden" style="max-width: 300px; width: 100%;">
                              <div class="row g-0">
                                  <div class="col-sm-8">
                                      <div class="card-body">
                                          <h6 class="card-title">{{ $rek->products->name }}</h6>
                                          <small class="card-text">{{ $rek->information }}</small>
                                          <p class="card-text">
                                              <small class="text-muted">{{ $rek->price }}</small>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                      @endforeach
                  </div>
              </div>
              @endforeach
          </div>
          <!-- Carousel controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#salesAccessoriesCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#salesAccessoriesCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>
     </div> 
     <!--end brands slider--> 
     <div class="card border-primary mb-0"> 
      <div class="card-body"> 
       <div class="py-0"></div> 
       <ul class="nav nav-pills nav-fill" role="tablist">
        @foreach($category as $cat)
            <li class="nav-item" role="presentation"> <button class="nav-link @if($cat->name == 'Games') active @endif" id="pills-populer-tab" data-id="{{ $cat->id }}" data-product="{{ $cat->id }}" data-bs-toggle="pill" data-bs-target="#pills-populer" type="button" role="tab" aria-controls="pills-populer" aria-selected=@if($cat->name == 'Games') "true" @else "false" tabindex="-1" @endif>{{ $cat->name }}</button> </li> 
        @endforeach
       </ul> 
      </div> 
     </div> 
     <div class="py-1"></div>
     <div class="tab-content" id="pills-tabContent">
     @foreach($category as $cat)
      <div id="listProduct{{ $cat->id }}" class="tab-pane fade show @if($cat->name == 'Games') active @endif" id="pills-populer" role="tabpanel" aria-labelledby="pills-populer-tab"> 
       <div class="row mb-1"> 
        <div class="col-12" style="text-align: right;"> 
         <small><a href="/produk">Lihat semua</a></small> 
        </div> 
       </div> 
       <div class="row g-1">
        @foreach($cat->products as $prod)
        @if($prod->status && $prod->public)
        <div class="col-4 d-flex"> 
         <div class="card rounded-0 w-100 rounded-3 overflow-hidden"> 
   
          <a href="/produk/detail/{{ $prod->slug }}"><img data-src="{{ img('products', $prod->logo) }}" alt="{{ $prod->name }}" class="img-fluid lozad" src="{{ img('products', $prod->logo) }}" data-loaded="true"></a> 
          <div class="card-body text-center"> 
           <small class="mb-0 fw-bold">{{ $prod->name }}</small> 
          </div> 
         </div> 
        </div>
        @endif
        @endforeach
       </div> 
      </div>
    @endforeach
     </div>
    </div> 
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    
    $('button.nav-link').click(function() {
      
        $('button.nav-link').removeClass('active');
        $(this).addClass('active');
        $('button.nav-link').attr('aria-selected', 'false');
        $(this).attr('aria-selected', 'true');

        const id = $(this).data('id');
        if(id == '1') {
          $('#listProduct1').addClass('active');
          $('#listProduct2').removeClass('active');
        } else {
          $('#listProduct2').addClass('active');
          $('#listProduct1').removeClass('active');
        }

    });
});
</script>
@endpush
