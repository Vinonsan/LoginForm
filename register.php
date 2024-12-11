<?php
include('db_conn.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    
    $sql = "INSERT INTO login_db (username, password) VALUES (:username, :password)";

    try {
        
        $stmt = $pdo->prepare($sql);
        
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); 
        
        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: Registration failed!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
