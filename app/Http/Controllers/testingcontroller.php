<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testingcontroller extends Controller
{
    public function index(Request $req){
    	$one  =  $req->one;
    	$two  =  $req->two;

    	$data = array(
    		"one" => $one ,
    		"two" => $two ,	
    		"number" => "1"
    	);
    	DB::table("testing_one")->insert([
    		"one" => $one ,
    		"two" => $two ,	
    		"number" => "1"	
    	]);
    }

    public function add_alot(Request $req){
            $j = 0;
            $data  = array();
            $temp_array = array();
            $results_array = array();
            $results = false;

            $data = json_decode($req->alot,true);
            print_r($data);
            if (! empty ($data)) {
                foreach ($data as $e) {
                    $temp_array[$j] = json_decode(json_encode($e),true);
                    $j++;
                }
                foreach ($temp_array as $key) {
                    $results_array[$j]['one'] = $key['one'];
                    $results_array[$j]['two'] = $key['two'];
                    $results_array[$j]['number'] = "Hello"+$j+""; 
                    $j++;
                }
            }

            if(! empty($results_array)){
                    foreach ($results_array as $key) {
                        DB::table("testing_one")->insert([
                            "one" => $key['one'] ,
                            "two" => $key['two'] , 
                            "number" => "1" 
                        ]);           
                    }        
                     
            }

    }

    function upload_image(Request $req){
            var_dump($req->form_data);
            $file_name = $req->name;
            var_dump($file_name);
            mkdir('./uploads/images/',0777,true);
            $dest = './uploads/images/'.$file_name;
            copy($_FILES['file']['tmp_name'], $dest); 
    }

    function barload(){   
        return view('Chart.piedonut');
    }
    function loadajaxbar(){
        $data = DB::table('testing_one')
                ->select('one','number')
                ->get();
        return $data;        
    }

}
