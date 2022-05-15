<?php 
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
    <link rel="stylesheet" href="../admin/rezervacije/rezervacije.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>


    <div class="urediRezervaciju bg-dark">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
                <div class="urediBox p-0 text-white p-0">
                    <h3 class="text-center py-3">UREDI REZERVACIJU</h3>


                    <?php 
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $data = $conn->prepare("SELECT id, ime, prezime, email, datum, vrijeme, broj_osoba, stanje FROM rezervacija WHERE id=:id");
                            $data->execute([':id' => $id]);
                            
                            $result = $data->fetchAll(PDO::FETCH_ASSOC);
                                        if($result) {
                                            foreach($result as $row) {
                                
                    }

                    ?>
                    <form class="p-3" action="../includes/urediRezervaciju.inc.php" method="POST">
                        <input type="text" name="id" value="<?= $row['id']; ?>" hidden>

                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Ime</p>
                                <p class="w-100 text-center"><?= $row['ime']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Prezime</p>
                                <p class="w-100 text-center"><?= $row['prezime']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Email</p>
                                <p class="w-100 text-center"><?= $row['email']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Datum</p>
                                <p class="w-100 text-center"><?= $row['datum']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Vrijeme</p>
                                <p class="w-100 text-center"><?= $row['vrijeme']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Broj osoba</p>
                                <p class="w-100 text-center"><?= $row['broj_osoba']; ?></p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="w-100">Trenutno stanje</p>
                                <p class="w-100 text-center"><?= $row['stanje']; ?></p>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="otkazi">OTKAŽI</button>
                        </div>

                    </form>
                    <?php
                        }
                        }
                    ?>
                    <div class="izlaz">
                        <a href="mojeRezervacije.php"><i class="bi bi-x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    var nav = document.querySelector('nav');
    var test = document.querySelector('.test');
    var toggler = document.querySelector('.navbar-toggler');


    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 5) {
            nav.classList.add("navbar-scroll");
        } else {
            nav.classList.remove("navbar-scroll");
        }
    })


    toggler.onclick = function() {
        toggler.classList.toggle('active');
        nav.classList.toggle('active');

    }
    </script>
    <script>




    </script>




</body>

</html>