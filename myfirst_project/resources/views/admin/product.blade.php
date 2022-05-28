@extends("layouts.admin.default")

@section("content")

<?php 


?>
    <div class="col-6">
        <div>
           @if(Session::has('message'))
                <div class="" style="color: green;">{{Session::get('message')}}</div>
            @endif
            <form method="post" action="{{route('product.store')}}">
                @csrf
            
                <div class="form-group">
                    <label for="inputAddress">Product Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Produt Name" name="name" value="{{old('name')}}">
                    @error("name")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Buying Price</label>
                    <input type="number" min="1" class="form-control" id="buying_price" placeholder="Buying Price" name="buying_price" value="{{old('buying_price')}}">
                    @error("buying_price")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Selling Price</label>
                    <input type="number" min="1" class="form-control" id="selling_price" placeholder="Selling Price" name="selling_price" value="{{old('selling_price')}}">
                    @error("selling_price")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Discount</label>
                    <input type="number" min="1" class="form-control" id="discount" placeholder="Discount" name="discount" value="{{old('discount')}}">
                    @error("discount")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Quantity</label>
                    <input type="number" min="1" class="form-control" id="available_qty" placeholder="Quantity" name="available_qty" value="{{old('available_qty')}}">
                    @error("available_qty")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Category</label>
                    <select id="category_id" class="form-control" name="category_id">
                        <option selected>Choose...</option>
                        @foreach($categories as $key=>$category)
                            <option @if (old('category_id')== $category->id) selected= "selected" @endif  value="{{$category->id}}">{{$category->name}}</option>
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
                            <option @if (old('brand_id')== $brand->id) selected= "selected" @endif value="{{$brand->id}}">{{$brand->name}}</option>
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
                        @foreach($product_models as $product_model)
                            <option @if (old('model_id')== $product_model->id) selected= "selected" @endif value="{{$product_model->id}}">{{$product_model->name}}</option>
                        @endforeach  
                    </select>
                    @error("model_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="inputAddress2">Descriptions</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Descriptions" name="descriptions" value="{{old('descriptions')}}">
                    @error("descriptions")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Status </label>
                    <select id="status_id" class="form-control" name="status_id">
                        <option selected>Choose...</option>
                        <option @if (old('status_id')== 0) selected= "selected" @endif value="0">InActive</option>
                        <option @if (old('status_id')== 1) selected= "selected" @endif value="1">Active</option>
                    </select>
                    @error("status_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>    
 
@endsection