<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\Brand;

use Illuminate\Support\Facades\Validator;
use Session;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
        
    }
    public function index()
    {
        $data['categories'] = ProductCategory::all();
        $data['brands'] = Brand::all();
        $data['product_models'] = ProductModel::all();
        return view('admin.product.add_product',$data);
    }
   
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            "name"=>"required|unique:products|string|max:255",
            "descriptions"=>"required|string",
            "buying_price"=>"required",
            "selling_price"=>"required|numeric",
            "discount"=>"required|numeric",
            "available_qty"=>"required|int",
            "status_id"=>"required|int",
            "brand_id"=>"required|int",
            "model_id"=>"required|int",
            "category_id"=>"required|int"
        ]);
        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $this->model->create($request->all());       
        return redirect("product")->with('message','Brand Add Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $product = Product::all();
        // $productCategory = ProductCategory::all();
        // $brands = Brand::all();
        // $productModel = ProductModel::all();    
        $product = $this->model->with('brand','model','category')->get();  
        return view('admin.product.manage_product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $product = Product::find($id);
        $productCategory = ProductCategory::all();
        $brands = Brand::all();
        $productModel = ProductModel::all();
        $product_info = $this->model->with('brand','model','category')->get();  
        return view('admin.product.edit_product',compact('product','productCategory','product_info','productModel','brands'));
    }
   
    public function  view_product($id)
    {
        $id = base64_decode($id);
        $product = Product::find($id);
        $productCategory = ProductCategory::all();
        $brands = Brand::all();
        $productModel = ProductModel::all();
        
        return view('admin.product.details_product',compact('product','productCategory','brands','productModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function update(Request $request, $id)
    {
        $product = $this->model->findOrFail($id);
        $validator = Validator::make($request->all(),[
            "name"=>"required|unique:products,id,$id|string|max:255",
            "descriptions"=>"required|string",
            "buying_price"=>"required",
            "selling_price"=>"required|numeric",
            "discount"=>"required|numeric",
            "available_qty"=>"required|int",
            "status_id"=>"required|int",
            "brand_id"=>"required|int",
            "model_id"=>"required|int",
            "category_id"=>"required|int"
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $product->fill($request->all())->save();
        
        return redirect()->route('manage_product')->with('message','Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product = $this->model->findOrFail($id);
        $product->delete();        
        return redirect()->route('manage_product')->with('message','Product Delete Successfully!');
    }
}
