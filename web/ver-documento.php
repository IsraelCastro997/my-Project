<?php 
    header("Content-type:application/pdf");
    error_reporting(0);
    session_start();
    $id_user = $_SESSION['id'];
    $userName = $_SESSION['user'];
    $token = $_SESSION['token'];
    $id = $_GET['id'];
    $request = file_get_contents('http://localhost/my-project/controllers/student.php?o=5&id='.$id_user);
    if(empty($id_user) || $id_user === 0){
      header("location: ./login.php");
    }

    $id_document = $_GET['id'];
    $con = mysqli_connect("localhost", "root", "", "my_project");
    if (!$con) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
         exit;
    }
    if($result = $con->query("SELECT * FROM postproject WHERE student = $id_document;")) {
        while($row=mysqli_fetch_assoc($result)){
                   echo $row['document'];
    }
    $con->close();
    }else{
        $con->close();
        return 'NO DATA';
            }