<?php

class Student {

    public static function getStudent($connection, $id, $columns = "*") {
        $sql = "SELECT $columns
                FROM student
                WHERE id = :id";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        try {
            if($stmt->execute()) {
                return $stmt->fetch();
            } else {
                throw new Exception("Získání dat o jednom studentovi selhalo");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce getStudent, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();

        }
        
    }


    public static function updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id){

        $sql = "UPDATE student
                    SET first_name = :first_name,
                        second_name = :second_name,
                        age = :age,
                        life = :life,
                        college = :college
                    WHERE id = :id";
    
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->bindValue(":life", $life, PDO::PARAM_STR);
        $stmt->bindValue(":college", $college, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        try {
            if($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Update študenta sa nepodarilo.");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce updateStudent, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
    }


    public static function deleteStudent($connection, $id){
        $sql = "DELETE
                FROM student
                WHERE id = :id";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            
        try {
            if($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Vymazanie študenta sa nepodarilo.");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce deleteStudent, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
    }



    public static function getAllStudents($connection, $columns = "*"){
        $sql = "SELECT $columns
                FROM student";

        $stmt = $connection->prepare($sql);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                throw new Exception("Zobrazenie študentov sa nepodarilo.");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce getAllStudent, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
    }


    public static function createStudent($connection, $first_name, $second_name, $age, $life, $college) {


        $sql = "INSERT INTO student (first_name, second_name, age, life, college)
        VALUES (:first_name, :second_name, :age, :life, :college)";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->bindValue(":life", $life, PDO::PARAM_STR);
        $stmt->bindValue(":college", $college, PDO::PARAM_STR);

        try {
            if($stmt->execute()) {
                $id = $connection->lastInsertId();
                return $id;
            } else {
                throw new Exception("Vytvorenie študenta sa nepodarilo.");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce createStudent, získání dat selhalo\n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
        
    }

}