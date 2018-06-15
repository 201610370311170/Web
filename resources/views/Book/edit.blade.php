@extends('layouts.admin-dashboard')

@section('content')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{URL::asset('../../dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/photoInput.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Datepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  <!-- Main content -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="background-color: #e8ebef; padding: 15px; border-radius: 5px;">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title" style="color:black"><b>Tambah Buku</b></h3>
            </div>
            <br>
            <!-- /.card-header -->
            <!-- form start -->

            <form enctype="multipart/form-data" action="{{route('book.update', $book)}}" method="post">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label>ID Buku</label>
                  <input type="text" class="form-control" name="ID" placeholder="Masukkan ID Buku" value="{{ $book->id }}" required
                  oninvalid="this.setCustomValidity('Masukkan ID anda')"
                  oninput="setCustomValidity('')"></input>
                    @if($errors->has('ID'))
                      <b style="color:red"> {{ $errors->first('ID') }}</b>
                    @endif
                </div>

                <div class="form-group">
                  <label>Nama Buku</label>
                  <input type="text" class="form-control" name="Nama_Buku" placeholder="Masukkan Nama" value="{{ $book->Judul_buku }}" required
                  oninvalid="this.setCustomValidity('Masukkan Nama Buku')"
                  oninput="setCustomValidity('')"></input>
                  @if($errors->has('Nama Buku'))
                    <b style="color:red"> {{ $errors->first('Nama Buku') }}</b>
                  @endif
                </div>

                <div class="form-group">
                  <label>Tahun</label>
                  <br>
                  <span class="glyphicon glyphicon-calendar"></span>
                  <input class="date-own form-control" style="width: 300px;" type="text" name="tahun" value="{{ $book->Tahun_terbit }}" required>
                  @if($errors->has('tahun'))
                    <br>
                    <b style="color:Red"> {{ $errors->first('tahun') }}</b>
                  @endif
                </div>

                <div class="form-group">
                  <label>Kota</label>
                  <input type="text" class="form-control" name="Kota" placeholder="Masukkan Kota"  value="{{ $book->Kota }}" required
                  oninvalid="this.setCustomValidity('Masukkan Kota')"
                  oninput="setCustomValidity('')"></input>
                </div>

                <div class="form-group">
                  <label>Penerbit</label>
                  <input type="text" class="form-control" name="Penerbit" placeholder="Masukkan Penerbit"  value="{{ $book->Penerbit }}" required
                  oninvalid="this.setCustomValidity('Masukkan Nama Penerbit')"
                  oninput="setCustomValidity('')"></input>
                </div>

                <div class="form-group">
                  <label>Penulis</label>
                  <input type="text" class="form-control" name="Penulis" placeholder="Masukkan Penulis"  value="{{ $book->Nama_penulis }}" required
                  oninvalid="this.setCustomValidity('Masukkan Nama Penulis Buku')"
                  oninput="setCustomValidity('')"></input>
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" class="form-control" name="Kategori" placeholder="Masukkan Kategori"  value="{{ $book->Kategori }}" required
                  oninvalid="this.setCustomValidity('Masukkan Kategori')"
                  oninput="setCustomValidity('')"></input>
                </div>

                <div class="form-group">
                  <label>Deskripsi</label><br>
                  <textarea rows="4" cols="50" name="description" value="{{ $book->Deskripsi }}" required
                  oninvalid="this.setCustomValidity('Masukkan Deskripsi Buku')"
                  oninput="setCustomValidity('')"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" required>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->


              <button class="btn btn-primary">Update</button>
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="PUT">
            </form>

            <script>
                function readURL(input) {
                     if (input.files && input.files[0]) {
                         var reader = new FileReader();

                         reader.onload = function (e) {
                             $('#blah')
                                 .attr('src', e.target.result);
                         };

                         reader.readAsDataURL(input.files[0]);
                     }
                 }

                 $('.date-own').datepicker({
                     minViewMode: 2,
                     format: 'yyyy'
                   });


            </script>


@endsection
