<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   
   function AdminLoginFrom(){

    return view('admin.auth.login');
    
   }// end of function


   function AdminLogin(){

    
    
   }// end of function




   function AdminDashboard(){

    return view('admin.layout.dashboard');
    
   }// end of function




   public function AdminLogout(Request $request)
   {
       Auth::guard('web')->logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       return redirect('/admin/login');
   }// end of function



function AdminProfile(){

    $id= Auth::user()->id;
    //dd( $id);
    $AdminProfile= User::find($id);

  return view('admin.pages.profile',compact('AdminProfile'));

  }// end of function


  function AdminProfileStore(Request $request){

    //$id= Auth::User()->id;

    //dd($id);


    $id = Auth::user()->id;
    $data = User::find($id);
    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address; 


    if ($request->file('photo')) {
        $file = $request->file('photo');
        @unlink(public_path('upload/admin_images/'.$data->photo));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['photo'] = $filename;
    }


    //dd($request->file('photo'));
    $data->save();

      $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    
    }// end of function

}
