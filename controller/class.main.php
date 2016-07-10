<?php
require_once '../model/mysql.php';


class mainClass{
public $currentFile;
public $prevFile;
public $nextFile;
public $mysql;
public $currency_rates;
function  __construct(){
DEFINE('MAXFILESIZE',99999);
$this->mysql=new mysql();
}
function getPath(){
$here=$_SERVER['PHP_SELF'];
if(strpos($here,'admin')>1){
return '../';
}
return '';
}

function setCurrentFile($file){
$this->currentFile=$file;
}

function loadRates(){
return $this->mysql->loadRates();

}
 function add_new_route($param){
 return $this->mysql->add_route($param);
 }

function loadRoutes(){
return $this->mysql->loadRoutes();
}

function add_user($param){
return $this->mysql->add_user($param);
}

function loadRoute($id){
return $this->mysql->loadRoute($id);
}

function load_users(){
return $this->mysql->load_users();
}

function update_route($param){
return $this->mysql->updateRoute($param);
}

function add_accident($param){
return $this->mysql->add_accident($param);
}

function load_accident($id){
return $this->mysql->load_accident($id);
}

function upload($img,$id){
$errors=0;	
 	
 if ($image=$_FILES[$img]['name']){ 	 		
       $filename = stripslashes($image); 	   
       $extension = strtolower($this->getExtension($filename)); 		
       if (($extension != 'gif')&&($extension != 'jpg')&&($extension != 'png'))  		
       {		 			
             $errorMsg= '<div class="warning">&nbsp;&nbsp;'.$img.' has an unknown extension</div>'; 			
             $errors=1;
            return $errorMsg;		
       } 		
       else {
            $size=filesize($_FILES[$img]['tmp_name']);
             if ($size > MAXFILESIZE*1024){	
                 $errorMsg= '<div class="warning">&nbsp;&nbsp;You have exceeded the size limit!</div>';	
                 $errors=1;
                 return $errorMsg;
             }
			 $image_name=$_FILES[$img]['name'];
       $image_param=array('name'=>$image_name, 'size'=>$size);
         $newname=$this->getPath()."images/".$image_name;
            if (!@move_uploaded_file($_FILES[$img]['tmp_name'], $newname)) {	
            $errorMsg= '<div class="warning">&nbsp;&nbsp;Upload unsuccessfull!</div>';	
            $errors=1;
            return $errorMsg;
			}
	}}
	if($image && $image_name)
	$done=$this->mysql->updateImage($image_param,$id);
	return $done;//$this->mysql->putInfoInDb($_FILES);
 }


function uploadOnly($img){
$errors=0;	
	
 if ($image=$_FILES[$img]['name']){ 	 		
       $filename = stripslashes($image); 	   
       $extension = strtolower($this->getExtension($filename)); 		
       if ($img=='image' &&($extension != 'gif')&&($extension != 'jpg')&&($extension != 'png'))  		
       {		 			
             $errorMsg= $img.' has an unknown extension'; 			
             $errors=1;
            return $errorMsg;		
       } 
if ($img=='book' &&($extension != 'pdf')&&($extension != 'doc')&&($extension != 'docx')&&($extension != 'gif')&&($extension != 'jpg')&&($extension != 'png')&&($extension != 'txt'))  		
       {		 			
             $errorMsg= $img.' has an unknown extension'; 			
             $errors=1;
            return $errorMsg;		
       } 			
       else {
            $size=filesize($_FILES[$img]['tmp_name']);
             if ($size > MAXFILESIZE*1024){	
                 $errorMsg= 'You have exceeded the size limit!';	
                 $errors=1;
                 return $errorMsg;
             }
			 $image_name=$_FILES[$img]['name'];
        // $image_name=$this->getName($image);
		if($img=='book'){
         $newname=$this->getPath()."books/".$image_name;
		 }else{
		 $newname=$this->getPath()."images/".$image_name;
		 }
            if (!@move_uploaded_file($_FILES[$img]['tmp_name'], $newname)) {	
            $errorMsg= 'Upload not successfull';	
            $errors=1;
            return $errorMsg;
			}
	}}
	if($image)
	return true;
 }
 

function paginativ_search($term,$scope,$startpoint,$limit){
return $this->mysql->paginative_search($term,$scope,$startpoint,$limit);
}

function exeedUploadLimit($file){
if(filesize($file)>MAXFILESIZE)
return true;
return false;
}

function getName($file){
 return substr($file,(strrpos($file,"/")+1),strlen($file));
 }

function getExtension($file){
return substr($file,strrpos($file,".")+1,strlen($file));
}
function update($newVal,$id){
return $this->mysql->performUpdate($newVal,$id);
}

function isImage($file){
$ext=$this->getExtension($file);
if($ext=="jpg"||$ext=="png"||$ext=="gif"||$ext=="jpeg")
return true;
return false;
}

function login($param){
return $this->mysql->login($param,"users");
}

function isAdmin($user){
if($user['user_level']=='admin')
return true;
return false;
}

function paginate($startpoint,$limit,$type){
return $this->mysql->paginate($startpoint,$limit,$type);
}

function loadType($param,$startpoint,$limit){
return $this->mysql->loadType($param,$startpoint,$limit);
}
function loadSpecialHome($offerId,$start,$limit){
return $this->mysql->loadSpecialHome($offerId,$start,$limit);
}

function search($term){
return $this->mysql->search($term);
}
function searchCount($param,$start,$limit){
$result=$this->mysql->search($param,$start,$limit);
return $result['count'];
}
function searchPagin($param,$page,$limit){
$result=$this->mysql->search($param);
return $result['pagination'];
}

function delete($id,$table){
return ($this->mysql->delete($id,$table));
}

function activate($id,$scope){
return ($this->mysql->activate($id,$scope));
}

function change($param,$id,$table){
return ($this->mysql->change($param,$id,$table));
}

function deActivate($id){
return ($this->mysql->deActivate($id,"books"));
}

function get_routes(){
return $this->mysql->get_routes();
}
}
?>