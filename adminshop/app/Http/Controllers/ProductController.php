<?php

namespace App\Http\Controllers;

use App\Backend\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        $products=DB::table('products')->get();
        $data = array();
        $data['products'] = $products;

       return view("admin.product.index",$data);
    }
    public function create(){
        return view("admin.product.create");
    }
    public function addnew(Request $request){
        $request->validate([
            'product_name'=>'required|max:255|min:5',
            'product_slug'=>'required',
            'product_images'=>'required',
            'product_description'=>'required',
        ]);
        $productnew = new ProductModel();
        $productnew->product_name=$request->product_name;
        $productnew->product_slug=$request->product_slug;
        $productnew->product_images=$request->product_images;
        $productnew->product_description=$request->product_description;
        $productnew->save();
        return redirect("product/index");
    }
    public function getedit($id){
        $product=DB::table('products')->find($id);
        $data = array();
        $data['product'] = $product;
        return view("admin.product.edit",$data);
    }
    public function postedit(Request $request,$id){
        $request->validate([
            'product_name'=>'required|max:255|min:5',
            'product_slug'=>'required',
            'product_images'=>'required',
            'product_description'=>'required',
        ]);
        $productedit = ProductModel::find($id);
        $productedit->product_name=$request->product_name;
        $productedit->product_slug=$request->product_slug;
        $productedit->product_images=$request->product_images;
        $productedit->product_description=$request->product_description;
        $productedit->save();
        return redirect("product/index");
    }
    public function getdelete($id){
        $product=DB::table('products')->find($id);
        $data = array();
        $data['product'] = $product;
        return view("admin.product.delete",$data);
    }
    public function postdelete($id){
        $product=ProductModel::find($id);
        $product->delete();
        return redirect("product/index");
    }
}
