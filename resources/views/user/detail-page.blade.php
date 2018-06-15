@extends('layouts.user-dashboard')

@section('content')

<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<!-- CSS -->
<link rel="stylesheet" href="{{URL::asset('css/detail-page.css')}}">

<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="container" style="margin-top:120px;">
	    <div class="prog-page">
		 <div class="header-title header-btn">
		<div class="header-info">
		   <h2><i class="fa fa-info-circle"></i>Informasi Buku</h2>
		</div>
		</div>

		<div class="prof-page-info">
		<div class="row">

		<div class="col-md-3">
		  <div class="prof-img">
          <img src="{{ asset("storage/images/$book->img") }}">
		   </div>
       <br>
       <a href="/storage/files/{{ $book->url }}" download="/storage/files/{{ $book->url }}" type="button" class="btn btn-dark" style="padding:10px 70px 10px 70px;">Download .PDF</a>
		</div>

		<div class="col-md-9">


		   <div class="prof-info">

		   <div class="info"><label>Judul Buku :</label>  <span>{{$book->Judul_buku}}</span></div>
			 <div class="info"><label>Tahun :</label>  <span> {{$book->Tahun_terbit}}</span></div>
		   <div class="info"><label>Kota :</label>  <span>{{$book->Kota}}</span></div>
		   <div class="info"><label>Penulis :</label>  <span>{{$book->Nama_penulis}}</span></div>
		   <div class="info"><label>Penerbit :</label>  <span>{{$book->Penerbit}}</span></div>
 		   <div class="info"><label>Sinopsis :</label>
         <p>{{$book->Deskripsi}}</p>
       </div>
			</div>
    </div>
	</div>
	</div>
	</div>
	</div>
    <br><br>
	</div>
  @endsection
