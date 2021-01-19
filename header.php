<?php  include "admin/netting/baglan.php"; 
include "admin/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<base href="http://www.esungat.com.tm/" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="eSungat Onlaýn dükany size dürli harytlary elýeter bahadan hödürleýär. Biziň dükanymyzdan saýlan harytlaryňyzy iň tiz möhletde size ýetirýäris. Tölegler nagt hemde plastik kart arkaly alynýar." />
    <meta name="keywords" content="sungat harytlary, telefon pdstawka, bagana telpek, gözellik harytlary, sabyn, salfetka, pomada, pudra, topface gaş tuş, tonalniy, krem, el krem, yüz krem, samawar, ýag çyra" />
    <title>eSungat onlaýn market, gözellik harytlary, gadymy sungat harytlary, telefon postawkalar, el kremi, ýüz kremi, pudra, pomada</title>
    <meta name="author" content="Myrat Muhammetgulyyew">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/all.css" rel="stylesheet">
    <link href="css/solid.css" rel="stylesheet">
    <link href="css/solid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/271553ed8c.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="top-header">
    </div>
    <div class="header">
        <div id="topContainer">
            <div class="navbar">
                <!--top menu -->
                <nav>
                <i class="fas fa-bars" onclick="menutoggle()"></i>
                    <ul id="MenuItems">
                        <li><a href="index.php">Baş sahypa</a></li>
                        <li><a href="products.php">Harytlar</a></li>
                        <li><a href="about.php">Biz barada</a></li>
                        <li><a href="contacts.php">Salgymyz</a></li>
                        <li><a href="sebedim.php">Sebedim</a></li>
                        <li><a href="member_login.php">Hasabym</a></li>
                    </ul>
                </nav>
        <!----searchbar---->
                <div class="wrap">
                <div class="search">
                    <form action="search.php" method="POST" style="width:100%;">
                    <input type="text" class="searchTerm" placeholder="haryt gözle..." name="search" autofocus >
                    <button type="submit" class="searchButton" name="submit-search">
                        <i class="fa fa-search"></i>
                    </button>
                    </form>
                </div>         
                </div>
        <!-----/.searchbar---->
                <!--/top menu
            <div class="top-col-2">
            <?php if(isset($_SESSION['member_id'])) {  echo
            '<span><a href="logout.php"><i class="fas fa-sign-in-alt"></i> Hasabymdan çyk</a></span>'; }
            else {
                echo '<span><a href="member_login.php"><i class="fas fa-sign-in-alt"></i> Içeri gir</a></span>';
            }          
            ?>
                <span><a href="register.php"><i class="fas fa-user-plus"></i>Hasap aç</a></span>
            </div> -->
        </div>
            
    </div>
        <!--/top-container -->
</div>
   