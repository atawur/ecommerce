@extends("layouts.admin.default")

@section("content")

  
    <div class="col-6">
        <div>
            @if(Session::has('message'))
                <div class="" style="color: green;">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('update_productModel',$productModel->id)}}" method="post">
               @csrf
               {{method_field("PUT")}}
               
                <div class="form-group">
                    <label for="formGroupExampleInput">Product Category Name</label>
                    <input type="text" name = "name" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$productModel->name?$productModel->name:old('name')}}">
                    @error("name")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Brand </label>
                    <select id="brand_id" class="form-control" name="brand_id">
                        <option >Select Brand</option>
                        @foreach($brand as $product_brand)
                            <option @if (old('brand_id')== $product_brand->id) selected= "selected" @endif value="{{$product_brand->id}}">{{$product_brand->name}}</option>
                        @endforeach                        
                    </select>
                    @error("status_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputAddress">Status </label>
                    <select id="status_id" class="form-control" name="status_id">
                        <option selected>Select Status</option>
                        <option @if (old('status_id')== 0) selected= "selected" @endif value="0">InActive</option>
                        <option @if (old('status_id')== 1) selected= "selected" @endif value="1">Active</option>
                    </select>
                    @error("status_id")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <br/>


@endsection