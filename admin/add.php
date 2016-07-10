<?php 
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']==NULL){
header('location:login.php');
}
unset($_SESSION['error']);
$user=$_SESSION['xchangeuser'][0];

include 'controller/class.main.php';
$bureau=new mainClass();


$today=date('m/d/Y');
//var_dump($today);
$transactions=$bureau->loadTransactions($today);
//var_dump($transactions);
$currencies=$bureau->loadRoutes();
//var_dump($currencies);
$error=(isset($errorMessage))?$errorMessage:"";
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="content-script-type" content="text/javascript">
            <title>Bureau De Change</title>
            <meta property="og:locale" content="en_US">
            <meta name="msvalidate.01" content="3F52B25E73272C20556A0FA52ABCC61F">
            <meta property="fb:admins" content="100003318459138,553942952">
            <meta property="fb:app_id" content="202127659076">

        <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->

        

        <meta content="authenticity_token" name="csrf-param">
<meta content="NMtYstnEFVGKd7Ezu4KY0a9PKebXsNswUHVVswLgsgs=" name="csrf-token">
        <link href="../css/css" rel="stylesheet" type="text/css">
        <link href="../css/style.css" media="all" rel="stylesheet" type="text/css">
        
	
        
        
<link href="css/css" rel="stylesheet" type="text/css">
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../css/flick/jquery-ui-1.8.16.custom.css" type="text/css" />
        
                <link href="css/style.css" media="all" rel="stylesheet" type="text/css">
<link href="font/stylesheet.css" rel="stylesheet" type="text/css" />	
<link href="css/styles.css" rel="stylesheet" type="text/css" />

        

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
     <script language="javascript">
  
  function convert(){
  rate=new Array(12)
  rate['US Dollar']=155.86
  rate['Pounds']=242.77
  rate['Naira']=1
  rate['Euro']=201.84
  rate['Swiss Franc']=162.74
  rate['Yen']=1.55
  rate['CFA']=0.3065
  rate['Waua']=231.9068
  rate['Yuan']=25.3855
  rate['Riyal']=41.5285
  rate['Danish Krona']=27.1433
  rate['SDR']=233.4231
  
  var from, to, amount
  amount=from=document.forms['frm1'].amount.value
  if(amount.length==""){
  alert("Please supply the amount")
  return false
  }else if(isNaN(amount)){
   alert("Amount must be numeric")
  return false
  }
  from=document.forms['frm1'].from.value
  to=document.forms['frm1'].to.value
  answer=(amount*(rate[from]/rate[to]))
document.getElementById("answer").innerHTML= amount+ " "+from+" = "+answer+" "+to
  }
  
  function getRate(){
  rate=new Array(12)
  rate['US Dollar']=155.86
  rate['Pounds']=242.77
  rate['Naira']=1
  rate['Euro']=201.84
  rate['Swiss Franc']=162.74
  rate['Yen']=1.55
  rate['CFA']=0.3065
  rate['Waua']=231.9068
  rate['Yuan']=25.3855
  rate['Riyal']=41.5285
  rate['Danish Krona']=27.1433
  rate['SDR']=233.4231
  
   from=document.forms['frm2'].currency_from.value
  to=document.forms['frm2'].currency_to.value
  document.forms['frm2'].rate.value= rate[from]/rate[to]
  
  }
  </script>
  
 <style>
 .odd{
 background:#99CCCC;
 }
 
 body { 
	background: url('../img/bg.png') repeat-x;
	background-color: #fff;
	}
 </style> 
            
</head>

    <body class="body-db" data-twttr-rendered="true">
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
 <div id="main-wrapper" style="padding-top: 47px;">

            <div id="main-wrapper-header">
 <div class="main-flashes">
</div>
     <header class="main-header">
    <div class="container-fluid">
   
      <nav class="main-nav" style="float:none">
       <ul>
     <li>
                                <a href="" fsource="loggedin_Buyer_home" style="color:#FFFFCC; border-left:1px dotted  #fff; width:150px; margin-left:200px" ><center>HOME</center></a>                            </li>
<li class="js-top-menu-sales">
<a href="transaction.php" fsource="loggedin_Seller_ManageSales" style="color:#FFFFCC; border-left:1px dotted  #fff; width:150px">
<center>Routes</center></a>                                </li>
<li class="js-top-menu-sales">
                                        <a href="" fsource="loggedin_Seller_ManageSales" style=" border-left:1px dotted  #fff; color:#FFFFCC; width:150px">
                                           <center> Data & Statistics  </center>                                     </a>                                </li>
 <li class="js-top-menu-todo">
                                <a href="" style="color:#FFFFCC; border-left:1px dotted  #fff; border-right:1px dotted  #fff; width:150px">
                                   <center> About Us                               </center> </a>                            </li>

                          
                      </ul>
                    </nav></center>
    </div>
                </header>
