<?php

use PHPUnit\Framework\TestCase;
require_once "./config.php";

class TaskApiReadTest extends TestCase {

    public function test_read_task_api()
    { 
        $response = $this->get("http://localhost/corso_php_tss/form_in_php/rest_api/task.php");
        
        //come print_r
        fwrite(STDERR, print_r($response, TRUE)); 
        $this->assertJson($response);

       
    }

    public function get(string $url)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "User-Agent: Thunder Client (https://www.thunderclient.com)"
          ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }
        
}