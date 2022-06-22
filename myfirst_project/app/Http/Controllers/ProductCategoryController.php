<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProductCategoryController extends Controller
{
    private $model;

    public function __construct(ProductCategory $product_category)
    {
        $this->model =  $product_category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("here");

        $data = $this->model->all();
        return view("admin.product_category.product_category",compact('data'));
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
            "name"=>"required|unique:product_categories|max:255"
           
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $this->model->create($request->all());
        Session::flash("message","Successfully save");
        return redirect()->route('product_category');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = base64_decode($id);
        $category = $this->model->find($id);
        return view('admin.product_category.details',$category);
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
        $category = $this->model->find($id);
        return view('admin.product_category.edit_product_category',$category);
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
        $category = $this->model->findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name'=>"required|unique:product_categories,id,$id|max:255"
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $category->fill($request->all())->save();
        
        return redirect()->route('product_category')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->model->findOrFail($id);
        $category->delete();
        Session::flash("message","Successfully deleted");
        return redirect()->route('product_category');
    }
}
