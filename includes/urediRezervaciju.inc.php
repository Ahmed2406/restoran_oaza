 <?php 
    require_once 'baza.php';
    require_once 'functions.php';
    session_start();
 ?>


 <?php

 if (isset($_POST["delete"])) {
        $id = $_POST['delete'];

        try {
            $query = $conn->prepare("DELETE FROM rezervacija WHERE id=:id");
            $query_execute = $query->execute([':id' => $id]);
            
            if($query_execute) {
                header("Location: ../admin/rezervacije/rezervacije.php?succes=uspjesnoIzbrisanaRezervacija");
                echo "Uspjesno";
            }
            else {
                header("Location: ../admin/rezervacije/rezervacije.php?succes=greska");
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }


     if (isset($_POST["deleteR"])) {
        $id = $_POST['deleteR'];

        try {
            $query = $conn->prepare("DELETE FROM rezervacija WHERE id=:id");
            $query_execute = $query->execute([':id' => $id]);
            
            if($query_execute) {
                header("Location: ../mojeRezervacije/mojeRezervacije.php?succes=uspjesnoIzbrisanaRezervacija");
                echo "Uspjesno";
            }
            else {
                header("Location: ../mojeRerezervacije/mojeRezervacije.php?succes=greska");
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
        $datum = $_POST ['datum'];
        $vrijeme = $_POST ['vrijeme'];
        $broj_osoba = $_POST ['broj_osoba'];
        $stanje = $_POST ['stanje'];

       
    
    
        updateRezervacija($conn, $id, $ime, $prezime, $email, $datum, $vrijeme, $broj_osoba, $stanje);
    }


    if (isset($_POST["otkazi"])) {
        $id = $_POST['id'];
        $ime = $_POST ['ime'];
        $prezime = $_POST ['prezime'];
        $email = $_POST ['email'];
        $datum = $_POST ['datum'];
        $vrijeme = $_POST ['vrijeme'];
        $broj_osoba = $_POST ['broj_osoba'];
        $stanje = $_POST ['stanje'];

       
    
    
        otkaziRezervaciju($conn, $id, $stanje);
    }
 
 

	
?>