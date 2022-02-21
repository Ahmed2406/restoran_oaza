<?php
	require '../includes/baza.php';
	session_start();
    $email = $_SESSION['email'];
?>

<!doctype php>
<php lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="kontakt.css">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
        </style>

        <title>Oaza</title>
    </head>

    <body>


        <nav class="navbar navigacija container-fluid navbar-expand-md fixed-top">
            <div class="container-fluid container-lg test">
                <a class="navbar-brand" href="#"><img src="../slike/logo.jpg" class="logo" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bi bi-list"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item px-2 text-center">
                            <a class="nav-link text-white pb-1" aria-current="page" href="../index.php">POČETNA</a>
                        </li>
                        <li class="nav-item px-2 text-center">
                            <a class="nav-link text-white pb-1" href="../o-nama/o-nama.php">O NAMA</a>
                        </li>
                        <li class="nav-item px-2 text-center">
                            <a class="nav-link text-white pb-1" href="../meni/meni.php">MENI</a>
                        </li>
                        <li class="nav-item px-2 text-center">
                            <a class="nav-link text-white pb-1" href="../galerija/galerija.php">GALERIJA</a>
                        </li>
                        <li class="nav-item px-2 text-center">
                            <a class="nav-link active text-white pb-1" href="kontakt/kontakt.php">KONTAKT</a>
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
                    <a href="../prijava/prijava.php" class="btn prijava text-white">Prijava</a>

                    <?php 
                    }  
                ?>
                </div>
            </div>
        </nav>






        <div class="contact d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row bg-dark text-light testt"
                    style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius: 7px;">
                    <div class="col-md-6 col-lg-5 jedan py-4">
                        <h3>KONTAKT</h3>
                        <form>
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="ime" class="form-label">Ime</label>
                                    <input type="text" class="form-control" id="ime">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="perzime" class="form-label">Prezime</label>
                                    <input type="text" class="form-control" id="perzime">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label class="text-dark" for="floatingTextarea2">Comments</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-warning">Pošalji</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-7 dva p-1" style="border-radius: 0 7px 7px 0;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7655.016711685844!2d17.44110416568002!3d44.05462488877488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475fa6904379d011%3A0x7edc0965a8f3afb5!2sBugojno!5e0!3m2!1shr!2sba!4v1643106711410!5m2!1shr!2sba"
                            style="border:0; width: 100%; height: 100%; min-height: 400px; border-radius: 0 7px 7px 0;"
                            allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>


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

</php>