<?php
 
    $id = $_GET['id'];
 
    $data = file_get_contents('members.json');
    $json = json_decode($data);
 
    unset($json[$id]);
 
    $json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('members.json', $json);
 
    header('location: index.php');
?>