<?php
	include "x5blog.inc.php";
	include "x5blog_data.php";
	include "imemail.inc.php";
	
	chdir($imDir);

	$r = imBlogAddComment($_POST['post_id'],$_POST['name'],$_POST['email'],$_POST['url'],$_POST['body']);
	if(!$r) {
		$e = new imEmail($imBEmail,$imBEmail,$imBLang[24],"utf-8");
		$text = $imBLang[25] . " \"" . $imBPosts[$_POST['post_id']]['title'] . "\":\n\n";
		$text .= $imBLang[6] . " " . stripslashes($_POST['name']) . "\n";
		$text .= $imBLang[7] . " " . $_POST['email'] . "\n";
		$text .= $imBLang[8] . " " . $_POST['url'] . "\n";
		$text .= $imBLang[9] . " " . stripslashes($_POST['body']) . "\n\n";
		$text .= ($imBCommentsApproved ? $imBLang[29] : $imBLang[28]) . ":\n" . $imBServerRoot . "blog/admin/?post_id=" . $_POST['post_id'];
		$e->setText($text);
		$e->send();
  		header("Location: index.php?id=" . $_POST['post_id'] . ($imBCommentsApproved ? "" : "&ok=1"));
  	}
	else
		header("Location: index.php?id=" . $_POST['post_id'] . "&err=" . abs($r));
?>
