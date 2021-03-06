@extends('Store_Erp.layouts.Erp')
@section('title','All Assets')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
                <div class="card" >
                        <!-- Card-header -->
                        <div class="card-header">
                            <label class="card-title"> All Assets </label>
                        </div>
                            <!-- /.card-header -->

                            <!-- Card-Body -->
                    <div class="card-body">
                    <div >
                      <a href="{{route('asset.create')}}"><i class="fa fa-plus-square"></i> Add New Asset</a>
                    </div>
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
                                        <th>Trash</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                  @foreach($assets as $asset)
                                      <tr>
                                          <td><a href="{{ route ('asset.edit', ['id' => $asset->id ]) }}">{{$asset->asset_name}}</a></td>
                                          <td >{{App\Category::find($asset->asset_category_id)->name}}</td>
                                          <td >{{$asset->asset_quantity}}</td>    
                                          <td >{{$asset->asset_unit_price}}</td>
                                          <td >{{$asset->asset_total_price}}</td>
                                          <td><a href="{{ route ('asset.delete', ['id' => $asset->id ]) }}"><div class="btn btn-danger">Trash </div></a></td>                         
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


@section('jsblock')
 <script>
 var cells = document.getElementById("example1").getElementsByTagName("td");
for (var i = 0; i < cells.length; i++) {
    if (cells[i].innerHTML == "1" || cells[i].innerHTML == "2") {
        cells[i].style.backgroundColor = "red";
    }
} 
 </script>
@endsection