<?php
  
class Api   {

    
    //metodo get que trae toda la info segun la infomracion solictada (users, ToDOs , etc)
    public static function get($slug){
        $url='https://jsonplaceholder.typicode.com/';
        
        $ch  = curl_init();
    

        curl_setopt($ch,CURLOPT_URL,$url.$slug);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);

        if($e=curl_error($ch)){
            return $e;
        }else{
            $decoded = json_decode($response);
            return $decoded;
        }

        curl_close($ch);

    }


    //metodo post
    public function post($data_array,$slug){

        //var_dump($this->getUrl());
        $url='https://jsonplaceholder.typicode.com/';

        
        $data = http_build_query($data_array);
        
        $ch  = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url.$slug);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);

        if($e=curl_error($ch)){
            return $e;
        }else{
            $decoded = json_decode($response);
            return $decoded;
        }

        curl_close($ch);



    }


    //metodo put
    public function put($data_array,$slug){

       
        $url='https://jsonplaceholder.typicode.com/';

        
        $data = http_build_query($data_array);
        
        $ch  = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url.$slug);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);
       
        if($e=curl_error($ch)){
            return $e;
        }else{
            $decoded = json_decode($response);
            return $decoded;
        }

        curl_close($ch);

    }


    //metodo delete
    public function delete($slug){

        $url='https://jsonplaceholder.typicode.com/';

        $ch  = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url.$slug);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);
       
        if($e=curl_error($ch)){
            return $e;
        }else{
            $decoded = json_decode($response);
            return $decoded;
        }

        curl_close($ch);

    }

    




}


