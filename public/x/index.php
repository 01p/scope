        <?


        $xmlPath = 'example/SAF-T Financial_918874224_20201202151117_1_1.xml';
        $xmlString = file_get_contents(public_path('sample.xml'));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 
   print_r ( $phpArray );
   echo "!";