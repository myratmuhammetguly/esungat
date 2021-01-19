<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php";   ?>
<div class="small-container">
<div class="about-us">
<?php
        $sql="SELECT*FROM aboutus WHERE aboutId='1'";
            $productsor=mysqli_query($baglan, $sql);
             $productcek=mysqli_fetch_assoc($productsor); ?>
<h2><?php echo $productcek['aboutTitle']; ?></h2>
<br>
<p><img src="admin/<?php echo $productcek['aboutImg']; ?>" alt="" style="width:600px; height:200px;"></p> 
<br>
<p><?php echo $productcek['aboutText']; ?></p>
</div>
</div>
<?php include "footer.php"    ?>