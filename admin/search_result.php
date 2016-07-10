<?php 
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']==NULL){
header('location:login.php');
}
if(!($term=$_GET['term'])){
header('location:index.php');
}
//unset($_SESSION['error']);

include '../controller/class.main.php';
$main=new mainClass();
$routes=$main->loadRoutes();
$results=$main->search($term);
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
                                <a href="../index.php" fsource="loggedin_Buyer_home" style="color:#FFF; border-left:1px dotted  #fff; width:150px; margin-left:-40px" ><center>Visit Main Site</center></a>                            </li>
<li class="js-top-menu-sales">
<a href="index.php" fsource="loggedin_Seller_ManageSales" style="color: #FFF; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a>                                </li>
<li class="js-top-menu-sales"><a href="accidents.php" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Accidents  </center> 
<li class="js-top-menu-sales"><a href="users.php" fsource="loggedin_Seller_ManageSales" style=" border-right:1px dotted  #fff; color:#FFF; width:150px"><center> Users  </center>                                     </li></a>                                
 
<li><a href="" style="color: #A4C1D9; margin-left:150px">     <center> Hi: <?php echo $_SESSION['admin'][0]['username'] ?></center> </a>                            </li>

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
				<h1 style="font-size:36px; margin-top:-15px " >Osun State Accident Information System&nbsp;&nbsp;<img src="../img/logo.png" width="50px" height="48px"</h1><br/><br/>
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
                                        <form name="search" action="" >
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
                                        <h1 class="with-thumb"> Search Result</h1>
                                    </header>

<div class="db-tabs-wrapper">
<form name="frm" method="post" action="" >
<br/><br/><br/><br/><center>
<div style=" padding:10px; min-height:300px ">
<?php if($results !=NULL){ foreach ($results as $result){ ?>
<div style=" font-size:24px; margin-bottom:30px"><p><a href="info.php?id=<?php echo $result['route_id'] ?>"><?php echo $result['route_name'] ?></a></p></div>									  
<?php }
}else{
echo '<center><h2>No result found for "'.$term.'"</h2></center>';
} ?></center>
<input type="hidden" name="ticker" value="" />
<input type="hidden" name="id" value="" />
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