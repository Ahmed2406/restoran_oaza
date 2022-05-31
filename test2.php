<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" class="kontakt-forma">
        <input type="text" id="ime" placeholder="Unesite ime">
        <input type="text" id="prezime" placeholder="Unesite prezime">
        <input type="email" id="email" placeholder="Unesite email">
        <input type="text" id="poruka" placeholder="Unesite poruku">


        <button type="submit">Send email</button>
    </form>


    <script src="https://smtpjs.com/v3/smtp.js"></script>

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

</html>