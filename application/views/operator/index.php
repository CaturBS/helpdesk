<?php
	echo "<ul>";
	echo "<li>" . anchor("operator/chat/", "Chat") . "</li>";
	echo "<li>" . anchor("operator/", "SMS") . "</li>";
	echo "<li>" . anchor("operator/", "Index SKPD") . "</li>";
	echo "</ul>";
?>
<script>
	$("ul").css({
		"display": "inline-flex"
	});
	$("li").css({
		"display": "block",
		"text-decoration": "none",
		"margin-right":"2em"
	});
</script>