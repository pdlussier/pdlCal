<?php		
/*
= LuxCal Clean Up files =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

*/

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$adminLang = (file_exists("./lang/ai-{$opt['cL']}.php")) ? $opt['cL'] : "english";
require "./lang/ai-{$adminLang}.php";

//to be moved to ai-{lang}
$ax['cup_cup_functions'] = "Clean Up Functions";
$ax['cup_att_dir'] = 'Attachments folder';
$ax['cup_rec_dir'] = 'Reciplists folder';
$ax['cup_tns_dir'] = 'Thumbnails folder';
$ax['cup_Delete'] = 'Delete';
$ax['cup_attachments'] = 'attachments';
$ax['cup_reciplists'] = 'recipients lists';
$ax['cup_thumbnails'] = 'thumbnails';
$ax['cup_not_used_since'] = 'not used since';
$ax['cup_days'] = 'days';
$ax['cup_no_function_checked'] = 'no function checked';
$ax['cup_start'] = "Start";

$ax['xpl_clean_up'] = "<h3>Clean Up Instructions</h3>
<p>On this page the following folders can be cleaned up:</p>
<h6>Attachments folder</h6>
<p>By selecting this check box, attachment files which are not used anymore 
since the number of days specified, will be deleted. If 0 days have been 
specified, only attachment files which are not used at all (orphans) will be 
deleted. In case of multiple calendars, the attachment files will be checked 
against all calendars.</p>
<h6>Reciplists folder</h6>
<p>By selecting this check box, recipients list files which are not used anymore 
since the number of days specified, will be deleted. If 0 days have been 
specified, only recipients list files which are not used at all (orphans) will 
be deleted. In case of multiple calendars, the recipients list files will be 
checked against all calendars.</p>
<h6>Thumbnails folder</h6>
<p>By selecting this check box, thumbnail files which are not used anymore 
since the number of days specified, will be deleted. If 0 days have been 
specified, only thumbnail  files which are not used at all (orphans) will be
deleted. In case of multiple calendars, the thumbnail files will be checked 
against all calendars.</p>
<br>
<p>IMPORTANT: Deleted files are permanently removed from the folders and cannot 
be undeleted anymore!</p>";

function cupForm() {
	global $formCal, $ax, $attdir, $recdir, $tnsdir, $adPer, $rdPer, $tdPer;
	
	$attChecked = $attdir > 0 ? " checked" : '';
	$recChecked = $recdir > 0 ? " checked" : '';
	$tnsChecked = $tnsdir > 0 ? " checked" : '';
	echo "<form action='index.php' method='post'>
{$formCal}
<fieldset>\n
<legend>{$ax['cup_cup_functions']}</legend>\n
<br><input type='checkbox' id='att' name='attdir' value='yes'{$attChecked}><label for='att'> {$ax['cup_att_dir']}</label>. {$ax['cup_Delete']} {$ax['cup_attachments']} 
{$ax['cup_not_used_since']} <input type='text' name='adPer' style='width:20px' maxlength='2' value=\"{$adPer}\"> {$ax['cup_days']}<br>
<br><input type='checkbox' id='rec' name='recdir' value='yes'{$recChecked}><label for='rec'> {$ax['cup_rec_dir']}</label>. {$ax['cup_Delete']} {$ax['cup_reciplists']}
{$ax['cup_not_used_since']} <input type='text' name='rdPer' style='width:20px' maxlength='2' value=\"{$rdPer}\"> {$ax['cup_days']}<br>
<br><input type='checkbox' id='tns' name='tnsdir' value='yes'{$tnsChecked}><label for='tns'> {$ax['cup_tns_dir']}</label>. {$ax['cup_Delete']} {$ax['cup_thumbnails']}
{$ax['cup_not_used_since']} <input type='text' name='tdPer' style='width:20px' maxlength='2' value=\"{$tdPer}\"> {$ax['cup_days']}<br>
</fieldset>\n
<button type='submit' name='exe' value='y'>{$ax['cup_start']}</button>\n
</form>\n";
}

function processFunctions() {
	global $formCal, $ax, $attdir, $recdir, $tnsdir, $adPer, $rdPer, $tdPer;
	
	if ($attdir) { cleanAttDir(); }
	if ($recdir) { cleanRecDir(); }
	if ($tnsdir) { cleanTnsDir(); }
	echo "<form action='index.php' method='post'>
{$formCal}
<input type='hidden' name='attdir' id='attdir' value='{$attdir}'>
<input type='hidden' name='recdir' id='recdir' value='{$recdir}'>
<input type='hidden' name='tnsdir' id='tnsdir' value='{$tnsdir}'>
<input type='hidden' name='adPer' id='adPer' value='{$adPer}'>
<input type='hidden' name='rdPer' id='rdPer' value='{$rdPer}'>
<input type='hidden' name='tdPer' id='tdPer' value='{($tdPer}'>
<button class='noPrint' type='submit' name='back' value='y'>{$ax['back']}</button>\n";
	echo "</form>\n";
}

