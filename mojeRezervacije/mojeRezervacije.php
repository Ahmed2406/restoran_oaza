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
    <div class="container-fluid px-4">
        
        <?php 
            $email = $_SESSION['email'];
            $stmt = $conn->prepare("SELECT * FROM rezervacija WHERE email = ?");
            $stmt->execute(array($email));
            $row = $stmt->rowCount();
            if($row) {  
        ?>

        <div class="row my-5">
            <h3 class="fs-4 mb-3">Moje rezervacije</h3>
            <div class="col">
                <div class="table-responsive">
                    <table class="table bg-white rounded shadow-sm table-hover text-center">
                        <thead>
                            <tr>
                                <th hidden scope="col" width="50">#</th>
                                <th scope="col">Ime</th>
                                <th scope="col">Prezime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Datum</th>
                                <th scope="col">Vrijeme</th>
                                <th scope="col">Broj osoba</th>
                                <th scope="col">Stanje</th>
                                <th scope="col">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                             
                                $email = $_SESSION ['email'];                            
                                $data = $conn->prepare("SELECT id, ime, prezime, email, datum, vrijeme, broj_osoba, stanje FROM rezervacija where email = ?");
                                $data->execute(array($email));

                                $result = $data->fetchAll(PDO::FETCH_ASSOC);
                                if($result)
                                    {
                                        foreach($result as $row) {
                                            
                            ?>
                            <tr class="align-middle">
                                <th hidden scope="row"><?php echo $row["id"] ?></th>
                                <td><?php echo $row["ime"] ?></td>
                                <td><?php echo $row["prezime"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["datum"] ?></td>
                                <td><?php echo $row["vrijeme"] ?></td>
                                <td><?php echo $row["broj_osoba"] ?></td>
                                <td style="font-weight:bold; color: 
                                            <?php if ($row['stanje'] === 'poslan zahtjev za otkazivanje') {
                                                echo "blue"; }
                                                    elseif ($row['stanje'] === 'Prihvaćeno') {
                                                        echo "green";}
                                                            elseif ($row['stanje'] === 'na čekanju' || $row['stanje'] === 'Odbijen zahtjev za otkazivanje') {
                                                                echo "orange";}
                                                                    elseif ($row['stanje'] === 'Odbijeno' || $row['stanje'] === 'Otkazano') {
                                                                        echo "red";}
                                            ?>">
                                    <?php echo $row["stanje"] ?></td>
                                <td class=" d-flex justify-content-center align-items-center">



                                    <?php 
                                        if($row['stanje'] === 'Otkazano' || $row['stanje'] === 'Odbijeno') {
                                    ?>
                                    <form action="../includes/urediRezervaciju.inc.php" method="POST">
                                        <button type="submit" name="deleteR" class="btn btn-danger"
                                            value="<?= $row['id']; ?>">
                                            Izbrisi
                                        </button>
                                    </form>
                                    <?php 
                                        }
                                        else if($row['stanje'] === 'poslan zahtjev za otkazivanje') {       
                                    ?>

                                    <form action="../includes/urediRezervaciju.inc.php" method="POST">
                                        <button type="submit" name="deleteR" class="btn btn-danger" disabled
                                            value="<?= $row['id']; ?>">
                                            Izbrisi
                                        </button>
                                    </form>

                                    <?php 
                                        }
                                        else if($row['stanje'] === 'Odbijen zahtjev za otkazivanje') {       
                                    ?>

                                    <a href="otkaziRezervaciju.php?id=<?= $row['id'] ?>" class="btn
                                    btn-primary me-2">Otkaži</a>

                                    <?php 
                                        }
                                        else {
                                    ?>

                                    <a href="otkaziRezervaciju.php?id=<?= $row['id'] ?>" class="btn
                                    btn-primary me-2">Otkaži</a>

                                    <?php 
                                        }    
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        }
        else {
        
        ?>
        <div class="row my-5">
            <div class="alert alert-danger text-center" role="alert">
                Trenutno nemate rezervacija!
            </div>
        </div>
        <?php
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