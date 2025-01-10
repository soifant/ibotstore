@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content">
<div class="ui-pnotify ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-in ui-pnotify-fade-in" aria-live="assertive" aria-role="alertdialog" style="display: none; width: 300px;">
   <div class="brighttheme ui-pnotify-container brighttheme-error ui-pnotify-shadow" role="alert" style="min-height: 16px;">
    <div class="ui-pnotify-closer" aria-role="button" tabindex="0" title="Close" style="cursor: pointer; visibility: hidden;">
     <span class="brighttheme-icon-closer"></span>
    </div>
    <div class="ui-pnotify-sticker" aria-role="button" aria-pressed="false" tabindex="0" title="Stick" style="cursor: pointer; visibility: hidden;">
     <span class="brighttheme-icon-sticker" aria-pressed="false"></span>
    </div>
    <div class="ui-pnotify-icon">
     <span class="icofont icofont-info-circle"></span>
    </div>
    <h4 class="ui-pnotify-title">Informasi</h4>
    <div class="ui-pnotify-text" aria-role="alert">
     Cek kembali inputan Anda!
    </div>
   </div>
  </div>
  <div class="form-group"> 
     <h3 class="mb-8">Tentang Kami</h3> 
  </div> 
  <br> 
  <p> Alamat Kantor : </p> 
  <p> Email Kantor : <a href="mailto:"></a> </p> 
  <br> 
  <p> Persyaratan Layanan : <a href="/persyaratan-layanan">Baca selengkapnya..</a> </p> 
  <p> Kebijakan Privasi : <a href="/kebijakan-privasi">Baca selengkapnya..</a> </p>
</div>
@endsection