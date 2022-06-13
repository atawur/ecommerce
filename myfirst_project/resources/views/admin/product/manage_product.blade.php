@extends("layouts.admin.default")

@section("content")

<div class="row pb-5">
  <div class="bg-dark p-2" style="margin:auto;">
   <h2 class="text-uppercase"> Manage Product</h2>
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

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">SL</th>
        <th scope="col">Product Name</th>  
        <th scope="col">Brand</th>
        <th scope="col">Model</th>  
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $sl=1; ?>
      @foreach($product as $key=>$val)
          <tr>
              <th>{{$loop->iteration}}</th>
              <td >{{$val->name}}</td>                 
              <td>{{($val->brand->name)}}</td>
              <td>{{($val->model_id)}}</td>
              <td>{{($val->status_id)}}</td>
              <td> 
                <div class="d-flex">                                                  
                <a class="p-2" href="{{route('view_product',base64_encode($val->id))}}" title="View product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>                                                                                                     
                <a class="p-2" href="{{route('edit_product',base64_encode($val->id))}}" title="Edit product"><button class="btn btn-primary btn-sm">  <i class="far fa-edit"></i> Edit</button></a>                                                                                                     
                <form action="{{route('delete_product',$val->id) }}" method="POST">                                                                                                           
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