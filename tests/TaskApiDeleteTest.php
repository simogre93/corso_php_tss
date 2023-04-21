<?php

use PHPUnit\Framework\TestCase;
require_once "./config1.php";

class TaskApiDeleteTest extends TestCase {

    public function test_delete_task_api()
    { 
        $response = $this->delete("http://localhost/corso_php_tss/form_in_php/rest_api/task.php?task_id=3");
        
        //come print_r
        fwrite(STDERR, print_r($response, TRUE)); 
        $this->assertJson($response); 
    }

    public function delete(string $url)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "DELETE",
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