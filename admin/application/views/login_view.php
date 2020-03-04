<html>
<head><title>Login</title>
</head>
<body>
<link href="<?php echo base_url();?>style/login/style6.css" rel="stylesheet" type="text/css"/>
<h1 font='Arial' align='center'>Login</h1>
<div align='center'><?php echo validation_errors();?></div>
<?php echo form_open('verifylogin');?>
<div align='center'>
<table>
<tr>
	<th><label>Username:</label></th>
	<th><input type="text" size="20" id="username" name="username"/></th>
</tr><br/>
<tr>
	<th><label>Password:</label></th>
	<th><input type="password" size="20" id="password" name="password"/></th>
</tr><br/>
<tr>
<th align='center' width='50%' colspan='2'><input type="submit" value="Login"/></th>
</tr>
</table>
</div>
</body>
</html>