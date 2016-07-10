<?php 
session_start();
if(!isset($_SESSION['official']) || $_SESSION['official']==NULL){
header('location:../login.php');
}
//unset($_SESSION['error']);

include '../controller/class.main.php';
$bureau=new mainClass();
$rates=$bureau->loadRates();
$currencies=$bureau->loadRoutes();
//var_dump($rates);
include '../save.php';
$error=(isset($errorMessage))?$errorMessage:"";
//var_dump($rates);
if(isset($_GET['query']) && strlen(trim($_GET['query']!="")) ){
$term=$_GET['query'];
header('location:search_result.php?term='.$term);
}
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
<meta content="NMtYstnEFVGKd7Ezu4KY0a9PKebXsNswUHVVswLgsgs=" name="csrf-token">
        <link href="../css/css" rel="stylesheet" type="text/css">
       
<link href="css/css" rel="stylesheet" type="text/css">
   
        <link rel="stylesheet" href="../css/flick/jquery-ui-1.8.16.custom.css" type="text/css" />
        
                <link href="../css/style.css" media="all" rel="stylesheet" type="text/css">
<link href="../font/stylesheet.css" rel="stylesheet" type="text/css" />	
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/modernizr.custom.js" type="text/javascript"></script>
<script src="../js/baaa_jquery.js" type="text/javascript"></script>
<script src="../js/baaa_core.js" type="text/javascript"></script>
        <script>
	$(document).ready(function() {
		
		$(".datepicker").datepicker();
		
		
	});
	</script>
 <style>
 .odd{
 background:#99CCCC;
 }
 
 body { 
	background: url('../img/bg.png') repeat-x;
	}
 </style> 
            
</head>

    <body >
 <div id="main-wrapper" style="padding-top: 47px; background: url('img/bg.png') repeat-x">
 <div id="main-wrapper-header">
 <div class="main-flashes">
</div>
     <header class="main-header">
    <div class="container-fluid">
   
 <nav class="main-nav" style="float:none">
  <ul>
     <li>
        <a href="../index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:-40px" ><center>Visit Main Site</center></a></li>
<li class="js-top-menu-sales"><a href="" fsource="loggedin_Seller_ManageSales" style="color:#FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a></li>
<li class="js-top-menu-sales"><a href="users.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Users  </center>                                     </a>                                </li>
<li><a href="" style="color: #A4C1D9; margin-left:350px">     <center> Hi: <?php echo $_SESSION['official'][0]['username'] ?></center> </a></li>
<li> <a href="../logout.php" style="color: #fff; "><center> Logout</center> </a></li></ul></nav></center> </div>
 </header>
</div>
<div class="main-content" style=" background: url('../img/bg.png') repeat-x" >
<div class="db-container container-fluid" style=" background: url('img/bg.png') repeat-x" ><br/><br/>
<div class="span7" style="margin-left:110px" >

			<div class="visible-desktop" id="icon">
				<img src="../img/icon.png" style="width:50px; height:50px; margin-top:4px" />
			</div>

			<div id="app-name">
				<h1 style="font-size:36px; margin-top:-15px " >Osun State Accident Information System&nbsp;&nbsp;<img src="../img/logo.png" width="50px" height="48px" />
                                              </h1><br/>
                <h2 style="font-size:16px">(Officials Home)</h2><br/>
    <div style=""><img  onClick="history.back()" src="../images/arrow-top.png">Back</div>
 </div>
            </div>
            <br/><br/>
                        <div class="row-fluid" style="width:1300px; padding-right:0px">
                            <div class="span12">
                            <aside class="db-sidebar">
                              <div class="db-sidebar-inner">

                                        <div class="db-search hint--left cf" data-hint="Search">
                                        <form name="frm" action="" >
                                            <input id="query" name="query" type="search" value=""  placeholder="Search">
                                            <input type="image" src="../images/btn-search-icon.png" alt="Go" class="btn-search" style="cursor: default !important;"><br/>
                                       </form> </div>
                                        
                                  <nav class="db-na"><br/><br/><br/>
                                  <p><b>Available Routes</b></p><br/>
                                            <ol style="list-style:circle; padding-left:20px">
                                            <?php foreach($currencies as $currency){ ?>
                                                <li ><a href="" fsource="loggedin_Inbox"><?php echo $currency['currency'] ?></a></li><br/>
                                               <?php } ?> 
                                            </ol>
                                </nav>
                                  </div>
                          </aside>
                          
                                <section class="db-content db-content-conversation-detail">

                                    <header class="db-header header-nobot cf">
                                        <h1 class="with-thumb"> Accident</h1>
                                    </header>

<div class="db-tabs-wrapper">
<form name="childinfo"  method="post"><br/><br/>
 <div style="width:700px; height:600px"><div style="float:left; padding-left:40px">
 <p>Route:&nbsp;</p><select name="route" style="width:300px" ><option value="osun" <?php //echo (isset($param['sex'])&&$param['sex']=='male')?'selected':'' ?>>Osun</option></select><br/><br/><br/>
            <p>Number of dead:&nbsp;</p><select name="dead" style="width:300px" ><option value="paved" <?php //echo (isset($param['sex'])&&$param['sex']=='male')?'selected':'' ?>>Paved</option><option value="earth" <?php //echo (isset($param['sex'])&&$param['sex']=='female')?'selected':'' ?>>Earth</option> </select><br/><br/><br/>
            <p>Number Injured:&nbsp;</p><input type="text" name="injured" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/>
            <br/><br/><br/><br/><br/>
            <center><p style="width:700px; border-bottom:#999999 solid 1px; "><b>Vehicle Involved</b></p></center><br/><br/>
            <p>SUV:&nbsp;</p><input type="text" name="suv" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/>        <p>Bus:&nbsp;</p><input type="text" name="bus" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/>        
             <p>Total:&nbsp;</p><input type="text" name="total" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/>       
            </div>  
             
            <div style="float:right; margin-top:-545px"><p>Casualty:&nbsp;</p><input type="text" name="length" style="width:200px" value="<?php //echo(isset($param['others'])?$param['others']:'');  ?>"><br/><br/><br/>
           <p>Accident Type:&nbsp;</p><select name="state" style="width:200px" ><option value="osun" <?php //echo (isset($param['sex'])&&$param['sex']=='male')?'selected':'' ?>>Osun</option></select><br/><br/><br/>
           <p>Accident Date:&nbsp;</p><input type="text" class="datepicker" placeholder="MM/DD/YYYY"  name="failed_segment"  style="width:200px" value="<?php //echo(isset($param['dob'])?$param['dob']:'');  ?>"/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
           <p>Car:&nbsp;</p><input type="text" name="car" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:200px" ><br/><br/><br/>           <p>Others:&nbsp;</p><input type="text" name="others" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:200px" ><br/><br/><br/> <br/>
           <p><input type="submit"  value="Submit" name="add_accident"  class="btn-standard" style=" width:150px; background: #000033; color:#FFFFFF; padding:10px 20px 10px 20px; "  /></p><br/>
            </div>
            <br/>  
            <br/></div>
              
                   
            </form>


</div>  
 </section>
</div>
</div>
</div>
 </div>
 <?php include '../footer.php' ?>
 </div>
 </div>
</body></html>