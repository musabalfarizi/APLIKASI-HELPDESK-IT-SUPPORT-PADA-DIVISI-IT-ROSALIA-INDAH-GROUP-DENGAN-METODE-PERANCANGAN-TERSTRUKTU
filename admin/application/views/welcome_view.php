<html>
<head><title>Login-Logout</title>
</head>
<body>
<center>
<?php if(isset($welcome)) echo "<h2><span style='color:red;'>$welcome</span></h2>";
echo "</br>";
echo anchoor("login/logout",'logout')?>
</center>
</body>
</html>