 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
    session_start();
 ?>


 <?php


/* ------------------- IZBRISI KORISNIKA -------------- */

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



/* ------------------- UREDI KORISNIKA -------------- */

    if (isset($_POST["update"])) {
        $id = $_POST['id'];
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $broj_telefona = $_POST ['broj_telefona'];
        $lozinka = $_POST ['lozinka'];

        if(empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['email']) || empty($_POST['broj_telefona']) || empty($_POST['lozinka'])) {
            header("location: ../admin/korisnici/urediKorisnika.php?error=praznapolja");
            exit();
        }
    
        if (emailExists($conn, $email) !== false) {
                header("location: ../admin/korisnici/urediKorisnika.php?error=emailtaken");
                exit();
            }

        if (validateEmail($conn, $email) !== false) {
            header("location: ../admin/korisnici/urediKorisnika.php?error=emailNijeIspravan");
            exit();
        }

        updateUser($conn, $id, $ime, $prezime, $email, $broj_telefona, $lozinka);
    }
 

	
?>