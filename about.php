<?php include "../proses.php" ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== FAVICON ===============-->
   <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--REMIXICONS-->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <!--CSS-->
    <link rel="stylesheet" href="../style.css">
    <title>EKSPLORASI RASA</title>
</head>

<body>
    <!--HEADER-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                EKSPLORASI RASA
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                   <li class="nav__item">
                        <a href="../index.html" class="nav__link active-link">Home</a>
                   </li>

                   <li class="nav__item">
                        <a href="about.php" class="nav__link">Game</a>
                    </li>

                    <li class="nav__item">
                        <a href="admin/makanan.php" class="nav__link">Gallery</a>
                    </li>

                    <li class="nav__item">
                        <a href="admin/makanan.php" class="nav__link">Buy</a>
                    </li>

                    <li class="nav__item">
                        <a href="admin/makanan.php" class="nav__link">News</a>
                    </li>

                    <li class="nav__item">
                        <a href="admin/makanan.php" class="nav__link">Merchandise</a>
                    </li>

                    <li class="nav__item">
                        <a href="admin/makanan.php" class="nav__link">Creator</a>
                    </li>

                    <li class="nav__item">
                        <a href="admin/makanan.php" class="nav__link">Coment</a>
                    </li>

                </ul>

                <!--Close button-->
                <div class="nav__close" id="nav_close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <!--Toogle button-->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i> 
            </div>
        </nav>
    </header>


    <!--==================== ABOUT ====================-->
    

    <!--<div class="wrapper">
        <div class="box">
            <img src="../img/tahutekbaru.jpg" alt="">
            <h3>Tahu Tek</h3>
            <p class="text">asdfghjklmnbvcxzpoiuytrewq</p>
            <button class="btn">Read More</button>
        </div>
        
    </div>-->

    <?php
    if ($resultGame->num_rows > 0) {
        while ($row = $resultGame->fetch_assoc()) {
            
    ?>

    <section class="about section" id="about">
           <div class="about__container container grid">
            <div class="about__data">
                <h2 class="section__title">
                <?php echo $row['judul_game']; ?> 
                     
                </h2>

                <p class="about__description">
                <?php echo $row['detail_game']; ?> 
                </p>

                <p class="about__description">
                <?php echo $row['versi']; ?> 
                </p>

                <p class="about__description">
                <?php echo $row['spesifikasi']; ?> 
                </p>

            </div>

            <div class="about__image">
                <img src="<?php echo $row['foto_game']; ?> " alt="about image" class="about__img">
                <div class="about__shadow"></div>
            </div>
           </div>
        </section>
        
        <?php
        }
    } else {
        echo "0 results";
    }
    $koneksi->close();
    ?>

    <!--FOOTER-->
    <footer class="footer">
        <div class="footer__container container grid">
            <div class="footer__content grid">
                <div>
                    <a href="#" class="footer__logo">Eksplorasi Rasa</a>

                    <p class="footer__description">
                        Board Game Edukasi <br>
                        Petualangan Kuliner Indonesia.
                    </p>
                </div>

                <div class="footer__data grid">
                    <!-- <div>
                        <h3 class="footer__title">About</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">About us</a>
                            </li>

                            <li>
                                <a href="#" class="footer__link">Features</a>
                            </li>   
                        </ul>
                    </div> -->

                    <!-- <div>
                        <h3 class="footer__title">Company</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">FAQs</a>
                            </li>

                            <li>
                                <a href="#" class="footer__link">History</a>
                            </li>   
                        </ul>
                    </div> -->

                    <div>
                        <h3 class="footer__title">About</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="../index.html" class="footer__link">Website</a>
                            </li>

                            <!-- <li>
                                <a href="#" class="footer__link">Support Center</a>
                            </li> -->
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Contact</h3>

                        <ul class="footer__links">
                            <!--<li>
                                <a href="#" class="footer__link">Privacy Policy</a>
                            </li>-->

                            <li>
                                <a href="https://www.instagram.com/hclwaqila/" class="footer__link">Our Social Media</a>
                            </li>   
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__group">
                <div class="footer__social">
                    <!-- <a href="" target="_blank" class="footer__social-link">
                        <i class="ri-facebook-fill"></i>
                    </a> -->

                    <a href="https://www.instagram.com/hclwaqila/" target="_blank" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                    </a>

                    <!-- <a href="https://x.com/sapawargasby" target="_blank" class="footer__social-link">
                        <i class="ri-twitter-x-line"></i>
                    </a> -->

                    <a href="https://www.youtube.com/@fwairyys." target="_blank" class="footer__social-link">
                        <i class="ri-youtube-line"></i>
                    </a>
                </div>

                <span class="footer__copy">
                    &#169; Copyright 2024. Designed by Halwaa
                </span>
            </div>
        </div>
    </footer>

    <!--MAIN JS-->
    <script src="../main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    </body>