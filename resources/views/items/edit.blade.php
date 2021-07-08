@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
        @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Edit Item
                </h2>
            </div>
            <div class="card-body">
               <form class="container" method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                   <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label> Category </label>
                               <input type="number" name="category_id" value="{{ $item->category_id }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                                <label> SKU </label>
                                <input type="text" name="sku" value="{{ $item->sku }}" class="form-control"/>
                            </div>
                           <div class="form-group">
                               <label> Title </label>
                               <input type="text" name="title" value="{{ $item->title }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Price </label>
                               <input type="number" name="price" value="{{ $item->price }}" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Description </label>
                               <textarea class="form-control" rows="4" name="description">{{ $item->description }}</textarea>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Sizes <small>(Put sizes with comma seperation)</small> </label>
                               <input type="text" name="sizes" value="{{ $item->sizes }}" placeholder="e.g: small,medium,large" class="form-control"/>
                           </div>
                           <div class="form-group">
                            <label> Materials <small>(Put materials with comma seperation)</small> </label>
                            <input type="text" name="materials" value="{{ $item->materials }}" placeholder="e.g: cotton,silk" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Colors <small>(Put colors with comma seperation)</small> </label>
                            <input type="text" name="colors" value="{{ $item->colors }}" placeholder="e.g: red,yellow,green" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Fittings <small>(Put fittings with comma seperation)</small> </label>
                            <input type="text" name="fittings" value="{{ $item->fittings }}" placeholder="e.g: true to size, fit to size" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Update Cover Image<small>(Optional)</small> </label>
                            <input name="img" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <a title="Click to Download Image!" href="{{ asset('images/items/'.$item->image) }}" download>
                                <img src="{{ asset('images/items/'.$item->image) }}" class="image_width">
                            </a>
                        </div>
                        <div class="form-group">
                            <label>Extra Images</label>
                            <div class="row">
                                @foreach ($item->images as $img)
                                <div class="col-md-2 text-center">
                                    <a title="Delete this Image" href="{{ route('item_image.delete', $img->id) }}"><i class="fa fa-trash"></i></a><br>
                                    <img src="{{ asset('images/items/'.$img->image) }}" class="mt-1 extra_images" style="width:90%; margin: auto;">
                                </div>
                               @endforeach
                           </div>
                       </div>
                       <div class="form-group">
                        <label>Upload Extra Images</label>
                            <label> Extra 5 Images </label>
                            <input name="images[]" type="file" multiple class="form-control">
                        </div>
                       </div>
                       <div class="col-md-6">
                       </div>
                       <div class="col-md-3 offset-md-4 mt-5">
                           <div class="form-group text-center">
                               <button class="btn btn-primary btn-block btn-lg p-3 border-radius-3">
                                   Update
                               </button>
                           </div>
                       </div>
                   </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection