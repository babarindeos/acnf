<?php
session_start();

  if (!isset($_SESSION['loginusername']))
  {
     header("location:registerlogin.php");
  }
  
  

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>African Caribbean Network (ACN)</title>
<script language="javascript">
<!-- hide from old browsers
slidemage1= new Image(946,230); 
slidemage1.src="slideimages/bnr2.jpg"; 
slidemage2= new Image(946,230); 
slidemage2.src="slideimages/bnr3.jpg"; 																																																																																															
slidemage3= new Image(946,230); 
slidemage3.src="slideimages/bnr4.jpg"; 
slidemage4= new Image(946,230); 
slidemage4.src="slideimages/bnr5.jpg";
slidemage5= new Image(946,230); 
slidemage5.src="slideimages/bnr6.jpg";
//-->
</script>
<style type="text/css">
body {
	margin-top: 0px;
}
</style>
</head>

<body onload="slide();" bgcolor="#999999">
<table width="948" border="0" align="center" bgcolor="#FFFFFF" cellpadding="1px">
  <tr>
    <td>
    <?php
	 include("header.php");
	
	?>
    
    </td>
  </tr>
  <tr><td>
  <?php
     include("discussionboardheader.php");
	 include("boardtopic_code.php");
  
  ?>
  
  
  
  </td></tr>
  <tr><td>
  <?php
  
  include("footer.php");
  ?>
  </td></tr>
</table>
</body>
</html>