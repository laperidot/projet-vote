<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>linkedin</title>
    <script src="https://kit.fontawesome.com/f31faae043.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Inclure ce script JavaScript dans la section HEAD de votre page d'accueil (index.php) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vote.js" defer></script>

</head>
<body>
    <header>
        <img src="asset/logo-linkedin.png" alt="logo">
        <div>
            <nav >
               <ul>
                 <li><a href="#">A PROPOS</a></li>
                 <li><a href="#">AWARD</a></li>
                 <li><a href="#">CONTACT</a></li>
               </ul>
            </nav> 
        </div>
        <button id="nav-button">PRENDRE SON TICKET D'ENTREE</button>
    </header>


    <main>
        <section id="section1">
            <div class=" one mySlides fade">
              
               <h1>LINKEDIN LOCAL<br> ABIDJAN</h1>
               <p>19 Septembre 2023/Palm Club Abidjan</p>
              <div id="section1-button">
                 <button id="button1-section1">Prend Son Ticket D'entrée</button>
                 <button id="button2-section1">Pass D'entrée 10.000 FCFA</button>
               </div>
            </div>
     
        
        
           <div class=" second mySlides fade">
              <div class="texte">
                <h1> LINKEDIN LOCAL<br> ABIDJAN AWARDS</h1>
                <p>votre évènement inédit dédié à la valorisation<br>
                    de nos expert et influenceurs linkedin </p>
                    <button id="button-second"><h4>JE PASSE AU VOTE</h4></button>
              </div>
            
            
            
           </div>
           <div class="dot"></div>
           <div class="dot"></div>
        </section>



        <section id="section2">
            <div id="first">
                <div>
                 <h1><strong>POURQUOI PARTICIPER A <br><ins>LINKEDIN</ins> LOCAL ABIDJAN</strong></h1>
                   <ul>
                      <li>pour apprendre a trouver un emploi grace à linkedin</li>
                      <li>pour rencontrer nos amis vurtuels et tisser des liens</li>
                      <li>pour comprendre le fonctionnement de linkedin</li>
                      <li>pour s'inspirer du parcours des autres</li>
                   </ul>
                  <p>linkedin local, un concepte créer en Australie approuvée <br> par 
                    linkedin et repris dans plusieurs pays à sa 4eme<br>
                     édition en Cote d'Ivoire.
                  </p>
                 <i class="fa-solid fa-calendar-days" style="color: #f1f6f8;"><h2>SAMEDI 09 <br> SEPTEMBRE 2023</h2></i>
                 <i class="fa-solid fa-location-crosshairs" style="color: #f1f6f8;">PALM CLUB HÔTEL ABIDJAN COCODY</i>
                </div>
                    <img src="asset/groupe.png" alt="groupe">
            </div>
        </section>


        <section id="section3">
            <div class="top1">
               <img src="asset/logo-awards.png" alt="logo-awards" width="30%" height="150px">
               <h1>FAIT LE CHOIX DE TON INFLUENCEUR LINKEDIN LOCAL FAVORIE</h1>              
            </div>

        <div class="setcircle">
            
            <div class="cercleform">
                <a id=quatre href="#section4">
                    <div class="circle">
                        Jeunes<br>Producteurs<br> de Contenus
                    </div>
                </a>
                <img src="asset/1542_Plan de travail 1.png" alt="podium" width="100%" height="200px">
            </div>
            <div class="cercleform">
                <a id=cinq href="#section5">
                    <div class="circle">
                        Créateurs de <br> contenus RH<br> motivation<br> Consultant
                    </div> 
                </a>
                <img src="asset/1542_Plan de travail 1.png" alt="podium" width="100%" height="200px">
            </div>
            <div class="cercleform">
                <a id=six href="#section6">
                    <div class="circle">
                        Coachs<br> & Experts
                    </div>
                </a>
                <img src="asset/1542_Plan de travail 1.png" alt="podium"width="100%" height="200px">
            </div>
            <div class="cercleform">
                <a id=sept href="#section7">
                    <div class="circle">
                        Contributeurs<br> LinkedIn
                    </div>
                </a>
                <img src="asset/1542_Plan de travail 1.png" alt="podium"width="100%" height="200px">
            </div>
        </div>
    </section>
    <section id="section4">
             <div class="top1">
                  <img src="asset/logo-awards.png" alt="logo" width="30%" height="150px">
                  <h1>Jeunes Producteurs De Contenus</h1>
             </div>
            <div class="setcircle">
                 <?php include('./candidat/candidat1.php'); ?>
            </div>
        </section>

        <section id="section5">
            <div class="top1">
                <img src="asset/logo-awards.png" alt="logo" width="30%" height="150px">
                <h1>CREATEURS DE CONTENUE</h1>
            </div>
            <div class="setcircle">
                <?php include('./candidat/candidat2.php'); ?>
            </div>
        </section>
        
        <section id="section6">
            <div class="top1">
                <img src="asset/logo-awards.png" alt="logo" width="30%" height="150px">
                <h1>COACH EXPETS</h1>
                <br><br><br><br>
            </div>
            <div class="setcircle">
                <?php include('./candidat/candidat3.php'); ?>
            </div>
        </section>
        <section id="section7">
            <div class="top1">
                <img src="asset/logo-awards.png" alt="logo" width="30%" height="150px">
                <h1>CONTRIBUTEURS LINKEDIN</h1>
            </div>
            <div class="setcircle">
                <?php
