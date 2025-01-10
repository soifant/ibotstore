<footer class="page-footer fixed-bottom border-top d-flex bg-white align-items-center"> 
 <nav class="navbar-nav mr-auto navbar-expand p-0 flex-grow-1"> 
  <div class="navbar-nav align-items-center justify-content-between w-100">
   @php
      $page = Route::currentRouteName();
   @endphp

   @if($page == 'detail-product')
   <button type="submit" class="btn btn-primary btn-ecomm flex-grow-1  mt-2 mb-2 rounded-3"><i class="bi bi-basket2 me-2"></i>Lanjut Pembayaran</button> 
   </form>
   @elseif($page == 'profile')
   <button type="submit" class="btn btn-ecomm btn-outline-dark mt-2 mb-2 rounded-3 flex-fill">Simpan</button>
   </form>
   @elseif($page == 'deposit')
   <button type="submit" class="btn btn-dark btn-ecomm flex-grow-1 mt-2 mb-2 rounded-3"><i class="bi bi-basket2 me-2"></i>Deposit</button>
   </form>
   @else
   <a class="nav-link" href="{{ route('beranda') }}"> 
    <div class="d-flex flex-column align-items-center"> 
     <div class="icon">
      <i class="bi bi-house"></i>
     </div> 
     <div class="name">
      Beranda
     </div> 
    </div> </a> 
   <a class="nav-link" href="{{ route('pesanan') }}"> 
    <div class="d-flex flex-column align-items-center"> 
     <div class="icon">
      <i class="bi bi-search"></i>
     </div> 
     <div class="name">
      Transaksi
     </div> 
    </div> </a> 
   <a class="nav-link" href="{{ route('kupon') }}"> 
    <div class="d-flex flex-column align-items-center"> 
     <div class="icon">
      <i class="bi bi-ticket-perforated"></i>
     </div> 
     <div class="name">
      Promo
     </div> 
    </div> </a>
    @if(Auth::user())
    <a class="nav-link" href="{{ route('profile') }}"> 
     <div class="d-flex flex-column align-items-center"> 
      <div class="icon">
       <i class="fas fa-user-alt"></i>
      </div> 
      <div class="name">
       Profile
      </div> 
     </div>
    </a>
    @else
   <a class="nav-link" href="{{ route('login') }}"> 
    <div class="d-flex flex-column align-items-center"> 
     <div class="icon">
      <i class="bi bi-box-arrow-in-right"></i>
     </div> 
     <div class="name">
      Masuk
     </div> 
    </div> </a> 
    @endif
    @endif
  </div> 
 </nav> 
</footer>