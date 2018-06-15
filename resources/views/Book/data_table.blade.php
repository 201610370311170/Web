@extends('layouts.admin-dashboard')

@section('content')
  <head>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/datatables/datatables.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body>
		<div id="wrap">
			<div class="container">
            <h2 style="background-color:#e8ebef; padding:20px; margin:0px; text-align:center; font-family:sans-serif"><b>Daftar Buku</b></h2>

            <!-- Search -->
            <input id="myInput" type="text" placeholder="Search.." style="float:right; margin-top:10px;">
            <br><br>

            <!-- Alert -->
            @if ( Session::has('flash_message') )
      				<div class="alert {{ Session::get('flash_type') }}">
      					<h3 style="color:#3c763d"><strong>Succes! </strong>{{ Session::get('flash_message') }}</h3>
      				</div>
				    @endif



				<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" id="myTable" class="myTable">
					<thead>
						<tr>
							<th id="No">No</th>
							<th id="id">ID Buku</th>
							<th id="Buku">Nama Buku</th>
							<th id="Tahun">Tahun</th>
							<th id="Kota">Kota</th>
              <th id="Penerbit">Penerbit</th>
              <th id="Penulis">Penulis</th>
              <th> Kategori </th>
              <th>
                  <a href="{{ route('book.create')}}">
                    <span class="btn btn-success">Tambah</span>
                  </a>
              </th>
						</tr>
					</thead>
          <?php $No=1;?>
					<tbody id="myTable">
            {{ csrf_field() }}
            @foreach ($books as $book)
              <tr>
                <td>{{ $No++ }}
                <td>{{ $book->id }}</td>
  							<td>{{ $book->Judul_buku }}</td>
                <td>{{ $book->Tahun_terbit }}</td>
  							<td>{{ $book->Kota }}</td>
                <td>{{ $book->Penerbit}}</td>
                <td>{{ $book->Nama_penulis}}</td>
                <td>{{ $book->Kategori}}</td>
                <td>

                  <form class="delete_edition" action="{{ route('book.destroy', $book) }}" method="POST">
								    {{ method_field('DELETE') }}
								    {{ csrf_field() }}
                    <button class="btn btn-danger" onclick="myFunction();" >Hapus</button>
										<a href="{{ route('book.edit', $book)}}" class="btn btn-primary">Update</a>
                    <a href="/storage/files/{{ $book->url }}" download="/storage/files/{{ $book->url }}" <button type="button" class="btn btn-warning">.PDF</button></a>
								</form>

                </td>
              </tr>
            @endforeach

					</tbody>
					<tfoot>
						<tr>
              <th>No</th>
							<th>ID</th>
							<th>Buku</th>
							<th>Tahun</th>
							<th>Kota</th>
              <th>Penerbit</th>
              <th>Penulis</th>
              <th>Kategori</th>
              <th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
  </body>
  <!-- Fitur Search -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
      $(document).ready(function(){
          $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();

            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
      });

      function myFunction() {
          if(!confirm("Are You Sure to delete this"))
          event.preventDefault();
      }

  </script>
  <!-- Fitur Search -->

@endsection
