<?php 
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']==NULL){
header('location:login.php');
}
//unset($_SESSION['error']);

include '../model/mysql.php';
$main=new mysql();
$routes=$main->loadRoutes();
//$route_list=$routes;

include_once '../pagination/function.php';
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit =10;
$startpoint = ($page * $limit) - $limit; 
//var_dump($routes);
$routz=$main->load_routes($page,$startpoint,$limit);
$pagination=isset($routz['pagination'])?$routz['pagination']:'';
$route_list=$routz['result'];

include '../save.php';
$error=(isset($errorMessage))?$errorMessage:"";
if(isset($_POST['id']) && $_POST['id']=="delete"){
$marked=$_POST['select'];
foreach($marked as $key=>$value){
$main->delete($value, "routes");
 }
 echo '<script> window.location.reload();</script>';
}

if(isset($_GET['query']) && strlen(trim($_GET['query']!="")) ){
$term=$_GET['query'];
header('location:search_result.php?term='.$term);
}
//var_dump($rates);
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
<link href="../pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="../pagination/css/B_Black.css" rel="stylesheet" type="text/css" />
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
 tr th {
color: #CCCCCC;
 border-right: 1px solid #ffffff;
 font-size:11px;
}
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
<a href="" fsource="loggedin_Seller_ManageSales" style="color: #FFFF99; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a>                                </li>
<li class="js-top-menu-sales"><a href="accidents.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Accidents  </center> 
<li class="js-top-menu-sales"><a href="users.php" fsource="loggedin_Seller_ManageSales" style="  border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Users  </center>                                     </li></a>                                
 
<li><a href="" style="color: #A4C1D9; margin-left:200px">     <center> Hi: <?php echo $_SESSION['admin'][0]['username'] ?>                             </center> </a>                            </li>

                             <li> <a href="logout.php" style="color: #fff; ">     <center> Logout                             </center> </a>                            </li>
                          
                      </ul></nav></center>
    </div>
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
                <h2 style="font-size:16px">(Admin Home)</h2>
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
                                        <h1 class="with-thumb">
                                            Routes Information</h1>
                                    </header>

                                    <nav class="db-tabs db-tabs-onpage js-page-tabs">                                </nav>

                                    <div class="db-tabs-wrapper">

                                        <section class="db-conversation-discussion js-page-tab-content js-page-tab-discussion">
                                                <aside class="conversation-action">
                                         <form action="" class="button_to" method="post" name="frm1" >
                                        
    <div style="float:left"> <b>Select State</b> 
    <select name="state" style=" width:200px" >
    <option value="osun" >Osun</option>
    </select> &nbsp;&nbsp; <b>Select Route</b>&nbsp;
    <select name="route" style=" width:300px">
    <?php foreach($routes as $rt){ ?>
    <option value="<?php echo $rt['route_id'] ?>" selected ><?php echo $rt['route_name'] ?></option>
   <?php } ?> 
    </select><input class="btn-standard" name="view_route" style=" background:#120338; color:#FFFFFF" type="submit" value="View Information" title="view route information"></div></form>
  </aside>
<br/><br/>
  </section>        
<article class="conv-message mine" id="message_34686812"><center><?php //echo $error;  ?></center>
<br/>
       

        <div class="msg-body">
           <form name="d_form" action="" method="post" >
     <a href="#" style="float:right" onClick="deleteIt('delete');" ><input class="btn-standard"  style=" background: #CC0000; color:#FFFFFF; margin-left:10px" type="button" value="Delete Selected" title="Delete selected" > </a>&nbsp;&nbsp; <a href="new.php" style="float:right; padding-left:10px"><input class="btn-standard"  style=" background:#120338; color:#FFFFFF" type="button" value="Add New Route" title="Add New "></a>  
        <div >
            </div>
</div><br/><br/>
 </div>
    </article>
<article class="conv-message mine" id="message_34686812">
       
             <div class="msg-body">
          <h4 style="font-size:18px">Routes</h4><br/>
             <div class="msg-body">
         <p>
         <table style="background-color:#FFFFFF; color:#000000; margin-left:-82px; border-color:#FFFFFF "  width="850px" border="2px"  bordercolor="#FFFFFF">
         
         <tr style=" background: #003366; height:30px;  color: #333333; font-size:12px;    "  ><th>Select</th><th>Route Name</th><th>Lenght</th><th>Carriage Width</th><th>Pot Holes</th><th>Surface</th><th>Failed Segment</th><th>Junctions </th><th>Bends</th><th>View Full Detail</th><th>Edit</th></tr>
<?php $i=0;
foreach($route_list as $rt) {  $i++; ?>
<tr style=" height:25px; padding-top:10px" class="<?php echo ($i%2==0)?'odd':''  ?>" ><td><center><input type="checkbox" name="select[]" onClick="tick();" value="<?php echo $rt['route_id'] ?>"></center></td><td>&nbsp;<?php echo $rt['route_name'] ?></td><td><center><?php echo $rt['route_length'] ?>Km</center></td><td><center><?php echo $rt['carriage_width'] ?>M</center></td><td><center><?php echo  $rt['pot_holes'] ?></center></td><td><center><?php echo $rt['surface'] ?></center></td><td><center><?php echo $rt['failed_segment'] ?></center></td><td><center><?php echo $rt['junctions'] ?></center></td><td><center><?php echo $rt['bends'] ?></center></td><td><center><a href="info.php?id=<?php echo $rt['route_id'] ?>"><img src="../images/save.png" /></a></center></td><td><center><a href="edit.php?route_id=<?php echo $rt['route_id'] ?>"><img src="../images/edit.png" /></a></center></td></tr>
<?php } ?> 
         </table><br/>
         <?php 
	   echo isset($pagination)?$pagination:'';//pagination($statement,$limit,$page,(isset($_GET['home_id']))?$_GET['home_id']:NULL); ?><br/>
<input type="hidden" name="ticker" value="" />
<input type="hidden" name="id" value="" />
        </form>
</p>
 </div>
 </div>

        <div class="msg-body">
         <p>
        
</p>
 </div>
 </article>
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