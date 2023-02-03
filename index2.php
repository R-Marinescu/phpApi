<?php
include './includes/autoloader.php';

$controller = new UserController;

// $timeNow = (new DateTime())->format('H:i:s.u');


// $start = hrtime(true);
// try {
//     for($i = 0; $i < 2; $i++) {
//         for($j = 0; $j < 3; $j++){
//             $controller = new UserController;
//             $timeNow = (new DateTime())->format('H:i:s.u');
//             $result = $controller->crudActions();
//             echo $controllerOutput = $controller->response($result) . json_encode($timeNow);
//             usleep(600000);
//             error_log($controllerOutput, 3, "./output.log");
//         }
//     // UserRepo::getInstance()->ping();
//     }
//     http_response_code(200);
//     $httpCodeOutput = json_encode(" Status 200, OK!");
// } catch (Exception $e) {
//     http_response_code(404);
//     $httpCodeOutput = "Error" . $e->getMessage();
// }
// $end = hrtime(true);
// $totalTime = $end - $start;
// $totalTime /= 1e+6;
// $timeOutput = json_encode("block was running for " . $totalTime . " milliseconds ");
// $output = $httpCodeOutput . $timeOutput;
// //echo $output;
// error_log($output, 3, "./output.log");



// $timeNow = (new DateTime())->format('d-m-Y H:i:s.u');
// $start = hrtime(true);
// $result = $controller->crudActions();
// $controllerOutput = $controller->response($result);
// $end = hrtime(true);
// $totalTime = $end - $start;
// $totalTime /= 1e+6;
// $timeOutput = json_encode("Execution time: " . $totalTime . " milliseconds " . "-" . " Date & Time: " . $timeNow,);


// $array[] = json_decode($controllerOutput, true);
// $array[] = json_decode($timeOutput, true);

// $result = json_encode($array, JSON_PRETTY_PRINT);
// error_log($result, 3, "./output.log");
// echo $result;








$timeNow = (new DateTime())->format('d-m-Y H:i:s');
//count execution time of the block bellow
$start = microtime(true);
    
//initiate empty(almost) array
$data = [
    'status' => '',
    'message' => '',
    'time' => 0,    
    'data' => []
];
try {

    //initiate the controller
$result = $controller->crudActions();

if ($result === null || $result === false || $result === "not found" || !isset($result)) {
    throw new Exception('No data returned' , 404);
        
} else {
$data['status'] = http_response_code();
$data['message'] = 'All good';
$data['data'] = $result; 

$end = microtime(true);
$totalTime = $end - $start;
$totalTime /= 1e+6;;
$data['time'] =  substr($totalTime, 0, 4);
$timeOutput = "Date & Time: " . $timeNow;
$controller->response($data);
    
echo $controller->response($data);
file_put_contents('./log_'.date("j.n.Y").'.txt', json_encode($data) . "\n", FILE_APPEND);
}
//error_log($data, 3, "./output.log");

} catch (Exception $e) {
    
    $data1 = [
        'status' => '',
        'message' => '',
        'time' => 0,    
        'data' => []
    ];
    if ($e->getCode() === 404) {
        $data1['status'] = http_response_code();
        $data1['message'] = 'Page not found';
    }elseif ($e->getCode() === 500) {
        $data1['status'] = http_response_code();
        $data1['message'] = 'Internal server error';
    }
    //echo $controller->response($data);
    echo $controller->response($data1);
}









// for($i = 0;$i < 5; $i++) {
//     for($j = 0; $j < 10; $j++){
//         $timeNow = (new DateTime())->format('H:i:s.u');
//         echo json_encode($controller->insertUser("John", "Doe", "3.11.2023", "loop@")['insertUser'] . " time:" . $timeNow);
//         echo "<br>";
//         usleep(600000);
//     }
//     UserRepo::getInstance()->ping()['ping'];
// }


?>