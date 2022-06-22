<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    private $model;

    public function __construct(Brand $product_brand)
    {
        $this->model =  $product_brand;
    }
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(),[
                "name"=>"required|unique:brands|max:255"
               
            ]);
    
            if($validator->fails()){
                return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
            }
            $this->model->create($request->all());           
            return redirect()->route('product_brand')->with('message','Product Brand Add Successfully!');
            
        }
    }

    public function create()
    {
        $data = $this->model->all();       
        return view("admin.brand.add_brand",compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)    {
        
        $id = base64_decode($id);
        $brand = $this->model->find($id);
        return view('admin.brand.details_brand',$brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $brand = $this->model->find($id);
        return view('admin.brand.edit_brand',$brand);
    }

   
    public function update( Request $request, $id)
    {
        $brand = $this->model->findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name'=>"required|unique:brands,id,$id|max:255"
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $brand->fill($request->all())->save();
        
        return redirect()->route('product_brand')->with('message','Product Brand Updated Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->model->findOrFail($id);
        $brand->delete();        
        return redirect()->route('product_brand')->with('message','Product Brand Delete Successfully!');
    }
}
