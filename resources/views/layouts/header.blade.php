<header class="top-header fixed-top border-bottom d-flex align-items-center custom-container"> 
 <nav class="navbar navbar-expand w-100 p-0 gap-3 align-items-center"> 
  <div class="nav-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidenav">
   <a href="javascript:;"><i class="bi bi-list"></i></a>
  </div> 
  <div class="brand-logo" style="font-size:20px;">
   <a href="{{ route('beranda') }}"><img src="{{ img('website','/logo.jpg') }}" width="30" style="border-radius:5px;" alt=""> <b>IBOTSTORE</b></a>
  </div> 
  
  <form class="searchbar" action="{{ route('detail-product','search') }}" method="get"> 
   <div class="position-absolute top-50 translate-middle-y search-icon start-0">
    <i class="bi bi-search"></i>
   </div> 
   <input class="form-control px-5" type="text" placeholder="Cari Disini" required name="search" value=""> 
   <div onclick="btnSearch('close')" class="position-absolute top-50 translate-middle-y end-0 search-close-icon">
    <i class="bi bi-x-lg"></i>
   </div> 
  </form>
  <ul class="navbar-nav ms-auto d-flex align-items-center top-right-menu"> 
   <li onclick="btnSearch('open')" class="nav-item mobile-search-button"> <a class="nav-link" href="javascript:;"><i class="bi bi-search"></i></a> </li> 
   <li class="nav-item"> <a class="nav-link" href="{{ route('cs') }}"><i class="bi bi-headset"></i></a> </li> 
  </ul> 
 </nav> 
</header>
