<?php 
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    include_once('database_connection.php');
    $course_title = $_REQUEST['course_title'];
    $course_code = $_REQUEST['course_code'];
    if(isset($_REQUEST['course_title']) && isset($_REQUEST['course_code'])){
        $sql = "INSERT INTO courses (course_title , course_code) VALUES (:course_title, :course_code )";
        $pdo_statement = $pdo_conn->prepare( $sql );
        $data = [
                    ':course_title'=>$course_title,
                    ':course_code'=>$course_code
                ];
        $result = $pdo_statement->execute($data);
        // echo $course_title;
        // echo $course_code;
    }
    
}
?>