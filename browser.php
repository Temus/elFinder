<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>
<?php
if(($_GET['editor'] == 'tinymce3' || $_GET['editor'] == 'tinymce') && $_GET['editorpath'])
	$editorPath = htmlspecialchars($_GET['editorpath'], ENT_QUOTES);
?>
		<script type="text/javascript" src="<?php echo $editorPath; ?>/jscripts/tiny_mce/tiny_mce_popup.js"></script>
		<script type="text/javascript" src="<?php echo $editorPath; ?>/tiny_mce/tiny_mce_popup.js"></script>
		<script type="text/javascript" src="<?php echo $editorPath; ?>/tinymce.modxfb.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				$('body').css('font-size','100%'); //font bug
				var elf = $('#elfinder').elfinder({
					url : 'php/connector.php?type=<?php echo $_GET['type']; ?>',
					lang: 'ru',
					height: $(window).height(),
					getFileCallback : function(url) {
						url = url.url.substr(1); // remove slash
						if (window.FileBrowserDialogue) {
							FileBrowserDialogue.selectURL(url);
						}else {
							window.opener.SetUrl(url);
						}
						window.close();
                    }
				}).elfinder('instance');
			});
		</script>
	</head>
	<body style="margin:0;padding:0;">

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
