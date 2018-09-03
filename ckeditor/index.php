<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="JavaScript" src="plugins/ckeditor_wiris/configuration.ini"></script>
	<script language="JavaScript" src="ckeditor.js"></script>
	<script language="JavaScript" src="plugin.js"></script>
</head>
<body>
    <form action="posteddata.php" method="post">
    <textarea id="editor1" class="ckeditor" name="editor1" style="visibility: hidden; display: none;">
    </textarea>
    <input type="submit" value="Submit">
    </form>
<script type="text/javascript">

	CKEDITOR.editorConfig = function( config )
	{
		
		config.extraPlugins += (config.extraPlugins.length == 0 ? '' : ',') + 'ckeditor_wiris';
		
		config.toolbar_Full.push({ name: 'wiris', 
		items : [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS' ]});
		
	};
	CKEDITOR.config.height = 300;
	CKEDITOR.config.width  = 800;
	CKEDITOR.replace( 'editor1', {
	extraPlugins: 'ckeditor_wiris',
	uiColor: '#14B8C4',
	removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
	removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
	format_tags: 'p;h1;h2;h3;pre;address',

} );
</script> 
</body>
</html>