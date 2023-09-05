<?php session_start(); 
include_once('database_connection.php');
$student_id = $_REQUEST['student_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="student_controller.php" method="post">
        <?php $query = "SELECT * FROM courses";
        $statement = $pdo_conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        if($result){
            foreach($result as $item){
        ?>
            <div class="mb-3 form-check">
                <input type="checkbox" name="courses[]" class="form-check-input" value="<?=$item->id?>">
                <label class="form-check-label" for="exampleCheck1"><?=$item->course_title?></label>
              </div>
              <?php 
                    }
                }
            ?>
            <input type="hidden" name="student_id" value="<?=$student_id?>">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>