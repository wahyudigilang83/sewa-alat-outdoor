
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	


	Username : <?= $this->session->userdata('username'); ?><br>
	Password : <?= $this->session->userdata('password'); ?><br><br>

	<a href="login/deleteall"><button>Logout</button></a><br>
	
		
	
</body>
</html>