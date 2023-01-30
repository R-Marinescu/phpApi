<?php
include './includes/autoloader.php';

$controller = new UserController;




// $start = hrtime(true);
// try {
//     $result = $controller->crudActions();
//     echo $controller->response($result);
//     http_response_code(200);
//     echo json_encode(" Status 200, OK!");
// } catch (Exception $e) {
//     http_response_code(404);
//     echo "Error" . $e->getMessage();
// }
// $end = hrtime(true);
// $totalTime = $end - $start;
// $totalTime /= 1e+6;
// echo json_encode("block was running for " . $totalTime . " milliseconds");

$start = hrtime(true);
try {
    $result = $controller->crudActions();
    $controllerOutput = $controller->response($result);
    http_response_code(200);
    $httpCodeOutput = json_encode(" Status 200, OK!");
} catch (Exception $e) {
    http_response_code(404);
    $httpCodeOutput = "Error" . $e->getMessage();
}
$end = hrtime(true);
$totalTime = $end - $start;
$totalTime /= 1e+6;
$timeOutput = json_encode("block was running for " . $totalTime . " milliseconds");
$output = $controllerOutput . $httpCodeOutput . $timeOutput;
error_log($output, 3, "/xampp/htdocs/output.log");
echo $output;





$timeNow = (new DateTime())->format('H:i:s.u');

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