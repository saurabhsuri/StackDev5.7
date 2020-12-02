<?php
namespace App\Http\Controllers;
use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data=$request->all();
    		//print_r($data);
    		Category::insert(['name'=>$data['category_name'],'parent_id'=>$data['parent_id'], 'description'=>$data['description'],
    		'url'=>$data['url']]);
    		return redirect('admin/add-category')->with('flash_message_success','Category added successfully');
    			
    	}
    	$levels=Category::where(['parent_id'=>0])->get();
    	return view('admin.categories.add_category', compact('levels'));
    }

    public function viewCategories(Request $request)
    {
    	//$category=Category::get();
    	/*$category=DB::select(DB::raw('select c.id as id, cat.name as category, c.name as subcategory, c.url as url from categories as cat inner join categories as c on cat.id=c.parent_id'));*/

        //Writing Query Builder Style
        $category=DB::table('categories as cat')
                ->select('c.id as id','cat.name as category','c.name as subcategory','c.url as url')
                ->join('categories as c','cat.id','=','c.parent_id')
                ->get();
    	/*echo "<pre>";
    	print_r($category); die;*/
    	return view('admin.categories.view_category',compact('category'));
    }

    public function editCategory(Request $request, $id=null)
    {
    	if($request->isMethod('post'))
    	{
    		$data=$request->all();
   
    		//print_r($data); die;
    		Category::where(['id'=>$id])->update(['name'=>$data['category_name'],
    			'parent_id'=>$data['parent_id'],
    			'description'=>$data['description'],
    			'url'=>$data['url']]);
    		return redirect ('admin/view-category')->with('flash_message_success','Categories Updated Successfully');

    	}
        /*GET Request*/
    	/*For populating the textboxes based on id obtained from view_category.blade*/
    	$categoryDetails=Category::where(['id'=>$id])->first();
    	/*To fill drop down with category names only*/
    	$category=Category::where(['parent_id'=>0])->get();
    	return view('admin.categories.edit_category', compact('categoryDetails','category'));
    }

    public function deleteCategory($id)
    {
    	//echo $id; die;
    	Category::where(['id'=>$id])->delete();
    	return redirect('admin/view-category')->with('flash_message_success','Category deleted successfully');
    }
}
