 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
    session_start();
 ?>


 <?php
    if (isset($_POST["dodaj"])) {
        
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $broj_telefona = $_POST ['broj_telefona'];
        $lozinka = $_POST ['lozinka'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['broj_telefona']) || empty($_POST['lozinka'])) {
            header("location: ../admin/korisnici/dodajKorisnika.php?error=praznapolja");
            exit();
        }
    
        if (emailExists($conn, $email) !== false) {
            header("location: ../admin/korisnici/dodajKorisnika.php?error=emailtaken");
            exit();
        }
    
        if (validateEmail($conn, $email) !== false) {
            header("location: ../admin/korisnici/dodajKorisnika.php?error=emailNijeIspravan");
            exit();
        }

        dodajKorisnika($conn, $ime, $prezime, $email, $broj_telefona, $lozinka);
    }
    else {
        header("location: ../admin/korisnici/dodajKorisnika.php?error=Greskaa");
    }

	
?>