</div>
<div class="main-content">
<div class="db-container container-fluid"><br/><br/>
<div class="span7" style="margin-left:110px" >

			<div class="visible-desktop" id="icon">
				<img src="img/icon.png" style="width:40px; height:40px" />
			</div>

			<div id="app-name">
				<h1 style="font-size:26px; color:#003366 " >Osun State Accident Information System</h1>
			</div>
            </div>
            <br/><br/>
                        <div class="row-fluid">
                            <div class="span12">
                            <aside class="db-sidebar">
                              <div class="db-sidebar-inner">

                                        <div class="db-search hint--left cf" data-hint="Search">
                                        <form name="frm" action="" >
                                            <input id="query" name="query" type="search" value=""  placeholder="Search">
                                            <input type="image" src="images/btn-search-icon.png" alt="Go" class="btn-search" style="cursor: default !important;"><br/>
                                       </form> </div>
                                        
                                  <nav class="db-na"><br/><br/><br/>
                                  <p><b>Supported Currencies</b></p><br/>
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
                                        <h1 class="with-thumb">
                                            View route information</h1>
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
<option value="Naira" selected >Naira</option>
    <option value="US Dollar"  >US Dollar</option>
    <option value="Pounds" >Pound Sterling</option>
    <option value="Euro" >Euro</option>
    <option value="Swiss Franc" >Swiss Franc</option>
    <option value="Yen" >Yen</option>
    <option value="CFA" >CFA</option>
    <option value="Waua" >Waua</option>
    <option value="Yuan" >Yuan/Renminbi</option>
    <option value="Riyal" >Riyal</option>
    <option value="Danish Krona" >Danish Danish Krona</option>
    <option value="SDR" >SDR</option>
    </select><input class="btn-standard"  style=" background:#00b22d; color:#FFFFFF" type="button" value="View Information" title="view route information" onClick="convert();"></div></form>
  </aside>
  <br/><span class="conversation-stats">  <div class="answer" id="answer"  style="font-size:20px;" align="center"><b>Answer</b></div></span> <br/><br/>
  </section>        
<article class="conv-message mine" id="message_34686812"><center><?php echo $error;  ?></center>
<br/>
       

        <div class="msg-body">
       
     <a href="new.php" style="float:right; padding-left:10px"><input class="btn-standard"  style=" background:#00b22d; color:#FFFFFF" type="button" value="Add New Transaction" title="Add New "></a> &nbsp;&nbsp; <a href="" style="float:right" onClick="deleteIt('delete');" ><input class="btn-standard"  style=" background: #CC0000; color:#FFFFFF" type="button" value="Delete Selected" title="Delete selected" > </a>
        <div >
            </div>
</div><br/><br/>
 </div>
    </article>
<article class="conv-message mine" id="message_34686812">
        <h4 style="font-size:18px">Today's Transaction</h4><br/>
             <div class="msg-body">
         <p>
         <form name="d_form" action="delete.php" method="post" >
         <table style="background-color:#FFFFFF; color:#000000; margin-left:-55px; padding:10px" width="800px" border="2px" bordercolordark="#003366" >
         
         <tr style=" background: #66CC99; height:20px; padding:20px"  ><th>Select</th><th>Customer Name</th><th>Currency From</th><th>Currency To</th><th>Amount From</th><th>Amount To</th><th>Rate </th><th>Added By </th><th>Edit </th></tr>
<tr style=" height:25px; padding-top:10px" ><td><center>&nbsp;</center></td><td><center>&nbsp;</center></td><td><center>&nbsp;</center></td></tr>
<?php if($transactions!=NULL){ $i=0; foreach ($transactions as $transaction){ $i++; ?>
         <tr style=" height:25px; padding-top:10px" class="<?php echo ($i%2==0)?'odd':'odd'?>" ><td><center><input type="checkbox" name="check[]" value="<?php  echo $transaction['transaction_id'] ?>" onChange="tick();" ></center></td><td><center><?php echo strtoupper($transaction['surname']." ".$transaction['others']) ?></center></td><td><center><?php  echo $transaction['currency_from'] ?></center></td><td><center><?php  echo $transaction['currency_to'] ?></center></td><td><center><?php  echo $transaction['amt_bf_conversion'] ?></center></td><td><center><?php  echo $transaction['amt_af_conversion'] ?></center></td><td><center><?php  echo substr($transaction['rate'],0,5) ?></center></td><td><center><?php  echo $transaction['user'] ?></center></td><td><center><a href="edit.php?id=<?php  echo $transaction['transaction_id'] ?>" ><img src="images/edit.png" /></a></center></td></tr>
         <tr style=" height:25px; padding-top:10px" ><td><center>&nbsp;</center></td><td><center>&nbsp;</center></td><td><center>&nbsp;</center></td></tr>
         <?php }} else{ echo '<tr style=" height:25px; padding-top:10px" ><td colspan="8" ><center>No transaction performed today</center></td></tr> ';  } ?>
         </table><br/><br/>
         <input type="hidden" name="ticker" id="ticker" />
         <input type="hidden" name="id" id="id" />
         
         </form>
</p>
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
 <?php include 'footer.php' ?>
 </div>
 </div>
</body></html>