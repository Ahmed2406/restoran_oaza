<?php
	require '../includes/baza.php';
	session_start();
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

        <!-- CSS -->
        <link rel="stylesheet" href="kontakt.css">
        <link rel="stylesheet" href="../css/icon/css/all.min.css" />

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
        </style>

        <style>
        .box {
            border-radius: 10px;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
            max-width: 950px;
        }
        </style>

        <title>Oaza</title>
    </head>

    <body>
        <div class="naslov">
            <nav class="navbar navigacija container-fluid navbar-expand-lg fixed-top">
                <div class="container-fluid container-lg">
                    <a class="navbar-brand" href="#"><img src="../slike/logoo.png" class="logo" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-list fs-1 text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarNav">
                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link  text-white pb-1 position-relative" aria-current="page"
                                    href="../index">POČETNA</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link text-white pb-1 position-relative" href="../o-nama/o-nama">O
                                    NAMA</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link text-white pb-1 position-relative" href="../meni/meni">MENI</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link text-white pb-1 position-relative"
                                    href="../galerija/galerija">GALERIJA</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link active text-white pb-1 position-relative" href="#">KONTAKT</a>
                            </li>

                            <?php
                                if(isset($_SESSION['email']))
                                {
                                    $id = $_SESSION['email'];
                                    $sql = $conn->prepare("SELECT * FROM `korisnici` WHERE `email`='$id'");
                                    $sql->execute();
                                    $fetch = $sql->fetch();
			                ?>

                            <li class="px-2 text-center user" style="margin-left: 40px;">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="dropdown">
                                        <a class="btn btn-success dropdown-toggle second-text fw-bold text-white"
                                            href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-user me-2"></i>
                                            <?php echo $fetch['ime']?>
                                            <?php echo $fetch['prezime']?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li class="d-flex justify-content-center align-items-center">
                                                <a class="dropdown-item d-flex justify-beetwen align-items-center"
                                                    href="../mojeRezervacije/mojeRezervacije">Rezervacije
                                                    <span class="ms-3 px-2 text-success bg-dark rounded-circle">
                                                        <?php 
                                                            $email = $_SESSION['email'];
                                                            $stmt = $conn->prepare("SELECT ime, prezime, email, datum, vrijeme, broj_osoba FROM rezervacija WHERE email = ?");
                                                            $stmt->execute(array($email));
                                                            $row = $stmt->rowCount();
                                                            if($row) {
                                                                echo $row;
                                                            }
                                                            else {
                                                                echo $row;
                                                            }
                                                        ?>
                                                    </span>
                                                </a>

                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex justify-beetwen align-items-center"
                                                    href="../mojePoruke/mojePoruke">Poruke
                                                    <span class="ms-3 px-2 text-success bg-dark rounded-circle">
                                                        <?php 
                                                            $email = $_SESSION['email'];
                                                            $stmt = $conn->prepare("SELECT ime, prezime, email, poruka FROM poruke WHERE email = ?");
                                                            $stmt->execute(array($email));
                                                            $row = $stmt->rowCount();
                                                            if($row) {
                                                                echo $row;
                                                            }
                                                            else {
                                                                echo $row;
                                                            }
                                                        ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item" href="../includes/logout">Odjava</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php
                                }   
                                else {
			                ?>
                        </ul>

                        <a href="../prijava/prijava" class="btn prijava text-white">Prijava</a>

                        <?php 
                            }  
                        ?>

                    </div>
                </div>
            </nav>
            <h1>KONTAKT</h1>

        </div>


        <!------------------ Kontakt ------------------>

        <div class="kontakt d-flex justify-content-center align-items-center">
            <div class="container" style="height:max-content">
                <div class="row box">
                    <div class="col-md-6 col-lg-5 jedan py-4">
                        <h3>KONTAKT</h3>
                        <form class="kontakt-forma" method="POST">

                            <?php   
                                if(isset($_SESSION['email'])) {
                                    $id = $_SESSION['email'];
                                    $sql = $conn->prepare("SELECT * FROM `korisnici` WHERE `email`='$id'");
                                    $sql->execute();
                                    $fetch = $sql->fetch();        
			                ?>

                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="ime" class="form-label">Ime</label>
                                    <input type="text" name="ime" class="form-control" id="ime"
                                        value="<?php echo $fetch['ime']?>" placeholder="Ime" readonly>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="perzime" class="form-label">Prezime</label>
                                    <input type="text" name="prezime" class="form-control" id="prezime"
                                        value=" <?php echo $fetch['prezime']?>" placeholder="Prezime" readonly>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value=" <?php echo $fetch['email']?>" placeholder="Email" readonly>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="poruka" placeholder="Leave a comment here"
                                    id="poruka" style="height: 100px"></textarea>
                                <label class="text-dark" for="poruka">Poruka</label>
                            </div>

                            <?php 
                                }
                                else {     
			                ?>

                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="ime" class="form-label">Ime</label>
                                    <input type="text" name="ime" class="form-control" id="ime" value=""
                                        placeholder="Ime">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="perzime" class="form-label">Prezime</label>
                                    <input type="text" name="prezime" class="form-control" id="perzime"
                                        placeholder="Prezime">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="poruka" placeholder="Leave a comment here"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                <label class="text-dark" for="floatingTextarea2">Poruka</label>
                            </div>

                            <?php 
                                }
                            ?>

                            <button type="submit" name="submit" class="btn btn-warning">Pošalji</button>



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


        <!-------------- Footer ------------->

        <footer class="text-light">
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

            <div class="footer-copyright text-center py-3"><small>© 2022 Copyright:</small>
                <a href="" class="text-white text-decoration-none"><small>Ahmed</small></a>
            </div>

        </footer>


        <!-- javaScript -->
        <script src="../javaScript/javaScript.js"></script>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!------------------ Kontakt forma ------------------>
        <script>
        document.querySelector(".kontakt-forma").addEventListener("submit", submitForm);

        function submitForm(e) {
            e.preventDefault();

            let ime = document.getElementById("ime").value;
            let prezime = document.getElementById("prezime").value;
            let email = document.getElementById("email").value;
            let poruka = document.getElementById("poruka").value;

            document.querySelector(".kontakt-forma").reset();

            sendEmail(ime, prezime, email, poruka);
        }

        function sendEmail(ime, prezime, email, poruka) {
            window.location.href = `mailto:restoranoaza10@gmail.com?cc=${email}&subject=test&body=${poruka}`;
        }
        </script>

    </body>

</php>