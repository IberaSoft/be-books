<?php  
  
  function imBlogFormatTimestamp($ts) {
    return substr($ts,6,2) . "/" . substr($ts,4,2) . "/" . substr($ts,0,4) . " " . substr($ts,8,2) . "." . substr($ts,10,2) . "." . substr($ts,12,2);
  }
  
  function imBlogGetComments($post) {
    global $imFilesPrefix;
    if(file_exists($imFilesPrefix . "pc" . $post)) {
      $f = file_get_contents($imFilesPrefix . "pc" . $post);
      $f = explode("\n",$f);
      for($i = 0;$i < count($f)-1; $i += 6) {
        $c[$i/6]['name'] = stripslashes($f[$i]);
        $c[$i/6]['email'] = $f[$i+1];
        $c[$i/6]['url'] = $f[$i+2];
        $c[$i/6]['body'] = stripslashes($f[$i+3]);
        $c[$i/6]['timestamp'] = $f[$i+4];
        $c[$i/6]['approved'] = $f[$i+5];
      }
      return $c;
    }
    else
      return -1;
  }
  
  function imBlogAddComment($post_id,$name,$email,$url,$body) {
    global $imFilesPrefix;
    global $imBCommentsApproved;
    $locked = 0;
  	if($post_id != "" && trim($name) != "" && trim($email) != "" && trim($body) != "") {
	  	if (is_writable($imFilesPrefix . "pc" . $post_id) || !file_exists($imFilesPrefix . "pc" . $post_id)) {
	      if (!$f = fopen($imFilesPrefix . "pc" . $post_id, 'a'))
	        return -3;
	      else {
	        if (flock($f, LOCK_EX))
	        	$locked = 1;
          	$comment = stripslashes(trim($name)) . "\n" . trim($email) . "\n" . trim($url) . "\n" . stripslashes(str_replace("\n","<br />",strip_tags(trim($body)))) . "\n" . date("YmdHis") . "\n" . $imBCommentsApproved . "\n";
          	if (fwrite($f, $comment) === false)
          		return -4;
          	else {
            	if($locked)
					flock($f, LOCK_UN);
            	fclose($f);
            	return 0;
          	}
	      }
	    }
	    else
	      return -2;
	}
	else
		return -1;
  }
  
  function imBlogApproveComment($post,$n,$approved) {
    global $imFilesPrefix;
    $locked = 0;
    $fn = $imFilesPrefix . "pc" . $post;
    if(!copy($fn,$fn . "_bak"))
      return -1;
    $c = imBlogGetComments($post);
    if($c == -1)
      return -2;
    if(!file_exists($fn))
      return -3;
    if(!is_writable($fn))
      return -4;
    if (($f = fopen($fn, 'w')) === false)
      return -5;
    if(flock($f, LOCK_EX))
		$locked = 1;
    for($i = 0;$i < count($c);$i++) {
      $comment = $c[$i]['name'] . "\n" . $c[$i]['email'] . "\n" . $c[$i]['url'] . "\n" . $c[$i]['body'] . "\n" . $c[$i]['timestamp'] . "\n" . ($i == $n-1 ? $approved : $c[$i]['approved']) . "\n";
      fwrite($f, $comment);
    }
    if($locked)
		flock($f, LOCK_UN);
    fclose($f);
    return 0;
  }
  
  function imBlogRemoveComment($post,$n) {
    global $imFilesPrefix;
    $locked = 0;
    $fn = $imFilesPrefix . "pc" . $post;
    if(!copy($fn,$fn . "_bak"))
      return -1;
    $c = imBlogGetComments($post);
    if($c == -1)
      return -2;
    if(!file_exists($fn))
      return -3;
    if(!is_writable($fn))
      return -4;
    if (($f = fopen($fn, 'w')) === false)
      return -5;
    if(flock($f, LOCK_EX))
		$locked = 1;
    array_splice($c,$n-1,1);
    foreach($c as $comment) {
      $comment = $comment['name'] . "\n" . $comment['email'] . "\n" . $comment['url'] . "\n" . $comment['body'] . "\n" . $comment['timestamp'] . "\n" . $comment['approved'] . "\n";
      fwrite($f, $comment);
    }
    if($locked)
		flock($f, LOCK_UN);
    fclose($f);
    return 0;
  }
  
  function imBlogGetLastModified() {
    global $imBPosts;
    $c = imBlogGetComments($_GET['id']);
    if($_GET['id'] != "" && $c != -1) {
      return imBlogFormatTimestamp($c[count($c)-1]['timestamp']);
    }
    else {
      $last_post = $imBPosts;
      $last_post = array_shift($last_post);
      return $last_post['timestamp'];
    }
  }
  
	function imBlogShowPost($id,$ext=0,$first=0) {
		global $imBCD;
		global $imBPosts;
		global $imBLang;
		global $imBCatName;
		global $imBAddThis;
		global $imFilesPrefix;
		$bp = $imBPosts[$id];
?>
	<div class="imBlogPostTitle"><?=$bp['title']?></div>
	<div class="imBlogPostDetails"><?=$imBLang[0]?> <strong><?=$bp['author']?></strong> <?=$imBLang[1]?> <a href="?category=<?=$bp['category']?>"><?=$imBCatName[$bp['category']]?></a> &#149; <?=$bp['timestamp']?></div>
<?php
		if($ext != 0 || $first != 0) {
?>
	<div class="imBlogPostBody"><?=$bp['body']?><br /><?=$imBAddThis?></div>
<?php
		}
		else {
?>
	<div class="imBlogPostSummary"><?=$bp['summary']?></div>
<?php
		}
		if($ext == 0) {
?>
	<div class="imBlogPostRead"><a class="ImLink" href="?id=<?=$id?>"><?=$imBLang[2]?> &#187;</a></div>
<?php
		}
		else {
?>
	<div class="imBlogPostFooHTML"><?=$bp['foo_html']?></div>
<?php
		}
		if($ext != 0 && $bp['comments'] == 1 && $imBCD) {
?>
	<div class="imBlogPostComments">
<?php
    if(($c = imBlogGetComments($id)) != -1) {
    	if(is_array($c))
    		foreach($c as $comment)
				if($comment['approved'] == 1)
					$ca[] = $comment;
?>
    <div class="imBlogCommentsCount"><?=(count($ca) > 0 ? count($ca) . " " . (count($ca) > 1 ? $imBLang[3] : $imBLang[4]) : $imBLang[5])?></div>
<?php
      for($i = 0;$i < count($ca); $i++) {
?>
    <div class="imBlogPostCommentUser"><?=(stristr($ca[$i]['url'],"http") ? "<a href=\"" . $ca[$i]['url'] . "\" target=\"_blank\">" . $ca[$i]['name'] . "</a>" : $ca[$i]['name'])?></div>
    <div class="imBlogPostCommentBody"><?=$ca[$i]['body']?></div>
    <div class="imBlogPostCommentDate"><?=imBlogFormatTimestamp($ca[$i]['timestamp'])?></div>
<?php
      }
    }
    else {
?>
    <div class="imBlogCommentsCount"><?=$imBLang[5]?></div>
<?php
    }
    if($_GET['ok'] == 1) {
?>
	<div class="imBlogCommentsMsgOK"><?=$imBLang[22]?></div>
<?php
	}
	if($_GET['err'] != "") {
?>
	<div class="imBlogCommentsMsgErr"><?=$imBLang[23]?></div>
<?php
	}
?> 
    <div class="imBlogCommentsForm">
      <form action="imcomment.php" method="post" onsubmit="return imBlogCheckComment('<?=$imBLang[27]?>','<?=$imBLang[6]?>','<?=$imBLang[7]?>','<?=$imBLang[9]?>')">
        <input type="hidden" name="post_id" value="<?=$id?>" />
        <label><?=$imBLang[6]?>*</label> <input type="text" id="form_name" name="name" /><br />
        <label><?=$imBLang[7]?>*</label> <input type="text" id="form_email" name="email" /><br />
        <label><?=$imBLang[8]?></label> <input type="text" id="form_url" name="url" /><br />
        <label><?=$imBLang[9]?>*</label> <textarea id="form_body" name="body"></textarea><br />
        <input type="submit" value="<?=$imBLang[10]?>" /><br />
      </form>
    </div>
	</div>
<?php
		}
	}
	function imBlogShowCategory($category) {
		global $imBCat;
		$bps = $imBCat[$category];
		if(is_array($bps)) {
			$bpsc = count($bps);
			for($i = 0; $i < $bpsc; $i++)
				imBlogShowPost($bps[$i],0,($i == 0 ? 1 : 0));
		}
		else {
?>
<div class="imBlogEmpty">Categoria vacia</div>
<?php
		}
	}
	function imBlogShowMonth($month) {
		global $imBMonths;
		$bps = $imBMonths[$month];
		if(is_array($bps)) {
			$bpsc = count($bps);
			for($i = 0; $i < $bpsc; $i++)
				imBlogShowPost($bps[$i],0,($i == 0 ? 1 : 0));
		}
		else {
?>
<div class="imBlogEmpty">Mes vacio</div>
<?php
		}
	}
	function imBlogShowLast($count) {
		global $imBPosts;
		$bps = array_keys($imBPosts);
		if(is_array($bps)) {
			$bpsc = count($bps);
			for($i = 0; $i < ($bpsc<$count ? $bpsc : $count); $i++)
				imBlogShowPost($bps[$i],0,($i == 0 ? 1 : 0));
		}
		else {
?>
<div class="imBlogEmpty">Blog vacio</div>
<?php
		}
	}
	function imBlogShowSearch($search) {
		global $imBPosts;
		$bps = array_keys($imBPosts);
		$j = 0;
		if(is_array($bps)) {
			$bpsc = count($bps);
			for($i = 0; $i < $bpsc; $i++) {
				if(stristr($imBPosts[$bps[$i]]['title'],$search) || stristr($imBPosts[$bps[$i]]['summary'],$search) || stristr($imBPosts[$bps[$i]]['body'],$search)) {
					imBlogShowPost($bps[$i],0,($j == 0 ? 1 : 0));
					$j++;
				}
			}
			if($j == 0) {
?>
<div class="imBlogEmpty">No se encontro ninguna palabra similar. Intente nuevamente por favor.</div>
<?php
			}
		}
		else {
?>
<div class="imBlogEmpty">El Blog esta vacio</div>
<?php
		}
	}
?>
