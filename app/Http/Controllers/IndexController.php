<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Coment;
use Auth;
class IndexController extends Controller
{

	public function welcome(){
		$coments = Coment::select(['coment','user_id','id'])->orderBy('id', 'desc')->get();
		return view('welcome')->with(['coments'=>$coments]);
	}

   public function register_get(){
   	return view('register');
   }

    public function register_post(Request $request){
      $this->validate($request,[
                                    'name' => 'required',
                                    'password' => 'required'
                                ]);
      $articles = User::select(['id'])->where('name',$request->name)->first();
     if ($articles) {
     	return redirect('register')->withErrors(['This name is already exist!!!']);
     } else {
     	User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
     
        return redirect('register')->with('status', 'Successfully register!');
     }
       
      
   
   }

   public function login_get(){
   	return view('login');
   }

   public function login_post(Request $request){
      $this->validate($request,[
                                    'login_name' => 'required',
                                    'login_password' => 'required'
                                ]);
      $articles = User::select(['id','password'])->where('name',$request->login_name)->first();
     if ($articles) {
     	// $pass = Hash::make($request->login_password);
     	if (Hash::check($request->login_password,$articles->password)) {
     		$auth = Auth::attempt(array(
     				'name' => $request->login_name,
     				'password' => $request->login_password
     			),false);
     		return redirect('/')->with('status', 'You are loggedin!');
     	} else {
     		return redirect()->back()->withErrors(['Wrong password!!!']);
     	}
     } else {
     	return redirect()->back()->withErrors(['Wrong name!!!']);
     
        
     }
       
   
   }

    public function logout_get(){
   Auth::logout();
   return redirect('/');
   }
}
