<?php 
if($_FILES["files"]["name"] !=""){
	$targetDir="upload/";
	$allowedTypes=array("pdf","jpeg","jpg","png");
	$files_arr=array();
	for($i=0;$i < count($_FILES["files"]["name"]);$i++){
		$_FILES["file"]["name"]	= $_FILES["files"]["name"][$i];
		$_FILES["file"]["tmp_name"]= $_FILES["files"]["tmp_name"][$i];
		$_FILES["file"]["size"]    = $_FILES["files"]["size"][$i];
		$_FILES["file"]["type"]= $_FILES["files"]["type"][$i];
		$_FILES["file"]["error"]= $_FILES["files"]["error"][$i];
        $file_name=basename($_FILES["file"]["name"]);
        $targetfile_path=$targetDir.$file_name;
        $filetype=pathinfo($targetfile_path,PATHINFO_EXTENSION);
        if(in_array($filetype,$allowedTypes)){
        	if($_FILES["file"]["size"]< 200000){
        		if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetfile_path)){
        			$files_arr[]=$targetfile_path;
        		}
        	}
   		}
    }
    if(!empty($files_arr)){ 
    	foreach($files_arr as $file_arr){ 
    	 	echo $file_arr." ";
        } 
    }
}
?>