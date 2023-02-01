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



// $timeNow = (new DateTime())->format('H:i:s.u');
// $start = hrtime(true);
// $result = $controller->crudActions();
// $controllerOutput = $controller->response($result);
// $end = hrtime(true);
// $totalTime = $end - $start;
// $totalTime /= 1e+6;
// $timeOutput = json_encode("block was running for " . $totalTime . " milliseconds " . " Date & Time now is " . $timeNow,);


// $array[] = json_decode($controllerOutput, true);
// $array[] = json_decode($timeOutput, true);

// $result = json_encode($array, JSON_PRETTY_PRINT);
// error_log($result, 3, "./output.log");
// echo $result;

 



//somechanges







$redis = new Redis(); 
$redis->connect('127.0.0.1', 6379); 

// echo "Connection to server sucessfully"; 
// echo "Server is running: " . $redis->ping(); 
// echo "<br>";


// $some = serialize($result); 
// $redis-> set('getAll', $some); //it will set anything you run at the moment including 'blank', requiers an if exists statment

$some1 = $redis-> get('getAll');

$array = unserialize($some1);

echo $array;



// $redis->lpush("listTest", $controllerOutput);
// $redis->lpush("listTest", $httpCodeOutput);
// $redis->lpush("listTest", $timeOutput);
// $listTest = $redis->lrange("listTest", 0, -1);
// print_r($listTest);






// $redis->lpush("myList", "Redis");
// $redis->lpush("myList", "Mongodb");
// $redis->lpush("myList", "Mysql");
// $redis->lpush("myNames", "Radu");
// $redis->lpush("myNames", "Bill");
// $redis->lpush("myNames", 'Andrew');
// $redis->lpush("myNames", 'Radu');
// $nameList = $redis->lrange("myNames", 0, 5);
// print_r($nameList);
 //echo $redis -> exists('names');


//  $arList = $redis->lrange("myList", 0, 4);
//  echo "Stored string redis:: ";
//  print_r($arList);


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