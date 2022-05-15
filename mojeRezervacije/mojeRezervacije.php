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
    <link rel="stylesheet" href="../admin/rezervacije/rezervacije.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>

    <!--
    <div class="urediRezervaciju bg-dark">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <?php 
            $email = $_SESSION ['email'];                            
            $data = $conn->prepare("SELECT ime, prezime, email, datum, vrijeme, broj_osoba, stanje FROM rezervacija where email = ?");
            $data->execute(array($email));

            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            if($result)
                {
                    foreach($result as $row) {
                        ?>
                <div class="urediBox p-0 text-white p-0">
                    <h3 class="text-center py-3">UREDI REZERVACIJU</h3>



                    <form class="p-3" action="../../includes/urediRezervaciju.inc.php" method="POST">
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
                                    <option>Prihvati</option>
                                    <option>Odbij</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="update">SPREMI PROMJENE</button>
                        </div>

                    </form>

                    <div class="izlaz">
                        <a href="rezervacije.php"><i class="bi bi-x"></i></a>
                    </div>
                </div>
                <?php
                        }
                        }
                    ?>
            </div>
        </div>
    </div>

                    -->





    <div class="mojerezervacije container">
        <h1 class="text-white text-center bg-dark p-5 rounded-bottom">MOJE REZERVACIJE</h1>
        <div class="row d-flex justify-content-center">

            <?php 
            $email = $_SESSION ['email'];                            
            $data = $conn->prepare("SELECT id, ime, prezime, email, datum, vrijeme, broj_osoba, stanje FROM rezervacija where email = ?");
            $data->execute(array($email));

            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            if($result)
                {
                    foreach($result as $row) {
                        ?>
            <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <div
                    class="rezervacija d-flex justify-content-center flex-column align-items-center bg-dark text-white rounded">
                    <h3 class="text-center py-3 w-100 rounded-top" style="background-color: <?php if($row['stanje'] === 'Otkazano' || $row['stanje'] === 'Odbijeno') {
                            echo "red";
                        } 
                        elseif($row['stanje'] === 'na čekanju'){
                            echo "orange";
                        }
                         elseif($row['stanje'] === 'poslan zahtjev za otkazivanje'){
                            echo "blue";
                        }
                        else {
                        echo "green";
                        }?>">
                        MOJA REZERVACIJA
                    </h3>
                    <div class="d-flex justify-content-between align-items-center w-100 p-2">
                        <div class="fw-bold">
                            <p>Ime</p>
                            <p>Prezime</p>
                            <p>Email</p>
                            <p>Datum</p>
                            <p>Vrijeme</p>
                            <p>Broj osoba</p>
                            <p>Stanje</p>
                        </div>
                        <div class="text-center">
                            <?php                 
                                echo "<p>$row[ime]</p>";
                                echo "<p>$row[prezime]</p>";
                                echo "<p>$row[email]</p>";
                                echo "<p>$row[datum]</p>";
                                echo "<p>$row[vrijeme]</p>";
                                echo "<p>$row[broj_osoba]</p>";
                                echo "<p>$row[stanje]</p>";
                        ?>
                        </div>
                    </div>
                    <div class="opcije p-2 d-flex">
                        <?php 
                            if($row['stanje'] === 'Otkazano' || $row['stanje'] === 'Odbijeno') {
                        ?>
                        <form action="../includes/urediRezervaciju.inc.php" method="POST">
                            <button type="submit" name="deleteR" class="btn btn-danger" value="<?= $row['id']; ?>">
                                Izbrisi
                            </button>
                        </form>
                        <?php 
                            }
                            else if($row['stanje'] === 'poslan zahtjev za otkazivanje') {
                                
                        ?>

                        <?php 
                            }
                            else {
                        ?>

                        <a href="otkaziRezervaciju.php?id=<?= $row['id'] ?>" class="btn
                        btn-secondary me-2">Otkaži</a>

                        <?php 
                            }    
                        ?>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>

        </div>
        <a href=" ../index.php" class="btn btn-danger text-decoration-none text-white d-block m-auto"
            style="width:max-content;">Nazad</a>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

    </div>




</body>

</html>