<?php

    require "../classes/Database.php";
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
    
    //echo "Úspešné prihlásenie do databázy.";

    if ( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {
        $students = Student::getStudent($connection, $_GET["id"]);
    }

    //var_dump($students);

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
    <link rel="stylesheet" href="../css/admin-one-student.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>

    <main>
        
        <!-- <section class = "main-heading">
            <h1>Informácie o žiakovi</h1>
        </section> -->
        
        <section class="one-student">
            <?php if ($students === NULL): ?>
                <p>Nebol nájdený žiaden žiak.</p>
            <?php else: ?>
                <div class="one-student-box">
                    <h2><?php echo htmlspecialchars($students["first_name"]). " " .htmlspecialchars($students["second_name"]) ?></h2>
                    <p>Vek: <?php echo htmlspecialchars($students["age"]) ?></p>
                    <p>Informácia: <?php echo htmlspecialchars($students["life"]) ?></p>
                    <p>Bydlisko: <?php echo htmlspecialchars($students["college"]) ?></p>
                </div>
                
                <?php if($role === "admin"): ?>
                    <div class="one-student-buttons">
                        <a href="edit-student.php?id=<?= $students['ID'] ?>">Editovat</a>  
                        <a href="delete-student.php?id=<?= $students['ID'] ?>">Vymazať</a>
                    </div>
                <?php endif; ?>

            <?php endif ?>
        </section> 
  
        <a href="students.php">Späť na zoznam žiakov</a>
    </main>
    
    <?php require "../assets/footer.php"; ?>

    <script src="../js/header.js"></script>
</body>
</html>