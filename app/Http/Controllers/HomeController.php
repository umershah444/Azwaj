<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\SuccessStory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::count();
        $storyCount = SuccessStory::count();
        
        return view('home',compact('userCount','storyCount'));
    }
    
    public function adminProfile()
    {
        $admin = Auth::user();
        
        return view('profile',compact('admin'));
    }
    
    public function editAdminProfile($id)
    {
        $admin = Admin::where('id',$id)->first();
        
        return view('edit-profile',compact('admin'));
    }
    
    public function updateAdminProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
        ]);
        
         if ($validator->fails()) {
            return redirect('/admin/profile/'.$request->id.'/edit')
                        ->withErrors($validator)
                        ->withInput()
                   ->with([
                'message'    => 'Invalid Inputs!',
                'alert-type' => 'error',
            ]);         
        }
        
        Admin::where('id',$request->id)->update(['name'=>$request->name,
            'email'=>$request->email]);
        
        if($request->password !== null)
        {
            Admin::where('id',$request->id)->update(['password'=> bcrypt($request->password)]);
           
        }
        
        if(Input::hasFile('img_url'))
        {
             $imgPath = upload_image($request->id, 'Admin', 'img_url', 256, 256);
             Admin::where('id', $request->id)->update(['img_url' => $imgPath]);
             
        }
        
        return redirect()
            ->route('admin.profile')
            ->with([
                'message'    => 'Profile updated Successfully!',
                'alert-type' => 'success',
            ]);
    }
    
    
    
}
