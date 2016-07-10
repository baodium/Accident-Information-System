<?php

if(isset($_POST['view_route'])){
$id=$_POST['route'];
$result=$main->loadRoute($id);
//var_dump($result); exit;
$route_list=$result;
return;
}

if(isset($_POST['view_accidents'])){
$id=$_POST['route'];
$accidents=$main->load_accident($id);
}
//var_dump($_POST); exit;
if(isset($_POST['add_accident'])){
include 'model/mysql.php';
$main=new mysql();
foreach($_POST as $key=>$value){
$param[$key]=$value;
}

unset($param['add_accident']);

if($main->add_accident($param)){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/button_accept.png" />user successfully added</h2>';
header("location:officials/accident.php");
}else{
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; error adding accident</h2>';
var_dump("error"); exit;
return;
}

}





if(isset($_POST['add_user'])){
foreach($_POST as $key=>$value){
if(strlen(trim($value))<1){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; '.$key.' field cannot be empty</h2>';
return;
}
$param[$key]=$value;
}
if($_POST['password']!=$_POST['password2']){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp;your password does not match</h2>';
return;
}
unset($param['add_user']);
if($main->add_user($param)){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/button_accept.png" />user successfully added</h2>';
return;
}else{
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; username already exisit</h2>';
return;
}

}


if(isset($_POST['add_route'])){
$param=array();
foreach($_POST as $key=>$value){
if(strlen(trim($value))<1){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; '.$key.' field cannot be empty</h2>';
return;
}

if($key!='route_name' && $key!='state' && $key !='surface' && $key!='add_route' && (is_numeric($value)==false)){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; '.$key.' field must be numeric</h2>';
return;
}
$param[$key]=$value;
}
unset($param['add_route']);
if($route->add_new_route($param)){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/button_accept.png" />route successfully added</h2>';
return;
}else{
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; route name already exist</h2>';
return;
}
}

if(isset($_POST['update_route'])){
$param=array();
unset($_POST['update_route']);
foreach($_POST as $key=>$value){
if(strlen(trim($value))<1){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; '.$key.' field cannot be empty</h2>';
return;
}

if($key!='route_name' && $key!='state' && $key !='surface' && $key!='add_route' && (is_numeric($value)==false)){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; '.$key.' field must be numeric</h2>';
return;
}
$param[$key]=$value;
}
//unset($param['update_route']);
if($handle->update_route($param)){
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/button_accept.png" />route successfully updated</h2>';
return;
}else{
$errorMessage='<br/><h2 class="error" >&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; error updating route</h2>';
return;
}
}

if(isset($_POST['change_password'])){
$param=$_POST;

if(strlen(trim($_POST['oldpassword']))<1){ 
$errorMessage='<div class="error">&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; Old password field cannot be empty</div>';
return;
}
if(strlen(trim($_POST['newpassword']))<1) {
$errorMessage='<div class="error">&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp;New password field cannot be empty</div>';
return;
}
if($_POST['newpassword'] != $_POST['newpassword2'] ){ 
$errorMessage='<div class="error">&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp; New password does not match</div>';
return;
}


$id=$_SESSION['official'][0]['id'];
$table="users";
//$id=($user['type']=='0')?($user['hospital_id']):(($user['type']=='1')?$user['agency_id']:$user['c_id']);//$_SESSION['user'][0]['c_id'];
if(($main->change($param, $id, $table))){
 $errorMessage='<div class="error">&nbsp;&nbsp; <img src="../images/button_accept.png" />&nbsp;Password successfully changed</div>';
     }else{
     $errorMessage='<div class="error">&nbsp;&nbsp; <img src="../images/warning.png" />&nbsp;Old password is not correct</div>';
     return;
     }
	
}
