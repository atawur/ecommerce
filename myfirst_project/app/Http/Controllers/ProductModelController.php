<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\Brand;

class ProductModelController extends Controller
{

    private $model;

    public function __construct(ProductModel $productModel)
    {
        $this->model =  $productModel;
    }

    public function index()
    {
      
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name"=>"required|unique:product_models|max:255",
            "brand_id"=>"required",
            "status_id"=>"required"           
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $this->model->create($request->all());    
    //    $productModel = new ProductModel();
    //    $productModel->name = $request->input('name'); 
    //    $productModel->brand_id = $request->input('brand_id'); 
    //    $productModel->status_id = $request->input('status_id'); 
    //    $productModel->save();    

        return redirect()->back()->with('message','Product Model Add Successfully!');
    }
   
    public function create()
    {   
        $brand = Brand::all();
        $data = $this->model->all();       
        return view("admin.product_model.add_product_model",compact('data','brand'));
    }  
   

    
    public function show($id)    {
        
        $id = base64_decode($id);
        $productModel = $this->model->find($id);
        return view('admin.product_model.details_product_model',$productModel);
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $productModel = ProductModel::find($id);
        $brand = Brand::all();
        return view('admin.product_model.edit_product_model',compact('productModel','brand'));
    }
    public function update( Request $request, $id)
    {
        $productModel = $this->model->findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name'=>"required|unique:product_Models,id,$id|max:255"
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $productModel->fill($request->all())->save();
        
        return redirect()->route('productModel')->with('message','Product Model Updated Successfully!');
    }
    

    public function destroy($id)
    {
        $productModel = $this->model->findOrFail($id);
        $productModel->delete();        
        return redirect()->route('productModel')->with('message','Product Model Delete Successfully!');
    }
}
