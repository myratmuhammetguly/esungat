<!-- featured products -->
    <h2 class="product-cat-title " style="margin-top: 20px;">Halanan Harytlar</h2>
        <!----product row ---------------->
        <div class="product-row ">      
            <?php 
                $sql="SELECT*FROM products WHERE display_cat='2' ORDER BY product_id DESC limit 4";
                $productsor=mysqli_query($baglan, $sql);
                while ($productcek=mysqli_fetch_assoc($productsor)) { 
                ?>
            <div class="col-4 " onclick="location.href='harytlar/<?=seo($productcek['product_title']).'/'.$productcek['product_id']?>';" style="cursor:pointer;">
                    <?php /*
                    $res=$productcek['product_img'];
                    $res=explode(" ",$res);
                    $count=count($res)-1; */
                    ?>
                 <a><img src="admin/<?php echo htmlspecialchars($productcek['product_img']); ?> "></a>
                <h4 class="item-name "><?php echo htmlspecialchars($productcek['product_title']); ?></h4>
                <p class="item-text"><?php echo htmlspecialchars($productcek['product_name']); ?></p>
                <p class="item-price "><?php echo htmlspecialchars($productcek['product_price']); ?> TMT</p>
            </div>

            <?php } ?>
        </div> 
        <!---- /.product row ---------------->
<!--/featured products-->