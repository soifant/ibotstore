@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content py-12"> 
@foreach($category as $cat)
 <!-- title --> 
 <div class="title d-flex align-items-center justify-content-between mt-2"> 
  <h5 class="shrink-0">{{ $cat->name }}</h5> 
 </div> 
 <!-- cards --> 
 <div class="d-flex gap-24 all-cards scrollbar-hidden"> 
  <div class="row g-1">
   @foreach($cat->products as $prod)
   @if($prod->public)
   <div class="col-4 d-flex mt-2"> 
    <div class="card rounded-0 w-100 rounded-3 overflow-hidden"> 
     <a href="{{ route('detail-product', ['page' => 'detail', 'slug' => $prod->slug]) }}"><img data-src="{{ img('products',$prod->logo) }}" alt="{{ $prod->name }}" class="img-fluid lozad" src="{{ img('products',$prod->logo) }}" data-loaded="true"></a> 
     <div class="card-body text-center"> 
      <p class="mb-0 fw-bold">{{ $prod->name }}</p>
     </div> 
    </div> 
   </div>
   @endif
   @endforeach
  </div> 
 </div>
@endforeach
</div>
@endsection