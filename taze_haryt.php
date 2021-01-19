<!--Latest products-->
<h2 class="product-cat-title ">Täze harytlar</h2>
    <!------product row ------>
    <div class="product-row ">
            
        <?php
        $sql="SELECT*FROM products WHERE display_cat='1' ORDER BY product_date DESC limit 8";
            $productsor=mysqli_query($baglan, $sql);
            while ($productcek=mysqli_fetch_assoc($productsor)) { ?>

            <div class="col-4"  onclick="location.href='harytlar/<?=seo($productcek['product_title']).'/'.$productcek['product_id']?>';" style="cursor:pointer;">
                <span class="discount-badge">Täze</span>
            <?php /*
                $res=$productcek['product_img'];
                $res=explode(" ",$res);
                $count=count($res)-1;  */ ?>
                <img src="admin/<?php echo htmlspecialchars($productcek['product_img']); ?> ">
                <h4 class="item-name "><?php echo htmlspecialchars($productcek['product_title']); ?></h4>
                <p class="item-text"><?php echo htmlspecialchars($productcek['product_name']); ?></p>
                <p class="item-price "><?php echo htmlspecialchars($productcek['product_price']); ?> TMT</p>
            </div>
            <?php } ?>
            
    </div>
    <!------./product row ------>
        
</div> <!------/. small container ---->