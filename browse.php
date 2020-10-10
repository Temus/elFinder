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

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var params = {};
				window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str,key,value) {
					params[key.toLowerCase()] = value;
				});
				var elf = $('#elfinder').elfinder({
					url : 'php/connector.php?type=' + params.type,
					lang: 'ru',
					height: $(window).height(),
					getFileCallback : function(url) {
						url = url.url.substr(1); // remove slash
						if (params.opener=='tinymce4') {
							var win = window.opener ? window.opener : window.parent;
							$(win.document).find('#' + params.field).val(url);
							win.tinyMCE.activeEditor.windowManager.close();	
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
