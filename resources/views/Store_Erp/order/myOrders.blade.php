@extends('Store_Erp.layouts.Erp')
@section('title','All Requests')
@section('content')

    <section class="content">

        <div class="row">

            <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
                <div class="card" >
                        <!-- Card-header -->
                        <div class="card-header">
                            <label class="card-title"> All Requests </label>
                        </div>
                            <!-- /.card-header -->

                            <!-- Card-Body -->
                    <div class="card-body">
                            <!-- Table-Start -->
                            <div class="table-responsive" >
                                <table id="example3" class="table table-hover table-bordered table-striped ">
                                  <thead>
                                    <tr>
                                        <th >Requested By</th>
                                        <th >Asset Name</th>
                                        <th >Request Type</th>
                                        <th >Date Requested</th>
                                        <th >Status</th>
                                        <th>Actions</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    @foreach($requests as $request)
                                      <tr>
                                          <td >{{App\User::find($request->employee_id)->name}}</td>
                                          <td>{{App\Asset::find($request->asset_id)->asset_name}}</td>
                                          <td >{{$request->order_type}}</td>    
                                          <td >{{$request->created_at->toFormattedDateString()}}</td>
                                          <td> 
                                            @if($request->order_status=='ongoing')
                                                Ongoing                                              
                                            @elseif($request->order_status=='approved')
                                                Approved 
                                            @else
                                                Rejected 
                                            @endif
                                          </td>

                                          <td >
                                           @if($request->order_status=='ongoing')
                                            <a href="{{route('order.accept',  ['id' => $request->id ])}}"><div class="btn btn-success "> <i class="fa fa-check-circle"></i> Approve </div></a>
                                            <a href="{{route('order.reject',  ['id' => $request->id ])}}"><div class="btn btn-danger "> <i class="fa fa-times-circle"></i> Reject </div></a>
                                            <a href="{{route('order.edit',  ['id' => $request->id ])}}"><div class="btn btn-info "> <i class="fa fa-edit"></i> Edit </div></a>                                         
                                           @elseif($request->order_status=='rejected')
                                            <a href="{{route('order.accept',  ['id' => $request->id ])}}"><div class="btn btn-success "> <i class="fa fa-check-circle"></i> Approve </div></a>                                                                                    
                                            @elseif($request->order_status=='approved')
                                            <a href="{{route('order.reject',  ['id' => $request->id ])}}"><div class="btn btn-danger "> <i class="fa fa-times-circle"></i> Reject </div></a>
                                           @endif
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


@section('jsblock')
<script>
  $(function () {
    $("#example3").DataTable({ 
        "order": [[ 4, "asc" ]]
     });;
  });
</script>
@endsection
