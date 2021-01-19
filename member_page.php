<?php
include "header.php" ;
include "search_bar.php" ;

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: member_page.php");
    exit;
}
?>
    <div class="mid-container">
        <div class="small-container">
        <br>
        <br>
        <br>
            <h4 class="member-welcome">Salam, <b><?php echo htmlspecialchars($_SESSION["member_usname"]); ?></b>. Onlaýn dükanymyza Hoş Geldiňiz!</h4>
            
            <div class="member-menu"> 
            <ul>
                <a href="member_page.php"><li>Meniň hasabym</li></a>
                <a href="sebedim.php"><li>Meniň sebedim</li></a>
                <a href="reset_password.php"><li>Açarsözü täzele</li></a>
                <a href="logout.php"><li>Hasabymdan çyk</li></a>
            </ul>    

            
            </div>
        </div>
    </div>
</div>
    
<?php   include "footer.php"  ?>