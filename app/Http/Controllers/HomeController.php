<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;
use Auth;

class HomeController extends Controller
{
    public function delete_coment($coment_id){
    		
        $coment = Coment::find($coment_id);
        // dump($coment);
        if ($coment->user_id==Auth::user()->id ) {
             $coment->delete();
             return 1;
        } else {
            return 0;
        }
       
    
      
   }




   public function add_coment(Request $request){
    		
   
       	$coment = Coment::create([
            'user_id' => Auth::user()->id,
            'coment' => $request->coment
        ]);

    
       
    
    return [$coment->id,$coment->coment,Auth::user()->name];
      
   }
}
