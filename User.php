<?php

require_once 'C:/wamp64/www/PROJET PAW/Database/sb_config.php';
session_start();
class User {
    private $conn;
    private $id;
    private $username;
    private $password;
    private $role;
    private $name;
    private $surname;

    public function __construct($id, $password) {

        $this->conn = (new DB())->getConnection();
        $this->id = $id;
        $this->password = $password;
    }

       
        // Start the new session
    

    public function login() {
        // Check if user exists
        $sql = "SELECT  ID, USERNAME, PASSWORD, ROLE, NAME, SURNAME FROM login WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $username, $password, $role, $name, $surname);
       

        if ($stmt->num_rows > 0) {
          
            $stmt->fetch();
            // Verify password
            if ($this->password==$password) {
                // Create session
                
               // Initialize session variables based on the user's role
if ($role == 'ADMIN') {
    
    $_SESSION['adminid'] = $id;
    $_SESSION['adminusername'] = $username;
    $_SESSION['adminpassword'] = $password; // In practice, don't store passwords directly
    $_SESSION['role'] = 'ADMIN';
    $_SESSION['adminname'] = $name;
    $_SESSION['adminsurname'] = $surname;
    $_SESSION['logged_in'] = true;


} elseif ($role == 'PROF') {
    
    $_SESSION['profid'] = $id;
    $_SESSION['profusername'] = $username;
    $_SESSION['profpassword'] = $password; // In practice, don't store passwords directly
    $_SESSION['role'] = 'PROF';
    $_SESSION['profname'] = $name;
    $_SESSION['profsurname'] = $surname;
    $_SESSION['logged_in'] = true;
    


} elseif ($role == 'ETUDIANT') {
 
    $_SESSION['etudiantid'] = $id;
    $_SESSION['etudiantusername'] = $username;
    $_SESSION['etudiantpassword'] = $password; // In practice, don't store passwords directly
    $_SESSION['role'] = 'ETUDIANT';
    $_SESSION['etudiantname'] = $name;
    $_SESSION['etudiantsurname'] = $surname;
    $_SESSION['logged_in'] = true;
    
   
} else {
    // If role is not recognized, redirect to login page or show an error
    $_SESSION['logged_in'] = false;
    header("Location: login.php");
    exit;
}

// Optionally, redirect the user based on role
if ($_SESSION['role'] == 'ADMIN') {
    header("Location: Admin/AdminWelcomePage.php");
    exit;
} elseif ($_SESSION['role'] == 'PROF') {
    header("Location: professor/Prof_Welcome_Page.php");
    exit;
} elseif ($_SESSION['role'] == 'ETUDIANT') {
    header("Location: Etudiant/Welcom Page.php");
    exit;
}

                return true; // Login successful
            } else {
                
                return false; // Incorrect password
            }
        } else {
            
            return false; // No user found
        }
    }
 
}


?>
