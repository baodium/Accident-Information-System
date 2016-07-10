<?php
include 'model/mysql.php';
$main=new mysql();

include_once 'pagination/function.php';
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit =10;
$startpoint = ($page * $limit) - $limit; 
//var_dump($routes);
$routes=$main->load_routes($page,$startpoint,$limit);
$pagination=isset($routes['pagination'])?$routes['pagination']:'';
$routes=$routes['result'];

?>


<!DOCTYPE html>
<!-- Template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="utf-8" />
<title>Osun State Accident Information System</title>
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css">
        <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/B_Black.css" rel="stylesheet" type="text/css" />
<link href="font/stylesheet.css" rel="stylesheet" type="text/css" />	
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/media-queries.css" rel="stylesheet" type="text/css" />
<link href="css/css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="world/style.css" media="all" />

</head>
<body>
<div id="main-wrapper-header">
 <div class="main-flashes"></div>
   <header class="main-header">
    <div class="container-fluid">
   
      <nav class="main-nav" style="float:left">
     <ul>
     <li><a href="index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:200px" ><center>HOME</center></a></li>
     <li class="js-top-menu-sales"><a href="" fsource="loggedin_Seller_ManageSales" style="color:#FFFFCC; border-left:1px dotted  #fff; width:150px">
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
				<img src="img/icon.png" width="60px" height="60px" style="margin-top:5px" />
			</div>
			
			<!-- APP NAME -->
			<div id="app-name">
				<h1 style="font-size:52px;  ">Osun State Accident Information System&nbsp;<img src="img/logo.png" width="55px" height="55px"></h1>
			</div>
			
			</div>
	</div><br/><br/><div style="margin-left:250px; font-size:20px; color:#999999">A system for gathering road accident data within osun state </div><br/><br/><br/>
<div id="body">
		<div class="header" style="background:#FFFFFF">
			<div>
					
				<div style="width:620px; margin-left:50px; ">
					<h2><span>Routes in Osun State</span></h2><br/>	
                    <table>
                    <?php 
					foreach ($routes as $route){ ?>
                   <tr><td style="width:250px;  "> <h4 ><a style=" font-family:'Times New Roman', Times, serif; font-size:18px" href="info.php?id=<?php echo $route['route_id'] ?>"><?php echo $route['route_name'] ?></a></h4></td><td><h4><a href="info.php?id=<?php echo $route['route_id'] ?>"><input type="button" value="View Information" style="" /></a></h4></td></tr>
					<?php } ?>
                    <tr ><td colspan="2" style="width:350px;" ><p style="margin-top:-35px"><?php 
	   echo isset($pagination)?$pagination:'';//pagination($statement,$limit,$page,(isset($_GET['home_id']))?$_GET['home_id']:NULL); ?></p></td></tr>
                    </table><br/>
					<p></p></div></div>
			</div>
		</div>
        </div>
        </div>
		<div class="footer"></div>
</div>

	<div id="footer">
		<div>
				
		</div>
		<div>
			<p>Osun State Accident Information System &copy Copyright 2013. All rights reserved</p>
		</div>
	</div>
</body>
</html>