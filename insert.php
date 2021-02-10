<?php
    session_start();
    if(isset($_POST['insert'])){
        $data = file_get_contents('members.json');
        $json = json_decode($data);
 
        $array = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'address' => $_POST['address']
        );
 
        $json[] = $array;
 
        $json = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents('members.json', $json);
        header('location:index.php');
    }
 
 
?>