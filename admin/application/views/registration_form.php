<html>
<head><title>register</title>
</head>
<body>
<link href="<?php echo base_url();?>style/login/style6.css" rel="stylesheet" type="text/css"/>
<h1 align='center'> Form Daftar </h1>
<form action="<?=site_url('daftar/add')?>" method="post">
<label for="username">username</label>
<input type="text" name="username"/></br>
<label for="password">password</label>
<input type="password" name="password"/></br>
<input type="submit" value="Daftar"/>
</form>
</body>
</html>