<?php 
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    include_once('database_connection.php');
    if(isset($_REQUEST['name']) && isset($_REQUEST['email'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $sql = "INSERT INTO students (name, email) VALUES (:name, :email )";
        $pdo_statement = $pdo_conn->prepare( $sql );
        $data = [
                    ':name'=>$name,
                    ':email'=>$email
                ];
        $result = $pdo_statement->execute($data);
    }
    
}

if( isset($_REQUEST['courses'])){
    $course_ids = $_REQUEST['courses'];
    $student_id = $_REQUEST['student_id'];
}
    
    if(isset($course_ids) && isset($student_id)){
        foreach($course_ids as $course_id){
            $sql = "INSERT INTO students_courses (student_id , course_id) VALUES (:student_id , :course_id )";
            $pdo_statement = $pdo_conn->prepare( $sql );
            $data = [
                        ':student_id'=>$student_id,
                        ':course_id'=>$course_id
                    ];
            $result = $pdo_statement->execute($data);
        }
    }


?>