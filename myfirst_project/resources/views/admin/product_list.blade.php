@extends("layouts.admin.default")

@section("content")

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">sl</th>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Buying Price</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Discount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $product)  
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->brand->name}}</td>
            <td>{{$product->buying_price}}</td>
            <td>{{$product->selling_price}}</td>
            <td>{{$product->discount}}</td>
        </tr>
    @endforeach    
  </tbody>
</table>  
 
@endsection