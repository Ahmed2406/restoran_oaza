<?php 
    session_start();
    require_once '../includes/baza.php';

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
    <link rel="stylesheet" href="mojeRezervacije.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body class="bg-dark">

    <div class="mojerezervacije container text-white">
        <h1 class="text-white text-center bg-danger">MOJE REZERVACIJE</h1>
        <div class="row">

            <?php 
            $email = $_SESSION ['email'];                            
            $data = $conn->prepare("SELECT ime, prezime, email, datum, vrijeme, broj_osoba FROM rezervacija where email = ?");
            $data->execute(array($email));

            $row = $data->fetch(PDO::FETCH_ASSOC);
            if($row)
                {
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <div class="rezervacija d-flex justify-content-center flex-column align-items-center bg-danger p-2">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <p>Ime</p>
                            <p>Prezime</p>
                            <p>Email</p>
                            <p>Datum</p>
                            <p>Vrijeme</p>
                            <p>Broj osoba</p>
                        </div>
                        <div class="text-center">
                            <?php                 
                                echo "<p>$row[ime]</p>";
                                echo "<p>$row[prezime]</p>";
                                echo "<p>$row[email]</p>";
                                echo "<p>$row[datum]</p>";
                                echo "<p>$row[vrijeme]</p>";
                                echo "<p>$row[broj_osoba]</p>";
                        ?>
                        </div>
                    </div>
                    <div class="opcije">
                        <a href="" class="btn btn-primary">Uredi</a>
                        <a href="" class="btn btn-secondary">Izbrisi</a>
                    </div>

                </div>

            </div>
            <?php 
                }
                else
                { 
            ?>
            <p>Greska</p>
            <?php 
            }
            ?>
        </div>
        <a href="../index.php" class="btn btn-danger text-decoration-none text-white d-block m-auto"
            style="width:max-content;">Nazad</a>








        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>





</body>

</html>