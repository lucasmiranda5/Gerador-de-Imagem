<? $quant = $_POST['quant']; ?>
<html>
	<head>
		<title>Gerar Imagem</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="html2canvas.js"></script> 

<script>

		// This code is generally not necessary, but it is here to demonstrate
		// how to customize specific editor instances on the fly. This fits well
		// this demo because we have editable elements (like headers) that
		// require less features.

		// The "instanceCreated" event is fired for every editor instance created.
		CKEDITOR.on( 'instanceCreated', function( event ) {
			var editor = event.editor,
				element = editor.element;

			// Customize editors for headers and tag list.
			// These editors don't need features like smileys, templates, iframes etc.
			if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
				// Customize the editor configurations on "configLoaded" event,
				// which is fired after the configuration file loading and
				// execution. This makes it possible to change the
				// configurations before the editor initialization takes place.
				editor.on( 'configLoaded', function() {

					// Remove unnecessary plugins to make the editor simpler.
					editor.config.removePlugins = 'colorbutton,find,flash,font,' +
						'forms,iframe,image,newpage,removeformat,' +
						'smiley,specialchar,stylescombo,templates';

					// Rearrange the layout of the toolbar.
					editor.config.toolbarGroups = [
						{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
						{ name: 'undo' },
						{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
						{ name: 'about' }
					];
				});
			}
		});

	</script>

<script type="text/javascript">
function gerarImg() {
var target = $('#div');
html2canvas(target, {
    onrendered: function(canvas) {
                var img = canvas.toDataURL("image/jpeg");
                window.open(img);
    }
});
};
</script>       

  <style>
  #draggable {  padding: 0.5em; background:transparent; border:0; margin: 0; }
  </style>
  <script>
 
 function mover(num){
	for(x = 1; x<= num; x++){
		var nom1 = '';
		var nom2 = '';
		var nom3 = '';
		
		nom1 = "#campo"+x;
		nom2 = "campoClass"+x;
		nom3 = ".campoClass"+x;
		$(nom1).addClass(nom2);
		$(nom1).css('cursor','all-scroll');
		$(nom3).draggable();
		
	}
	
 
 }
 function pararMover(num){

 for(x = 1; x<= num; x++){
	var nom3 = '';
	var nom1 = '';
	nom3 = ".campoClass"+x;
	nom1 = "#campo"+x;
	
	$(nom1).css('cursor','text');
	$(nom3).draggable( "destroy" );
	}
 
 }
 
  </script>
  </head>
  <body>
 
 
<?php
include_once("upload.php");
@$thu = new Upload($_FILES['img']);
			if ($thu->uploaded) {
				$thu->Process('temp/'); 
				$NomeFoto = $thu->file_dst_name;
			}

	
  // nome e local da imagem
  $imagem = "temp/".$NomeFoto;
  
  // vamos obter as dimensões da imagem
  list($largura, $altura) = getimagesize($imagem);
  
  // exibe as informações
 
	
	print '<div style="width: '.$largura.'px; height: '.$altura.'px; background:url(\''.$imagem.'\'); backgroud-repeat: no-repeat;" id="div">';

?>

	<? for($x = 1; $x <= $quant; $x++) { ?>
	<div id="campo<?=$x?>"  contenteditable="true">
		escreva o texto aqui
	</div>
	<? } ?>

</div>
<input type="button" onClick="gerarImg();" value="Gerar Imagem">
<input type="button" onClick="mover(<?=$quant?>);" value="Mover">
<input type="button" onClick="pararMover(<?=$quant?>);" value="Editar">

</body>
</html>