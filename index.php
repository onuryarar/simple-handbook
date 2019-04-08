<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Handbook Example</title>
	<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="view.js"></script>
	<script type="text/javascript" src="template/handbook.js"></script>
</head>

<body id="main_body">

	<?php include "controller/form.php"?>

	<div id='file_container'>
		<?php include 'template/handbook.php'?>
	</div>

	<div id="top"></div>

	<div id="form_container">
		<h2><a>Handbook Example</a></h2>
		<form id="formExp" class="appnitro" method="post" action="">
			<input id="buffer" name="buffer" type="text" maxlength="255" style="visibility:hidden;margin:0px;" />
			<div>
				<input id="name" name="name" placeholder="Ad Soyad" class="element text medium" type="text"
					maxlength="255" required />
			</div>
			<div>
				<input id="email" name="email" placeholder="E-mail" class="element text medium" type="email"
					maxlength="255" required />
			</div>
			<div>
				<textarea id="address" name="address" placeholder="Adres" class="element textarea medium"required></textarea>
			</div>
			<input id="saveForm" class="button_text new" type="submit" name="submit" value="Gönder" />
			<input id="editForm" class="button_text" type="submit" name="edit" value="Düzenle" />
			<input id="delForm" class="button_text" type="submit" name="delete" value="Sil" />
			<input id="id" name="id" type="text" maxlength="255" style="visibility:hidden" />
		</form>
	</div>
</body>

</html>