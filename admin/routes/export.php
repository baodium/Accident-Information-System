<?php

session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']==NULL){
header('location:../index.php');
}
include '../../model/mysql.php';
if(isset($_POST['download'])){
//var_dump($_POST); exit;
if(strlen(trim($_POST['from']))<1){
echo '<script >alert("please select  date from");</script>';
header("location:http://localhost/survey/admin/accidents.php");
exit;
}
if(strlen(trim($_POST['to']))<1){
echo '<script >alert("please select date to");</script>';
header("location:http://localhost/survey/admin/accidents.php");
exit;
}
$from=$_POST['from'];
$to=$_POST['to'];
$main=new mysql();
$all=$main->get_routes();
//$accident=$main->load_accidents();
$accident=$main->download_accidents($from,$to);
//var_dump($accident); exit;
$header=array();
$i=0;
$j=0;
$list = array ();

$header[0]='route_name';
foreach($accident[0] as $key=>$value){
$i++;
if($key!='id' ){
if($key=="date")
$header[$i]="accident_date";
else
$header[$i]=$key;
}
}
$list[0]=$header;

foreach($all as $rt){
if($accidents=$main->download_accident($rt['route_id'],$from,$to)){
var_dump($accidents);
for($l=0;$l<count($accidents); $l++){
foreach($accidents[$l] as $key=>$value){
if($key!='id' )
$data[$key]=$value;
}
$list[]=$data;
}
}

}

$fp = fopen('accident_list.csv', 'w+');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
$filename='accident_list.csv';
fclose($fp);
header("location:http://localhost/survey/admin/routes/".$filename);
unlink('routes/'.$filename);
exit;
}
elseif($_POST['download_time']){
$time_from=$_POST['time_from'];
$time_to=$_POST['time_to'];

$main=new mysql();
$all=$main->get_routes();
//$accident=$main->load_accidents();
$accident=$main->time_accidents($time_from,$time_to);
//var_dump($accident); exit;
$header=array();
$i=0;
$j=0;
$list = array ();

$header[0]='route_name';
foreach($accident[0] as $key=>$value){
$i++;
if($key!='id' ){
if($key=="date")
$header[$i]="accident_date";
else
$header[$i]=$key;
}
}
$list[0]=$header;

foreach($all as $rt){
if($accidents=$main->time_accident($rt['route_id'],$time_from,$time_to)){
var_dump($accidents);
for($l=0;$l<count($accidents); $l++){
foreach($accidents[$l] as $key=>$value){
if($key!='id' )
$data[$key]=$value;
}
$list[]=$data;
}
}

}

$fp = fopen('accident_list.csv', 'w+');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
$filename='accident_list.csv';
fclose($fp);
header("location:http://localhost/survey/admin/routes/".$filename);
unlink('routes/'.$filename);
exit;

}
header("location:http://localhost/survey/admin/accidents.php");
?>