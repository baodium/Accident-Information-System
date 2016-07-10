<?php 
session_start();
if(!isset($_SESSION['official']) || $_SESSION['official']==NULL){
header('location:../login.php');
}
//unset($_SESSION['error']);

include '../controller/class.main.php';
$main=new mainClass();
$routes=$main->loadRoutes();
$route_list=$routes;
$accidents=$main->load_accident("1");

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
<a href="index.php" fsource="loggedin_Seller_ManageSales" style="color: #FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a>                                </li>
<li class="js-top-menu-sales"><a href="accident.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFFF99; width:150px"><center> Accident  </center>                                     </a>                                </li>
 <li class="js-top-menu-sales"><a href="change_password.php" fsource="loggedin_Seller_ManageSales" style=" border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Change Password  </center>                                     </a>                                </li>
<li><a href="" style="color: #A4C1D9; margin-left:200px">     <center> Hi: <?php echo $_SESSION['official'][0]['username'] ?>     </center> </a></li>
<li> <a href="../logout.php" style="color: #fff; ">     <center> Logout </center> </a></li>
                          
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
				<h1 style="font-size:36px; margin-top:-15px " >Osun State Accident Information System&nbsp;&nbsp;<img src="../img/logo.png" width="50px" height="48px" />
                                               </h1><br/>
                <h2 style="font-size:16px">(Officials Home)</h2><br/>
			</div>
            </div>
            <br/><br/>
                        <div class="row-fluid" style="width:1300px; padding-right:0px">
                            <div class="span12">
                            <aside class="db-sidebar">
                              <div class="db-sidebar-inner">

                                        <div class="db-search hint--left cf" data-hint="Search ">
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
                                            Accidents</h1>
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
    </select><input class="btn-standard" name="view_accidents" style=" background:#120338; color:#FFFFFF" name="view_accidents"  type="submit" value="View Accidents" title="view route information"></div></form>
  </aside>
<br/><br/>
  </section>        
<article class="conv-message mine" id="message_34686812"><center><?php //echo $error;  ?></center>
<br/>
       

        <div class="msg-body">
       <form name="">
     <a href="new_accident.php" style="float:right; padding-left:10px"><input class="btn-standard"  style=" background:#120338; color:#FFFFFF" type="button" value="Add New Accident" title="Add New "></a> &nbsp;&nbsp; 
     </form>
        <div >
            </div>
</div><br/><br/>
 </div>
    </article>
<article class="conv-message mine" id="message_34686812">
       
             <div class="msg-body">
          <h4 style="font-size:18px">Routes Name:&nbsp;<?php echo $accidents[0]['route_name']  ?></h4><br/>
             <div class="msg-body">
         <p>
         <form name="d_form" action="" method="post" >
        <table style="background-color:#FFFFFF; color:#000000; margin-left:-82px; border-color:#FFFFFF "  width="850px" border="2px"  bordercolor="#FFFFFF">
         
          <tr style="background:#003366; height:30px;  color:#FFFFFF; margin-bottom:20px;" >
                        <th style="width:20px; padding-bottom:10px; "><center>select</center></th>
                   		<th style="width:200px; padding-bottom:10px; "><center>Route</center></th>
                     <th style="width:100px; padding-bottom:10px; "><center>Dead</center></th>
                        <th style="width:100px; padding-bottom:10px; "><center>Injured</center></th>
                         <th style="width:150px; padding-bottom:10px; "><center>Vehicle Involved</center></th>
                        <th style="width:100px; padding-bottom:10px; "><center>Total Vehicle</center></th>
                        <th style="width:100px; padding-bottom:10px; "><center>Type</center></th>
                        <th style="width:100px; padding-bottom:10px; "><center>View Full Detail</center></th>
                        <?php if($accidents !=NULL){  $i=0; foreach ($accidents as $accident){ $i++; ?>
                       <tr class=" <?php echo($i%2==0?'odd':'even')  ?>" > 
                       <td><center><input type="checkbox" name="id" value="<?php echo $accident['id']; ?>"></center></td>
                   		<td><center><?php echo $accident['route_name']; ?></center></td>
                       
                     <td><center><?php echo $accident['number_of_dead']; ?></center></td>
                        <td><center><?php echo $accident['number_injured']; ?></center></td>
                        <td><center><?php if($accident['suv']!=0){ echo 'SUV('.$accident['suv'].'),';  }
						if($accident['bus']!=0){ echo 'Bus('.$accident['bus'].'),';  }
						if($accident['salon']!=0){ echo 'Salon('.$accident['salon'].'),';  }
						if($accident['mini']!=0){ echo 'Mini('.$accident['mini'].'),';  }
						if($accident['bicycle']!=0){ echo 'Bicycle('.$accident['bicycle'].'),';  }
						if($accident['others']!=0){ echo 'Others('.$accident['others'].')';  }
						 ?></center></td>
                        <td><center><?php echo $accident['total_vehicle']; ?></center></td>
                        
                        <td><center><?php echo $accident['type']; ?></center></td>
                        <td><center><a href="accident_info.php?id=<?php echo $accident['id']; ?>"><img src="../images/save.png"></center></a></td></tr>
                        <?php } }else{
						echo '<tr><td colspan="9"><br/><center>No accident found for the selected route</center><br/></td></tr>';
						} ?>
         </table><br/><br/>
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