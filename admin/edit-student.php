<?php

    require "../classes/Database.php";
    require "../classes/Url.php";
    require "../classes/Student.php";
    require "../classes/Auth.php";
        
    session_start();

    if ( !Auth::isLoggedIn() ){
        die("Nepovolený přístup");
    }

    $role = $_SESSION["role"];

    //$connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();

    if ( isset($_GET["id"]) ){
        $one_student = Student::getStudent($connection, $_GET["id"]);

        if ($one_student) {
            $first_name = $one_student["first_name"];
            $second_name = $one_student["second_name"];
            $age = $one_student["age"];
            $life = $one_student["life"];
            $college = $one_student["college"];
            $id = $one_student["ID"];

        } else {
            die("Student nenalezen");
        }

    } else {
        die("ID není zadáno, student nebyl nalezen");
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $life = $_POST["life"];
        $college = $_POST["college"];

        if(Student::updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id)) {
            Url::redirectUrl("/www1/admin/one-student.php?id=$id");
        };
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
   
    <?php 
        if($role == "admin") {
            require "../assets/formular-ziak.php";
        } else {
            echo "<h1>Obsah tejto stránky je k dispozícií iba administrátorovi.</h1>";
        }
    ?>

    <?php require "../assets/footer.php" ?>
    <script src="../js/header.js"></script>
</body>
</html>