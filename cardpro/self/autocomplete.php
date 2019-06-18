<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<head>
<title>Title of the document</title>
</head>
<script>
$(function() {
    // $("#skill_input").autocomplete({
    //     source: [ "PHP", "Python", "Ruby", "JavaScript", "MySQL", "Oracle" ],
    //     // select: function( event, ui ) {
    //     //     event.preventDefault();
    //     //     $("#skill_input").val(ui.item.id);
    //     // }
    // });
    $( "#skill_input" ).autocomplete({
	    source: "search.php",
	});
});
</script>
<body>
<div class="auto-widget">
	<form action="search.php" method="get" id="search-form">
    	<p>Your Skills: <input type="text" id="skill_input" name="skill_input"/></p>
	</form>
</div>
</body>

</html>