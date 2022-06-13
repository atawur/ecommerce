@extends('layouts.admin.default')

@section('content')
    <div class="content-page">
        <div class="row pb-5">
            <div class="bg-dark p-2" style="margin:auto;">
             <h2 class="text-uppercase"> Details Product</h2>
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

        <div class="row">
            <div class="col-lg-10 mb-3">
                <div class="table-responsive">
                    <table id="customers" class="table">
                        <tr>
                            <th>ID: </th>
                            <td>{{ $product->id }}</td>

                        </tr>
                        <tr>
                            <th>Product Name:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Buying Price:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->buying_price }}</td>
                        </tr>
                        <tr>
                            <th>Selling Price:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->selling_price }}</td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->discount }}</td>
                        </tr>
                        <tr>
                            <th>Quantity:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->available_qty }}</td>
                        </tr>
                        <tr>
                            <th>Product Category:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->category_id }}</td>
                        </tr>
                        <tr>
                            <th>Brand:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->brand_id }}</td>
                        </tr>
                        <tr>
                            <th>Model:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->model_id }}</td>
                        </tr>
                        <tr>
                            <th>Descriptions:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->descriptions }}</td>

                            {{-- <tr>
                                    <th>product Picture: </th>
                                    <td>
                                        <img src="{{ asset('uploads/product/' . $product->image) }}" alt="Database Image"
                                            width="80px" height="80px">
                                    </td>
                                </tr> --}}
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td style="white-space:pre-wrap; word-wrap:break-word">{{ $product->status_id }}</td>
                        </tr>


                    </table>

                    <div class="form-group text-center custom-mt-form-group">
                        <a href="{{ url('edit_product', base64_encode($product->id)) }}"><button
                                class="btn btn-primary mr-2" type="submit">Update</button></a>
                        <a href="{{ url('manage_product') }}"> <button class="btn btn-secondary"
                                type="reset">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
