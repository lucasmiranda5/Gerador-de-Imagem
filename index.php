<html>
	<head>
		<title>Gerador de Imagem personalizadas</title>
	</head>
	<body>
	<form enctype="multipart/form-data" action="gerar_imagem.php" method="POST">
		<label>Imagem</label><br>
		<input type="file" class="validate[required]" id="img" name="img">
		<br>
		<label>Quantidade de Texto</label><br>
		<input type="text" name="quant">
		<br>
		<input type="submit" value="confimar">
	</form>
	</body>
</html>