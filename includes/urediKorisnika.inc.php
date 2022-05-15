 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
    session_start();
 ?>


 <?php

 if (isset($_POST["delete"])) {
        $id = $_POST['delete'];

        try {
            $query = $conn->prepare("DELETE FROM korisnici WHERE id=:id");
            $query_execute = $query->execute([':id' => $id]);
            
            if($query_execute) {
                header("Location: ../admin/korisnici/korisnici.php?succes=uspjesnoIzbrisanKorisnik");
                echo "Uspjesno";
            }
            else {
                header("Location: ../admin/korisnici/korisnici.php?succes=greska");
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }





    if (isset($_POST["update"])) {
        $id = $_POST['id'];
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $adresa = $_POST ['adresa'];
        $lozinka = $_POST ['lozinka'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['adresa']) || empty($_POST['lozinka'])) {
            header("location: ../admin/korisnici/urediKorisnika.php?error=praznapolja");
            exit();
        }
    
    
        updateUser($conn, $id, $ime, $prezime, $email, $adresa, $lozinka);
    }
 

	
?>