<?php
header("Access-Control-Allow-Origin: *");
use crud\TaskCRUD;
use models\Task;

include "../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new TaskCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $task_id = filter_input(INPUT_GET,'task_id');
        $user_id = filter_input(INPUT_GET, 'user_id');
        if (!is_null($user_id)) {
            $tasks = $crud->readByUser($user_id);
            if($tasks == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, user_id non esistente",
                            'details' => $user_id
                        ]
                    ]    
                    ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }else{
                http_response_code(200);

                $response = [
                    'data' => $tasks,
                    'status' => 200
                ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
            //echo json_encode($tasks);
        } elseif (!is_null($task_id)) {
            $tasks = $crud->read($task_id);
            if($tasks == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, task_id non esistente",
                            'details' => $task_id
                        ]
                    ]    
                ];  
                echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
            http_response_code(200);

            $response = [
                'data' => $tasks,
                'status' => 200
            ];
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
            //echo json_encode($task);
        } else {
            $tasks = $crud->read();
            $response = [
                'data' => $tasks,
                'status'=>200
            ]; 
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    break;

    case 'DELETE':

        $task_id = filter_input(INPUT_GET,'task_id');
        if (!is_null($task_id)) {
            $rows = $crud->delete($task_id);
            if ($rows == 1) {
                $response = [
                    'data' => $task_id,
                    'status' => 200
                ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }

            if ($rows == 0) {
                http_response_code(404);
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Task non trovata, già eliminata",
                            'details' => "Task id: " . $task_id
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
        $task = Task::arrayToTask($request);
        $last_id = $crud->create($task);
        
        $task = (array) $task;
        $task['task_id'] = $last_id;
        
        $response = [
            'data' => $task, 
            'status' => 200 
        ];

        echo json_encode($response, JSON_PRETTY_PRINT);
    break;
    
    case 'PUT' : 
        
        $input = file_get_contents('php://input');
        $request = json_decode($input, true); 
        $task = Task::arrayToTask($request);
        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {

            $row = $crud->update($task);

            if ($row == 1 ) {

                http_response_code(201);

                $response = [
                    "data" => $task,
                    'status' => 201
                ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            } elseif ($row == 0) {

                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, già modificata",
                            'details' => $task_id
                        ]
                    ]
                ];

                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        }
        
    break;    
    
    // default:
    //     # code...
    // break;
}