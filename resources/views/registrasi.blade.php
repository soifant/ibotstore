@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content col-12"> 
  <div class="login-body"> 
   <h5 class="fw-bold"></h5> 
   <p class="mb-0"></p> 
   <form class="mt-4" action="{{ route('post.register') }}" method="post">
    @csrf
    <div class="form-floating mb-3"> 
     <input type="text" class="form-control rounded-3" name="name" id="nama" placeholder="nama Anda" value=""> 
     <label for="nama">Nama Lengkap</label> 
     <span class="error"></span> 
    </div> 
    <div class="form-floating mb-3"> 
     <input type="email" class="form-control rounded-3" name="email" id="email" placeholder="email@example.com" value=""> 
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
    <div class="form-floating mb-3"> 
     <input type="number" class="form-control rounded-3" name="phone" id="no_hp" placeholder="No. HP Anda" value=""> 
     <label for="no_hp">Nomor WhatsApp</label> 
     <span class="error"></span> 
    </div> 
    <div class="form-group mb-3"> 
     <select name="gander" id="jk" class="form-control" required> <option value="">Pilih Jenis Kelamin</option> <option value="1">Laki-Laki</option> <option value="2">Perempuan</option> </select> 
     <span class="error"></span> 
    </div> 
    <div class="d-flex align-items-center justify-content-between mb-3"> 
     <div class="form-check"> 
      <input type="checkbox" class="form-check-input" id="flexCheckDefault"> 
      <label class="form-check-label" for="flexCheckDefault">Ingat</label> 
     </div> 
     <a href="{{ route('login') }}">Masuk sekarang</a> 
    </div> 
    <div class="mb-0 d-grid"> 
     <button type="submit" class="btn btn-dark btn-ecomm rounded-3">Daftar</button> 
    </div> 
   </form> 
  </div> 
 </div> 
</div>
@endsection