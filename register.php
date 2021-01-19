<?php include "header.php"; ?>
<div style="height:30px;"></div>
<?php include "categories.php";   ?>

 <div class="small-container">
<h2 class="product-cat-title ">Hasap Aç</h2>

<div class="form-box-login">

<?php
 
// Define variables and initialize with empty values
$member_usname = $member_pword = $member_pword2 = "";
$member_name = $member_sname = "";
$member_usname_err = $member_pword_err = $member_pword2_err = "";
$member_name_err = $member_sname_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


     if (empty(trim($_POST["member_name"]))) {
    $member_name_err = "Adyňyzy ýazyň."; } 

      if (empty(trim($_POST["member_sname"]))) {
    $member_sname_err = "Familiýaňyzy ýazyň.";} 

    $member_name = trim($_POST['member_name']);
    $member_sname = trim($_POST['member_sname']);
    $member_tel = trim($_POST['member_tel']);
    $member_adres = trim($_POST['member_adres']);
    $member_email = trim($_POST['member_email']);

    // Validate username
    if(empty(trim($_POST["member_usname"]))){
        $member_usname_err = "Login ady ýazyň.";
    }
    else{
        
        $sql = "SELECT member_id FROM members WHERE member_usname = ?";
        
        if($stmt = mysqli_prepare($baglan, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_member_usname);
            $param_member_usname = trim($_POST["member_usname"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $member_usname_err = "Bu login adyna hasap açylan. Başga login ady ýazyň.";
                } else{
                    $member_usname = trim($_POST["member_usname"]);
                }
            } else{
                echo "Ohoo! Bir ýerde bir ýalňyşlyga boldy. Soňrak täzeden synanşyň.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["member_pword"]))){
        $member_pword_err = "Açarsöz oýlanyp ýazyň.";     
    } elseif(strlen(trim($_POST["member_pword"])) < 6){
        $member_pword_err = "Açarsözü iň azyndan 6 harp ýada sandan durmaly.";
    } else{
        $member_pword = trim($_POST["member_pword"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["member_pword2"]))){
        $member_pword2_err = "Açarsözü gaýtadan giriň.";     
    } else{
        $member_pword2 = trim($_POST["member_pword2"]);
        if(empty($member_pword_err) && ($member_pword != $member_pword2)){
            $member_pword2_err = "Açarsözüňiz gabat gelenok.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($member_usname_err) && empty($member_pword_err) && empty($member_pword2_err)){
        
        

        $sql = "INSERT INTO members (member_usname, member_name, member_sname, member_tel, member_adres, member_email, member_pword) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($baglan, $sql)){

            mysqli_stmt_bind_param($stmt, "sssssss", $param_member_usname,  $param_member_name, $param_member_sname, $param_member_tel, $param_member_adres, $param_member_email, $param_member_pword);
            $param_member_usname = $member_usname;
            $param_member_pword = password_hash($member_pword, PASSWORD_DEFAULT); 
            $param_member_name = $member_name;
            $param_member_sname = $member_sname;
            $param_member_tel = $member_tel;
            $param_member_adres = $member_adres;
            $param_member_email = $member_email;
            
            
            if(mysqli_stmt_execute($stmt)){
 
                header("location: member_page2.php");
            } else{
                echo "Ohoo! Bir ýerde bir ýalňyşlyga boldy. Soňrak täzeden synanşyň.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($baglan);
}


?>

            <div class="form-col-2">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="<?php echo (!empty($member_name_err)) ? 'has-error' : ''; ?>">
            <label> Adyňyz: </label>
            <input type="text" name="member_name" placeholder="Ady" size="15" required=""  value="<?php echo $member_name; ?>"/>
            <span class="register-error"><?php echo $member_name_err; ?></span>
            </div>
            <div class="<?php echo (!empty($member_sname_err)) ? 'has-error' : ''; ?>">
            <label> Familiýaňyz: </label>
            <input type="text" name="member_sname" placeholder="Familiýa" size="15" required="" value="<?php echo $member_sname; ?>"/>
            <span><?php echo $member_sname_err; ?></span>
            </div>
            <label>   Telefon Nomeriňiz:  </label>
            <input type="text" name="member_tel" placeholder="+993 " size="10" > Salgyňyz :
            <textarea cols="80" rows="5" placeholder="Öý salgyňyz ..." value="address" required="" name="member_adres" >  
            </textarea>
            </div>
            <div class="form-col-2">
            <div class="<?php echo (!empty($member_usname_err)) ? 'has-error' : ''; ?>">
            <label for="text" >Login ady:</label>
            <input type="text" name="member_usname" required="" value="">
            <span><?php echo $member_usname_err; ?></span>
            </div>
            <label for="email" >e-poçta salgyňyz:</label>
            <input type="text" placeholder="e-poçta salgysy" name="member_email" required="">
            <div class="<?php echo (!empty($member_pword_err)) ? 'has-error' : ''; ?>">
            <label for="psw">Açarsöz:</label>
            <input type="password" name="member_pword" placeholder="açar sözü" required="" >
            <span><?php echo $member_pword_err; ?></span>
            </div>
            <div class="<?php echo (!empty($member_pword2_err)) ? 'has-error' : ''; ?>">
            <label for="psw-repeat">Açarsözi gaýtala:</label>
            
            <input type="password" placeholder="açarsözü gaýtala" name="member_pword2" required="" >
            <span><?php echo $member_pword2_err; ?></span>
            </div>
            <button type="submit" class="registerbtn" name="member-register">Hasap aç</button>
            </form>
            </div>
        </div>
</div>
</div>


<?php include "footer.php"    ?>