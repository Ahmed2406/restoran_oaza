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

    <!-- CSS -->
    <link rel="stylesheet" href="registracija.css">
    <link rel="stylesheet" href="../css/icon/css/all.min.css" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Comforter&family=Courgette&family=Creepster&family=Gloria+Hallelujah&family=Marck+Script&family=Playfair+Display+SC:wght@700&family=Rammetto+One&family=Sofia&family=Ultra&display=swap');
    </style>

    <title>Oaza</title>
</head>

<body>
    <div class="registracija">
        <div class="container">
            <div class="row d-flex align-items-center m-0" style="height: 100vh;">
                <div class="col-md-6 box p-0 text-white p-0">
                    <h3 class="text-center py-3">REGISTRACIJA</h3>

                    <form class="p-3" action="../includes/registracija.inc.php" method="POST">
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" required>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control" id="perzime" name="prezime"
                                    placeholder="Prezime" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="broj_telefona" name="broj_telefona" placeholder="Broj telefona" required>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <input type="password" class="form-control" id="lozinka" name="lozinka"
                                    placeholder="Lozinka" required>
                            </div>
                            <div class="mb-4 col-lg-6">
                                <input type="password" class="form-control" id="potvrda_lozinke" name="potvrda_lozinke"
                                    placeholder="Potvrda lozinke" required>
                            </div>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn text-white" type="submit" name="submit">REGISTRUJ SE</button>
                        </div>
                        <p class="text-center text-white-50 m-0"><small>Već ste se registrovali?</small></p>
                        <a class="text-decoration-none d-block text-center text-white m-0"
                            href="../prijava/prijava">Prijavi se!</a>
                    </form>
                    <div class="izlaz">
                        <a href="../index"><i class="bi bi-x"></i></a>
                    </div>
                </div>


                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>



    <!-- javaScript -->
    <script src="../javaScript/javaScript.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>