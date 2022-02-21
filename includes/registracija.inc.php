 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
    session_start();
 ?>


 <?php
    if (isset($_POST["submit"])) {
        
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $adresa = $_POST ['adresa'];
        $lozinka = $_POST ['lozinka'];
        $potvrda_lozinke = $_POST ['potvrda_lozinke'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['adresa']) || empty($_POST['lozinka']) || empty($_POST['potvrda_lozinke'])) {
            header("location: ../registracija/registracija.php?error=praznapolja");
            exit();
        }
    
        if (pwdMatch($lozinka, $potvrda_lozinke) !== false) {
            header("location: ../registracija/registracija.php?error=passworddontmatch");
            exit();
        }
        
        if (emailExists($conn, $email) !== false) {
            header("location: ../registracija/registracija.php?error=emailtaken");
            exit();
        }
    
        createUser($conn, $ime, $prezime, $email, $adresa, $lozinka);
    }
    else {
        header("location: ../registracija/registracija.php");
    }

	
?>