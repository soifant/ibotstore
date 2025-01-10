@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content col-12"> 
     <section class="terms-policies px-24"> 
      <div class="form-group"> 
       <h3 class="mb-8">Hubungi Kami</h3> 
       <p> <span>Silahkan isi formulir dibawah ini.</span> </p> 
      </div> 
     </section> 
     <!-- profile-image end --> 
     <form action="{{ route('post.cs') }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
      @csrf
      <input type="hidden" name="pilihan" readonly value="1"> 
      <div class="form-floating mb-3"> 
       <input type="text" class="form-control rounded-3" name="nama" id="nama" placeholder="nama Anda" value="" required> 
       <label for="nama">Nama Lengkap</label> 
       <span class="error"></span> 
      </div> 
      <div class="form-floating mb-3"> 
       <input type="email" class="form-control rounded-3" name="email" id="email" placeholder="email@example.com" value="" required> 
       <label for="email">Email</label> 
       <span class="error"></span> 
      </div> 
      <div class="form-floating mb-3"> 
       <input type="number" class="form-control rounded-3" name="telepon" id="telepon" placeholder="No. Telepon Anda" value="" required> 
       <label for="telepon">Nomor WhatsApp</label> 
       <span class="error"></span> 
      </div> 
      <div class="form-floating mb-3"> 
       <input type="text" class="form-control rounded-3" name="kd_transaksi" required id="kd_transaksi" placeholder="Kode Transaksi Anda" value=""> 
       <label for="kd_transaksi">Nomor Invoice</label> 
       <span class="error"></span> 
      </div> 
      <div class="form-loating mb-3"> 
       <input type="file" accept="image/*" name="image" placeholder="Foto" value="" class="form-control"> 
       <span class="error"></span> 
      </div> 
      <div class="form-floating mb-3"> 
       <input type="text" class="form-control rounded-3" name="keterangan" id="keterangan" placeholder="keterangan Anda" value="" required> 
       <label for="keterangan">Keterangan</label> 
       <span class="error"></span> 
      </div> 
      <!-- profile-info end --> 
      <!-- save-btn start --> 
      <div class="mb-0 d-grid"> 
       <button type="submit" class="btn btn-dark btn-ecomm rounded-3">Kirim</button> 
      </div> 
     </form>
    </div>
@endsection