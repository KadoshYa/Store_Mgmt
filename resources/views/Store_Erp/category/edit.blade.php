@extends('Store_Erp.layouts.erp')
@section('title','Update Category')
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
                        <label class="card-title"> Update Category : {{ $category->name }} </label>
                    </div>

                    <div class="card-body" >
                        <form action="{{ route('category.update',['id' => $category->id] )}} " method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="name"> Update Name</label>
                                    <input type="text" name="name" id="form-control" value="{{$category->name}}" class="form-control" >
                                </div>
                            
                                <div class="form-group">
                                    <label for="content">Update Description</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{$category->description}}</textarea>                
                                </div>

                                <div>
                                    <label for="category_color">Change Color</label>
                                    <input type="color" value="{{$category->color}}"name="category_color" >
                                </div>
                                
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-sm" type="Submit">Update Category</button>
                                    </div>
                                </div>
                        
                        </form>
                    </div>
        </div>
    </div>  
</section>
@endsection

