<?php
  include "../x5blog.inc.php";
  include "../x5blog_data.php";
  $imBCD = @chdir("../" . $imDir);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" dir="ltr">
<head>
	<!-- Contenido -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="it" />
	<meta http-equiv="Content-Type-Script" content="text/javascript" />
	<!-- Otros -->
	<meta name="Generator" content="" />
	<meta http-equiv="ImageToolbar" content="False" />
	<meta name="MSSmartTagsPreventParsing" content="True" />
	<!-- Resolucion -->
	<script type="text/javascript" src="x5engine.js"></script>
	<link rel="stylesheet" type="text/css" href="template.css" media="screen" />
  	<title>Administracion del Blog</title>
</head>
<body>
<?php
	if($_POST['pwd'] != $imBPwd) {
?>
<div id="imLoginPage">
	<div id="imHeader">
		<img src="logo.jpg" alt="BeBooks Blog Admin" />
	</div>
	<div id="imBody">
		<div id="imContent">
			<div class="imBlogAdminLoginForm">
<?php
		if($imBCD) {
?>
				<form action="index.php" method="post">
					<fieldset>
						<label><?=$imBLang[15]?></label><br />
						<input type="password" name="pwd" />
<?php
			if($_GET['post_id'] != "") {
?>
						<input type="hidden" name="category_id" value="<?=$imBPosts[$_GET['post_id']]['category']?>" />
						<input type="hidden" name="post_id" value="<?=$_GET['post_id']?>" />
<?php
			}
?>
						<div style="text-align: right; width: 255px; margin: 0; padding: 2px 0;"><input type="submit" value="<?=$imBLang[16]?>" /></div>
					</fieldset>
				</form>
<?php
		}
		else {
?>
				<?=$imBLang[26]?>			
<?php
		}
?>
			</div>
		</div>
	</div>
</div>
<?php
  }
  else {
  	if($_POST['post_id'] != "" && $_POST['comment_id'] != "") {
    	if($_POST['approved'] != "")
			$r = imBlogApproveComment($_POST['post_id'],$_POST['comment_id'],$_POST['approved']);
		else
			$r = imBlogRemoveComment($_POST['post_id'],$_POST['comment_id']);
  	}
?>
<div id="imAdminPage">
	<div id="imHeader">
		<img src="logo.jpg" alt="BeBooks Blog Admin" />
	</div>
	<div id="imBody">
		<div id="imContent">
			<form action="index.php" method="post">
				<fieldset class="imFilter">
					<input type="hidden" name="pwd" value="<?=$_POST['pwd']?>" />
					<select name="category_id" onchange="form.submit();">
<?php
	for($i = 0;$i < count($imBCatName);$i++) {
		if($_POST['category_id'] == "")
			$_POST['category_id'] = 0;
?>
						<option value="<?=$i?>"<?=($_POST['category_id'] == $i ? " selected=\"selected\"" : "")?>><?=$imBCatName[$i]?></option>
<?php
	}
?>
					</select>
					<select name="post_id" onchange="form.submit();">
<?php
    foreach($imBPosts as $id => $value) {
    	if($value['category'] == $_POST['category_id']) {
    		if($first_post == "")
    			$first_post = $id;
    		if($_POST['post_id'] == $id)
    			$first_post = $id;
?>
						<option value="<?=$id?>"<?=($id == $_POST['post_id'] ? " selected=\"selected\"" : "")?>><?=$value['title']?></option>
<?php
		}
    }
    $_POST['post_id'] = $first_post;
?>
					</select>
				</fieldset>
			</form>
<?php
    if($_POST['post_id'] != "") {
      $c = imBlogGetComments($_POST['post_id']);
      for($i = count($c)-1;$i >= 0 && $c != -1; $i--) {
?>
			<div class="imBlogPostComment">
				<div class="imBlogPostCommentAction">
					<form action="index.php" method="post" onsubmit="return confirm('<?=$imBLang[14]?>')">
						<fieldset>
							f<input type="hidden" name="pwd" value="<?=$_POST['pwd']?>" />
							s<input type="hidden" name="category_id" value="<?=$_POST['category_id']?>" />
							w<input type="hidden" name="post_id" value="<?=$_POST['post_id']?>" />
							y<input type="hidden" name="comment_id" value="<?=$i+1?>" />
							<input type="submit" value="<?=$imBLang[13]?>" />
						</fieldset>
					</form>
<?php
		if($c[$i]['approved'] == 0) {
?>
					<form action="index.php" method="post" onsubmit="return confirm('<?=$imBLang[19]?>')">
						<fieldset>
							<input type="hidden" name="pwd" value="<?=$_POST['pwd']?>" />
							<input type="hidden" name="category_id" value="<?=$_POST['category_id']?>" />
							<input type="hidden" name="post_id" value="<?=$_POST['post_id']?>" />
							<input type="hidden" name="comment_id" value="<?=$i+1?>" />
							<input type="hidden" name="approved" value="1" />
							<input type="submit" class="imBlogPostCommentActionApprove" value="<?=$imBLang[18]?>" />
						</fieldset>
					</form>
<?php
		}
		else {
?>
					<form action="index.php" method="post" onsubmit="return confirm('<?=$imBLang[21]?>')">
						<fieldset>
							<input type="hidden" name="pwd" value="<?=$_POST['pwd']?>" />
							<input type="hidden" name="category_id" value="<?=$_POST['category_id']?>" />
							<input type="hidden" name="post_id" value="<?=$_POST['post_id']?>" />
							<input type="hidden" name="comment_id" value="<?=$i+1?>" />
							<input type="hidden" name="approved" value="0" />
							<input type="submit" value="<?=$imBLang[20]?>" />
						</fieldset>
					</form>
<?php
		}
?>
				</div>
				<div class="imBlogPostCommentUser"><?=(stristr($c[$i]['url'],"http") ? "<a href=\"" . $c[$i]['url'] . "\" target=\"_blank\">" . $c[$i]['name'] . "</a>" : $c[$i]['name']) . " (" . $c[$i]['email'] . ")"?></div>
				<div class="imBlogPostCommentBody"><?=$c[$i]['body']?></div>
				<div class="imBlogPostCommentDate"><?=imBlogFormatTimestamp($c[$i]['timestamp'])?></div>
			</div>
<?php
      }
    }
?>
		</div>
	</div>
</div>
<?php
  }
?>
<div id="imNavBar"><a href="../index.php">&laquo; <?=$imBLang[17]?></a></div>
</body>
</html>