<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data=$request->all();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'], 'admin'=>1]))
    		{
    			Session::put('adminSession',$data['email']);
    			return redirect('admin/dashboard');
    		}
    		else
    		{
    			return redirect('admin')->with('flash_message_error','Invalid username or password');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard(Request $request)
    {
    	return view('admin.dashboard');
    }

    public function settings(Request $request)
    {
    	return view('admin.settings');
    }

    public function check_password(Request $request)
    {
    	$data=$request->all();
    	$password=$data['current_password'];
    	//This line of code is correct only when you have just 1 password
    	//$check_password=User::where(['admin'=>1])->first(); 
    	$email=Session::get('adminSession');
    	$check_password=User::where(['email'=>$email])->first();
    	if(Hash::check($password,$check_password->password))
    	{
    		echo "true"; die;
    	}
    	else
    	{
    		echo "false"; die;
    	}
    }

    public function updatePassword(Request $request)
    {
    	$data=$request->all();
    	$email=Session::get('adminSession'); //will get us email of the logged in user via session 
		$check_password=User::where(['email'=>$email])->first();
		$current_password=$data['current_password'];
		
		if(Hash::check($current_password,$check_password->password))
		{//compare hashed and unhashed values to see if they are equal 		
		
			$new_password=bcrypt($data['new_password']);//encrypt new password
			User::where(['email'=>$email])->update(['password'=>$new_password]);
			return redirect('admin/settings')->with('flash_message_success','Password Updated Successfully');
		}
		else
		{
			return redirect('admin/settings')->with('flash_message_error','Incorrect Current Password');
		}
    }

    public function logout(Request $request)
    {
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success','Logged out');
    }
}
