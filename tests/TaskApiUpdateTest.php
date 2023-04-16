<?php

use PHPUnit\Framework\TestCase;
require_once "./config1.php";

class TaskApiUpdateTest extends TestCase {

    public function test_update_task_api()
    { 
        //payload contenuto da inviare
        $payload = [
            "task_id" => 1,
            "user_id" => 2,
            "name" => "fare la spesa",
            "due_date" => "2023-08-15",
            "done" => 0
        ];

        $response = $this->put("http://localhost/corso_php_tss/form_in_php/rest_api/task.php", $payload);

        //come print_r
        fwrite(STDERR, print_r($response, TRUE)); 
        $this->assertJson($response);

       
    }

    public function put(string $url, array $body)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "PUT",
          CURLOPT_POSTFIELDS => json_encode($body),
          CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "Content-Type: application/json",
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