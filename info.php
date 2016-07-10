<?php
if(!($id=$_GET['id'])){
header('location:index.php');
}
include 'model/mysql.php';
$main=new mysql();
if(!($route=$main->loadRoute($id))){
header('location:index.php');
}

$route= $route[0];
?>

<!DOCTYPE html>
<!-- Template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="utf-8" />
<title>Osun State Accident Information System</title>
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css">
<link href="font/stylesheet.css" rel="stylesheet" type="text/css" />	
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/media-queries.css" rel="stylesheet" type="text/css" />
<link href="css/css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="world/style.css" media="all" />
<style>
h3{
font-size:14px;
padding:0px;
}
</style>
</head>
<body>
<div id="main-wrapper-header">
 <div class="main-flashes"></div>
   <header class="main-header">
    <div class="container-fluid">
   
      <nav class="main-nav" style="float:left">
     <ul>
     <li><a href="index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:200px" ><center>HOME</center></a></li>
     <li class="js-top-menu-sales"><a href="routes.php" fsource="loggedin_Seller_ManageSales" style="color:#FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a></li>
<li class="js-top-menu-todo">
                                <a href="" style="color:#FFF; border-left:1px dotted  #fff; border-right:1px dotted  #fff; width:150px">
                                   <center> About</center> </a>                            </li>
                                   <li class="js-top-menu-sales"><a href="login.php" fsource="loggedin_Seller_ManageSales" style=" border-right:1px dotted  #fff; color:#FFF; width:150px">
 <center> Login (Officials only) </center>                                     </a>                                </li>

                          
        </ul>
                    </nav></center>
    </div>
                </header>
               
</div>
	<div id="header"><br/><br/><br/><br/><br/>
	  <div class="span7" >
	
			<div class="visible-desktop" id="icon">
				<img src="img/icon.png" width="60px" height="60px" style="margin-top:9px" />
			</div>
			
			<!-- APP NAME -->
			<div id="app-name">
				<h1 style="font-size:52px;  ">Osun State Accident Information System&nbsp;<img src="img/logo.png" width="55px" height="55px"></h1>
			</div>
			
			</div>
	</div><br/><br/><div style="margin-left:250px; font-size:20px; color:#999999">A system for gathering road accident data within osun state </div><br/>
    <div style="margin-left:250px"><a href="routes.php" style="text-decoration:none"><img src="images/arrow-top.png"> Back</a></div>
    <br/>
<div id="body">
		<div class="header" style="background:#FFFFFF">
			<div>
					<br/>
				<div style="width:620px; margin-left:200px; ">
					<h2><span>Route: <?php echo $route['route_name']; ?> </span></h2><br/>	
                    <table>
                    
                    <tr ><td style="width:200px"><h3>Pot Holes:</h3></td><td><h3><?php echo $route['pot_holes'] ?></h3></td></tr>
                    <tr> <td style="width:200px"><h3>Route Length:</h3></td><td><h3><?php echo $route['route_length'] ?>km</h3></td></tr>
                     <tr ><td style="width:200px"><h3>Surface:</h3></td><td><h3><?php echo $route['surface'] ?></h3></td></tr>
                    <tr ><td style="width:200px"><h3>Junctions:</h3></td><td><h3><?php echo $route['junctions'] ?></h3></td></tr>
                    <tr ><td style="width:200px"><h3>Bends:</h3></td><td><h3><?php echo $route['bends'] ?></h3></td></tr>
                     <tr ><td style="width:200px"><h3>Carriage Width:</h3></td><td><h3><?php echo $route['carriage_width'] ?>m</h3></td></tr>
                     <tr ><td style="width:200px"><h3>Failed Segment:</h3></td><td><h3><?php echo $route['failed_segment'] ?></h3></td></tr>
                     <tr ><td style="width:200px"><h3>Total Accidents:</h3></td><td><h3><?php echo $route['total_accidents'] ?></h3></td></tr>
                     <tr ><td style="width:200px"><h3>Fatality Rate:</h3></td><td><h3><?php echo round($route['fatality_rate'],3) ?>%</h3></td></tr>
                   <tr ><td style="width:200px"><h3>Total Dead:</h3></td><td><h3><?php echo $route['dead'] ?></h3></td></tr>
                   <tr ><td style="width:200px"><h3>Total Injured:</h3></td><td><h3><?php echo $route['injured'] ?></h3></tr>
                   <tr ><td style="width:200px"><h3>Status:</h3></td><td><h3><?php echo ($route['fatality_rate']<31)?'<img src="images/green.png" id="status" style="margin-top:5px;" />&nbsp;Safe':(($route['fatality_rate']>=31 && $route['fatality_rate']<61)?'<img src="images/yellow.png" style="margin-top:5px;" />&nbsp;Fair':'<img src="images/red.png" style="margin-top:5px;" />&nbsp;Poor'); ?></h3></tr>
                   <tr ><td style="width:200px"><h3>Message:</h3></td><td><h3><?php echo ($route['fatality_rate']<31)?'This route is safe to ply':(($route['fatality_rate']>=31 && $route['fatality_rate']<61)?'This route is fairly safe to ply ':'This route is dangerous to ply'); ?></h3></tr>
                    </table>
					<p></p></div>
			</div>
		</div>
		<div class="footer"></div>
</div>
	<div id="footer">
		<div>
				
		</div>
		<div>
			<p>&copy Copyright 2013. All rights reserved</p>
		</div>
	</div>
</body>
</html>