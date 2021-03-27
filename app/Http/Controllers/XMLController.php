<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
  
class XMLController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {   
        
        $xmlPath = 'example/SAF-T Financial_918874224_20201202151117_1_1.xml';
        $xmlString = file_get_contents(public_path('sample.xml'));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 
   
        //return ($phpArray);
        return view('welcome');
    }
}
