<br><br><table width="100%" cellpadding="5px" cellspacing="0px" style="font-family:corbel;font-size:18px;"><tr><td width="1%" style="background-color:#B22106;border-bottom:1px solid #B22106;"></td>
 <td style="color:#069;border-bottom:1px solid #B22106;font-weight:bold;">
   <a style="color:#069;" href="discussionboard.php">Discussion Board</a></td></tr></table>
<div style="font-family:corbel;font-size:13px;text-align:right;">
<?php
if (isset($_SESSION['loginusername']))
	{
		echo "<div align='right'><br><b>Welcome, ".$_SESSION['surname'].' '.$_SESSION['firstname'].' '.$_SESSION['othernames']." | <a href='logout.php'>Sign out</a></b><br><br></div>";
	}

	?>
</div>
