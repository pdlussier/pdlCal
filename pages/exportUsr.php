<?php
/*
= User profile export script =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only


/* sub-functions */

function groupList($selGrpID) {
	global $ax;
	$stH = dbQuery("SELECT `ID`,`name`,`color` FROM `groups` WHERE `status` >= 0 ORDER BY `ID`");
	echo "<option value='*'>{$ax['iex_all_groups']}&nbsp;</option>\n";
	while ($row = $stH->fetch(PDO::FETCH_ASSOC)) {
		$selected = ($selGrpID == $row['ID']) ? ' selected' : '';
		echo "<option value='{$row['ID']}'".($row['color'] ? " style='background-color:{$row['color']};'" : '')."{$selected}>{$row['name']}</option>\n";
	}
}


/* main functions */

function selectUsers() {
	global $formCal, $ax, $set, $msg, $fileName, $groupID, $delimiter;
	
	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset><legend>{$ax['iex_export_usr']}</legend>
<table class='list'>
<tr><td class='label'>{$ax['iex_file_name']}:</td><td><input type='text' name='fileName' maxlength='60' value='{$fileName}' size='36'> .csv</td></tr>
<tr><td class='label'>{$ax['iex_group']}:</td><td><select name='groupID' >\n";
	groupList($groupID);
	echo "</select></td></tr>
<tr><td class='label'>{$ax['iex_fields_sep_by']}:</td><td><input type='text' name='delimiter' maxlength='1' value='{$delimiter}' size='1'></td></tr>
</table>
</fieldset>
<button class='noPrint' type='submit' name='create' value='y'>{$ax['iex_create_file']}</button>\n";
	if (isset($_POST['create']) and $msg == $ax['iex_file_created']) {
		$userfName = ($fileName ? substr(translit($fileName,true),0,60) : substr(translit($set['calendarTitle'],true),0,60).'_users').'.csv';
		$rName = str_replace('.','-'.date("Ymd-Hi").'.',$userfName);
		echo "&nbsp;&nbsp;&nbsp;<button class='noPrint' type='button' onclick=\"location.href='dloader.php?ftd=./files/{$userfName}&amp;nwN={$rName}'\">{$ax['iex_download_file']}</button>\n";
	}
	echo "</form>\n<div style='clear:right'></div>\n";
}

function makeFile() {
	global $ax, $set, $fileName, $groupID, $delimiter;

	//make file header
	$content = "'group ID'{$delimiter}'user name'{$delimiter}'email address'{$delimiter}'phone number'{$delimiter}'language'{$delimiter}'password'\r\n";

	//set user filter
	$filter = ($groupID != '*') ? " AND `groupID` = $groupID" : '';

	//get user profile data
	$stH = dbQuery("SELECT * FROM `users` WHERE `status` >= 0$filter ORDER BY `groupID`");
	while ($row = $stH->fetch(PDO::FETCH_ASSOC))  {
		$content .= "'{$row['groupID']}'{$delimiter}'{$row['name']}'{$delimiter}'{$row['email']}'{$delimiter}'{$row['phone']}'{$delimiter}'{$row['language']}'{$delimiter}'{$row['password']}'\r\n";
	}

	//save to user profile file
	$userfName = $fileName ? $fileName : $set['calendarTitle'].'_users';
	$userfName = translit($userfName,true);
	if (file_put_contents("./files/{$userfName}.csv",$content,LOCK_EX) !== false) {
		$result = $ax['iex_file_created'];
	} else {
		$result = $ax['iex_write error'];
	}
	return $result;
}

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";

$fileName = (!empty($_POST['fileName'])) ? $_POST['fileName'] : substr(translit($set['calendarTitle'],true),0,60).'_users'; //file name
$groupID = (isset($_POST['groupID'])) ? $_POST['groupID'] : ''; //user group ID
$delimiter = (isset($_POST['delimiter'])) ? $_POST['delimiter'] : ','; //field delimiter

//control logic
$msg = ''; //init
if ($usr['privs'] >= 4) { //manager or admin
	if (isset($_POST['create'])) {
		$msg = makeFile();
	}
	echo "<p class='error'>{$msg}</p>
<div class='scrollBox sBoxAd'>
<aside class='aside'>{$ax['xpl_export_user']}</aside>
<div class='centerBox'>\n";
	selectUsers();
	echo "</div>\n</div>\n";
} else {
	echo "<p class='error'>{$ax['no_way']}</p>\n";
}
?>
