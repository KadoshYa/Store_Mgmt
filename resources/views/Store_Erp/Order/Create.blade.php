@extends('Store_Erp.layouts.erp')
@section('title','Make A Request')
@section('content')

<section class="content">
    <div style="padding-right:5%; padding-left:5%">

        <div class="card mx-auto"   style="
                    padding-left: 5%;
                    padding-right: 5%;
                    padding-top: 40px;
                    top: 20px;
                    ">  

                @if(count($errors) > 0)
                    <ul class="list-group">
                    
                    @foreach($errors->all() as $error)

                        <li class="list-group-itme text-danger">
                        
                            {{$error}}
                        </li>
                    @endforeach

                    </ul>

                @endif
            
                    <div class="card-header">
                        <label class="card-title"> Make Request </label>
                    </div> 

                    <div class="card-body" >
                        <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            
                                <div class="form-group">
                                    <label for="order_detail">Request Description</label>
                                    <textarea name="order_detail" id="detail" cols="5" rows="5" class="form-control"></textarea>                
                                </div>
                                    
                                    <div class="form-group col-sm-4">
                                        <label for="asset_id">Choose Asset</label>
                                        <select name="asset_id" id="asset_id" class="form-control">
                                        <option value="" Selected>Choose Asset</option>
                                            @foreach($assets as $asset)
                                                <option onclick="asset()" value="{{$asset->id}}" >{{$asset->asset_name}}</option>                                                
                                            @endforeach
                                        </select>

                                    </div>       
                                    
                                    <div class="form-group col-sm-4">
                                        <label for="quantity">Quantitiy</label>
                                        <input type="number" id="quantity" name="quantity" min="1" class="form-control">
                                    </div>

                                <label for="form-check">Urgency</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="normal" name="urgency">Normal
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="urgent" name="urgency">Urgent
                                    </label>
                                </div>
             
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success " type="Submit">Make Request</button>
                                    </div>
                                </div>                                
                               
                      
                        
                        </form>
                    </div>
        </div>
   </div>


</section>

@endsection
