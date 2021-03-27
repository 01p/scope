<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XMLreader extends Controller
{
   /* public function index()
    {
        $xmlPath = 'example/SAF-T Financial_918874224_20201202151117_1_1.xml';
        $xmlString = file_get_contents(public_path($xmlPath));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlString);
        $phpArray = json_decode($json, true); 
    

        //return ($phpArray);
        return  $phpArray ;
    }*/

    public function index()
    {
        $users = [
        	[ 'id' => 1, 'name' => 'Hardik'],
        	[ 'id' => 2, 'name' => 'Vimal'],
        	[ 'id' => 3, 'name' => 'Harshad'],
        ];
  
        return view('welcome', compact('users'));
    }
}
