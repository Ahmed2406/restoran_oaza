 <?php 
    session_start();
    require_once 'baza.php';
    require_once 'functions.php';
 ?>


 <?php
    if (isset($_POST["submit"])) {
    
        $email = $_POST ['email'];
        $lozinka = $_POST ['lozinka'];

    
        userExists($conn, $email, $lozinka);
     
    }
    else {
        header("location: ../prijava/prijava");
    }

	
?>