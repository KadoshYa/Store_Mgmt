@extends('Store_Erp.layouts.erp')
@section('title','All Categories')
@section('content')

  <section class="content">
      <div class="row">

        <div class="col-md-12" style=" top: 20px; padding-right:20px; padding-left:20px; ">
            <div class="card" >
                  <!-- Card-header -->
              <div class="card-header">
                  <label class="card-title"> Trashed Categories</label>
              </div>
                  <!-- /.card-header -->
                  <!-- Card-Body -->
                <div class="card-body">
                    @if($categories->count()>0)
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-lg-4 col-6"> 
                                  <!-- small box -->
                                  <div class="small-box" style="background-color:{{$category->color}}">
                                      <div class="inner">
                                      <span style="float:right">
                                      <a href="{{ route ('category.restore', ['id' => $category->id ]) }}"><span class="fa fa-history " style="color:green" title="Restore Category"></a>
                                      <a href="{{ route ('category.destroy', ['id' => $category->id ]) }}"><span class="fa fa-times-circle " style="color:red" title="Destroy Category"></a>
                                      </span>
                                       <h3><a href="{{ route ('category.edit', ['id' => $category->id ]) }}"> {{ $category->name }} </a></h3>
                                          <p>Assets</p>
                                      </div>
                                          <p class="card-text" style=" padding-left: 10px; padding-right: 10px;">
                                            {{$category->description}}
                                          </p>
                                          <a href="{{route('asset.list', ['id' => $category->id ])}}" class="small-box-footer">Show Assets <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                                      @endforeach                                        
                                </div>
                      @endif
                        </div>

                    </div>
                            <!--Card-Body- End -->
                </div>        
        </div>

    </section>

 
@endsection

