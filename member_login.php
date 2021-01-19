<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php"; 


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: member_page.php");
    exit; }

// Define variables and initialize with empty values
$member_usname = $member_pword = "";
$member_usname_err = $member_pword_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["member_usname"]))){
        $member_usname_err = "Login adyňyzy ýazyň!";
    } else{
        $member_usname = trim($_POST["member_usname"]);
    }
    
    if(empty(trim($_POST["member_pword"]))){
        $member_pword_err = "Açarsözü ýazyň!";
    } else{
        $member_pword = trim($_POST["member_pword"]);
    }

    if(empty($member_usname_err) && empty($member_pword_err)){
        // Prepare a select statement
        $sql = "SELECT member_id, member_usname, member_pword FROM members WHERE member_usname = ? ";
        
        if($stmt = mysqli_prepare($baglan, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_member_usname);

            $param_member_usname = $member_usname;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $member_id, $member_usname, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($member_pword, $hashed_password)){                         
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["member_id"] = $member_id;
                            $_SESSION["member_usname"] = $member_usname;                            
 
                            header("location: member_page.php");
                        } else{
                            $member_pword_err = "Açarsözü nädogry!";
                        }
                    }
                } else{
                    $member_usname_err = "Login adyňyz nädogry!";
                }
            } else{
                echo "Ohoow. Bir kemçilik ýüze çykdy. Soňrak täzeden synanyp görüň!";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($baglan);
}
?>

<div class="small-container">
<h2 class="product-cat-title">Hasabyňa Gir</h2>
        <div class="form-box">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="input-group" method="POST">
            <div class="form-col-2 <?php echo (!empty($member_usname_err)) ? 'has-error' : ''; ?>">
                <label for="login-name">Hasap adyňyz ýa-da e-poçta adresiňiz:</label>
                <input type="text" class="input-field" placeholder="hasap ady" required="" name="member_usname" value="<?php echo $member_usname; ?>" >
                <span class="register-error"><?php echo $member_usname_err; ?></span>
            </div>
            <div class="form-col-2 <?php echo (!empty($member_pword_err)) ? 'has-error' : ''; ?>">
                <label for="login-password">Açarsöz:</label>
                <input type="password" class="input-field" placeholder="açar söz" required="" name="member_pword">
                <span class="register-error"><?php echo $member_pword_err; ?></span>
            </div>
            <div class="login-checkbox">
            <input type="checkbox" class="login-checkbox">
            <span>Açar sözümi ýatda sakla</span>
            <p>Hasabyňyz ýok bolsa <a href="register.php"><b>şu ýerden</b></a> täze hasap açyň.</p>
</div>
            <button type="submit" class="registerbtn">Içeri gir</button>
        </form>
        </div>
</div>

<?php include "footer.php"  ?>