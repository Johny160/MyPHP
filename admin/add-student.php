<?php 

    require "../classes/Database.php";
    require "../classes/Url.php";
    require "../classes/Student.php";
    require "../classes/Auth.php";

    session_start();

    if ( !Auth::isLoggedIn() ){
        die("Nepovolený přístup");
    }

    $first_name = null;
    $second_name = null;
    $age = null;
    $life = null;
    $college = null;


    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $life = $_POST["life"];
        $college = $_POST["college"];

        //$connection = connectionDB();
        $database = new Database();
        $connection = $database->connectionDB();

        $id = Student::createStudent($connection, $first_name, $second_name, $age, $life, $college);
        
        if($id){
            Url::redirectUrl("/www1/admin/one-student.php?id=$id");
        } else {
            echo "Žiak nebol vytvorený.";
        }
    };   
 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-add-student.css">
    <link rel="stylesheet" href="../query/admin-add-student-query.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    
    <main>
        <section class = "main-heading">
            
        </section>

        <section class = "add-form">
            <?php require "../assets/form-student.php" ?>
        </section>
    </main>
    
    <?php require "../assets/footer.php"; ?>

    <script src="../js/header.js"></script>
</body>
</html>