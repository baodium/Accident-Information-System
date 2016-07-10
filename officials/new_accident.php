<?php 
session_start();
if(!isset($_SESSION['official']) || $_SESSION['official']==NULL){
header('location:../login.php');
}

include '../controller/class.main.php';
$main=new mainClass();
$routes=$main->loadRoutes();
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
        <link href="../css/css" rel="stylesheet" type="text/css">
       
<link href="css/css" rel="stylesheet" type="text/css">
   
        <link rel="stylesheet" href="../css/flick/jquery-ui-1.8.16.custom.css" type="text/css" />
        
                <link href="../css/style.css" media="all" rel="stylesheet" type="text/css">
<link href="../font/stylesheet.css" rel="stylesheet" type="text/css" />	
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="../js/modernizr.custom.js" type="text/javascript"></script>
<script src="../js/baaa_core.js" type="text/javascript"></script>
        <script>
	$(document).ready(function() {
	$(".datepicker").datepicker();	
	});
	$(document).ready(function() {
	//$(".timepicker").timepicker();	
	});
	</script>
    <script>
	function findType(ele){
	if(isNaN(ele.value)){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> "+ele.name+" field must be numeric");
	return false;
	}
	if(ele.value<0){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> "+ele.name+" field cannot be negative");
	return false;
	}
	var dead=(document.forms['accident'].number_of_dead.value!="")?parseInt(document.forms['accident'].number_of_dead.value):0;
	var injured=(document.forms['accident'].number_injured.value!="")?parseInt(document.forms['accident'].number_injured.value):0;
	if(dead>0){
	document.forms['accident'].accident_type.value="Fatal";
	document.forms['accident'].type.value="Fatal";
	}
	if(dead<1 && injured > 0){
	document.forms['accident'].accident_type.value="Serious";
	document.forms['accident'].type.value="Serious";
	}if(dead<1 && injured<1){
	document.forms['accident'].accident_type.value="Minor";
	document.forms['accident'].type.value="Minor";
	}
	var casualty=(dead+injured);
	document.forms['accident'].casuality.value=casualty;
	document.forms['accident'].dead.value=dead;
	document.forms['accident'].injured.value=injured;
	document.forms['accident'].casualty.value=casualty;
	}
	
	function findTotal(ele){
	if(isNaN(ele.value)){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> "+ele.name+" field must be numeric");
	return false;
	}
	
	if(ele.value<0){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> "+ele.name+" field cannot be negative");
	return false;
	}
	var suv=(document.forms['accident'].suv.value!="")?parseInt(document.forms['accident'].suv.value):0;
	var bus=(document.forms['accident'].bus.value!="")?parseInt(document.forms['accident'].bus.value):0;
	var salon=(document.forms['accident'].salon.value!="")?parseInt(document.forms['accident'].salon.value):0;
	var bicycle=(document.forms['accident'].bicycle.value!="")?parseInt(document.forms['accident'].bicycle.value):0;
	var mini=(document.forms['accident'].mini.value!="")?parseInt(document.forms['accident'].mini.value):0;
	var others=(document.forms['accident'].others.value!="")?parseInt(document.forms['accident'].others.value):0;
	var total=(suv+bus+salon+bicycle+mini+others);
	document.forms['accident'].total.value=total;
	document.forms['accident'].total_vehicle.value=total;
	}
	
	function doSubmit(){

	
	//alert("here");
	//console.log(document.forms['accident']);
	var dead= document.forms['accident'].number_of_dead.value;
	var injured= document.forms['accident'].number_injured.value;
	
	if(dead==""){
	//alert(dead);
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> number_of_dead field cannot be empty");
	return false;
	}
	if(isNaN(dead)){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> number_of_dead field must be numeric");
	return false;
	}
	
	if(injured==""){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> number_injured field cannot be empty");
	return false;
	}
	if(isNaN(injured)){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> number_injured field must be numeric");
	return false;
	}
	if(document.forms['accident'].date.value==""){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'> date field cannot be empty");
	return false;
	}
	
    var suv=(document.forms['accident'].suv.value!="")?parseInt(document.forms['accident'].suv.value):0;
	var bus=(document.forms['accident'].bus.value!="")?parseInt(document.forms['accident'].bus.value):0;
	var salon=(document.forms['accident'].salon.value!="")?parseInt(document.forms['accident'].salon.value):0;
	var bicycle=(document.forms['accident'].bicycle.value!="")?parseInt(document.forms['accident'].bicycle.value):0;
	var mini=(document.forms['accident'].mini.value!="")?parseInt(document.forms['accident'].mini.value):0;
	var others=(document.forms['accident'].others.value!="")?parseInt(document.forms['accident'].others.value):0;
	var total=(suv+bus+salon+bicycle+mini+others);
	
	if(isNaN(total) || total<1){
	document.getElementById('error').innerHTML=("<img src='../images/warning.png'>Total vehicle must be numeric and greater than 1");
	return false;
	}
	var dead=(document.forms['accident'].number_of_dead.value!="")?parseInt(document.forms['accident'].number_of_dead.value):0;
	var injured=(document.forms['accident'].number_injured.value!="")?parseInt(document.forms['accident'].number_injured.value):0;

	document.forms['accident'].casualty.value=dead+injured;
document.forms['accident'].submit();
	
	}
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
<li class="js-top-menu-sales"><a href="accident.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Accidents  </center> 
<li class="js-top-menu-sales"><a href="change_password.php" fsource="loggedin_Seller_ManageSales" style=" border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Change Password </center>                                     </li></a>                                
 
