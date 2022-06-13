@extends("layouts.admin.default")

@section("content")

<div class="row pb-5">
   <div class="bg-dark p-2" style="margin:auto;">
    <h2 class="text-uppercase"> Edit Product</h2>
   </div>
    <div class="col-sm-12 col-12 text-right add-btn-col">
        <div class="text-left add-btn-col">
            <a href="{{route('product')}}" class="btn btn-primary btn-rounded float-left"><i
                    class="fas fa-plus"></i> Add Product</a>
            <a href="{{ route('manage_product') }}" class="btn btn-primary btn-rounded float-right"><i
                    class="fas fa-th pr-2"></i>Manage Manage</a>
        </div>
    </div>
</div>
    <div class="col-6">
        <div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('message')}}
            </div>
         @endif
            <form method="POST" action="{{route('update_product',$product->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputAddress">Product Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Produt Name" name="name" value="{{$product->name}}">
                    @error("name")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Buying Price</label>
                    <input type="number" min="1" class="form-control" id="buying_price" placeholder="Buying Price" name="buying_price" value="{{$product->buying_price}}">
                    @error("buying_price")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Selling Price</label>
                    <input type="number" min="1" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" value="{{$product->selling_price}}">
                    @error("selling_price")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Discount</label>
                    <input type="number" min="1" class="form-control" id="discount" placeholder="Discount" name="discount" value="{{$product->discount}}">
                    @error("discount")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Quantity</label>
                    <input type="number" min="1" class="form-control" id="available_qty" placeholder="Quantity" name="available_qty" value="{{$product->available_qty}}">
                    @error("available_qty")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Product Category</label>
                    <select id="category_id" class="form-control" name="category_id">
                        <option selected>Choose...</option>
                        @foreach($productCategory as $key=>$category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' :'' }}>{{ $category->name }}</option>  
                          
                        @endforeach    
                    </select>
                    @error("category_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Brand </label>
                    <select id="category_id" class="form-control" name="brand_id">
                        <option selected>Choose...</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' :'' }}>{{ $brand->name }}</option>  
                        @endforeach  
                    </select>
                    @error("brand_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Model </label>
                    <select id="category_id" class="form-control" name="model_id">
                        <option selected>Choose...</option>
                        @foreach($productModel as $product_model)
                        <option value="{{$product_model->id}}" {{ $product_model->id == $product->model_id ? 'selected' :'' }}>{{$product_model->name }}</option>   
                        @endforeach  
                    </select>
                    @error("model_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="inputAddress2">Descriptions</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Descriptions" name="descriptions" value="{{$product->descriptions}}">
                    @error("descriptions")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Status </label>
                    <select id="status_id" class="form-control" name="status_id">
                        <option selected>Choose...</option>                        
                        <option value="1"@if($product->status_id=='1') selected='selected' @endif >Active</option>   
                        <option value="0"@if($product->status_id=='0') selected='selected' @endif >InActive</option>                          
                    </select>
                    @error("status_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Updated</button>
            </form>
        </div>
    </div>    
 
@endsection