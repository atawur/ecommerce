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
            <td>{{$val->name}}</td>            
            <td> 
                <div class="d-flex">                                                  
                    <a class="p-2" href="{{route('show',base64_encode($val->id))}}" title="View Brand"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>                                                                                                     
                <a class="p-2" href="{{route('edit',base64_encode($val->id))}}" title="Edit Brand"><button class="btn btn-primary btn-sm">  <i class="far fa-edit"></i> Edit</button></a>                                                                                                     
                <form action="{{route('delete',$val->id) }}" method="POST">                                                                                                           
                    @csrf
                    @method('DELETE')   
                    <button type="submit" onclick="return confirm('Are you sure?')"  class="btn btn-danger p-2 btn-sm mb-1"> <i class="far fa-trash-alt"></i></button>                                                          
                </form>   
                </div>                                             
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

 
@endsection