<?php
	require_once '../includes/baza.php';
    session_start();

    if(!isset($_SESSION['email']))
    {
        header("location: ../index.php?error=nistePrijavljeni!");
        exit();
    }
                    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="rezervacija.css">
    <link rel="stylesheet" href="../css/icon/css/all.min.css" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>
    <div class="rezervacija">
        <div class="container">
            <div class="row d-flex align-items-center m-0" style="height: 100vh;">
                <div class="col-md-6 box p-0 text-white p-0">
                    <h3 class="text-center py-3">REZERVACIJA</h3>
                    <form class="p-3" action="../includes/rezervacija.inc.php" method="POST">
                        <?php 
                            $email = $_SESSION ['email'];                            
                            $data = $conn->prepare("SELECT ime, prezime, email FROM korisnici where email = ?");
                            $data->execute(array($email));
                        ?>

                        <?php 
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control" id="ime" name="ime"
                                    value="<?php echo $row['ime'];?>" placeholder="Ime" readonly>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control" id="perzime" name="prezime"
                                    value="<?php echo $row['prezime'];?>" placeholder="Prezime" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $row['email'];?>" placeholder="Email" readonly>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <input type="date" class="form-control" id="ime" name="datum" placeholder="Datum">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <input type="time" class="form-control" id="perzime" name="vrijeme"
                                    placeholder="Vrijeme">
                            </div>
                        </div>
                        <div class="mb-4">
                            <select class="form-select" aria-label="Default select example" name="broj_osoba">
                                <option selected>Odredite broj osoba</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>5+</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <input type="text" class="form-control" id="stanje" name="stanje" value="na čekanju" hidden>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="submit">REZERVIŠI</button>
                        </div>

                        <?php 
                            }
                        ?>
                    </form>
                    <div class="izlaz">
                        <a href="../index"><i class="bi bi-x"></i></a>
                    </div>
                </div>

                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>


    <!-- javaScript -->
    <script src="../javaScript/javaScript.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>