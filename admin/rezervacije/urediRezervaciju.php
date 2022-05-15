<?php 
    require_once '../../includes/baza.php';
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
    <link rel="stylesheet" href="rezervacije.css">

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
                    <form class="p-3" action="../../includes/urediRezervaciju.inc.php" method="POST">
                        <input type="text" name="id" value="<?= $row['id']; ?>" hidden>

                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="w-100">Ime</label>
                                <input type="text" class="form-control w-100" id="ime" name="ime" placeholder="Ime"
                                    value="<?= $row['ime']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="w-100">Prezime</label>
                                <input type="text" class="form-control w-100" id="prezime" name="prezime"
                                    placeholder="prezime" value="<?= $row['prezime']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="w-100">Email</label>
                                <input type="text" class="form-control w-100" id="email" name="email"
                                    placeholder="email" value="<?= $row['email']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="w-100">Datum</label>
                                <input type="text" class="form-control w-100" id="datum" name="datum"
                                    placeholder="datum" value="<?= $row['datum']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex jutify-content-center align-items-center">
                                <label for="" class="w-100">Vrijeme</label>
                                <input type="text" class="form-control w-100" id="vrijeme" name="vrijeme"
                                    placeholder="Vrijeme" value="<?= $row['vrijeme']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="w-100">Broj osoba</label>
                                <input type="text" class="form-control w-100" id="broj_osoba" name="broj_osoba"
                                    placeholder="broj_osoba" value="<?= $row['broj_osoba']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="w-100">Stanje</label>
                                <select class="form-select w-100" aria-label="Default select example" name="stanje">
                                    <option selected><?= $row['stanje']; ?></option>
                                    <option>Prihvaćeno</option>
                                    <option>Odbijeno</option>
                                    <option>Otkazano</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="update">SPREMI PROMJENE</button>
                        </div>

                    </form>
                    <?php
                        }
                        }
                    ?>
                    <div class="izlaz">
                        <a href="rezervacije.php"><i class="bi bi-x"></i></a>
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