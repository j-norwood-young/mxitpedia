<?php

function wiki_clean($str) {
	$str = preg_replace('#<span class="editsection">(.*?)</span>#', '', $str);
	//$str = preg_replace('#<a href="/wiki/#', '<a href="/wiki/', $str);
	return $str;
}

function wiki_format_WIKIMEDIA($str) {
	require_once("./application/libraries/GlobalFunctions.php");
	require_once("./application/libraries/Exception.php");
	require_once("./application/libraries/User.php");
	require_once("./application/libraries/StubObject.php");
	require_once("./application/libraries/Hooks.php");
	require_once("./application/libraries/debug/Debug.php");
	require_once("./application/libraries/parser/Parser.php");
	require_once("./application/libraries/parser/ParserOptions.php");
	$parser = new Parser();
	$parseroptions = new ParserOptions();
	return $parser->parse($str, "Blah");
	return $str;
}

//Accepts a Wiki formatted str, returns a Mxit formatted str
function wiki_format($str) {
	//$str = preg_replace("#\{.*?\}#", "", $str);
	$str = preg_replace('#======(.*?)======#', '<h6>$1</h6>', $str);
	$str = preg_replace('#=====(.*?)=====#', '<h5>$1</h5>', $str);
	$str = preg_replace('#====(.*?)====#', '<h4>$1</h4>', $str);
	$str = preg_replace('#===(.*?)===#', '<h3>$1</h3>', $str);
	$str = preg_replace('#==(.*?)==#', '<h2>$1</h2>', $str);
	
	$str = preg_replace("#''''(.*?)''''#", '<strong><em>$1</em></strong>', $str);
	$str = preg_replace("#'''(.*?)'''#", '<strong>$1</strong>', $str);
	$str = preg_replace("#''(.*?)''#", '<em>$1</em>', $str);
	
	//$str = preg_replace('#\[\[Image:(.*?)\|(.*?)\]\]#', '<img src="$1" alt="$2" title="$2" />', $str);
	//$str = preg_replace('#\[\[(.*?) (.*?)\]\]#', '<a target="_blank" href="$1" title="$2">$2</a>', $str);
	//$str = preg_replace('#\[\[(.*)\|(.*)\]\]#', '<a target="_blank" href="$1" title="$2">$2</a>', $str);
	$str = preg_replace_callback('#\[\[(.*?)\]\]#', 'format_href', $str);
	$str = preg_replace_callback('#\[(.*?)\]#', 'format_href', $str);
	
	//$str = preg_replace("/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/", ' <sup><a href="$1">Link</a></sup>', $str);
	
	$str = preg_replace('/\* (.*?)\n/', '<ul><li>$1</li></ul>', $str);
	$str = preg_replace('/<\/ul><ul>/', '', $str);
	
	//Stuff to just drop
	$str = preg_replace('#\{\{Clarify(.*?)\}\}#', '', $str); //Citation Needed
	
	$str = nl2br($str);
	return $str;
}

function format_href($input) {
	$str = array_pop($input);
	$parts = explode("|", $str);
	if (strpos($str, "|") !== false) {
		$parts = explode("|", $str);
		return "<a href='{$parts[0]}' title='{$parts[1]}'>{$parts[1]}</a>";
	}
	return "<a href='$str' title='$str'>$str</a>";
}

?>