 <?php 
    session_start();
    require_once 'baza.php';
    require_once 'functions.php';
 ?>


 <?php
    if (isset($_POST["submit"])) {
    
        $username = $_POST ['username'];
        $lozinka = $_POST ['lozinka'];

        if(empty($_POST['username']) || empty($_POST['lozinka'])) {
            header("location: ../admin/prijava/prijava.php?error=praznapolja");
            exit();
        }
    
        adminExists($conn, $username, $lozinka);
     
        
    }
    else {
        header("location: ../registracija/registracija.php");
    }

	
?>