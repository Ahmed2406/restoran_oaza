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
    <link rel="stylesheet" href="korisnici.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>


    <div class="dodajKorisnika">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
                <div class="urediBox p-0 text-white p-0">
                    <h3 class="text-center py-3">DODAJ KORISNIKA</h3>

                    <form class="p-3" action="../../includes/dodajKorisnika.inc.php" method="POST">

                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" required>
                            </div>
                            <div class=" mb-3 col-lg-6">
                                <input type="text" class="form-control" id="perzime" name="prezime"
                                    placeholder="Prezime" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="broj_telefona" name="broj_telefona" placeholder="Broj telefona"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="lozinka" name="lozinka"
                                placeholder="Lozinka" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="dodaj">DODAJ KORISNIKA</button>
                        </div>

                    </form>
                    <div class="izlaz">
                        <a href="korisnici"><i class="bi bi-x"></i></a>
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