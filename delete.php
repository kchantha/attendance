<?php
    require_once 'db/conn.php';


    if(!isset($_GET['id'])){
        echo "error";
    }else{
        //get id values
        $id=$_GET['id'];

        //Call delete function
        $result = $crud->deleteAttendee($id);
        //Redirect to list
        if($result){
            header("Location: viewrecords.php");
        }else{
            echo "";
        }
    }
?>