<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php"; 

// add to shopping cart

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["product_id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["product_id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Haryt siziň sebediňizde bar.")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["product_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

// product details
$product_id=$_GET['product_id']; 
$sql="SELECT*FROM products WHERE product_id='$product_id'";
$productsor=mysqli_query($baglan, $sql);
$productcek=mysqli_fetch_assoc($productsor);

$product_hit=$productcek['product_hit'];
$product_hit++;
$product_hit=mysqli_query($baglan, "UPDATE products SET product_hit='".$product_hit."' WHERE product_id='$product_id'");
?>
<!--single product detail -->
<div class="small-container single-product">
<br>
<br>
        <div class="product-row">
        <br>
            <br>
            <div class="col-2">
                <?php /* // 4 surat goymak ucin
                $i=0;
                $fire=mysqli_query($baglan, $sql);
                $data=mysqli_fetch_array($fire);
                $res=$data['product_img'];
                $res=explode(" ",$res);
                $count=count($res)-1; */?>
                
                <img src="admin/<?php echo htmlspecialchars($productcek['product_img']);  ?>" id="ProductImg" width="100%">
                <div class="small-img-row">
                <?php  /*  // asakdaky 4 kici surat ucin
                for ($i=0;$i<$count; ++$i) {  ?> 
    <div class="small-img-col">
    <img src="admin/uploads/<?=$res[$i]?>" class="small-img" width="100%"/> 
    </div>
    <?php 
}   */  ?>

                </div>
            </div>
            <div class="col-2">
            <?php
				$query = "SELECT * FROM products WHERE product_id='$product_id'";
				$result = mysqli_query($baglan, $query);
				if(mysqli_num_rows($result) > 0)
				{
					$row = mysqli_fetch_assoc($result);			
				?>
			<div class="col-md-4">
				
                <form method="post" action="product_details.php?action=add&product_id=<?php echo htmlspecialchars($row["product_id"]); ?>">
                
                <p><a href="products.php">Harytlar</a> / <?php echo htmlspecialchars($row['product_title']);  ?></p>
                <h1><?php echo $row['product_name']; ?></h1>
                <p class="item-price"><?php echo $row['product_price']; ?> TMT</p>
                <input type="hidden" name="hidden_name" value="<?php echo htmlspecialchars($row["product_name"]); ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo htmlspecialchars($row["product_price"]); ?>" />
                <input type="number" name="quantity" value="1">
                <button class="top-row-btn" name="add_to_cart" type="submit" style="border:none;">Satyn al</button>
                <h3>Haryt barada <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo htmlspecialchars($row['product_text']); ?></p>
                </form>
                    <br>
                    <div class="product-detail-phone">
                        <p><b><i class="fas fa-mobile-alt fa-lg"></i></b> +993 61 877465 </p>
                        <br>
                        <p><b><i class="fas fa-mobile-alt fa-lg"> </i></b> +993 61 877230 </p>
                        <br>
                        <p><b><i class="fa fa-phone"></i></b> 8 522 1-08-13</p>
                    </div>
                    
			</div>
			<?php
					
				}
			?>
            </div>
        </div>
    </div>
    <!--------title------>
    <div class="small-container">
        <div class="product-row products-other">
            <h3 class="product-cat-title2">Beýleki harytlar</h3> 
        </div>
    </div>
    <!---------hit products------>
    <div class="small-container">
        <div class="product-row">
            <?php 
            $sql="SELECT * FROM products ORDER BY product_hit LIMIT 4";
            $productsor=mysqli_query($baglan, $sql);
            while ($productcek=mysqli_fetch_assoc($productsor))   { ?>

            <div class="col-4" onclick="location.href='harytlar/<?=seo($productcek['product_title']).'/'.$productcek['product_id']?>';" style="cursor:pointer;">
            <?php /* $res=$productcek['product_img'];
                $res=explode(" ",$res);
                $count=count($res)-1;    */ ?>
            
            <img src="admin/<?php echo htmlspecialchars($productcek['product_img']); ?>">
                <h4 class="item-name"><?php echo htmlspecialchars($productcek['product_title']); ?> </h4>
                <p class="item-text"><?php echo htmlspecialchars($productcek['product_name']); ?></p>
                <p class="item-price"><?php echo htmlspecialchars($productcek['product_price']); ?> TMT</p>
            </div>
<?php } ?>
        </div>
    </div>
    <?php include "footer.php"  ?>