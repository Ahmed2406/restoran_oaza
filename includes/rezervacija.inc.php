 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
 ?>


 <?php
    if (isset($_POST["submit"])) {
        
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $datum = $_POST ['datum'];
        $vrijeme = $_POST ['vrijeme'];
        $broj_osoba = $_POST ['broj_osoba'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['datum']) || empty($_POST['vrijeme']) || empty($_POST['broj_osoba'])) {
            header("location: ../rezervacija/rezervacija.php?error=praznapolja");
            exit();
        }
    
    
        createReservation($conn, $ime, $prezime, $email, $datum, $vrijeme, $broj_osoba);
    }
    else {
        header("location: ../rezervacija/rezervacija.php");
    }

	
?>