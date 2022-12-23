<?php

$filename=basename($_FILES['uploadedfile1']['name']);
//echo $filename;

$ext=substr($filename,strpos($filename,'.')+1);

if (($ext=='jpg'||$ext=='JPEG'||$ext=='pjeg'||$ext=='jpeg'||$_FILES['uploadedfile1']['type']=='image/pjeg'||$_FILES['uploadedfile1']['type']=='image/jpeg') && $_FILES['uploadedfile1']['size']<=30000 ){


if ($_FILES['uploadedfile1']['error']==0){
$size = $_FILES['uploadedfile1']['size']/1024;


$time=Date("Ydm_Hms",time());
$mix = mt_rand(10,99);
$user=mt_rand(1,99999);

$target_path="uploads/image";
$target_path=$target_path.$time.$mix."_".$user;
$target_path=$target_path.".jpg";


if (file_exists($target_path)){
echo "Filename already exist";
}
else
{
if (move_uploaded_file($_FILES['uploadedfile1']['tmp_name'],$target_path)){
echo "<br>";
echo "<font color='green'>[Upload Successful]</font>";
$_SESSION['upload1']=1;

$picture1=$target_path;
$_SESSION['picture1']=substr($picture1,strpos($picture1,'/')+1);
//echo $_SESSION['picture1'];
}
else
{echo "There is a problem uploading the file, try again";}


}

}
else
{
echo "There is a problem with the upload";
}



}
else
{
echo "<font color='#800000'>The file must be a .jpg image not more than 30kilobytes with plain white background.</font>";

}



?>