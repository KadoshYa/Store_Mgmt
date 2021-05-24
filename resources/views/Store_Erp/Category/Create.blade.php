@extends('Store_Erp.layouts.erp')
@section('title','Add Category')
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
                        <label class="card-title"> Create New Category </label>
                    </div> 

                    <div class="card-body" >
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" id="taskName" class="form-control" >
                                </div>
                            
                                <div class="form-group">
                                    <label for="category_detail">Category Description</label>
                                    <textarea name="category_detail" id="detail" cols="5" rows="5" class="form-control"></textarea>                
                                </div>  
                                <div>
                                    <label for="category_color">Choose Color</label>
                                    <input type="color" value="#ffe680"name="category_color" >
                                </div>                 
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success " type="Submit">Create Category</button>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
   </div>


</section>

@endsection