<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teams</title>
<link rel="stylesheet" type="text/css" href="Teams.css" />
</head>

<body>
<form action="action_page.php">
  <input list="teams" name="Baseball_teams">
  <datalist id="teams">
    <option value="Cubs">
    <option value="Red Sox">
    <option value="Metz">
    <option value="Mariners">
    <option value="Giants">
  </datalist>
  <input list="Years" name="Baseball_team_years">
  <datalist id="Years">
    <option value="1976">
    <option value="1981">
    <option value="1989">
    <option value="1995">
    <option value="2001">
  </datalist>
  <input list="Player" name="Baseball_team_years">
  <datalist id="Player">
    <option value="Player one">
    <option value="Player two">
    <option value="Player three">
    <option value="player four">
    <option value="Player five">
  </datalist>
  <input type="submit">
</form>
<div>
<ul>
<li><a href="HomePage.php">Back to the team</a></li>
<li><a href="Player.php">Search By Player</a></li>
<li><a href="CreateUser.php">Create User</a></li>
<li><a href="LoginPage.php">Login</a></li>
</ul>
</div>
</body>
</html>
