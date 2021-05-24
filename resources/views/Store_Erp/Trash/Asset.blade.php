@extends('Store_Erp.layouts.Erp')
@section('title','Trashed Assets')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
                <div class="card" >
                        <!-- Card-header -->
                        <div class="card-header">
                            <label class="card-title"> Trashed Assets </label>
                        </div>
                            <!-- /.card-header -->

                            <!-- Card-Body -->
                    <div class="card-body">
                   
                            <!-- Table-Start -->
                            <div class="table-responsive" >
                                <table id="example1" class="table table-hover table-bordered table-striped ">
                                  <thead>
                                    <tr>
                                        <th >Asset Name</th>
                                        <th >Asset Category</th>
                                        <th >Quantity</th>
                                        <th >Unit Price</th>
                                        <th >Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                  @foreach($assets as $asset)
                                      <tr>
                                          <td><a href="{{ route ('asset.edit', ['id' => $asset->id ]) }}">{{$asset->asset_name}}</a></td>
                                          <td >{{$asset->asset_category_id}}</td>
                                          <td >{{$asset->asset_quantity}}</td>    
                                          <td >{{$asset->asset_unit_price}}</td>
                                          <td >{{$asset->asset_total_price}}</td> 
                                          <td>
                                            <a href="{{ route ('asset.restore', ['id' => $asset->id ]) }}"><div class="btn btn-success">Restore </div></a>
                                            <a href="{{ route ('asset.destroy', ['id' => $asset->id ]) }}"><div class="btn btn-danger">Delete </div></a>
                                          </td>                         
                                          
                                          </td>                        
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
