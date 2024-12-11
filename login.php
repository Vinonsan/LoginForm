<?php

require 'db_conn.php'; 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    try {
        
        $sql = "SELECT * FROM login_db WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $inputUsername, PDO::PARAM_STR);
        $stmt->execute();

       
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            
            if ($inputPassword === $row['password']) { 
                echo "Login successful. Welcome, $inputUsername!";
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
