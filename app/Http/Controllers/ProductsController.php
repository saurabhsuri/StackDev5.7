<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Category;
use Auth;
use Session;


class ProductsController extends Controller
{
    public function addProducts(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data=$request->all();
    			
    		DB::table('products')->insert([
    			'category_id'=>$data["category_id"],
    			'product_name'=>$data["product_name"],
    			'product_code'=>$data["product_code"],
    			'product_color'=>$data["product_color"],
    			'description'=>$data["description"],
    			'price'=>$data["price"]
    		]);    	
    	}


    	/*GET Request*/
    	$category=DB::table('categories')->where('parent_id',0)->get();
    	$categories_dropdown="<option value=' ' selected>Select</option>";
    	foreach($category as $cat)
    	{
    		$categories_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories=DB::table('categories')->where('parent_id',"=",$cat->id)->get();
    			foreach($sub_categories as $sub_cat)
    			{
    				$categories_dropdown.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    			}
    	}
    	//dump($categories_dropdown);die;
    	return view('admin.products.add_product', compact('categories_dropdown'));    
    }
}
