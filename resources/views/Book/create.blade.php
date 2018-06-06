@extends('layouts.admin-dashboard')

@section('content')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{URL::asset('../../dist/css/adminlte.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

          <form enctype="multipart/form-data" action="{{route('book.store')}}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label>ID Buku</label>
                <input type="text" class="form-control" name="ID" placeholder="Masukkan ID Buku" value="{{ old('ID') }}" required
                oninvalid="this.setCustomValidity('Masukkan ID anda')"
                oninput="setCustomValidity('')"></input>
                  @if($errors->has('ID'))
                    <b style="color:red"> {{ $errors->first('ID') }}</b>
                  @endif
              </div>

              <div class="form-group">
                <label>Nama Buku</label>
                <input type="text" class="form-control" name="Nama_Buku" placeholder="Masukkan Nama" value="{{ old('Nama_Buku') }}" required
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
                <input id="number" type="number" name="tahun" value="{{ old('tahun') }}" required
                oninvalid="this.setCustomValidity('Pilih Tahun')"
                oninput="setCustomValidity('')"></input>
                @if($errors->has('tahun'))
                  <br>
                  <b style="color:Red"> {{ $errors->first('tahun') }}</b>
                @endif
              </div>

              <div class="form-group">
                <label>Kota</label>
                <input type="text" class="form-control" name="Kota" placeholder="Masukkan Kota"  value="{{ old('Kota') }}" required
                oninvalid="this.setCustomValidity('Masukkan Kota')"
                oninput="setCustomValidity('')"></input>
              </div>

              <div class="form-group">
                <label>Penerbit</label>
                <input type="text" class="form-control" name="Penerbit" placeholder="Masukkan Penerbit"  value="{{ old('Penerbit') }}" required
                oninvalid="this.setCustomValidity('Masukkan Nama Penerbit')"
                oninput="setCustomValidity('')"></input>
              </div>

              <div class="form-group">
                <label>Penulis</label>
                <input type="text" class="form-control" name="Penulis" placeholder="Masukkan Penulis"  value="{{ old('Penulis') }}" required
                oninvalid="this.setCustomValidity('Masukkan Nama Penulis Buku')"
                oninput="setCustomValidity('')"></input>
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="Kategori" placeholder="Masukkan Kategori"  value="{{ old('Kategori') }}" required
                oninvalid="this.setCustomValidity('Masukkan Kategori')"
                oninput="setCustomValidity('')"></input>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" required>
                    <br>
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="submit" onclick="sweetalert" value="Daftar" name="submit" class="btn btn-primary">

              <input type="reset" value="reset" class="btn btn-warning">
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
