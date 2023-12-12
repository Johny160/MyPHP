<?php

    //require "../assets/databaza.php";
    //require "../assets/ziak.php";
    //require "../assets/auth.php";
    require "../classes/Database.php";
    require "../classes/Student.php";
    require "../classes/Auth.php";

    session_start();

    if ( !Auth::isLoggedIn() ){
        die("Nepovolený přístup");
    }
    
    //$connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();
    
    $students = Student::getAllStudents($connection, "ID, first_name, second_name");
    
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-students.css">
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>

    <main class="students-list">
        <section class = "main-heading">
            <h1>Zoznam žiakov školy</h1>
        </section>
        
        <?php if(empty($students)): ?>
            <p>Databáza je prázdna.</p>
        <?php else: ?>
            <div class="all-students">
                <?php foreach($students as $one_student): ?>    
                    <div class="one-student">
                        <h2><?php echo htmlspecialchars($one_student["first_name"]). " " .htmlspecialchars($one_student["second_name"]) ?></h2>
                    
                        <a href="one-student.php?id=<?= $one_student['ID'] ?>">Viacej informácií</a>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

    </main>
    
    <?php require "../assets/footer.php"; ?>

    <script src="../js/header.js"></script>
</body>
</html>