try {
    include "./candidat/candidat4.php"; // Assurez-vous que dbconnect.php configure la connexion à votre base de données

    if (isset($_POST['vote'])) {
        $candidatId = $_POST['id'];

        // Requête SQL pour incrémenter le nombre de points du candidat
        $sql = "UPDATE candidat SET points = points + 1 WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $candidatId);

        if ($stmt->execute()) {
            // Vote réussi, redirigez l'utilisateur vers une page de confirmation ou ailleurs
            header("Location: confirmation.php"); // Remplacez "confirmation.php" par la page de votre choix
            exit();
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Une erreur est survenue lors du vote.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
    }
} catch (mysqli_sql_exception $e) {
    // En cas d'erreur de connexion à la base de données, afficher un message d'erreur
    echo "<script>
        Swal.fire({
            title: 'Erreur!',
            text: 'Une erreur est survenue lors de la connexion à la base de données.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>";
}
?>
</div>
        </section>




        

    </main>
    <footer id="footer">
        <img src="asset/logo-blanc-footer.png" alt="the group">
        <div id="foot">
       
            <div class="contact">
                <h2>contact us</h2>
              <div>
                 <i class="fa-solid fa-phone-volume"></i><p>+225 07 48 42 47 25</p>
              </div>
              <div>
                <i class="fa-solid fa-envelope"></i><p>studiosadinkra@gmail.com</p>
              </div>
              <div class="social">
                <a href="https://facebook.com"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://instagram.com"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="https://twitter.com"><i class="fa-brands fa-square-x-twitter"></i></a>
                <a href="https://linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>
            <div class="info">
                <h2>Information</h2>
                <div>
                    <ul>
                        <li>About Us</li>
                        <li>Services</li>
                        <li>Team</li>
                        <li>Projets</li>
                        <li>Coaching</li>
                    </ul>
                    <ul>
                        <li>Brandblog</li>
                        <li>Feedback</li>
                        <li>Supports</li>
                        <li>Terms & Condition</li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
            <div class="newsletter">
                <h2>Newsletter</h2>
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="Votre Nom" />
                    <input type="text" name="email" placeholder="Votre Email" />
                    <button type="submit">Recevez nos actualités</button>
                </form>
            </div>
            </div>
            <div id="fBottom">
                <span>&copy; X3M Ideas Limited <span id="now"></span>. Politique De Confidentialité</span>
                <span>All Rights Reserved.</span>
            </div>
        </div>
    </footer>
        

        <script>
           let slideIndex = 0;
           showSlides();

          function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) { slideIndex = 1 }
          for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " active";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
          }
        </script>
</body>
</html>