function makeDateFilter($period) {
	if ($period) {
		$dLimit = date('Y-m-d)',$nowTS - ($period * 86400));
		return "((CASE WHEN `eDate` LIKE '9%' THEN `sDate` ELSE `eDate` END >= '$dLimit') OR ((`rType` > 0) AND (`rUntil` > '$dLimit'))) AND ";
	} else {
		return '';
	}
}

function cleanAttDir($period) {
	global $allCals;

	$deleted = 0;
	$dFilter = makeDateFilter($period);
	$fNames = scandir("./attachments");
	foreach ($fNames as $fName) { //for each attachment file name
		if ($fName[0] == '.') { continue; } //no file
		$inUse = false;
		foreach($allCals as $calID=>$title) { //for each installed calendar
			$dbH = dbConnect($calID,0); //connect to db
			$stH = dbQuery("SELECT COUNT(*) FROM `events` WHERE {$dFilter}`attach` LIKE '%;{$fName}%' LIMIT 1",0);
			$result = $stH->fetch(PDO::FETCH_NUM);
			$stH = null;
			if ($result[0] > 0) { //attachment used
				$inUse = true;
				break;
			}
		}
		if (!$inUse) {
			unlink("./attachments/{$fName}"); //delete
			$deleted++;
		}
	}
	return $deleted;
}

function cleanRecDir($period) {
	global $allCals;

	$deleted = 0;
	$dFilter = makeDateFilter($period);
	$fNames = scandir("./attachments");
	foreach ($fNames as $fName) { //for each attachment file name
		if ($fName[0] == '.') { continue; } //no file
		$inUse = false;
		foreach($allCals as $calID=>$title) { //for each installed calendar
			$dbH = dbConnect($calID,0); //connect to db
			$stH = dbQuery("SELECT COUNT(*) FROM `events` WHERE {$dFilter}`attach` LIKE '%;{$fName}%' LIMIT 1",0);
			$result = $stH->fetch(PDO::FETCH_NUM);
			$stH = null;
			if ($result[0] > 0) { //attachment used
				$inUse = true;
				break;
			}
		}
		if (!$inUse) {
			unlink("./attachments/{$fName}"); //delete
			$deleted++;
		}
	}
	return $deleted;
}

function cleanTnsDir($period) {
	global $allCals;

	$deleted = 0;
	$dFilter = makeDateFilter($period);
	$fNames = scandir("./attachments");
	foreach ($fNames as $fName) { //for each attachment file name
		if ($fName[0] == '.') { continue; } //no file
		$inUse = false;
		foreach($allCals as $calID=>$title) { //for each installed calendar
			$dbH = dbConnect($calID,0); //connect to db
			$stH = dbQuery("SELECT COUNT(*) FROM `events` WHERE {$dFilter}`attach` LIKE '%;{$fName}%' LIMIT 1",0);
			$result = $stH->fetch(PDO::FETCH_NUM);
			$stH = null;
			if ($result[0] > 0) { //attachment used
				$inUse = true;
				break;
			}
		}
		if (!$inUse) {
			unlink("./attachments/{$fName}"); //delete
			$deleted++;
		}
	}
	return $deleted;
}


//init
$msg = '';
$attdir = empty($_POST["attdir"]) ? 0 : 1;
$recdir = empty($_POST["recdir"]) ? 0 : 1;
$tnsdir = empty($_POST["tnsdir"]) ? 0 : 1;
$adPer = isset($_POST["adPer"]) ? $_POST["adPer"] : 30;
$rdPer = isset($_POST["rdPer"]) ? $_POST["rdPer"] : 30;
$tdPer = isset($_POST["tdPer"]) ? $_POST["tdPer"] : 30;
$exe = !empty($_POST["exe"]) ? 1 : 0;

//control logic
if ($usr['privs'] == 9) {
	if ($exe and (!$attdir and !$recdir and !$tnsdir)) { $msg = $ax['cup_no_function_checked'];	}
	echo "<p class='error'>{$msg}</p>
		<div class='scrollBox sBoxAd'>\n";
	if (!$exe or (!$attdir and !$recdir and !$tnsdir)) {
		echo "<aside class='aside'>{$ax['xpl_clean_up']}</aside>\n<div class='centerBox'>\n";
		cupForm(); //manage db form
		echo "</div>\n";
	} else {
		$allCals = getCals(); //get installed calendars
		echo "<div class='centerBox'>\n";
		processFunctions();
		echo "</div>\n";
	}
	echo "</div>\n";
} else {
	echo "<p class='error'>{$ax['no_way']}</p>\n";
}
?>