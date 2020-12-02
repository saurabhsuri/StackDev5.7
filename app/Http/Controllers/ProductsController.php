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
    	$category=DB::table('categories')->where('parent_id',0)->get();
    	$categories_dropdown="<option value=0 selected disabled>Select</option>";
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
