@extends('layouts.user-dashboard')

@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->



<!-- Page Content -->
<div class="container">
  <br>
  <h3 style="font-family:Sans-serif; color:#343a40"><b>New</b> Update</h3>
  <hr style="color:black;border:2px solid #343a40;">

  <!-- /.row -->
  {{ csrf_field() }}
  <div class="row">
    <!-- content new update -->
    <?php $limit=$booksSum; ?>
    {{ csrf_field() }}
    @foreach ($book->sortByDesc('updated_at') as $book)
      @if($limit != $booksSum-3)
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="storage/images/{{$book->img}}" alt="" style="max-width:180px; max-height:180px; display: block; margin-left: auto; margin-right: auto;">
        <div class="card-body">

          <h4 class="card-title">{{$book->Judul_buku}} </h4>
          <p class="card-text">{{$book->Deskripsi}}</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('detail', $book->id)}}" class="btn btn-dark">Lihat</a>
        </div>
      </div>
    </div>
    <?php $limit--;?>
      @endif
    @endforeach
    <!-- /content new update -->



  </div>
  <!-- /.row -->
  <div class="alert alert-secondary" role="alert">
    <a href="{{ route('showAll') }}"  style="text-align:center; text-decoration: none; color:black ">
      Cari lebih banyak Buku >>
    </a>
  </div>
</div>
<!-- /.container -->
@endsection
