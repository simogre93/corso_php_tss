<?php

use PHPUnit\Framework\TestCase;
require_once "./config1.php";

class TaskApiReadTest extends TestCase {

    public function test_read_task_api()
    { 
        $response = $this->get_all("http://localhost/corso_php_tss/form_in_php/rest_api/task.php");
        $response1 = $this->get_by_task_Id("http://localhost/corso_php_tss/form_in_php/rest_api/task.php?task_id=1");
        $response2 = $this->get_by_user_id("http://localhost/corso_php_tss/form_in_php/rest_api/task.php?user_id=2");
        
        //come print_r
        fwrite(STDERR, print_r($response, TRUE)); 
        $this->assertJson($response);
        $this->assertJson($response1);
        $this->assertJson($response2);
    }

    public function get_all(string $url)
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
  
  public function get_by_task_Id(string $url_1)
  {
    $curl = curl_init();
    
    curl_setopt_array($curl, [
      CURLOPT_URL => $url_1,
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

  public function get_by_user_id(string $url_2)
  {
    $curl = curl_init();
    
    curl_setopt_array($curl, [
      CURLOPT_URL => $url_2,
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