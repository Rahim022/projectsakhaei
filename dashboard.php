<?php

include_once 'autoload.php';

$auth = new Auth();
if(!$auth->validateToken()) {
    $auth->logout();
    header('Location: login.php');die;
}
if(isset($_POST['out']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $auth->logout();
    header('Location: index.php');die;

}
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>SignUp & login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link href="./assets/css/style.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<div class="main">  	
		<div class="signup">
      		<form method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>">
				<input class="button" type="submit" value="خروج" name='out'>
			</form>
		</div>
	</div>
</body>
</html>