<li><a href="../logout.php" style="color: #A4C1D9; margin-left:200px">     <center> Hi: <?php echo $_SESSION['official'][0]['username'] ?>                             </center> </a>                            </li>

                             <li> <a href="" style="color: #fff; ">     <center> Logout                             </center> </a>                            </li>
                          
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
				<h1 style="font-size:36px; margin-top:-15px " >Osun State Accident Information System&nbsp;&nbsp;<img src="../img/logo.png" width="50px" height="48px" /></h1><br/>
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
                                        <h1 class="with-thumb">New Accident</h1>
                                    </header>

<div class="db-tabs-wrapper">
<form name="accident"  method="post" action="../save.php"  ><br/>
<center><div id="error" class="error"><?php echo $error ?></div></center><br/>
 <div style="width:700px; height:630px"><div style="float:left; padding-left:100px">
 <p>Route:&nbsp;</p><select name="route_id" style="width:300px" ><?php foreach($routes as $rt){ ?>
    <option value="<?php echo $rt['route_id'] ?>" selected ><?php echo $rt['route_name'] ?></option>
   <?php } ?></select><br/><br/><br/>
            <p>Number of dead:&nbsp;</p><input type="text" name="number_of_dead" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px"  onChange="findType(this);"><br/><br/><br/>
            <p>Number Injured:&nbsp;</p><input type="text" name="number_injured" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" onChange="findType(this);" /><br/><br/><br/>
            <br/><br/><br/><br/><br/>
            <center><p style="width:650px; border-bottom:#999999 solid 1px; "><b>Vehicles Involved</b><br/></p></center><br/><br/>
            <p>SUV:&nbsp;</p><input type="text" name="suv" onChange="findTotal(this);" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/>        <p>Bus:&nbsp;</p><input type="text" name="bus" onChange="findTotal(this);" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/> 
            <p>Salon:&nbsp;</p><input type="text" name="salon" onChange="findTotal(this);" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:300px" ><br/><br/><br/>       
             <p>Total Vehicle:&nbsp;</p><input type="text" name="total" disabled value="" style="width:300px; background:#F5F5F5" style="width:300px" ><br/><br/><br/>       
            </div>  
             
            <div style="float:right; margin-top:-620px; margin-right:-40px"><p>Casualty:&nbsp;</p><input type="text" name="casuality" disabled value="" style="width:230px; background:#F5F5F5" ><br/><br/><br/>
           <p>Accident Type:&nbsp;</p><input type="text" name="accident_type"  disabled value="" style="width:230px; background:#F5F5F5" ><br/><br/><br/>
           <p>Accident Date:&nbsp;</p><input type="text" class="datepicker" placeholder="MM/DD/YYYY"  name="date"  style="width:230px"  /></p><br/><br/>
           <p>Accident Time:&nbsp;</p><input type="time" name="time" required min="00:01" max="23:59"   value="00:00" /><br/><br/><br/><br/><br/><br/>
           <p>Mini:&nbsp;</p><input type="text" name="mini" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" onChange="findTotal(this);" style="width:230px" ><br/><br/><br/>           <p>Bicycle:&nbsp;</p><input type="text" name="bicycle"  onChange="findTotal(this);" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:230px" ><br/><br/><br/>
           <p>Others:&nbsp;</p><input type="text" name="others" onChange="findTotal(this);" value="<?php //echo(isset($param['birth_place'])?$param['birth_place']:'');  ?>" style="width:230px" ><br/><br/><br/> <br/>
          
           <p><input type="button" onClick="doSubmit();"; value="Submit" name="add"  class="btn-standard" style="margin-left:73px; width:150px; background: #000033; color:#FFFFFF; padding:10px 20px 10px 20px; "  />
           
           </p><br/>
            </div>
            <input type="hidden" name="add_accident" value="yes" />
             
             <input type="hidden" name="type" />
           
           <input type="hidden" name="casualty" />
           <input type="hidden" name="total_vehicle" /> 
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