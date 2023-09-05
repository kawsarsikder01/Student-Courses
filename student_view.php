<?php
    include_once('database_connection.php');
if(isset($_REQUEST['student_id'])){
    $student_id = $_REQUEST['student_id'];
    $query = "SELECT * FROM students WHERE id =:student_id LIMIT 1";
    $statement =$pdo_conn->prepare($query);
    $data = [
        ":student_id"=>$student_id
    ];
    $statement->execute($data);
    $result = $statement->fetch(PDO::FETCH_OBJ);
}
$query = "SELECT courses.course_title AS course_title FROM courses 
          JOIN students_courses ON courses.id = students_courses.course_id 
          WHERE students_courses.student_id  = :student_id";
$stmt = $pdo_conn->prepare($query);
$stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result and display the data
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
       <h4><?=$result->name?></h4>
       <h4><?=$result->email?></h4>
       <h4>Courses:</h4>
       <p><?php 
      while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
        <span><?=$rows['course_title'] ?> <br> </span>
        <?php }?>
      </p>
       
    </div>

</html>