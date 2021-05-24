@extends('Store_Erp.layouts.Erp')
@section('title','All Assets')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
                <div class="card" >
                        <!-- Card-header -->
                        <div class="card-header">
                            <label class="card-title"> Assets in Category: {{$category->name}}</label>
                        </div>
                            <!-- /.card-header -->

                            <!-- Card-Body -->
                    <div class="card-body">
                    <div class="icon">
                      <a href="{{route('asset.categorycreate', ['id' => $category->id ])}}"><i class="fa fa-plus-square"></i> Add New Asset</a>
                    </div>

                            <!-- Table-Start -->
                            <div class="table-responsive" >
                                <table id="example1" class="table table-hover table-bordered table-striped ">
                                  <thead>
                                    <tr>
                                        <th >Asset Name</th>
                                        <th >Asset Category</th>
                                        <th >Quantity</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                  @foreach($assets as $asset)
                                      <tr>
                                          <td>{{$asset->asset_name}}</td>
                                          <td >{{$asset->asset_category_id}}</td>
                                          <td >{{$asset->asset_quantity}}</td>                            
                                      </tr>
                                  @endforeach
                                  </tbody>

                                </table>
                            <!-- Table-End -->
                            </div>

                    </div>
                            <!--Card-Body- End -->
                </div>
            </div>
        
        </div>

    </section>

 
@endsection
