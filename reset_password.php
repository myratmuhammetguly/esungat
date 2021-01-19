<?php
include "header.php" ;
include "search_bar.php" ;

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Täze açar sözü ýazyň.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Açarsözü iň azyndan 6 harpdan durmaly.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Täze açarsözü gaýtadan ýazyň.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Açarsözü deň gelenok.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE members SET member_pword = ? WHERE member_id = ?";
        
        if($stmt = mysqli_prepare($baglan, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["member_id"];

            if(mysqli_stmt_execute($stmt)){
                session_destroy();
                header("location: member_page.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($baglan);
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
            <div class="form-col-2">
        <h2>Açarsözüni täzele</h2>
        <br>
        <p>Açarsözüni täzelemek üçin täze açarsözü giriň.</p>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Täze açarsöz</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Açarsözü gaýtala</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="registerbtn" value="Açarsözü täzele" style="width:40%;">
                <a style="padding-left:2rem;"href="member_page.php">Goýbolsun etmek</a>
            </div>
        </form>
        <br>
        <br>
    </div> 
        </div>
    </div>
</div>
    
<?php   include "footer.php"  ?>