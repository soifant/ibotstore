@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content col-12"> 
  <div class="login-body"> 
   <h6 class="fw-bold">Selamat Datang</h6> 
   <p class="mb-0"></p> 
   <form class="mt-4" action="{{ route('post.login') }}" method="post">
    @csrf
    <div class="form-floating mb-3"> 
     <input type="text" class="form-control rounded-3" name="email" id="email" placeholder="name@example.com" value=""> 
     <label for="email">Email</label> 
     <span class="error"></span> 
    </div> 
    <div class="input-group mb-3" id="show_hide_password"> 
     <div class="form-floating flex-grow-1"> 
      <input type="password" name="password" class="form-control rounded-3 rounded-end-0 border-end-0" id="password" placeholder="Enter Password" value=""> 
      <label for="password">Sandi</label> 
     </div> 
     <span class="input-group-text bg-transparent rounded-start-0 rounded-3"><i class="bi bi-eye-slash"></i></span> 
     <span class="error"></span> 
    </div> 
    <div class="d-flex align-items-center justify-content-between mb-3"> 
     <div class="form-check"> 
      <input type="checkbox" class="form-check-input" id="flexCheckDefault"> 
      <label class="form-check-label" for="flexCheckDefault">Ingat</label> 
     </div> 
     <div class="">
      <a href="{{ route('resetpw') }}" class="forgot-link">Lupa Sandi ?</a>
     </div> 
    </div> 
    <div class="mb-0 d-grid"> 
     <button type="submit" class="btn btn-dark btn-ecomm rounded-3">Masuk</button> 
    </div> 
   </form> 
  </div> 
  <div class="text-center mt-3">
    Tidak memiliki akun ? 
   <a href="{{ route('register') }}">Daftar sekarang</a> 
  </div> 
 </div> 
</div>
@endsection