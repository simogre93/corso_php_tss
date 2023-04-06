<?php

use crud\TaskCRUD;
use models\Task;

include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new TaskCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $task_id = filter_input(INPUT_GET,'task_id');
        if(!is_null($task_id)){
            echo json_encode($crud->read($task_id));
        }else{
            $tasks = $crud->read();
            echo json_encode($tasks);
        }
    break;

    case 'DELETE':

        $task_id = filter_input(INPUT_GET,'task_id');
        if(!is_null($task_id)){
            $rows = $crud->delete($task_id);
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
                            'details' => $task_id
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
        $task = Task::arrayToTask($request);
        $last_id = $crud->create($task);
        
        $task = (array) $task;
        //unset($user['password']);
        $task['task_id'] = $last_id;
        
        $response = [
            'data' => $task, 
            'status' => 202 
        ];

        echo json_encode($response);
    break;
    
    case 'PUT' : 
        
        $input = file_get_contents('php://input');
        $request = json_decode($input,true); 
        $task = Task::arrayToTask($request);
        $task_id = filter_input(INPUT_GET, 'task_id');
        
        if(!is_null($task_id)) {
            $rows = $crud->update($task, $task_id);

            if($rows != 0) {
                http_response_code(202);

                $task = (array) $task;
                
                $task['task_id'] = $task_id;
                // $response = [
                //     'data' => $task,
                //     'status' => 202
                // ];
                
            } 
            
            $response = [
                'data' => $task,
                'status' => 202
            ];
            echo json_encode($response);
            
            if($rows === 0) {
                http_response_code(404);
                    
                $response = [
                    'errore' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'details' => $task_id
                        ]
                    ]
                ];
                echo json_encode($response);
            } 
            
        }
        
    break;    
    
    // default:
    //     # code...
    // break;
}