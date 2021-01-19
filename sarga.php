<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php";   ?>
 <div class="small-container">

 <h2 class="product-cat-title ">Sebetdäki harytlary sarga</h2>

 <div class="order-header">Müşderiniň salgysy we töleg şertleri </div>
 <div class="order-info-p">
 <form method="POST" action="admin/netting/islem.php" style="width: 70%;">
            <label> Adyňyz: </label>
            <input type="text" name="member_name" placeholder="Ady" size="15" required />
            <label> Familiýaňyz: </label>
            <input type="text" name="member_sname" placeholder="Familiýa" size="15" required />
            <label>   Telefon Nomeriňiz:  </label>
            <input type="text" name="member_tel" placeholder="+993 " size="10" > Salgyňyz :
            <textarea cols="80" rows="5" placeholder="Öý salgyňyz ..." value="address" required="" name="member_adres" ></textarea>
            <label for="email" >e-poçta salgyňyz:</label>
            <input type="text" placeholder="e-poçta salgysy" name="member_email" required />
            </form>
   </div>

 <div class="order-header">Eltip bermek hyzmaty barada </div>
 <div class="order-info-p">- Turkmenpoçta hyzmaty bilen salgyňyza eltip berýäris. Poçta tölegi Mary şäheri üçin 20TMT</div>
 <div class="order-header">Töleg şertleri </div>
 <div class="order-info-p"> <p>1. Harytlaryň tölegini haryt eliňize getirilende nagt görnüşde töläp bilersňiz.</p>
 <p>2. Tölegi Altyn Asyr plastik kartyňyz bilen hem töläp bilersiňiz.</p> 
    </div>
 <div class="order-header">Sargalan harytlar </div>
 <div class="order-info-p" style="text-align:center;">
 <table class="table-bordered"style="width:80%;">
                    
                    <tr class="table-head">
                       <th width="20%">Harydyň ady</th>
                       <th width="10%">Mukdary</th>
                       <th width="15%">Bahasy</th>
                       <th width="15%">Jemi</th>
                       <th width="15%">Düzelt</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                             $total = 0;
                             $total_item = 0;
                             
                       foreach($_SESSION["shopping_cart"] as $keys => $values)
                       {
                    ?>
                    <tr>
                       <td style="text-align: center;"><?php echo htmlspecialchars($values["item_name"]); ?></td>
                       <td style="text-align: center;"><?php echo htmlspecialchars($values["item_quantity"]); ?></td>
                       <td style="text-align: center;"><?php echo htmlspecialchars($values["item_price"]); ?>TMT</td>
                       <td style="text-align: center;"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>TMT</td>
                       <td style="text-align: center;"><a href="sebedim.php?action=delete&product_id=<?php echo htmlspecialchars($values["item_id"]); ?>"><span style="color:red;">Aýyr</span></a></td>
                    </tr>
                    <?php
                                 $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                 $total_item = $total_item + $values['item_quantity'];
                       } 
                    ?>
                    <tr>
                       <td colspan="3" align="right" ><b>Jemi</b></td>
                       <td align="right" style="border-top: 1px solid #ccc;"><b><?php echo number_format($total, 2); ?>TMT</b></td>
                             <td></td>
                         </tr>                    
                         <tr>
                       <td style="text-align: center;"></td>
                       <td style="text-align: center;"></td>
                       <td style="text-align: center;"></td>
                       <td style="text-align: center;"></td>
                       <td style="text-align: center;"></td>
                    </tr>
                         <p style="padding-left: 10px;"> Siziň sebediňizde jemi <?php echo $total_item; ?> haryt bar. </p>
                    <?php
                    }
                    ?>              
                 </table>
</div>
 <div class="order-info-p" style="text-align:left;"><a class="order-btn-send">Harytlary sarga</a> <a class="order-btn-send">Goýbolsun et</a> <a class="order-btn-send">tel: +993 61 877465</a></div>
</div>


<?php include "footer.php"    ?>