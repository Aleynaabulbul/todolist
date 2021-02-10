<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
<body>
    <nav class="navbar navbar-default">

    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">User Entry</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-4">
            <form method="POST" action="insert.php">
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
                <center><button class="btn btn-primary" name="insert">Insert</button></center>
            </form>
        </div>	
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead class="alert-info">
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $data = file_get_contents('members.json');
                        $data = json_decode($data);
                        $index=0;
                        foreach($data as $fetch){
                    ?>
                        <tr>
                            <td><?php echo $fetch->firstname?></td>
                            <td><?php echo $fetch->lastname?></td>
                            <td><?php echo $fetch->address?></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $index?>">Delete</a></td>
							<td><a class="btn btn-danger" href="update.php?id=<?php echo $index?>">Update</a></td>
                        </tr>
                    <?php
                        $index++;
                        }
                    ?>
                </tbody>
            </table>
        </div>	
    </div>
</body>
</html>