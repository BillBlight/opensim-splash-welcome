<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<link id="main" rel="stylesheet" href="splash.css" type="text/css" media="screen"/>
<title>openCAD</title>

</head>

<body>

<div id='background1'>
<img border="0" src="background_01.png" width="100%" height="100%">
</div>

<div id='main'><br>
<table border="0" width="100%" height="100%' cellspacing="0" cellpadding="0">
	<tr>
		<td height="136" background="header_background.png">
		<img border="0" src="header.png" width="400" height="137">
		</td>
	</tr>
</table>
</div>

<div id='stats1'>
<fieldset class='grey'> 

<?php
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   Anfang der Einstellungen
//Datenbank Einstellungen - IP, Benutzername, Passwort
$con = mysql_connect('localhost', 'opensim', 'opensim');
//Datenbankname
$database = "opensim";
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   Ende der Einstellungen

mysql_select_db($database, $con);
if (!$con)
  {
  die('Keine Verbindung: ' . mysql_error());
  }

// Query the database and get the count

$result1 = mysql_query("SELECT COUNT(*) FROM Presence");
list($totalUsers) = mysql_fetch_row($result1);

$result2 = mysql_query("SELECT COUNT(*) FROM regions");
list($totalRegions) = mysql_fetch_row($result2);

$result3 = mysql_query("SELECT COUNT(*) FROM UserAccounts");
list($totalAccounts) = mysql_fetch_row($result3);

$result4 = mysql_query("SELECT COUNT(*) FROM GridUser WHERE Login > (UNIX_TIMESTAMP() - (30*86400))");
list($activeUsers) = mysql_fetch_row($result4);

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
<a href="secondlife://primetime" target="_self" style="text-decoration: none;">primetime</a><br><hr>
<a href="secondlife://info" target="_self" style="text-decoration: none;">info</a><br><hr>
<a href="secondlife://news" target="_self" style="text-decoration: none;">news</a><br><hr>
<a href="secondlife://party" target="_self" style="text-decoration: none;">party</a><br><hr>
<a href="secondlife://medusa" target="_self" style="text-decoration: none;">medusa</a><br><hr>
<a href="secondlife://story" target="_self" style="text-decoration: none;">story</a><br><hr>
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
