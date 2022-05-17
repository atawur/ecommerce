@extends("layouts.admin.default")

@section("content")

  
    <div class="col-6">
        <div>
            @if(Session::has('message'))
                <div class="" style="color: green;">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('update',$id)}}" method="post">
               @csrf
               {{method_field("PUT")}}
               
                <div class="form-group">
                    <label for="formGroupExampleInput">Product Category Name</label>
                    <input type="text" name = "name" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{$name?$name:old('name')}}">
                    @error("name")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <br/>


@endsection