<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    function create(Request $request){
      $request->validate([
          'name'=>'required',
          'email'=>'required |email|unique:users,email',
          'password'=> 'required|min:5|max:20',
          'cpassword'=>'required|min:5|max:20|same:password'
      ]);

      // dd($request);
      $input = $request->all();
      // return $input;
      $user = new User();
       // dd($user);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = \Hash::make($request->password);
    //   $user->cpassword = \Hash::make($request->cpassword);
      $save = $user->save();

      if($save){
return redirect()->back()->with('success','you are now  register successfuly');
// return view('user.home');
      }else{
return redirect()->back()->with('fail', 'you are correct details');
      }
    }


    
    function check(Request $request){
$request->validate([
    'email'=> 'required|email|exists:users,email',
    'password'=> 'required |min:5|max:20|',
    
],[
  'email.exists'=>'this is email not exit on  table',
]);


$user=User::get();


foreach($user as $users ){

$creds =  $request ->only('email','password');
if($users['status']==1){
if(Auth::guard('web')->attempt($creds) ){
  return redirect()->route('user.home');
    
  }else{
    return redirect()->route('user.login')->with('fail','incorrect credentials');
    
  }
}else{
  return redirect()->route('user.login')->with('fail','Admin Not permission ');
}
}
}
function logout(){
  Auth::guard('web')->logout();
  return redirect('user/login');
  
}


}
