<?php

namespace App\Controllers;

use App\Models\Todo;


class TodoController{

    private $todo=null;


    public function __construct(){
        // todoeader output 
        header('Content-Type: application/json');
        //model
        $this->todo=new Todo();
        //request instance from library
        
       
        
    }

    public function index(){


        if(isset($_GET["todos"]))
        {
            $todos=$_GET["todos"];

            switch($todos){
                case "all":
                    echo $this->json($this->todo->all());
                break;
                
                case "completed":
                    echo $this->json($this->todo->all(['done'=>1]));
                break;
                case "active":
                    echo $this->json($this->todo->all(['done'=>0]));
                break;
            }
        }
           
    }


    public function store(){
      $return_row=$this->todo->create((array)$this->from_json_request());
   
      echo $this->json($return_row);
      // print_r($this->todo->create());
    }

    public function edit(){
        $todo=(array)$this->from_json_request()->todo;
        return ($this->todo->update($todo["id"],$todo));
    }


    public function destroy(){

            if (isset($this->from_json_request()->id))
                    $this->todo->delete($this->from_json_request()->id);
            else
                    $this->todo->delete();

            echo $this->json($this->todo->all());
    }

    private function json($data){
        return json_encode($data);
    }

    private function from_json_request(){
        $json_string=file_get_contents('php://input');
        return json_decode($json_string);
    }

    
}