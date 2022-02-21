<?php
	require_once '../includes/baza.php';
    session_start();

    if(!isset($_SESSION['email']))
    {
        header("location: ../index.php?error=Prvoseprijavite");
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
    <link rel="stylesheet" href="rezervacija.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>


    <div class="rezervacija">
        <div class="container">
            <div class="row d-flex align-items-center m-0" style="height: 100vh;">
                <div class="col-md-6 jedan p-0 text-white p-0">
                    <h3 class="text-center py-3">REZERVACIJA</h3>
                    <form class="p-3" action="../includes/rezervacija.inc.php" method="POST">
                        <?php 
                            $email = $_SESSION ['email'];                            
                            $data = $conn->prepare("SELECT ime, prezime, email, datum, vrijeme, broj_osoba FROM rezervacija where email = ?");
                            $data->execute(array($email));

                            $row = $data->fetch(PDO::FETCH_ASSOC);
                            
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
                                <option value=" 1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                                <option value="3">5</option>
                                <option value="3">5+</option>
                            </select>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="submit">REZERVIŠI</button>
                        </div>

                    </form>
                    <div class="izlaz">
                        <a href="../index.php"><i class="bi bi-x"></i></a>
                    </div>
                </div>


                <div class="col-md-6">

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