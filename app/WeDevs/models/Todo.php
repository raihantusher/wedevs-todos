<?php

namespace App\Models;

use App\Libs\DB;

class Todo extends DB{
    private $table;
    public function __construct(){
        parent::__construct();
        // table name on db
        $this->table="todos";
    }

   
    public function all($todos=false){
        if($todos)
            // completed/active query
            return $this->db->select($this->table,"*",$todos);
        else
            //if $todos is not set get all the todos
            return $this->db->select($this->table,"*");

    }

    /*
    *
    *@param $todo array
    *
    */
    public function create($todo){
      // insert todo
        $this->db->insert($this->table,$todo);
        //after insertion getting inserted row id
        $id=$this->db->id();
        //using that id getting the inserted row
       return $this->db->get($this->table,"*",["id"=>$id]) ;
    }


    /*
    *
    *@param $todo is an array
    * we need to set todo and also set done 
    * that is why we will use $todo
    */
    public function update($id,$todo){
        $this->db->update($this->table,$todo,[
            "id"=>$id
        ]);
    }
    /*
    * @param $id
    * $id for single deletion
    * if id is not set then delete all completed todos
    * so that nothing post causes all completed todos deletion
    */
    public function delete($id=false){
        if($id){
            $this->db->delete($this->table,["id"=>$id]);  
        }
        else
            {
                $this->db->delete($this->table,['done'=>1]);
            }
          
    }

    
    // not used
    public function total($where=false){
        if($where){
            return $this->db->count($this->table,$where);
        }else{
        return $this->db->count($this->table);
        }
    }


}