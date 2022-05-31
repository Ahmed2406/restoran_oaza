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
        $broj_telefona = $_POST ['broj_telefona'];
        $lozinka = $_POST ['lozinka'];
        $potvrda_lozinke = $_POST ['potvrda_lozinke'];

    
        if (pwdMatch($lozinka, $potvrda_lozinke) !== false) {
            header("location: ../registracija/registracija.php?error=passworddontmatch");
            exit();
        }
        
        if (emailExists($conn, $email) !== false) {
            header("location: ../registracija/registracija.php?error=emailtaken");
            exit();
        }

        if (validateEmail($conn, $email) !== false) {
            header("location: ../registracija/registracija.php?error=emailNijeIspravan");
            exit();
        }
    
        createUser($conn, $ime, $prezime, $email, $broj_telefona, $lozinka);
    }
    else {
        header("location: ../registracija/registracija.php");
    }

	
?>