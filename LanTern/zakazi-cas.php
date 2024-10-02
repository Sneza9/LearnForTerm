<?php
    session_start();
    include('config/konekcija.php');

    if(isset($_SESSION["idKorisnik"]))
    {
        $upit = mysqli_query($kon,"select * from oglasi o inner join korisnici k on o.idKorisnik = k.idKorisnik WHERE o.idOglasa='".$_GET['idOglasa']."'");
        $rezultat = mysqli_fetch_array($upit);
        if(isset($_POST['btnZakaziCas']))
        {
            
            $email=$_POST['emailUcenik'];
            $poruka=$_POST['poruka'];
            
            $profesorEmail=$rezultat['email'];
            $greskePolja=array();
           
            
            if(empty($email))
            {
                $greskePolja['email']="Polje email mora biti popunjeno!";
            }
            
            if(empty($poruka))
            {
                $greskePolja['poruka']="Polje poruka mora biti popunjeno!";
            }
            
            if(count($greskePolja)>0)
            {
                
            }
            else
            {
                mail($profesorEmail,$email,$poruka);
                echo "Uspesno ste poslali poruku";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LanTern</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">

    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/kipso-icons/style.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vegas.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <div class="preloader"><span></span></div>
    <div class="page-wrapper">
        <?php include("sablon/meni.php");?>
        <section class="inner-banner">
            <div class="container">
                <ul class="list-unstyled thm-breadcrumb">
                    <li><a href="#">Oglasi</a></li>
                    <li class="active"><a href="#">Zakaži Čas</a></li>
                </ul>
                <h2 class="inner-banner__title">Zakaži Čas</h2>
            </div> 
        </section>
        
        <section class="contact-one">
            <div class="container">
                <h2 class="contact-one__title text-center">Pošaljite poruku <br>
                    da zakažete čas</h2>
                <form action="" method="post">
					<span>Za: <?php echo $rezultat['email'];?></span>
					
                    <div class="row low-gutters">
                        <div class="col-lg-12">
                            <input type="email" name="emailUcenik" id="emailUcenik" placeholder="Email adresa">
                        </div> 
                        <div class="col-lg-12">
                            <textarea name="poruka" id="poruka" placeholder="Napišite poruku..."></textarea>
                            <div class="text-center">
                                <button type="submit" id="btnZakaziCas" name="btnZakaziCas" class="contact-one__btn thm-btn">Pošalji poruku </button>
                            </div>
							
                        </div> 
                    </div>
                </form>
                <div class="result text-center"></div>
            </div> 
        </section>

        <?php include("sablon/footer.php");?>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/vegas.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- template scripts -->
    <script src="assets/js/theme.js"></script>
    
</body>
</html>

<?php
    }

    else
    {
            header ('location:zabranjen-pristup.php');
    }
?>
