@extends('layouts.app')

@section('title', $pageName)

@section('content')
<form action="{{ route('update-profil') }}" method="post" accept-charset="utf-8">
    @csrf
     <!--start to page content--> 
     <div class="page-content"> 
      <div class="profile-img mb-3 border p-3 text-center rounded-3 bg-light"> 
       <img src="https://gagat.id/uploads/photo/no-picture.png" alt="rafael" width="90" height="90" class="rounded-circle"> 
       <h6 class="mb-0 fw-bold mt-3">{{ $user->name }}</h6> 
      </div> 
      <div class="card rounded-3 border-0 bg-transparent"> 
       <div class="card-body p-0"> 
        <div class="row row-cols-1 g-3"> 
         <div class="col"> 
          <div class="form-floating"> 
           <input type="email" class="form-control rounded-3" name="email" id="floatingInputEmail" placeholder="Email" value="{{ $user->email }}"> 
           <label for="floatingInputEmail">Email</label> 
          </div> 
         </div> 
         <div class="col"> 
          <div class="form-floating"> 
           <input type="password" class="form-control rounded-3" name="password" id="password" placeholder="********" value=""> 
           <label for="password">Sandi</label> 
          </div>
         </div> 
         <div class="col"> 
          <div class="form-floating"> 
           <input type="text" class="form-control rounded-3" name="name" id="floatingInputName" placeholder="Name" value="{{ $user->name }}"> 
           <label for="floatingInputName">Nama Lengkap</label> 
          </div>
         </div> 
         <div class="col"> 
          <div class="form-floating"> 
           <input type="date" class="form-control rounded-3" name="birtday" id="tgl_lahir" placeholder="Tgl. Lahir" value="{{ $user->birtday }}"> 
           <label for="tgl_lahir">Tanggal Lahir</label> 
          </div>
         </div> 
         <div class="col"> 
          <div class="form-floating"> 
           <input type="number" class="form-control rounded-3" name="phone" id="no_hp" placeholder="No. HP" value="{{ $user->phone }}"> 
           <label for="no_hp">Nomor WhatsApp</label> 
          </div>
         </div> 
         <div class="col"> 
          <div class="form-check form-check-inline"> 
           <input class="form-check-input" type="radio" name="gander" id="jk1" value="1" @if($user->gander == 1) checked @endif> 
           <label class="form-check-label" for="jk1">Laki-Laki</label> 
          </div> 
          <div class="form-check form-check-inline"> 
           <input class="form-check-input" type="radio" name="gander" id="jk2" value="2" @if($user->gander == 2) checked @endif> 
           <label class="form-check-label" for="jk2">Perempuan</label> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div>
     </div>
@endsection