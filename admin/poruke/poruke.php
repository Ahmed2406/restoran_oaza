<?php 
    require_once '../../includes/baza.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/icon/css/all.min.css" />
    <link rel="stylesheet" href="poruke.css" />
    <title>Bootstap 5 Responsive Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fa-solid fa-bowl-food me-2"></i>OAZA</div>
            <div class="list-group list-group-flush my-3">
                <a href="../admin.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="../korisnici/korisnici.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-users me-2"></i>Korisnici</a>
                <a href="../rezervacije/rezervacije.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fa-solid fa-book me-2"></i>Rezervacije</a>
                <a href="../poruke/poruke.php"
                    class="list-group-item list-group-item-action bg-transparent second-text active fw-bold"><i
                        class="fa-solid fa-message me-2"></i>Poruke</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Maroš Ahmed
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Postavke</a></li>
                                <li><a class="dropdown-item" href="#">Odjava</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Poruke</h3>
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table bg-white rounded shadow-sm table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50">#</th>
                                        <th scope="col">Ime</th>
                                        <th scope="col">Prezime</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Poruka</th>

                                        <th scope="col">Opcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                             
                                        $data = $conn->prepare("SELECT id, ime, prezime, email, poruka FROM poruke");
                                        $data->execute();

                                        $result = $data->fetchAll(PDO::FETCH_ASSOC);
                                        if($result) {
                                            foreach($result as $row) {
                                    ?>
                                    <tr class="align-middle">
                                        <th scope="row"><?php echo $row["id"] ?></th>
                                        <td><?php echo $row["ime"] ?></td>
                                        <td><?php echo $row["prezime"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["poruka"] ?></td>

                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="urediRezervaciju.php?id=<?= $row['id']; ?>" class=" nav-link">
                                                <i class="fa-solid fa-comment bg-warning p-2 text-white rounded"></i>
                                            </a>
                                            <form action="../../includes/urediRezervaciju.inc.php" method="POST">
                                                <button type="submit" name="delete" class="btn"
                                                    value="<?= $row['id']; ?>">
                                                    <i class="fa-solid fa-trash bg-danger p-2 text-white rounded"></i>
                                                </button>
                                            </form>
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

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
    </script>
</body>

</html>