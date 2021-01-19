<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php"; 

 if(isset($_GET["action"]))
 {
     if($_GET["action"] == "delete")
     {
         foreach($_SESSION["shopping_cart"] as $keys => $values)
         {
             if($values["item_id"] == $_GET["product_id"])
             {
                 unset($_SESSION["shopping_cart"][$keys]);
                 echo '<script>alert("Haryt sepediňizden aýryldy.")</script>';
                 echo '<script>window.location="sebedim.php"</script>';
             }
         }
     }
 }
?>
 <div class="small-container">
<h2 class="product-cat-title ">Sebedim</h2>

<?php include "sebet.php"; ?>



</div>


<?php include "footer.php"    ?>