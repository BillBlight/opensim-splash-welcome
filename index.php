<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<link id="main" rel="stylesheet" href="splash.css" type="text/css" media="screen"/>

<title>myGRID</title>

</head>

<body>

<div id='background1'>
<img border="0" src="background_01.png" width="100%" height="100%">
</div>

<div id='main'><br>
<table border="0" width="100%" height="99%' cellspacing="0" cellpadding="0">
	<tr>
		<td height="136" background="header_background.png">
		<img border="0" src="header.png" width="400" height="137">
		</td>
	</tr>
</table>
</div>

<div id='stats1'>
<fieldset class='grey'> 
									 
<h1>myGRID</h1>

<?php
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   Anfang der Einstellungen
//Datenbank Einstellungen - IP oder localhost, Benutzername, Passwort, Datenbankname
$con = mysqli_connect("localhost", "myName", "Pass123456", "osDATABASE");
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   Ende der Einstellungen

if (!$con)
  {
  die('Keine Datenbankverbindung! ' . mysqli_connect_error());
  }

  $totalUsers = 0;
  
  
  
// Query the database and get the count

$result1 = mysqli_query($con,"SELECT COUNT(*) FROM Presence");
list($totalUsers) = mysqli_fetch_row($result1);

$result2 = mysqli_query($con,"SELECT COUNT(*) FROM regions");
list($totalRegions) = mysqli_fetch_row($result2);

$result3 = mysqli_query($con,"SELECT COUNT(*) FROM UserAccounts");
list($totalAccounts) = mysqli_fetch_row($result3);

$result4 = mysqli_query($con,"SELECT COUNT(*) FROM GridUser WHERE Login > (UNIX_TIMESTAMP() - (30*86400))");
list($activeUsers) = mysqli_fetch_row($result4);

// Display the results

echo "<div id='stats2'><b><font color=#00FF00>Users in world</font><font color=#FFFFFF> : ". $totalUsers ."<font color=#FFFFFF><br>";
echo "<font color=#00FF00>Total Regions</font> : ". $totalRegions ."<font #FFFFFF><br>";
echo "<font color=#00FF00>Active users (last 30 days)</font> : ". $activeUsers ."<font color=#FFFFFF><br>";
echo "<font color=#00FF00>Total Users</font> : ". $totalAccounts ."<font color=#FFFFFF><br>";
echo "<font color=#00AA00>Grid is ONLINE</font></b><br></div>";
/* echo "<font color=#AA0000>Grid is OFFLINE</font></b>";<br></div> */
?>


</fieldset>
</div>

<div id='regions1'><fieldset class='white2'> 
<a href="secondlife://welcome" target="_self" style="text-decoration: none;">welcome</a><br><hr>
<a href="secondlife://sandbox" target="_self" style="text-decoration: none;">sandbox</a><br><hr>
<a href="secondlife://region1" target="_self" style="text-decoration: none;">region1</a><br><hr>
<a href="secondlife://region2" target="_self" style="text-decoration: none;">region2</a><br><hr>
<a href="secondlife://region3" target="_self" style="text-decoration: none;">region3</a><br><hr>
<a href="secondlife://region4" target="_self" style="text-decoration: none;">region4</a><br><hr>
<a href="secondlife://region5" target="_self" style="text-decoration: none;">region5</a><br><hr>
<a href="secondlife://region6" target="_self" style="text-decoration: none;">region6</a><br><hr>
<a href="secondlife://club" target="_self" style="text-decoration: none;">club</a><br>
</fieldset>
</div>


<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 10,
  interval: 30000,
  width: 250,
  height: 290,
  theme: {
    shell: {
      background: '#333333',
      color: '#ffffff'
    },
    tweets: {
      background: '#000000',
      color: '#ffffff',
      links: '#4aed05'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('opensim').start();
</script>
</div>

</body>
</html>
