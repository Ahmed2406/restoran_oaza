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
        <link rel="stylesheet" href="meni.css">
        <link rel="stylesheet" href="../css/icon/css/all.min.css" />

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
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
                                <a class="nav-link text-white pb-1 position-relative" aria-current="page"
                                    href="../index">POČETNA</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link text-white pb-1 position-relative" href="../o-nama/o-nama">O
                                    NAMA</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link active text-white pb-1 position-relative" href="">MENI</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link text-white pb-1 position-relative"
                                    href="../galerija/galerija">GALERIJA</a>
                            </li>
                            <li class="nav-item px-2 text-center">
                                <a class="nav-link text-white pb-1 position-relative"
                                    href="../kontakt/kontakt">KONTAKT</a>
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

                        </ul>
                    </div>
                </div>
            </nav>
            <h1>MENI</h1>
        </div>


        <!----------------- MENI ----------------->

        <section id="meni" class="pt-5 pb-5">
            <div class=" container">
                <div class="meni">
                    <div class="meni-header">
                        <div class="header pt-4 pb-4 d-flex justify-content-between align-items-center ps-2 pe-2">
                            <div class="gif">
                                <img src="../slike/output-onlinegiftools.gif" alt="">
                            </div>
                            <ul class="navbar-nav flex-row justify-content-center flex-wrap">
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link active" aria-current="page" href="#">DORUČAK</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="predjelo/predjelo">PREDJELO</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="juhe/juhe">JUHE</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="glavno-jelo/glavno-jelo">GLAVNO JELO</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="palacinci/palacinci">PALAČINCI</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="kolaci/kolaci">KOLAČI</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="sokovi/sokovi">SOKOVI</a>
                                </li>
                                <li class="nav-item pe-2 ps-2">
                                    <a class="nav-link " href="topli-napitci/topli-napitci">TOPLI NAPITCI</a>
                                </li>
                            </ul>
                            <div class="gif">
                                <img src="../slike/output-onlinegiftools.gif" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="meni-ponuda">
                        <div class="ponuda-text">
                            <h5>PONUDA ZA DORUČAK</h5>
                            <div class="simbol d-flex justify-content-center align-items-center">
                                <div class="line">
                                    <div class="line1">
                                    </div>
                                    <div class="line2">
                                    </div>
                                </div>
                                <div class="icon">
                                    <img src="../slike/icon.png" alt="">
                                </div>
                                <div class="line">
                                    <div class="line1">
                                    </div>
                                    <div class="line2">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ponuda d-flex justify-content-center align-items-center flex-wrap p-2">
                            <div class="box m-2">
                                <div class="slika">
                                    <img src="../slike/jaja-kobasice.jpg" alt="">
                                </div>
                                <div class="text">
                                    <h5 class="p-1 m-0">JAJA</h5>
                                    <p>(jaja 3 kom, roštiljska kobasica, pomfrit, salata)</p>
                                    <h6 class="p-2 m-0">0KM</h6>
                                </div>
                            </div>
                            <div class="box m-2">
                                <div class="slika">
                                    <img src="../slike/omlet.jpg" alt="">
                                </div>
                                <div class="text">
                                    <h5 class="p-1 m-0">OMLET</h5>
                                    <p>(jaja, začini)</p>
                                    <h6 class="p-2 m-0">0KM</h6>
                                </div>
                            </div>
                            <div class="box m-2">
                                <div class="slika">
                                    <img src="../slike/kukuruza.jpg" alt="">
                                </div>
                                <div class="text">
                                    <h5 class="p-1 m-0">KUKURUZA</h5>
                                    <p>(domaće kukuruzno brašno)</p>
                                    <h6 class="p-2 m-0">0KM</h6>
                                </div>
                            </div>
                            <div class="box m-2">
                                <div class="slika">
                                    <img src="../slike/sendvic-salama.jpg" alt="">
                                </div>
                                <div class="text">
                                    <h5 class="p-1 m-0">SENDVIČ</h5>
                                    <p>(samala, pomfrit, salata, namaz)</p>
                                    <h6 class="p-2 m-0">0KM</h6>
                                </div>
                            </div>
                            <div class="box m-2">
                                <div class="slika">
                                    <img src="../slike/hot-dog.jpg" alt="">
                                </div>
                                <div class="text">
                                    <h5 class="p-1 m-0">SENDVIČ</h5>
                                    <p>(hrenovka, pomfrit, salata, namaz)</p>
                                    <h6 class="p-2 m-0">0KM</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <!----------------- Footer ----------------->

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

    </body>

</php>