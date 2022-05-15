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
        $adresa = $_POST ['adresa'];
        $lozinka = $_POST ['lozinka'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['adresa']) || empty($_POST['lozinka'])) {
            header("location: ../admin/korisnici/urediKorisnika.php?error=praznapolja");
            exit();
        }
    
        if (emailExists($conn, $email) !== false) {
            header("location: ../admin/korisnici/urediKorisnika.php?error=emailtaken");
            exit();
        }
    
        dodajKorisnika($conn, $ime, $prezime, $email, $adresa, $lozinka);
    }
    else {
        header("location: ../admin/korisnici/dodajKorisnika.php?error=Greskaa");
    }

	
?>