@extends("layouts.admin.default")

@section("content")

  
    <div class="col-6">
        <div>
            @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{session()->get('message')}}
                    </div>
            @endif

            <form action="{{route('store_brand')}}" method="post">
               @csrf
               
                <div class="form-group">
                    <label for="formGroupExampleInput">Product Brand Name</label>
                    <input type="text" name = "name" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="{{old('name')}}">
                    @error("name")
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
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <br/>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $sl=1; ?>
          @foreach($data as $key=>$val)
              <tr>
                  <th>{{$loop->iteration}}</th>
                  <td >{{$val->name}}</td>
                  <td>{{($val->status_id)}}</td>
                  <td> 
                    <div class="d-flex">                                                  
                    <a class="p-2" href="{{route('view_brand',base64_encode($val->id))}}" title="View Brand"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>                                                                                                     
                    <a class="p-2" href="{{route('edit_brand',base64_encode($val->id))}}" title="Edit Brand"><button class="btn btn-primary btn-sm">  <i class="far fa-edit"></i> Edit</button></a>                                                                                                     
                    <form action="{{route('delete_brand',$val->id) }}" method="POST">                                                                                                           
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