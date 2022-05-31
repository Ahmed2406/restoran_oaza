<?php

/* ------------ REGISTRACIJA I PRIJAVA KORISNIKA -------------------- */

/* ---------- PROVJERA LOZINKE ------------- */

function pwdMatch($lozinka, $potvrda_lozinke) {
    $rezultat;
    if ($lozinka !== $potvrda_lozinke) {
        $rezultat = true;
    } 
    else {
        $rezultat = false; 
        }
    return $rezultat;
}

/* ---------- PROVJERA POSTOJANJA I VALIDACIJE EMAILA ------------- */

function emailExists($conn, $email) {
    
    $data = $conn->prepare("SELECT * FROM korisnici WHERE email = :email");
    $data->bindParam(':email', $email);
    $data->execute();
        if ($data->rowCount() > 0) {
            $result = true;
            return $result;
        } else {
            $result = false;
            return $result;
            }           
}

function validateEmail($conn, $email) {
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
    return $result;
}
else{
    $result = false;
    return $result;
}

}


/* ---------- REGISTRACIJA KORISNIKA ------------- */

function createUser($conn, $ime, $prezime, $email, $broj_telefona, $lozinka) {
    if (!$conn) {
        header("Location: ../registracija/registracija" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO korisnici (ime, prezime, email, broj_telefona, lozinka) 
        VALUES (:ime, :prezime, :email, :broj_telefona, :lozinka)");


        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':broj_telefona' => $broj_telefona,
            ':lozinka' => $lozinka));

    
            echo '<script>alert("Uspjesna registracija")</script>';
            header("Location: ../prijava/prijava.php");
            
    }   

    }

    

/* --------------- PRIJAVA KORISNIKA ------------------ */ 

function userExists($conn, $email, $lozinka)
{
    if (!$conn) {
        header("Location: ../login" . $conn->error);
        exit();
    } else {
        $sql = "SELECT email FROM korisnici WHERE email = ? && lozinka = ?";
        $query = $conn->prepare($sql);
		$query->execute(array($email, $lozinka));
		$row = $query->rowCount();

            if($row > 0) 
            {
			
                $_SESSION['email'] = $email;
                echo '<script>alert("Uspjesna prijava")</script>';
 header("location: ../index");
 
            exit();  
			} 
            else {
                header("location: ../prijava/prijava");
                echo '<script>alert("Podaci nisu tačni!")</script>';
            exit();
            }
		        exit();

    }
}



/* ---------------------- REZERVACIJA -------------------- */

function createReservation($conn, $ime, $prezime, $email, $datum, $vrijeme, $broj_osoba, $stanje) {
    if (!$conn) {
        header("Location: ../rezervacija/rezervacija.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO rezervacija (ime, prezime, email, datum, vrijeme, broj_osoba, stanje) 
        VALUES (:ime, :prezime, :email, :datum, :vrijeme, :broj_osoba, :stanje)");

        $hashvrijeme = password_hash($vrijeme, PASSWORD_DEFAULT);

        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':datum' => $datum,
            ':vrijeme' => $vrijeme,
            ':broj_osoba' => $broj_osoba,
            ':stanje' => $stanje));

    

            header("Location: ../index.php?succes=uspjesnaRezervacija?");
    }   

    }

    /* ---------------------- OTKAZI REZERVACIJU -------------------- */

    function otkaziRezervaciju($conn, $id) {
    if (!$conn) {
        header("Location: ../mojeRezervacije/mojeRezervacije.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("UPDATE rezervacija SET stanje='poslan zahtjev za otkazivanje' WHERE id=:id"); 

        $query->execute(array(
            ':id' => $id,
            
            ));

    

            header("Location: ../mojeRezervacije/mojeRezervacije.php?succes=zahtjevZaOtkazivanjePoslan");
    }   

    }



/* ------------------ ADMIN ------------------------*/


/* --------------- LOGIN - ADMIN ------------------ */ 

function adminExists($conn, $username, $lozinka)
{
    if (!$conn) {
        header("Location: ../admin/prijava/prijava.php?error=queryfailed?" . $conn->error);
        exit();
    } else {
        $sql = "SELECT username FROM test WHERE username = ? && lozinka = ?";
        $query = $conn->prepare($sql);
		$query->execute(array($username, $lozinka));
		$row = $query->rowCount();

            if($row > 0) 
            {
			
                $_SESSION['username'] = $username;
 header("location: ../admin/dashboard/dashboard.php?error=uspjesnaprijava");
            exit();  
			} 
            else {
                header("location: ../admin/prijava/prijava.php?error=greskauprilikomprijave");
            exit();
            }
		        exit();

    }
}


/* ---------------------- ADMIN - DODAJ KORISNIKA -------------------- */


 function dodajKorisnika($conn, $ime, $prezime, $email, $broj_telefona, $lozinka) {
    if (!$conn) {
        header("Location: ../admin/korisnici/urediKorisnika.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO korisnici (ime, prezime, email, broj_telefona, lozinka) 
        VALUES (:ime, :prezime, :email, :broj_telefona, :lozinka)");


        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':broj_telefona' => $broj_telefona,
            ':lozinka' => $lozinka));

    

            header("Location: ../admin/korisnici/korisnici.php?succes=uspjesnoDodanKorisnik?");
    }   

    }

/* ---------------------- ADMIN - UREDI KORISNIKA -------------------- */

    function updateUser($conn, $id, $ime, $prezime, $email, $broj_telefona, $lozinka) {
    if (!$conn) {
        header("Location: ../admin/korisnici/urediKorisnika.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("UPDATE korisnici SET ime=:ime, prezime=:prezime, email=:email, broj_telefona=:broj_telefona, lozinka=:lozinka WHERE id=:id"); 
            
        

        $query->execute(array(
            ':id' => $id,
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':broj_telefona' => $broj_telefona,
            ':lozinka' => $lozinka));

    

            header("Location: ../admin/korisnici/korisnici.php?succes=uspjesnaIzmjenaPodataka");
    }   

    }
    

    /* ---------------------- ADMIN - UREDI REZERVACIJU -------------------- */

    function updateRezervacija($conn, $id, $ime, $prezime, $email, $datum, $vrijeme, $broj_osoba, $stanje) {
    if (!$conn) {
        header("Location: ../admin/rezervacije/urediRezervaciju.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("UPDATE rezervacija SET ime=:ime, prezime=:prezime, email=:email, datum=:datum, vrijeme=:vrijeme, broj_osoba=:broj_osoba, stanje=:stanje WHERE id=:id"); 
            


        $query->execute(array(
            ':id' => $id,
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':datum' => $datum,
            ':vrijeme' => $vrijeme,
            ':broj_osoba' => $broj_osoba,
            ':stanje' => $stanje,
            ));

    

            header("Location: ../admin/rezervacije/rezervacije.php?succes=uspjesnaIzmjenaPodataka");
    }   

    }

 