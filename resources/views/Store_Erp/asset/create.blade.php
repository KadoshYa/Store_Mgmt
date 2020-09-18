@extends('Store_Erp.layouts.erp')
@section('title','Add Asset')
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
                        <label class="card-title"> Add New Asset </label>
                    </div> 

                    <div class="card-body" >
                        <form action="{{route('asset.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="title">Asset Name</label>
                                    <input type="text" name="asset_name" id="assetName" class="form-control" >
                                </div>
                            
                                <div class="form-group">
                                    <label for="asset_detail">Asset Description</label>
                                    <textarea name="asset_detail" id="detail" cols="5" rows="5" class="form-control"></textarea>                
                                </div>

                                <div class="row">
                                    
                                    <div class="form-group col-sm-4">
                                        <label for="addToCategory">Add to Category</label>
                                        <select name="addToCategory" id="addToCategory" class="form-control">
                                        <option value="" Selected>Choose Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" Selected>{{$category->name}}</option>
                                        @endforeach
                                        </select>

                                    </div>       
                                    
                                    <div class="form-group col-sm-4">
                                        <label for="quantity">Quantitiy</label>
                                        <input type="number" id="quantity" name="quantity" min="1" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-4">
                                    <label for="unit">Unit</label>
                                        <select name="unit" id="unit" class="form-control">
                                            <option value="piece" >Piece(pcs)</option>
                                            <option value="pack" >Pack</option>
                                            <option value="killo" >Killo</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="unit_price">Unit Price</label>
                                        <input type="number" onkeyup="totalPrice()" id="unit_price" name="unit_price" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="total_price">Total Price</label>
                                        <input type="number" id="total" name="total_price" class="form-control">
                                    </div>
                                </div>
             
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success " type="Submit">Create Asset</button>
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