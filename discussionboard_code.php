<?php
include("conn.php");

    $sql = "select * from topics order by topicsid desc limit 0,30";
	$result = mysql_query($sql);
	$numrecs = mysql_num_rows($result);
	
	
	
	if ($numrecs>0)
	{
				
	   echo "<a href='createtopic.php'>Create a Discussion</a>";
	   echo "<br><br><table width='80%' cellpadding='5' border='1' style='border-collapse:collapse;font-family:corbel,verdana;'>";
	   echo "<tr><td bgcolor='#f1f1f1'><b>Discussions</b></td><td bgcolor='#f1f1f1'><b>Creators</b></td></tr>";
	   while ($dbfield = mysql_fetch_assoc($result))
	   {
	      
		  $topicsid = $dbfield['topicsid'];
		  $createdby = $dbfield['createdby'];
		  
		  $countcomments = mysql_num_rows(mysql_query("select * from comments where ontopicid=".$topicsid));
		  
		  $createdby =  mysql_fetch_assoc(mysql_query("select * from members where email='".$createdby."'"));
		  
		 		  		  
	    echo "<tr><td><a href='boardtopic.php?id=".$dbfield['topicsid']."&sname=".$createdby['surname']."&fname=".$createdby['firstname']."'>".$dbfield['topic']."</a><br><font color='#666666' size='2'>Posted on ".date("D, d M Y  G:i a",strtotime($dbfield['date']))."</font></td><td width='25%'><a style='text-decoration:none;color:#000000;' href='onsitemembers.php?id=".$createdby['id']."'>".$createdby['surname'].' '.$createdby['firstname']."</a></td></tr>";
	   }
	   echo "</table>";
	}

	
 

?>



