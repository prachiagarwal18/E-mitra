<!DOCTYPE html>
<html lang="en">
<head>

	<title>E-FEEDBACK PORTAL</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=bitter" rel="stylesheet">	
	</head>
	<body>

		<div id="header1" class="container">
			<img src="logo.jpg">
		<h2 id="emitra" >Effective Governance </br>And Better Citizen Serices</h2>
		</div>

 <div id="header2">
<h1 id="portal">E-FEEDBACK PORTAL</h1>
<hr/>
</div></br></br>
<center><form action="db_connect.php" method="post" id="form2">
	<select name="service" id="service">
		<option>SELECT SERVICE</option>
				<option value="ration card">RATION CARD</option>
				<option value="bhamashah card">BHAMASHAH CARD</option>
	</select>
	<select name="district">
		<option>SELECT DISTRICT</option>
		<option value="all">ALL</option>
		<option value="ajmer">AJMER</option>
		<option value="jaipur">JAIPUR</option>
	</select>
	
	<button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
	</form></center>
   

	</body>
</html>