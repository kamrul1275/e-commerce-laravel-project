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


  function AdminProfileStore(){

   
    
    }// end of function

}
