@extends('layouts.main')
@section('content')        
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
        @include('layouts.alerts')
            <div class="card-header border-0">
                <h2 class="card-title pl-5">
                   Add Item
                </h2>
            </div>
            <div class="card-body">
               <form class="container" method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                @csrf 
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Category </label>
                               <input type="number" name="category_id" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> SKU </label>
                               <input type="text" name="sku" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Title </label>
                               <input type="text" name="title" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Price </label>
                               <input type="number" name="price" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label> Description </label>
                               <textarea class="form-control" rows="4" name="description"></textarea>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label> Sizes <small>(Put sizes with comma seperation)</small> </label>
                               <input type="text" name="sizes" placeholder="e.g: small,medium,large" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label> Materials <small>(Put materials with comma seperation)</small> </label>
                            <input type="text" name="materials" placeholder="e.g: cotton,silk" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Colors <small>(Put colors with comma seperation)</small> </label>
                            <input type="text" name="colors" placeholder="e.g: red,yellow,green" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Fittings <small>(Put fittings with comma seperation)</small> </label>
                            <input type="text" name="fittings" placeholder="e.g: true to size, fit to size" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Item Image </label>
                            <input type="file" name="img" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> Extra 5 Images </label>
                            <input name="images[]" type="file" multiple class="form-control">
                        </div>
                       </div>
                       <div class="col-md-6">
                       </div>
                       <div class="col-md-3 offset-md-4 mt-5">
                           <div class="form-group text-center">
                               <button class="btn btn-primary btn-block btn-lg p-3 border-radius-3">
                                   Save
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