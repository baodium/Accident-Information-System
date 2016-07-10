
<?php
session_start();
if(!isset($_SESSION['official']) || $_SESSION['official']==NULL){
header('location:../login.php');
}
if(!($id=$_GET['id'])){
header('location:index.php');
}
include '../model/mysql.php';
$main=new mysql();
if(!($accident=$main->load_an_accident($id))){
header('location:index.php');
}
$routes=$main->loadRoutes();
$accident= $accident[0];

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
                                <a href="../index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:-40px" ><center>Visit Main Site</center></a>                            </li>
<li class="js-top-menu-sales">
<a href="index.php" fsource="loggedin_Seller_ManageSales" style="color: #FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a>                                </li>
<li class="js-top-menu-sales"><a href="accident.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Accident  </center>                                     </a>                                </li>
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
                                        <form name="search" action="" >
                                            <input id="query" name="query" type="search" value=""  placeholder="Search">
                                            <input type="image" src="../images/btn-search-icon.png" alt="Go" class="btn-search" style="cursor: default !important;"><br/>
                                            
                                       </form> </div>
                                       
                                  <nav class="db-na"><br/><br/><br/>
                                  <p><b>Popular Routes</b></p><br/>
                                            <ol style="list-style:circle; padding-left:20px">
                                            <?php $i=0; foreach($routes as $rt){ if($i<12){ ?>
                                                <li ><a href="" fsource="loggedin_Inbox"><?php echo $rt['route_name'] ?></a></li><br/>
                                               <?php $i++; }} ?> 
                                            </ol>
                                </nav>
                                  </div>
                          </aside>
                          
                                <section class="db-content db-content-conversation-detail">

                                    <header class="db-header header-nobot cf">
                                        <h1 class="with-thumb">Accident Information</h1>
                                    </header>

<div class="db-tabs-wrapper">
<center><div id="info" style="width:620px; font-size:20px; "><br/>
					<br/><br/>	
                    <table>
                    <tr><td colspan="2" style="font-size:24px" > <b>Accident Detail</b><br/><br/><br/></td></tr>
                    <tr ><td style="width:200px"><p style="margin-bottom:15px">Route Name:</p></td><td><p><?php echo $accident['route_name'] ?></p></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Accident Date:</p></td><td><p><?php echo $accident['date'] ?></p></td></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Accident Time:</p></td><td><p><?php echo $accident['time'] ?></p></td></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Dead:</p></td><td><p><?php echo $accident['number_of_dead'] ?></p></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Injured:</p></td><td><p><?php echo $accident['number_injured'] ?></p></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Total Casualty :</p></td><td><p><?php echo $accident['casualty'] ?></p></tr>
                      <tr ><td style="width:200px"><p style="margin-bottom:15px">Vehicles Involved :</p></td><td><p> <?php if($accident['suv']!=0){ echo 'SUV('.$accident['suv'].'),';  }
						if($accident['bus']!=0){ echo 'Bus('.$accident['bus'].'),';  }
						if($accident['salon']!=0){ echo 'Salon('.$accident['salon'].'),';  }
						if($accident['mini']!=0){ echo 'Mini('.$accident['mini'].'),';  }
						if($accident['bicycle']!=0){ echo 'Bicycle('.$accident['bicycle'].'),';  }
						if($accident['others']!=0){ echo 'Others('.$accident['others'].')';  }
						 ?></p></tr>
					
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Total Vehicle Involved:</p></td><td><p><?php echo $accident['total_vehicle'] ?></p></td></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Accident Status:</p></td><td><p><?php echo $accident['type'] ?></p></td></tr>
                   <tr><td colspan="2"><br/><hr/><br/></td></tr>
                   <tr><td colspan="2" style="font-size:24px" > <b>Road Status as at time of the Accident</b><br/><br/><br/></td></tr>
                   <tr ><td style="width:200px"><p style="margin-bottom:15px">Pot Holes:</p></td><td><p><?php echo $accident['pot_holes'] ?></p></td></tr>
                    <tr> <td style="width:200px"><p style="margin-bottom:15px">Route Length:</p></td><td><p><?php echo $accident['route_length'] ?>km</p></td></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Surface:</p></td><td><p><?php echo $accident['surface'] ?></p></td></tr>
                    <tr ><td style="width:200px"><p style="margin-bottom:15px">Junctions:</p></td><td><p><?php echo $accident['junctions'] ?></p></td></tr>
                    <tr ><td style="width:200px"><p style="margin-bottom:15px">Bends:</p></td><td><p><?php echo $accident['bends'] ?></p></td></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px" >Carriage Width:</p></td><td><p><?php echo $accident['carriage_width'] ?>m</p></td></tr>
                     <tr ><td style="width:200px"><p style="margin-bottom:15px">Failed Segment:</p></td><td><p><?php echo $accident['failed_segment'] ?></p></td></tr>
                    </table>
					<p></p></div></center><br/><br/><br/><br/>
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