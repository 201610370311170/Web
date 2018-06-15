@extends('layouts.user-dashboard')

@section('content')

<!-- Page Content -->
<div class="container">
  <br>
  <h3 style="font-family:Sans-serif; color:#343a40"><b>All</b> Books</h3>
  <hr style="color:black;border:2px solid #343a40;">
  <form action="{{ route('search') }}">
  <div class="col-md-4">
        <input type="text" name="keyword" class="form-control" placeholder="Search users...">
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-primary">
            Search
        </button>
    </div>
  </form>

  <br><br>

  <!-- /.row -->
  {{ csrf_field() }}
  <div class="row">
    <!-- content new update -->
    {{ csrf_field() }}
    @if(!$book->isEmpty())
        @foreach ($book->sortByDesc('updated_at') as $book)
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="{{ asset("storage/images/$book->img") }}" alt="" style="max-width:180px; max-height:180px; display: block; margin-left: auto; margin-right: auto;">
            <div class="card-body">

              <h4 class="card-title"><b>{{$book->Judul_buku}}</b> </h4>
              <p class="card-text">{{$book->Deskripsi}}</p>
            </div>
            <div class="card-footer">
              <a href="{{ route('detail', $book->id)}}" class="btn btn-dark">Lihat</a>
            </div>
          </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-secondary" role="alert" style="margin-top:30px; margin-left:450px;">
          <b>Sorry</b>, We Could not find the Book
        </div>
    @endif
    <br><br>
    <!-- /content new update -->
  </div>
  <!-- /.row -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



@endsection
