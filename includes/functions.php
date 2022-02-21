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

        $hashlozinka = password_hash($lozinka, PASSWORD_DEFAULT);

        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':adresa' => $adresa,
            ':lozinka' => $lozinka));

    

            header("Location: ../registracija/registracija.php?succes=Uspjesnododano?");
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

function createReservation($conn, $ime, $prezime, $email, $datum, $vrijeme, $broj_osoba) {
    if (!$conn) {
        header("Location: ../rezervacija/rezervacija.php?error=connectionfailed?" . $conn->error);
        exit();
    } else {
        $query = $conn->prepare("INSERT INTO rezervacija (ime, prezime, email, datum, vrijeme, broj_osoba) 
        VALUES (:ime, :prezime, :email, :datum, :vrijeme, :broj_osoba)");

        $hashvrijeme = password_hash($vrijeme, PASSWORD_DEFAULT);

        $query->execute(array(
            ':ime' => $ime,
            ':prezime' => $prezime,
            ':email' => $email,
            ':datum' => $datum,
            ':vrijeme' => $vrijeme,
            ':broj_osoba' => $broj_osoba));

    

            header("Location: ../rezervacija/rezervacija.php?succes=Uspjesnododano?");
    }   

    }







/* ---------------------- ADMIN - DODAJ KORISNIKA -------------------- */


function dodajKorisnika($conn, $ime, $prezime, $email, $username, $pw) {
    if (!$conn) {
        header("Location: ../admin/dodajkorisnika.php?error=dodavanjenijeuspjelo?" . $conn->error);
        exit();
    } else {
        $conn->query("INSERT INTO korisnici (ime, prezime, email, username, pw) VALUES ('$ime','$prezime','$email','$username','$pw');");
        header("Location: ../admin/dodajkorisnika.php?success=korisnikuspjesnododan");
        exit();
    }   

    }


?>