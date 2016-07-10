<?php 
@session_start();
include_once 'model/mysql.php';
$main=new mysql();
include 'confirm_login.php';
$error=(isset($errorMessage))?$errorMessage:"";
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="content-script-type" content="text/javascript">
<title>Osun State Accident Information System</title>
<meta content="authenticity_token" name="csrf-param">
 <link href="css/style.css" media="all" rel="stylesheet" type="text/css">
 <style type="text/css">
<!--
.style4 {color: #006600}
.style5 {color: #FF6600}
.style6 {color: #000099}
-->
</style>
</head>

    <body >
        <?php if (isset($errorMessage)){ 
$_SESSION['error']=$error;?>
<script>
window.location.reload();
</script>
<?php } ?>
<section >

                                <div class="popup-content">
<div class="popup-form">
                                    </div>
                                </div>
 </section>
<section class="popup popup-grey popup-user-forms popup-user-login" id="js-popup-user" style="left: 433px; position: absolute; top: 65px; z-index: 9999; opacity: 1; display: block;">

                                <div class="popup-content">

                                   <div style="margin-top:-24px"> <div style="height:30px; background:#120338; border-radius:3px; padding:10px 30px 0 100px; margin-left:-15px; margin-right:-15px; color:#FFFFFF; font-size:18px">Osun State Accident Information System</div><a href="index.php" style="float:right; background:#FFFFFF; color:#990000;  margin-top:-33px; margin-right:-5px; font-size:16px; padding:5px 10px 5px 10px " title="close" ><b>X</b></a> <br/></div>
                                    <div class="popup-content-login" style="display: block;">

                                        <div class="main-message">
                                          
                                          <br/>
                                          <p><small>Officials Login Page</small>                                          </p>
</div>
<div class="popup-form">
<form accept-charset="UTF-8" action="" class="new_user_session" id="session_form" method="post">
<div class="form-errors"> 
 </div>
 <div class="form-row cf">
<div class="label-wrap">
                                                      <label for="user_session_login"> Username</label>
                                                    </div>
                                                    <div class="input-wrap"><input id="user_session_login" maxlength="70" name="username" size="" tabindex="1" title="enter your username" type="text"></div>
                                                </div>

                                                <div class="form-row cf">
                                                    <div class="label-wrap"><label for="user_session_password">Password</label></div>
                                                    <div class="input-wrap"><input id="user_session_password" maxlength="21" name="password"  title="Enter your password"size="" tabindex="2" type="password"></div>
                                                </div>

                                              <div class="">
                                                   <div class="label-wrap" style="margin-left:40px"><?php echo (isset($_SESSION['error']))?'<center>'.$_SESSION['error'].'</center><br/>':''; ?></div>
                                                    <div class="input-wrap"></div>
                                              </div>

                                                <div class="form-row-buttons">
                                                  <p>
                                                 
                                                    
                                                    <input class="btn-standard" style="background:#120338; color:#FFFFFF" id="login-btn" name="login" tabindex="4" type="submit" value="Login">
                                                  
                                                  </p>
                                                  
                                                  <p>&nbsp;  </p>
                                                </div>
</form>
                                        </div>
                                    </div>
</div>
 </section>
 <div class="main-content">
<div class="b-modal __b-popup1__" style="background-color: rgb(0, 0, 0); position: fixed; top: 0px; right: 0px; bottom: 0px; left: 0px; opacity: 0.6; z-index: 9998; cursor: pointer;"></div>
</body></html>