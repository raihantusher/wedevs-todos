<?php
// If you installed via composer, just use this code to require autoloader on the top of your projects.
require 'app/Bootstrap.php';
 

 use App\Controllers;

 
$hc=new App\Controllers\TodoController();
//$hc->index();


/*
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $hc->destroy($id);
}
*/

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method){
    case "GET":
        $hc->index();
    break;
    case "POST":
        $hc->store();
       
    break;
    case "PUT":
        $hc->edit();
    break;
    case 'DELETE':
         $hc->destroy();
    break;
}
