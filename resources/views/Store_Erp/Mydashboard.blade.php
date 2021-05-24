@extends('Store_Erp.layouts.erp')
@section('title','My Dashboard')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Store Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item active">Store Dashboard</li> -->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="row">
  <div class="col-lg-4 col-12">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$requests}}</h3>

        <p>My Requests</p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-list-alt"></i>
      </div>
      <a href="{{route('order.myRequests')}}" class="small-box-footer">List <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3> New Request</h3>
        <p> <br></p>
      </div>
      <div class="icon" style="color:white">
        <i class="fa fa-paper-plane"></i>
      </div>
      <a href="{{route('order.create')}}" class="small-box-footer">Make Request <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

</section>
@endsection

