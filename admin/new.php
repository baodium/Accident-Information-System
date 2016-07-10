<?php 
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']==NULL){
//header('location:login.php');
}
include '../controller/class.main.php';
$route=new mainClass();
$routes=$route->loadRoutes();
//var_dump($rates);
include '../save.php';
$error=(isset($errorMessage))?$errorMessage:"";

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
 <a href="../index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:-40px" ><center>Visit Main Site</center></a> </li>
<li class="js-top-menu-sales"><a href="index.php" fsource="loggedin_Seller_ManageSales" style="color: #FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a></li><li class="js-top-menu-sales"><a href="accidents.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Accidents  </center> <li class="js-top-menu-sales"><a href="users.php" fsource="loggedin_Seller_ManageSales" style="  border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Users  </center> </li></a> <li><a href="" style="color: #A4C1D9; margin-left:200px">     <center> Hi: <?php echo $_SESSION['admin'][0]['username'] ?></center> </a></li>

                             <li> <a href="logout.php" style="color: #fff; ">     <center> Logout                             </center> </a>                            </li>
                          
                      </ul></nav>
</center> </div>
 </header>
</div>
<div class="main-content" style=" background: url('../img/bg.png') repeat-x" >
<div class="db-container container-fluid" style=" background: url('img/bg.png') repeat-x" ><br/><br/>
<div class="span7" style="margin-left:110px" >

			<div class="visible-desktop" id="icon">
				<img src="../img/icon.png" style="width:50px; height:50px; margin-top:4px" />
			</div>

			<div id="app-name">
				<h1 style="font-size:36px; margin-top:-15px " >Osun State Accident Information System&nbsp;&nbsp;<img src="../img/logo.png" width="50px" height="50px" style="margin-bottom:-15px" ></h1><br/>
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
                                        <h1 class="with-thumb"> New Route </h1>
                                    </header>

<div class="db-tabs-wrapper">
<center><?php  echo $error; ?></center>
<form name="childinfo"  method="post"><br/><br/>
 <div style="width:750px"><div style="float:left; padding-left:40px; margin-left:50px">
 <p>Route name:&nbsp;</p><input type="text" name="route_name" style="width:300px" value="<?php echo(isset($param['route_name'])?$param['route_name']:'');  ?>"><br/><br/><br/>
            <p>Surface:&nbsp;</p><select name="surface" style="width:300px" ><option value="paved" <?php echo (isset($param['surface'])&&$param['surface']=='paved')?'selected':'' ?>>Paved</option><option value="earth" <?php echo (isset($param['surface'])&&$param['surface']=='earth')?'selected':'' ?>>Earth</option> </select><br/><br/><br/>
            <p>Carriage Width:&nbsp;</p><input type="text" name="carriage_width" value="<?php echo(isset($param['carriage_width'])?$param['carriage_width']:'');  ?>" style="width:300px" ><br/><br/><br/>
            <p>Failed Segment:&nbsp;</p><input type="text"  name="failed_segment"  style="width:300px" value="<?php echo(isset($param['failed_segment'])?$param['failed_segment']:'');  ?>"/><br/><br/><br/>
             <p>Pot Holes:&nbsp;</p><input type="text"  value="<?php echo(isset($param['pot_holes'])?$param['pot_holes']:'');  ?>" name="pot_holes"  style="width:300px" /><br/><br/><br/>
            </div>           
            <div style="float:right; margin-left:10px"><p>Route Length(In Kilometer):&nbsp;</p><input type="text" name="route_length" style="width:300px" value="<?php echo(isset($param['route_length'])?$param['route_length']:'');  ?>"><br/><br/><br/>
           <p>State:&nbsp;</p><select name="state" style="width:300px" ><option value="osun" <?php //echo (isset($param['sex'])&&$param['sex']=='male')?'selected':'' ?>>Osun</option></select><br/><br/><br/>
            
            <p>Junctions:&nbsp;</p><input type="text"  value="<?php echo(isset($param['junctions'])?$param['junctions']:'');  ?>" name="junctions"  style="width:300px" /><br/><br/><br/>
            <p>Bends:&nbsp;</p><input type="text"  value="<?php echo(isset($param['bends'])?$param['bends']:'');  ?>" name="bends"  style="width:300px" /><br/><br/><br/><br/>
           
           <p><input type="submit"  value="Add Route" name="add_route"  class="btn-standard" style=" width:150px; margin-left:150px; background: #000033; color:#FFFFFF; padding:10px 20px 10px 20px; "  /></p><br/>
            </div>
            
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> <br/><br/><br/> <br/><br/><br/> <br/><br/><br/> <br/>
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