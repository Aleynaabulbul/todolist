<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
	
	<?php 
	 $id = $_GET['id'];
   $data = file_get_contents('members.json');
    $data = json_decode($data, true);
	unset($data[$id]);

    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('members.json', $data);
 
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
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-4">
            <form method="POST" action="#">
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control" name="firstname" required="required"/>
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" class="form-control" name="lastname" required="required"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" required="required"/>
                </div>
                <center><button class="btn btn-primary" name="insert">Update</button></center>
            </form>
        </div>	
 
    </div>
</body>
</html>