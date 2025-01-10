@php
    $user = Auth::user();
@endphp
<div class="sidenav"> 
 <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidenav"> 
  <div class="offcanvas-header bg-dark border-bottom border-light"> 
   <div class="hstack gap-3">
    <div class="details"> 
     <h6 class="mb-0 text-white">{{ $user->name ?? 'Belum login' }}</h6> 
    </div> 
   </div> 
   <div data-bs-dismiss="offcanvas">
    <i class="bi bi-x-lg fs-5 text-white"></i>
   </div> 
  </div> 
  <div class="offcanvas-body p-0"> 
   <nav class="sidebar-nav"> 
    <ul class="metismenu" id="sidenav">
     @if($user)
        <li> <a href="javascript:;"> <i class="bi bi-credit-card me-2"></i> Rp. 0 </a> </li> 
        <li> <a href="{{ route('deposit') }}"> <i class="fas fa-wallet me-2"></i> Deposit </a></li> 
        <li> <a onclick="btnSting()" class="has-arrow" href="javascript:;"> <i class="bi bi-person-circle me-2"></i> Pengaturan </a> 
            <ul style="display:none;" class="listSting"> 
                <li><a href="{{ route('profile') }}">Profil ku</a></li> 
                <li><a href="{{ route('history') }}">Transaksi ku</a></li> 
                <li><a href="{{ route('saldo') }}">Saldo ku</a></li> 
            </ul>
        </li> 
     @endif
     <li> <a href="{{ route('detail-product') }}"> <i class="bi bi-shop me-2"></i> Produk </a> </li> 
     <li> </li>
     <li> <a href="{{ route('detail-product','list-harga') }}"> <i class="bi bi-list me-2"></i> Harga </a> </li> 
     <li> <a href="{{ route('pesanan') }}"> <i class="bi bi-search me-2"></i> Transaksi </a> </li> 
     <li> <a href="{{ route('tentang') }}"> <i class="bi bi-info-circle-fill me-2"></i> Tentang </a> </li> 
     <li> <a href="{{ route('cs') }}"> <i class="bi bi-headset me-2"></i> Hubungi kami </a> </li> 
     <li> <a href="@if($user) {{ route('logout') }} @else {{ route('login') }} @endif"> <i class="bi bi-box-arrow-right me-2"></i> @if($user) Keluar @else Masuk @endif</a> </li> 
    </ul> 
   </nav> 
  </div> 
  <div class="offcanvas-footer border-top p-3"> 
   <div class="form-check form-switch"> 
    <input class="form-check-input" type="checkbox" role="switch" id="DarkMode" onchange="toggleTheme()"> 
    <label class="form-check-label" for="DarkMode">Mode Gelap</label> 
   </div> 
  </div> 
 </div> 
</div>