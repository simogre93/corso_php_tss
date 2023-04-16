<?php

use crud\UserCRUD;
use models\User;

include "../../config1.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $user_id = filter_input(INPUT_GET,'user_id');
        if(!is_null($user_id)){
            $response = [
                'data' => $crud->read($user_id),
                'status' => 200
            ];
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
            $users = $crud->read();
            $response = [
                'data' => $users,
                'status' => 200
            ];
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    break;

    case 'DELETE':

        $user_id = filter_input(INPUT_GET,'user_id');
        if(!is_null($user_id)){
            $rows = $crud->delete($user_id);
            if($rows == 1){
                $response = [
                    'data' => $user_id,
                    'status' => 200
                ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }

            if($rows == 0 ){
            
                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'details' => "Utente id: " . $user_id
                         ]
                    ]    
                ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        }
    break;
    
    case 'POST' :

        $input = file_get_contents('php://input');
        $request = json_decode($input,true); // ottengo un array associativo
        $user = User::arrayToUser($request);
        //$last_id = $crud->create($user);
        
        try {
            $last_id = $crud->create($user);
            $user = (array) $user;
            unset($user['password']);
            $user['user_id'] = $last_id;
        
            $response = [
                'data' => $user, 
                'status' => 202 
            ];
        } catch (\Throwable $th) {
            
            http_response_code(422);

                $response = [
                    'errors' => [
                        [
                            'status' => 422,
                            'title' => "formato errato",
                            'details' => $th->getMessage(),
                            'code' => $th->getCode()
                         ]
                    ]    
                ];
            
            //echo json_encode($response);
            //throw $th;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    break;
    
    case 'PUT' : 
        
        $input =  file_get_contents('php://input');
        $request = json_decode($input, true);
        $user = User::arrayToUser($request);
        $user_id = filter_input(INPUT_GET, 'user_id');

        $rows = $crud->read($user_id);

        if ($rows == true) {
            $crud->update($user_id, $user);
            $user = (array) $user;
            unset($user['password']);
            unset($user['username']);
            $response = [
                'data' => [
                    'type' => "user",
                    'attributes' => $user
                ]
            ];
            echo json_encode($response);
        } else {
            http_response_code(404);
            $response = [
                'errors' => [
                    [
                        'status' => 404,
                        'title' => "Utente non trovato",
                        'details' => "Utente id: " . $user_id
                    ]
                ]
            ];
            echo json_encode($response);
        }
        
    break;    
    
    default:
        # code...
    break;
}