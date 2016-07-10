<?php 
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']==NULL){
//header('location:login.php');
}
//unset($_SESSION['error']);

include '../controller/class.main.php';
$main=new mainClass();
$routes=$main->loadRoutes();
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
.error{
  font-size:18px; color:#006699; font-style:normal; font-stretch:expanded;
}
 </style> 
            
</head>

    <body >
    <script>
function tick(){
document.forms['d_form'].ticker.value="ticked";
}



function deleteIt(selected){
if(document.forms['d_form'].ticker.value !="ticked"){
alert("please select an item");
return false;
}

document.forms['d_form'].ticker.value="";
if(selected=="delete"){
ret=confirm("Are you sure you want to delete this item(s)");
}

if(ret==true){
document.forms['d_form'].id.value=selected;

document.forms['d_form'].submit();//document.getElementById['id'].value);
}else if(ret==false){
window.location.reload();
}

}
</script>
 <div id="main-wrapper" style="padding-top: 47px; background: url('img/bg.png') repeat-x">
 <div id="main-wrapper-header">
 <div class="main-flashes">
</div>
     <header class="main-header">
    <div class="container-fluid">
   
 <nav class="main-nav" style="float:none">
   <ul>
     <li>
                                <a href="../index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:-40px" ><center>Visit Main Site</center></a>                            </li>
<li class="js-top-menu-sales">
<a href="index.php" fsource="loggedin_Seller_ManageSales" style="color: #FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a>                                </li>
<li class="js-top-menu-sales"><a href="accidents.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Accidents  </center> 
<li class="js-top-menu-sales"><a href="users.php" fsource="loggedin_Seller_ManageSales" style="  border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Users  </center>                                     </li></a>                                
 
<li><a href="" style="color: #A4C1D9; margin-left:200px">     <center> Hi: <?php echo $_SESSION['admin'][0]['username'] ?>                            </center> </a>                            </li>

                             <li> <a href="logout.php" style="color: #fff; ">     <center> Logout                             </center> </a>                            </li>
                          
                      </ul></nav></center> </div>
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
                <h2 style="font-size:16px">(Admin Home)</h2><br/>
    <div style=""><img  onClick="history.back()" src="../images/arrow-top.png">Back</div>
    <br/>
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
                                  <p><b>Popular Routes</b></p><br/>
                                            <ol style="list-style:circle; padding-left:20px">
                                            <?php $i=0; foreach($routes as $rt){ if($i<12){ ?>
                                                <li ><a href="<?php echo "accident_info.php?id=".$rt['route_id']; ?>" fsource="loggedin_Inbox"><?php echo $rt['route_name'] ?></a></li><br/>
                                               <?php $i++; }} ?> 
                                            </ol>
                                </nav>
                                  </div>
                          </aside>
                          
                                <section class="db-content db-content-conversation-detail">

                                    <header class="db-header header-nobot cf">
                                        <h1 class="with-thumb"> New User</h1>
                                    </header>

<div class="db-tabs-wrapper"><br/>
<form name="new_user"  method="post">
<center><?php  echo $error ?></center><br/>
            <div style="width:700px; margin-left:220px;">
            <p>Surname:&nbsp;</p><input type="text" name="surname" style="width:400px" value=""><br/><br/><br/>
            <p>Othernames:&nbsp;</p><input type="text" name="othernames" style="width:400px" value=""><br/><br/><br/>
            <p>Username:&nbsp;</p><input type="text" name="username" style="width:400px" value=""><br/><br/><br/>
            <p>Password:&nbsp;</p><input type="password" name="password" style="width:400px" value="">
            <br/><br/><br/>
            <p>Re-type Password:&nbsp;</p><input type="password" name="password2" style="width:400px" value="">
            
            <br/><br/><br/>
             <input type="submit" name="add_user" value="Submit" class="btn-standard" style=" width:150px; background: #000033; margin-left:250px; color:#FFFFFF; padding:10px; ">
            <br/><br/><br/>
 </div>        
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