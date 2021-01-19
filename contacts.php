<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php";   ?>
<div class="small-container">
<div class="about-us">
<?php  $sql="SELECT * FROM contacts WHERE contactId='1'";
            $contacts=mysqli_query($baglan, $sql);
             $contactsRow=mysqli_fetch_assoc($contacts);  ?>
<h2 class="product-cat-title" >Biziň Telefon Nomerlerimiz</h2>
<br>
<div class="product-row">
<div class="col-4">
<h4><i class="fas fa-mobile-alt fa-2x"></i></h4>
<p style="font-size:18px;"><?php echo $contactsRow['contactTel1']; ?> </p>
</div>
<div class="col-4">
<h4><i class="fas fa-mobile-alt fa-2x"></i></h4>
<p style="font-size:18px;"><?php echo $contactsRow['contactTel2']; ?> </p>
</div>
<div class="col-4">
<h4><i class="fas fa-phone fa-2x"></i></h4>
<p style="font-size:18px;"><?php echo $contactsRow['contactTel3']; ?> </p>
</div>
</div>

<h2 class="product-cat-title">Biziň Salgymyz </h2>
<p><?php echo $contactsRow['contactAddress']; ?>  </p>
</div>
</div>
<?php include "footer.php"    ?>