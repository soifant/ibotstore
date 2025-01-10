@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content col-12"> 
 <div class="login-body"> 
  <form class="mt-4" action="{{ route('post.resetPw') }}" method="post">
    @csrf
   <div class="form-floating mb-3"> 
    <input type="text" class="form-control rounded-3" name="email" id="email" placeholder="name@example.com" value="" required> 
    <label for="email">Masukkan email kamu</label> 
    <span class="error"></span> 
   </div> 
   <div class="mb-0 d-grid"> 
    <button type="submit" class="btn btn-dark btn-ecomm rounded-3">Atur ulang sandi</button> 
   </div> 
  </form> 
 </div> 
</div>
@endsection


