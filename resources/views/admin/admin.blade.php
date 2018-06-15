@extends('layouts.admin-dashboard')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

      <!-- /.box-header -->
      <div class="box-body">

        <div class="alert alert-light alert-dismissible">
          <button type="button" class="close" data-dismiss="light" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Welcome!</h4>
          Now You just logged as Admin.
        </div>


      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-12">
    <div class="box box-primary">
        <section class="content">
          <div class="header">
          <h1> &nbsp Admin Dashboard </h1>
          </div>
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info" style="background-color:#fc5353">
                        <div class="inner">
                          <h3>{{$booksSum}}</h3>

                          <p>Buku Terdaftar</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-book"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning" style="background-color:#f7b35b">
                        <div class="inner">
                          <h3>{{$usersSum}}</h3>

                          <p>User Terdaftar</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-group"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>53<sup style="font-size: 20px">%</sup></h3>

                          <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>65</h3>

                          <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>




          <!-- PRODUCT LIST -->
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color:#dc3545">
              <h3 class="box-title" style="color:white;">Recently Updated Books!</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php $limit=$booksSum; ?>
                {{ csrf_field() }}
                @foreach ($book->sortByDesc('updated_at') as $book)
                  @if($limit != $booksSum-3)
                      <li class="item">
                        <div class="product-img">
                          <!-- <img src="storage/images/DJT0HpSBtOJ1fXPnioNEMv8H0rPtGlXoCdDl5ClN.png" alt="Product Image"> -->
                          <img src="storage/images/{{$book->img}}" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="#" class="product-title">{{ $book->Judul_buku }}
                          <span class="product-description">
                                {{ $book->Deskripsi }}
                          </span>
                        </div>
                        </li>
                        <?php $limit--;?>
                    @endif
                  @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{route('book.index')}}" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>



</section>
@endsection
