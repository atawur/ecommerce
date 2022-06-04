<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
    public function all_product(){
        $data = $this->model->with('brand')->get();
        //dd($data);
        return view("admin.product_list",compact('data'));
    }
    public function index()
    {
        $data['categories'] = ProductCategory::all();
        $data['brands'] = Brand::all();
        $data['product_models'] = ProductModel::all();
        return view('admin.product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
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
        Session::flash("message","Successfully save");
        return redirect("product");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
