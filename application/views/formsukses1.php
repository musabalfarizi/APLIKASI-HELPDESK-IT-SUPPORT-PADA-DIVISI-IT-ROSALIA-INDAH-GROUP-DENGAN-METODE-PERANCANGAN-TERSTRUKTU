<html lang="en">
<head>
	<title>Order Sukses</title>
	<meta charset="utf-8">
	</head>
<body>
<div style="font-size: 25px; text-align: center; font-family: arial black" ><?php echo $pesan;?></div>
<?php header("Refresh: 5; url=http://localhost/itdev/");?>
</br>
<p align="center">Kembali Dalam Waktu</p><div style="font-size: 35px; text-align: center; font-family: times new roman"><span id="waktu">5</span></div><p align="center">Detik</p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('waktu');
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
</body>
<style>
.pup {
width:500px;
height:40px;
margin-left:35px;
margin-bottom:10px;
}
button {
margin-left:300px;
margin-top:0px;
}
.datepicker {z-index: 7000;}
</style>
</html>
