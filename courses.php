<?php session_start(); 
include_once('database_connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>

   <div class="container">
    <a href="" type="button" class="btn btn-primary my-5 ">Add Course</a>
        <table class="table table-striped">
            <thead>
            
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
        <?php $query = "SELECT * FROM courses";
        $statement = $pdo_conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        if($result){
            foreach($result as $item){
        ?>
                <tr>
                    <th scope="row"><?=$item->id?></th>
                    <td><?=$item->course_title?></td>
                    <td><?=$item->course_code?></td>
                    <td><a href="" class="btn btn-primary">Edit</a></td>
                    <td><a href="" class="btn btn-primary">Delete</a></td>
                  </tr>
                  <?php 
                    }
                }
            ?>
              
            </tbody>
          </table>
   </div>
    
</body>
</html>