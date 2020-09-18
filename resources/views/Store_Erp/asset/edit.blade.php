@extends('Store_Erp.layouts.erp')
@section('title','Update Asset')
@section('content')

<section class="content" style="padding:35px">
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
                        <label class="card-title"> Update Asset : {{ $asset->asset_name }} </label>
                    </div>

                    <div class="card-body" >
                        <form action="{{ route('asset.update',['id' => $asset->id] )}} " method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="name"> Update Name</label>
                                    <input type="text" name="name" id="form-control" value="{{$asset->asset_name}}" class="form-control" >
                                </div>
                            
                                <div class="form-group">
                                    <label for="content">Update Description</label>
                                    <textarea name="description" id="description" value="$asset->asset_description" cols="5" rows="5" class="form-control">{{$asset->asset_description}}</textarea>                
                                </div>
                                
                                <div class="row">
                                <div class="form-group col-sm-4">
                                        <label for="quantity">Update Quantitiy</label>
                                        <input type="number" id="quantity" value="{{$asset->asset_quantity}}" name="quantity" min="1" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-4">
                                    <label for="unit">Unit</label>
                                        <select name="unit" value="{{$asset->asset_unit}}" id="unit" class="form-control">
                                            <option value="piece" >Piece(pcs)</option>
                                            <option value="pack" >Pack</option>
                                            <option value="killo" >Killo</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="unit_price">Update Unit Price</label>
                                        <input type="number" onkeyup="totalPrice()" value="{{$asset->asset_unit_price}}" id="unit_price" name="unit_price" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="total_price">Total Price</label>
                                        <input type="number" id="total" value="{{$asset->asset_total_price}}" name="total_price" class="form-control">
                                    </div>
                                </div>
                                </div>             
                                
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-sm" type="Submit">Update Asset</button>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
    </div>  
</section>
@endsection

@section('jsblock')
<script>
    function totalPrice(){
        unit_price= document.getElementById("unit_price").value;
        quantity= document.getElementById("quantity").value;
        document.getElementById("total").value = unit_price * quantity;
        document.getElementById("total").innerHTML = unit_price * quantity;

    }
</script>
@endsection