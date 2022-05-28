@extends("layouts.admin.default")

@section("content")

  
    <div class="col-6">
        <div>
           @if(isset($success)))
           
                <div class="" style="color: green;">{{$success}}</div>
            @endif

            @if(Session::has('message'))
                <div class="" style="color: green;">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('category-save')}}" method="post">
               @csrf
               
                <div class="form-group">
                    <label for="formGroupExampleInput">Product Category Name</label>
                    <input type="text" name = "name" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{old('name')}}">
                    @error("name")
                        <div class="" style="color:red">{{$message}}</div>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <br/>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Category Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $sl=1; ?>
    @foreach($data as $key=>$val)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td colspan="2">{{$val->name}}</td>
            <td>
                <a href="{{route('edit',$val->id)}}">Edit</a>|
                <a href="{{route('show',$val->id)}}">View</a>|
                <form action="{{route('delete',$val->id)}}" method="post">
                
                @csrf
                {{method_field('DELETE')}}
                    <button type="submit" class=" btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

 
@endsection