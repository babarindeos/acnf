<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Welcome to African Carribbean Network Foundation (ACNF). Bridging the African-Caribbean Gap" />
<meta name="keywords" content="Africa,Caribbean,Trade,Trade & Investment,Investment,Ambassador Duru Justin V.C.Culture,Economy,Politics,Nigeria,Cuba,Guyana, Gambia, Kenya, South Africa, St. Thomas (U.S.V.I.),St. Vincent & The Grenadines,Trinidad and Jamaica" />

<title>African Caribbean Network Foundation (ACNF) - Home</title>
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



<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6429725313795409",
    enable_page_level_ads: true
  });
</script>
</head>

<body onload="slide();" bgcolor="#999999">
<table width="948" border="0" align="center" bgcolor="#FFFFFF" cellpadding="1" cellspacing="1">
  <tr>
    <td>
    <?php
	 include("header.php");
	
	?>
    
    </td>
  </tr>
  <tr><td>
  <?php
  include("imageslider.php");
  include("tradeinvestmentbar.php");
  ?>
  
  </td></tr>
  <tr><td>
  <?php
  include("frontpage.php");
  
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