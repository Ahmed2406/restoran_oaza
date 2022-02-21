 <?php 
    session_start();
    require_once 'baza.php';
    require_once 'functions.php';
 ?>


 <?php
    if (isset($_POST["submit"])) {
    
        $email = $_POST ['email'];
        $lozinka = $_POST ['lozinka'];

        if(empty($_POST['email']) || empty($_POST['lozinka'])) {
            header("location: ../prijava/prijava.php?error=praznapolja");
            exit();
        }
    
        userExists($conn, $email, $lozinka);
     
        
        if (emailExists($conn, $email) !== false) {
            header("location: ../registracija/registracija.php?error=emailtaken");
            exit();
        }
    
        createUser($conn, $ime, $prezime, $email, $username, $pw);
    }
    else {
        header("location: ../registracija/registracija.php");
    }

	
?>