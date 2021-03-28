<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mtownsend\XmlToArray\XmlToArray;

class XMLreader extends Controller
{
   public function index()
    {
        $xmlPath = 'example/SAF-T Financial_918874224_20201202151117_1_1.xml';
        $xmlString = file_get_contents(public_path($xmlPath));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlString);
        $phpArray = json_decode($json, true); 
    

        //return ($phpArray);
        //return  "<pre>".$xmlString."</pre>";

        $myXMLData =
        "<?xml version='1.0' encoding='UTF-8'?>
        <note>
        <to>Tove</to>
        <from>Jani</from>
        <heading>Reminder</heading>
        <body>Don't forget me this weekend!</body>
        </note>";


       // print_r( $sxe);



       $array = XmlToArray::convert($xmlString);
       echo "<pre>";
      //print_r($array['n1:Header']);

$generalarry = $array['n1:MasterFiles']['n1:GeneralLedgerAccounts'];

$supplierinfoarry = $array['n1:MasterFiles']['n1:Suppliers']['n1:Supplier'];

$supplierarry = $array['n1:MasterFiles'];

/*arry constructor
*/
$suppliers = ARRAY();
$sup_open=$sup_close="0.00";

foreach($supplierinfoarry as $x => $val) {
    $sup_open=$sup_closecredit=$sup_closedebit="0.00";
   //print_r($val);

    if (isset($val['n1:Name']))  $sup_name =$val['n1:Name'];
    if (isset($val['n1:SupplierID']))  $sup_id=$val['n1:SupplierID'];
    if (isset($val['n1:OpeningDebitBalance']))  $sup_open=$val['n1:OpeningDebitBalance'];
    if (isset($val['ClosingDebitBalance'])) $sup_closedebit=$val['ClosingDebitBalance'];
    if (isset($val['n1:ClosingCreditBalance'])) $sup_closecredit=$val['n1:ClosingCreditBalance'];


    
    $suppliersnew = 
        [ 'id' => $sup_id , 'name' => $sup_name, 'open' =>$sup_open,'closedebit' =>$sup_closedebit,'closecredit' =>$sup_closecredit ];
    array_push($suppliers , $suppliersnew);

  }
  print_r($suppliers);
  echo "<p>";


//print_r($supplierarry);
      //print_r($array);
     //print_r($array["n1:Suppliers"]);
    }

  
}
