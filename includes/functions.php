<?php



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



function createUser($conn, $ime, $prezime, $email, $adresa, $lozinka) {
    if (!$conn) {
        header("Location: ../registracija/registracija.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO korisnici (ime, prezime, email, adresa, lozinka) 
        VALUES (:ime, :prezime, :email, :adresa, :lozinka)");


        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':adresa' => $adresa,
            ':lozinka' => $lozinka));

    

            header("Location: ../prijava/prijava.php?succes=uspjesnaRegistracija?");
    }   

    }

    

/* --------------- LOGIN - KORISNIK ------------------ */ 



function userExists($conn, $email, $lozinka)
{
    if (!$conn) {
        header("Location: ../login.php?error=queryfailed?" . $conn->error);
        exit();
    } else {
        $sql = "SELECT email FROM korisnici WHERE email = ? && lozinka = ?";
        $query = $conn->prepare($sql);
		$query->execute(array($email, $lozinka));
		$row = $query->rowCount();

            if($row > 0) 
            {
			
                $_SESSION['email'] = $email;
 header("location: ../index.php?error=uspjesnaprijava");
            exit();  
			} 
            else {
                header("location: ../prijava/prijava.php?error=greskauprilikomprijave");
            exit();
            }
		        exit();

    }
}

function loginUser($conn, $email, $pw)
{
    $userExists = userExists($conn, $email, $pw);
    if (!$userExists) {
        header("Location: ../login/login.php?error=nisutacnipodaci");
        exit();
    } else {
        session_start();
        $_SESSION['loggedIn'] = 1;
        $_SESSION['email'] = $email;
        $_SESSION['pw'] = $pw;

        header("Location: ../korisnik.php?success=uspjesnaprijava");
        exit();
    }

}


/* --------------- LOGIN - ADMIN ------------------ */ 

function adminExists($conn, $username, $pw)
{
    if (!$conn) {
        header("Location: ../adminlogin.php?error=queryfailed?" . $conn->error);
        exit();
    } else {
        $data = $conn->query("SELECT username FROM admin WHERE username = '$username' AND pw = '$pw'");
        if ($data->num_rows > 0) {
            $result = true;
            return $result;
        } else {
            $result = false;
            return $result;
        }
    }
}

function loginAdmin($conn, $username, $pw)
{
    $adminExists = adminExists($conn, $username, $pw);
    if (!$adminExists) {
        header("Location: ../admin/adminlogin.php?error=nisutacnipodaci");
        exit();
    } else {
        session_start();
        $_SESSION['adminloggedIn'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION['pw'] = $pw;

        header("Location: ../admin/admin.php?success=uspjesnaprijava");
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


function posaljiPoruku($conn, $ime, $prezime, $email, $poruka) {
    if (!$conn) {
        header("Location: ../kontakt/kontakt.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO poruke (ime, prezime, email, poruka) 
        VALUES (:ime, :prezime, :email, :poruka)");


        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':poruka' => $poruka));

    

            header("Location: ../kontakt/kontakt.php?succes=uspjesnoPolsanaPoruka?");
    }   

    }




/* ---------------------- ADMIN - DODAJ KORISNIKA -------------------- */


 function dodajKorisnika($conn, $ime, $prezime, $email, $adresa, $lozinka) {
    if (!$conn) {
        header("Location: ../admin/korisnici/urediKorisnika.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO korisnici (ime, prezime, email, adresa, lozinka) 
        VALUES (:ime, :prezime, :email, :adresa, :lozinka)");


        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':adresa' => $adresa,
            ':lozinka' => $lozinka));

    

            header("Location: ../admin/korisnici/korisnici.php?succes=uspjesnoDodanKorisnik?");
    }   

    }



    function updateUser($conn, $id, $ime, $prezime, $email, $adresa, $lozinka) {
    if (!$conn) {
        header("Location: ../admin/korisnici/urediKorisnika.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("UPDATE korisnici SET ime=:ime, prezime=:prezime, email=:email, adresa=:adresa, lozinka=:lozinka WHERE id=:id"); 
            


        $query->execute(array(
            ':id' => $id,
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':adresa' => $adresa,
            ':lozinka' => $lozinka));

    

            header("Location: ../admin/korisnici/korisnici.php?succes=uspjesnaIzmjenaPodataka");
    }   

    }
    


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




?>