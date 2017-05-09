<?php 

session_start();

if(isset($_GET['offline'])){
    unset($_SESSION['id']);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" media="all and (max-width: 1024px)" href="mini_style.css" />
        <title> comChien&Chat </title>
    </head>
    <body>
        <?php include("structure/header.php") ?>
        <section>
            <article>
                <h1> Bienvenue sur comChien&Chat </h1>
                <h4>
                Notre pension est ouverte toute l'année et s'occupe de ses pensionnaires 7 jours sur 7 </h3>
                <p> 
                    Située idéalement en périphérie de Paris (Val-de-Marne), notre pension canine, féline et rongeurs propose un espace de pension de 250m (150m en intérieur et 100m en extérieur). Notre pension est équipée de cages spécifiques pour chaque espèce. De plus, de nombreux aménagements et équipements sont présents pour satisfaire les besoins de vos animaux.  
                </p>
                <p class="center"><em>Votre animal peut-être placé en groupe ou isolé selon votre choix </em></p>
                <p>
                    Nous assurons à vos animaux une bonne hygiène grâce à un nettoyage quotidien réalisé par notre équipe de professionnels. Des soins spécifiques sont aussi à leur disposition.
                <p>
                <div class="center"><img src="images/index/animaux.png" alt="animaux" height="100"/></div>
                </p>
                <p class="center">
                    <a href="inscription.php"> Inscrivez-vous pour réserver en ligne! </a>
                </p>
            </article>
            <aside>
                <div id="slideshow">
                    <div class="slide">
                        <div class="slid_1"><img src="images/index/chiens.jpg" alt="chiens" height="200" width="350"/></div>
                        <div class="slid_2"><img src="images/index/lapins.jpg" alt="lapins" height="200" width="350"/></div>
                        <div class="slid_3"><img src="images/index/chien.jpg" alt="chien" height="200" width="350"/></div>
                        <div class="slid_4"><img src="images/index/chien2.png" alt="chien2" height="200" width="350"/></div>
                        <div class="slid_5"><img src="images/index/chat.png" alt="chat" height="200" width="350"/></div>
                        <div class="slid_6"><img src="images/index/chat2.jpg" alt="chat2" height="200" width="350"/></div>
                        <div class="slid_7"><img src="images/index/rongeur.jpg" alt="rongeur" height="200" width="350"/></div>
                        <div class="slid_8"><img src="images/index/rongeur2.jpg" alt="rongeur2" height="200" width="350"/></div>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2628.0269477615957!2d2.500244250702264!3d48.80046431263682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60c5988a5d6e9%3A0x37b696dcf92c0dca!2s12+Avenue+des+Lacs%2C+94100+Saint-Maur-des-Foss%C3%A9s!5e0!3m2!1sfr!2sfr!4v1487581322660" width="350" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
            </aside>
        </section>
        <?php include("structure/footer.php") ?>
    </body>
    </hmtl>


