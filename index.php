<?php 
require('config.php');


?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/LogoUndana.png">
        <link rel="stylesheet" href="Style/styles1.css">        
        <title>Tracer Study Pascasarjana</title>
    </head>
    <body>
        <header>
            <a href="#" class="logo">Tracer<span>Study.</span></a>
                <ul class="navigation">
                    <li><a href="#banner">Beranda</a></li>
                    <li><a href="#Tentang">Tentang</a></li>
                    <li><a href="#Tutorial">Tutorial</a></li>
                    <li><a href="#Isi Kuesioner">Isi Kuesioner</a></li>  
                </ul>
                <?php if(isset($_SESSION['admin'])): ?>
                    <a href="Admin/profile.php" class="button">Admin</a>
                  <?php endif; ?>
                  <?php if(isset($_SESSION['user'])): ?>
                    <a href="user/profile.php" class="button">User</a>
                  <?php endif; ?>
                  <?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])): ?>
                    <a href="gate/login.php" class="button">login</a>
                  <?php endif; ?> 
                   
        </header>
        <section class="banner" id="banner">
            <div class="content">
                <h2>Selamat Datang!</h2>
                <h3>Tracer Study</h3>
                <p>
                 Selamat datang di Laman Tracer Study. <br>Laman ini diperuntukkan untuk 
                mengelola data <br>hasil tracer study yang dilaksanakan oleh<br>Program Pascasarjana Universitas Nusa Cendana
                </p>
                <a href="#" class="btn">Isi Kuesioner</a>
            </div>
        </section>

        <section class="Tentang" id="Tentang">
            <div class="row">
                <div class="co150">
                    <h2 class="titleText"><span>T</span>entang Tracer Study</h2>
                    <p> <br> Tracer Study adalah studi pelacakan jejak alumni yang dilakukan oleh perguruan tinggi kepada 
                        alumninya dua tahun setelah lulus. Alumni memberikan feedback untuk selanjutnya digunakan oleh Pascasarjana
                        untuk keperluan evaluasi capaian manajemen terhadap proses pembelajaran yang dilakukan. Oleh karena itu, kami sangat 
                        mengharapkan anda untuk mengisi data tracer study secara benar karena data anda sangat berarti
                        bagi Pascasarjana Universitas Nusa Cendana. Data anda akan kami evaluasi untuk melihat tingkat relevansi 
                        lulusan terhadap bidang kerja yang didapat, berapa banyak lulusan yang terserap kedunia kerja,
                        dan apakah lulusan yang dihasilkan telah memenuhi kebutuhan industri di lapangan.Alumninya dua
                        tahun setelah lulus.</p>
                </div>
                <div class="co150">
                    <div class="imgBx">
                        <img src="img/b.jpg">
                    </div>
                </div>
            </div>
        </section>

        <section class="Tutorial" id="Tutorial">
            <div class="title">
                <h2 class="titleText"><span>T</span>utorial</h2>

            </div>
        </section>


        <script type="text/javascript">
            window.addEventListener('scroll', function(){
                const header = document.querySelector('header');
                header.classList.toggle("sticky", window.scrollY > 0);
            });
        </script>
    </body>
    </html>