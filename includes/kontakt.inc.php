 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
    session_start();

 
    if(!isset($_SESSION['email']))
    {
        header("location: ../kontakt/kontakt.php?error=nistePrijavljeni!");
        exit();
    }
    
 
        if(isset($_POST["submit"])) {
        
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $poruka = $_POST ['poruka'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['poruka'])) {
            header("location: ../kontakt/kontakt.php?error=praznapolja");
            exit();
        }
    
    
        posaljiPoruku($conn, $ime, $prezime, $email, $poruka);
    }

    
    


 ?>
 ?>