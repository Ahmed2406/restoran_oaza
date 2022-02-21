<?php
	require 'includes/baza.php';
	session_start();
    $email = $_SESSION['email'];
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
    <link rel="stylesheet" href="css/style.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>


    <nav class="navbar navigacija container-fluid navbar-expand-lg fixed-top">
        <div class="container-fluid container-lg">
            <a class="navbar-brand" href="#"><img src="slike/logo.jpg" class="logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-list fs-1 text-white"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-2 text-center">
                        <a class="nav-link active text-white pb-1 position-relative" aria-current="page"
                            href="#">POČETNA</a>
                    </li>
                    <li class="nav-item px-2 text-center">
                        <a class="nav-link text-white pb-1 position-relative" href="o-nama/o-nama.php">O NAMA</a>
                    </li>
                    <li class="nav-item px-2 text-center">
                        <a class="nav-link text-white pb-1 position-relative" href="meni/meni.php">MENI</a>
                    </li>
                    <li class="nav-item px-2 text-center">
                        <a class="nav-link text-white pb-1 position-relative" href="galerija/galerija.php">GALERIJA</a>
                    </li>
                    <li class="nav-item px-2 text-center">
                        <a class="nav-link text-white pb-1 position-relative" href="kontakt/kontakt.php">KONTAKT</a>
                    </li>
                </ul>






                <?php
                    if(isset($_SESSION['email']))
                    {
                        $id = $_SESSION['email'];
                        $sql = $conn->prepare("SELECT * FROM `korisnici` WHERE `email`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
		                
			    ?>

                <div class="korisnik d-flex justify-content-center align-items-center flex-md-row text-white">
                    <div class="info d-flex justify-content-center align-items-center mx-lg-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="bi bi-person-circle fs-1"></i>
                            <div class="px-2 text-center">


                                <m class="m-0"><?php echo $fetch['ime']?></m>
                                <p class="m-0"><?php echo $fetch['prezime']?></p>
                            </div>
                        </div>
                        <a href="../mojeRezervacije/mojeRezervacije.php"
                            class="rezervacije text-white position-relative">
                            <i class="bi bi-clipboard-check fs-2 mx-2"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php 
                                    $stmt = $conn->prepare("SELECT ime, prezime, email, datum, vrijeme, broj_osoba FROM rezervacija WHERE email = ?");
                                    $stmt->execute(array($email));
                                    $row = $stmt->rowCount();
                                    if($row) {
                                        echo $row;
                                    }
                                    else {
                                        echo "nema";
                                    }
                                ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </div>
                    <a href="../includes/logout.php" class="logout text-white">
                        <i class="bi bi-box-arrow-right fs-2"></i>
                    </a>
                </div>
                <?php 
                    }
                    else 
                    {
                ?>
                <a href="prijava/prijava.php" class="btn prijava text-white">Prijava</a>

                <?php 
                    }  
                ?>

            </div>
        </div>
    </nav>


    <!-- Pocetna -->

    <div class=" pocetna">
        <div class="container">
            <div class="row ">
                <div
                    class="col-12 jedan d-flex justify-content-center align-items-center flex-column text-white text-center">
                    <h2>Autentičan okus & uzbudljivo iskustvo</h2>
                    <div class="heading d-flex justify-content-between align-items-center">
                        <div class="icon">
                            <i class="bi bi-stars"></i>
                        </div>
                        <h1 class="fw-bolder">OAZA</h1>
                        <div class="icon">
                            <i class="bi bi-stars"></i>
                        </div>
                    </div>
                    <div class="proba d-flex justify-content-center align-items-center">
                        <div class="line">
                        </div>
                        <h6 class="ms-2 me-2 mt-0 mb-0">RESTORAN</h6>
                        <div class="line">
                        </div>
                    </div>

                    <a href="rezervacija/rezervacija.php" class="btn d-flex justify-content-center align-items-center">
                        <img src="slike/chef.png" alt="">Rezerviši
                    </a>





                </div>

            </div>

        </div>
    </div>


    <!------------->



    <!-- Footer -->
    <footer class="text-light" style="background-color: rgb(7, 7, 7);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="footer-contact d-flex justify-content-center align-items-start flex-column p-3">
                        <div class="d-flex justify-content-center align-items-center" style="cursor: pointer;">
                            <i class="bi bi-telephone-fill p-1 fs-6"></i>
                            <p class="m-0 p-1">061589235</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="cursor: pointer;">
                            <i class="bi bi-envelope p-1 fs-6"></i>
                            <p class="m-0 p-1">restoranoaza@gmail.com</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="cursor: pointer;">
                            <i class="bi bi-geo-alt-fill p-1 fs-6"></i>
                            <p class="m-0 p-1">Bugojno</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center ikone">
                    <div class="d-flex justify-content-center align-items-center" style="cursor: pointer;">
                        <i class="bi bi-facebook p-3 fs-5"></i>
                        <i class="bi bi-instagram p-3 fs-5"></i>
                        <i class="bi bi-twitter p-3 fs-5"></i>
                        <i class="bi bi-linkedin p-3 fs-5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center py-3"><small>© 2020 Copyright:</small>
            <a href="" class="text-white text-decoration-none"><small>Ahmed</small></a>
        </div>

    </footer>
    <!-- Footer -->









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    var nav = document.querySelector('nav');
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