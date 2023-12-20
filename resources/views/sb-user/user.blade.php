@extends('sb-user.app')

@section('content')
    
       


 <!-- Content -->
 <br>
 <br>
 <br>
 
 <div class="card">
  <div class="card-header">
    Hello {{ Auth::user()->name }}
  </div>
  <div class="row">
      <div class="col-3 ml-3 p-3">
    <img src="{{Auth::user()->foto_user}}" width="190px" height="200px" alt="">
    <h6 class="mt-3 ml-5 fw-bold">{{ Auth::user()->nik }}</h6>
    </div>
    <div class="col-8 p-5">
    <h5 class="card-title font-weight-bold">Selamat Datang {{ Auth::user()->name }}</h5>
    <p class="card-text">Aplikasi Ini Untuk Mendata Kemana Kamu Pergi</p>
    </div>    
    
  </div>
</div>
<!-- /.content -->
        
    
@endsection