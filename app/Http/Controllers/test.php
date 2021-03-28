<?php

namespace App\Http\Controllers;
use Mtownsend\XmlToArray\XmlToArray;
//use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class test extends Controller
{
    public function index()
    {
        $xmlPath = 'example/SAF-T Financial_918874224_20201202151117_1_1.xml';
        $xmlString = file_get_contents(public_path($xmlPath));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlString);
        $phpArray = json_decode($json, true); 
    

        $array = XmlToArray::convert($xmlString);

           $companydata [] = [
            'regnum' => $array['n1:Header']['n1:Company']['n1:RegistrationNumber'] ,
            'name' => $array['n1:Header']['n1:Company']['n1:Name'] ,
            'created' => $array['n1:Header']['n1:AuditFileDateCreated'] 

           ];
           $companydata=$companydata[0];
         
 //echo "<pre>"; print_r($companydata[0] );



            $supplierinfoarry = $array['n1:MasterFiles']['n1:Suppliers']['n1:Supplier'];



            $supplierarry = $array['n1:MasterFiles'];

        /*arry constructor*/
       
     $scope1sum = $scope2sum = $scope3sum =0;

                    foreach($supplierinfoarry as $x => $val) {
                        $sup_open=$sup_closecredit=$sup_closedebit="0.00";
             
                        $suppliers = ARRAY();
                        if (isset($val['n1:Name']))  $sup_name =$val['n1:Name'];
                        if (isset($val['n1:SupplierID']))  $sup_id=$val['n1:SupplierID'];
                        if (isset($val['n1:OpeningDebitBalance']))  $sup_open=$val['n1:OpeningDebitBalance'];
                        if (isset($val['ClosingDebitBalance'])) $sup_closedebit=$val['ClosingDebitBalance'];
                        if (isset($val['n1:ClosingCreditBalance'])) $sup_closecredit=$val['n1:ClosingCreditBalance'];


                        $s1=0.017216;
                        $s2=0.044111;
                        $s3=0.074111;

                        $suppliersnew [] = 
                            [ 'id' => $sup_id , 
                            'name' => $sup_name, 
                            'opendebit' =>$sup_open,
                            'closedebit' =>$sup_closedebit,
                            'closecredit' =>$sup_closecredit ,
                            'scope1' => number_format($sup_closecredit*$s1, 2, '.', ''),
                            'scope2' => number_format($sup_closecredit*$s2, 2, '.', ''),
                            'scope3' => number_format($sup_closecredit*$s3, 2, '.', '')
                            
                        ];
                        //array_push($suppliers , $suppliersnew);
                        $suppliers+=$suppliersnew;

                        $scope1sum +=number_format($sup_closecredit*$s1, 2, '.', '');
                        $scope2sum +=number_format($sup_closecredit*$s2, 2, '.', '');
                        $scope3sum +=number_format($sup_closecredit*$s3, 2, '.', '');
                    };
             
                    $total = $scope1sum+$scope2sum+$scope3sum;
                    $offset = $total*8;

    //echo "<pre>"; print_r($suppliers);
        //return view('test1', compact($suppliers));


       return view('test1', compact('suppliers','companydata','scope1sum','scope2sum','scope3sum','total','offset'));



    }
}
