<?php

use crud\UserCRUD;
use models\User;

include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $user_id = filter_input(INPUT_GET,'user_id');
        if(!is_null($user_id)){
            echo json_encode($crud->read($user_id));
        }else{
            $users = $crud->read();
            echo json_encode($users);
        }
    break;

    case 'DELETE':

        $user_id = filter_input(INPUT_GET,'user_id');
        if(!is_null($user_id)){
            $rows = $crud->delete($user_id);
            if($rows == 1){
                http_response_code(204);
            }

            if($rows == 0 ){
            
                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'details' => $user_id
                         ]
                    ]    
                ];
            }

           
            
            echo json_encode($response);
        }
    break;
    
    case 'POST' :

        $input = file_get_contents('php://input');
        $request = json_decode($input,true); // ottengo un array associativo
        $user = User::arrayToUser($request);
        $last_id = $crud->create($user);
        
    
        // $response = [
        //     'data' => [
        //         'type' => "users", 
        //         'id' => $last_id, 
        //         'attribute' => $user
        //     ]
        // ];

        $user = (array) $user;
        unset($user['password']);
        $user['user_id'] = $last_id;
        
        $response = [
            'data' => $user, 
            'status' => 202 
        ];

        echo json_encode($response);
    break;
    
    case 'PUT' : 
        
        $input = file_get_contents('php://input');
        $request = json_decode($input,true); 
        $user = User::arrayToUser($request);
        $user_id = filter_input(INPUT_GET, 'user_id');
        
        if(!is_null($user_id)) {
            $rows = $crud->update($user, $user_id);

            if($rows != 0) {
                http_response_code(202);

                $user = (array) $user;
                unset($user['password']);
                unset($user['username']);
                $user['user_id'] = $user_id;
                $response = [
                    'data' => $user,
                    'status' => 202
                ];
                
            } 
            if($rows === 0) {
                http_response_code(404);
                    
                $response = [
                    'errore' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'details' => $user_id
                        ]
                    ]
                ];
                echo json_encode($response);
            } 
            
        }
        
    break;    
    
    default:
        # code...
    break;
}