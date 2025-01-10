@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content col-12"> 
    <div class="login-body">
        @if($status)
        <form class="mt-4" action="{{ route('post.newpw') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="hidden" name="id" value="{{ $status }}" required> 
                <input type="password" class="form-control rounded-3" name="password" id="password" placeholder="Password Baru" required> 
                <label for="password">Password Baru</label> 
                @if ($errors->has('password'))
                    <span class="error text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-floating mb-3"> 
                <input type="password" class="form-control rounded-3" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Password" required> 
                <label for="password_confirmation">Ulangi Password</label> 
                @if ($errors->has('password_confirmation'))
                    <span class="error text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div> 
            <div class="mb-0 d-grid"> 
                <button type="submit" class="btn btn-dark btn-ecomm rounded-3">Simpan</button> 
            </div> 
        </form>
        @else
           <div class="row g-0"> 
            <div class="alert alert-danger" role="alert">
              Kode verivikasi tidak valid atau sudah berakhir, silahkan minta ulang <a href="{{ route('resetpw') }}">ulangi</a>
            </div> 
           </div>
        @endif
    </div> 
</div>
@endsection
