<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php";   ?>
<div class="mid-container">
        <div class="small-container">
            <div class="product-row row-2">
                <h3 class="products-subtitle">Harytlarymyz</h3>
            </div>
            <div class="product-row">
        <?php 
            if(isset($_POST['submit-search'])) {

                $limit = 8;
                $page = @$_GET["page"];
                    if(empty($page) or !is_numeric($page)) {
                        $page = 1;} 
                $search=mysqli_real_escape_string($baglan, $_POST['search']);
                $sql="SELECT * FROM products WHERE product_title LIKE '%$search%' OR product_name LIKE '%$search%'";
                $query=mysqli_query($baglan, $sql);
                $count = mysqli_num_rows($query);  

                $toplamsayfa = ceil($count / $limit);
                $start  = ($page-1)*$limit;
        ?>
    <div><?php echo "Siziň gözleýän harydyňyzdan ".$count." sany bar."; ?></div>
    <br>
    <div class="product-row">
    <?php 
    if ($count>0) {
        $sqlSearch="SELECT * FROM products WHERE product_title LIKE '%$search%' OR product_name LIKE '%$search%' ORDER BY product_title DESC LIMIT $start, $limit";
        $productsor=mysqli_query($baglan, $sqlSearch);
            while ($productcek=mysqli_fetch_assoc($productsor)) { ?>
                <div class="col-4" onclick="location.href='harytlar/<?=seo($productcek['product_title']).'/'.$productcek['product_id']?>';" style="cursor:pointer;">
                    <img src="admin/<?php echo $productcek['product_img']; ?>">
                    <h4 class="item-name"><?php echo $productcek['product_title']; ?> </h4>
                    <p class="item-text"><?php echo $productcek['product_name']; ?></p>
                    <p class="item-price"><?php echo $productcek['product_price']; ?> TMT</p>
                </div>
            <?php } 
        } else {
            echo "Siziň gözleýän harydyňyz tapylmady ...";
            }
    
} ?>
            </div>
            <div class="page-btn">
             
            <?php if($count > $limit) :
 $x = 2;
 $lastP = ceil($count/$limit);
 if($page > 1){
 $onceki = $page-1;
 echo "<a href=\"?page=$onceki\"><span><i class=\"fa fa-arrow-left\"> </i></span> </a>";
 
 }
 // sayfa 1'i yazdir
 if($page==1) echo "<span>1</span>";
 else echo "<a href=\"?page=1\"><span>1</span></a>";
 // "..." veya direkt 2
 if($page-$x > 2) {
 echo "...";
 $i = $page-$x;
 } else {
 $i = 2;
 }
 // +/- $x sayfalari yazdir
 for($i; $i<=$page+$x; $i++) {
 if($i==$page) echo "<span style=\"background:#ff523b;\">$i</span>";  //"<span class=\"sayfa\"><span>$i</span></span>";
 else echo "<a href=\"?page=$i\"><span>$i</span></a>";
 if($i==$lastP) break;
 }
 // "..." veya son sayfa
 if($page+$x < $lastP-1) {
 echo "...";
 echo "<a href=\"?page=$lastP\"><span>$lastP</span></a>";
 } elseif($page+$x == $lastP-1) {
 echo "<a href=\"?page=$lastP\"><span>$lastP</span></a>";
 }
 if($page < $lastP){
 $sonraki = $page+1;
 echo "<a href=\"?page=$sonraki\"><span> <i class=\"fa fa-arrow-right\"> </i></span></a>";
 }
endif;
?>
</div>
            </div>


            
        </div>
    </div>
    <?php   include "footer.php"  ?>