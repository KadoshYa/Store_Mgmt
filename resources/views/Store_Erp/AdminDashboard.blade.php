@extends('Store_Erp.layouts.erp')
@section('title','Dashboard')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Admin Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">

        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  {{-- ROW 1 --}}
  <div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$categories}}</h3>

        <p>Categories</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-sitemap"></i>
      </div>
      <a href="{{route('category.index')}}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner"> 
        <h3>{{$assets}}</h3>

        <p>Assets</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-cubes"></i>
      </div>
      <a href="{{route('asset.index')}}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$requests}}</h3>

        <p>All Requests</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-paper-plane"></i>
      </div>
      <a href="{{route('order.index')}}" class="small-box-footer">Detail<i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>{{$myRequests}}</h3>

        <p>My Requests</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-list-alt"></i>
      </div>
      <a href="{{route('order.myRequests')}}" class="small-box-footer">List <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
    <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <!-- <div class="small-box bg-danger">
      <div class="inner">
        <h3>0</h3>

        <p>Archive</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-folder-open"></i>
      </div>
      <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div> -->
  </div>
  <!-- ./col -->
</div>

<div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
      </div>
         <!-- Area Chart Example-->
      <div class="card mb-3">
         <div class="card-body">
           <canvas id="myAreaChart_Requests" width="100%" height="40"></canvas>
         </div>
       </div>
       </div>

     </div>
</section>
@endsection


@section('jsblock')
<script src="{{ asset('Store_erp/asset/js/Chart.min.js') }}"></script>
<script src="{{ asset('Store_erp/asset/js/all-request-chart.js') }}"></script>
@endsection