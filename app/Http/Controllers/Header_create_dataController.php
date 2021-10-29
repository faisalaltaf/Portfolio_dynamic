<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Header_create_dataController extends Controller
{
    public function index(){
          return view('dashboard.user.frontend_data.frontendheader');
    }

    public function create(Request $request){
        // dd($request);

        // validation request //================================================
       $validationdata = $request->validate([
            'header_logo_text'=>'required',
            'header_title'=>'required |max:30',
            'Designation'=> 'required|max:20',
            'Brand_right_side'=>'required|max:5'
        ]);       
        
        // check the database value //===================
$header_data_check = Header::get();

// count value database ==================== then save data get value zero otherwise update data====
$count_header = $header_data_check->count();
            if($count_header ==0){
              $header_save_data = new Header;
              $header_save_data->header_logo_text =$request->header_logo_text;
              $header_save_data->image_logo =$request->logo_file;
              $header_save_data->image_header =$request->file_header;
              $header_save_data->header_title =$request->header_title;
              $header_save_data->Designation =$request->designation_developer;
              $header_save_data->Brand_right_side =$request->brand_right;
            }


            // update data =======
            return "hello";

      

    }
}
