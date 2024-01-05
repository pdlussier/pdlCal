<?php
/*
= week view of events =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function showMiniCal($tslotD) {
	global $mode, $set, $xx, $wkDays, $wkDays_s, $evtList;
	
	//compute dates
	$offM = isset($_GET['oM']) ? $_GET['oM'] : 0; //offset Month
	$timeD1 = mktime(12,0,0,date('n',$tslotD)+$offM,1,date('Y',$tslotD)); //time 1st day
	$dateD1 = date("Y-m-d", $timeD1); //date 1st day
	$curM = date("n",$timeD1);
	$curY = date("Y",$timeD1);
	$sOffset = ($set['weekStart']) ? date("N", $timeD1) - 1 : date("w", $timeD1); //offset first day
	$eOffset = date("t", $timeD1) + $sOffset; //offset last day
	$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35); //4, 5 or 6 weeks
	$sDate = date("Y-m-d", $timeD1 - ($sOffset * 86400)); //start date in 1st week
	$eDate = date("Y-m-d", $timeD1 + ($daysToShow - $sOffset - 1) * 86400); //end date in last week
	retrieve($sDate,$eDate,'guc'); //retrieve events

	/* display header */
	$arrowL = "<a class='arrowLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM-1)."' title='{$xx['vws_prev_month']}'>&#9664;</a>\n";
	$arrowR = "<a class='arrowLink' href='".htmlentities($_SERVER['PHP_SELF']).'?oM='.($offM+1)."' title='{$xx['vws_next_month']}'>&#9654;</a>\n";
	echo "<h6 class='floatC'>{$arrowL}".makeD($dateD1,3)."{$arrowR}</h6>\n";

	/* display month */
	$days = ($mode == 'fm') ? '1234567' : $set['workWeekDays']; //set days to show
	$cWidth = round(98 / strlen($days),1).'%';
	echo "<table class='grid'>
<col span='".strlen($days)."' class='dCol' style='width:{$cWidth}'>
<tr>\n";
	for ($i = 0; $i < 7; $i++) {
		$cTime = mktime(12,0,0,$curM,$i-$sOffset+1,$curY ); //current time
		if (strpos($days,date("N",$cTime)) !== false) { echo "<th>{$wkDays_s[$set['weekStart'] + $i]}</th>"; } //week days
	}
	echo "</tr>\n";
	for ($i = 0; $i < $daysToShow; $i++) {
		$cTime = mktime(12,0,0,$curM,$i-$sOffset+1,$curY ); //current time
		$cDate = date("Y-m-d", $cTime);
		if ($i%7 == 0) { //new week
			echo "<tr class='yearWeek'>\n";
		}
		$dayNr = date("N", $cTime);
		if (strpos($days,$dayNr) !== false) {
			$dow = ($i < $sOffset or $i >= $eOffset) ? 'out' : (($dayNr > 5) ? 'we0' : 'wd0');
			if ($cDate == date("Y-m-d")) { $dow .= ' today'; }
			$day = ltrim(substr($cDate, 8, 2),"0");
			echo "<td class='{$dow}'>\n<div class='dom'>{$day}</div>\n";
			if (!empty($evtList[$cDate])) {
				foreach ($evtList[$cDate] as $evt) { //show events for this date
					$popAttr = makePopAttrib($evt,$cDate);
					$bgColor = $evt['cbg'] ? " style=\"background-color:{$evt['cbg']};\"" : '';
					$class = $evt['sym'] ? ' symbol' : ' square';
					echo "<span class='arrow {$class}'{$bgColor}{$popAttr}>{$evt['sym']}</span>\n";
				}
			}
			echo "</td>\n";
		}
		if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
	}
	echo "<tr>\n<th class='smallHt' colspan='7'>";
	if ($offM != 0) { echo "<a class='floatC' href='".htmlentities($_SERVER['PHP_SELF'])."?oM=0' title=\"{$xx['vws_back_to_main_cal']}\">{$xx['back']}</a>"; }
	echo "</th>\n</tr>\n</table>\n";
}

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
require './views/dw_functions.php';
$evtList = array();
$tcDate = strtotime($opt['cD'].' 12:00:00'); //Unix time of cD
$d = substr($opt['cD'],8,2);
$m = substr($opt['cD'],5,2);
$y = substr($opt['cD'],0,4);
$days = ($mode == 'fw') ? '0123456' : $set['workWeekDays']; //days to show
$sOffset = (date("w", mktime(12,0,0,$m,$d,$y)) - $set['weekStart'] + 7) % 7;
$sDow = $d-$sOffset; //first day of week
$sDayOfWk = date("Y-m-d", mktime(12,0,0,$m,$sDow,$y));
$eDayOfWk = date("Y-m-d", mktime(12,0,0,$m,$sDow+strlen($days)-1,$y));
$sDoLastW = date("Y-m-d", mktime(12,0,0,$m,$sDow-7,$y));
$sDoNextW = date("Y-m-d", mktime(12,0,0,$m,$sDow+7,$y));

if (($set['spMiniCal'] or $set['spImages'] or $set['spInfoArea']) and !$winXS) { //show side panel
	echo "<div class='sPanel'>\n";
	if ($set['spMiniCal']) {
		echo "<div class='spCal'>\n";
		showMiniCal($tcDate); //this month
		echo "</div>\n";
	}
	if ($set['spImages'] or $set['spInfoArea']) {
		if (!is_dir($set['spFilesDir'])) {
			echo "<br><div class='warning'>images/info text folder not found.</div>\n";
		} else {
			$files = scandir($set['spFilesDir']); //get files from sidepanel folder
			if ($set['spImages']) {
				foreach($files as $fName) {
					if (strlen($fName) > 5 and substr($fName,0,2) == date('m',$tcDate) and stripos('~.jpg.gif.png',substr($fName,-4)) ) {
					echo "<div class='spImg'>\n<img class='spImage' src='{$set['spFilesDir']}/{$fName}' alt='decoration'>\n</div>\n";
						break;
					}
				}
			}
			if ($set['spInfoArea']) {
				foreach($files as $fName) {
					if (strlen($fName) > 5 and substr($fName,0,2) == date('m',$tcDate) and stripos('~.txt.html',substr($fName,-4)) ) {
						$spMsg = file_get_contents("{$set['spFilesDir']}/{$fName}"); //message file;
						echo "<div class='spMsg'>\n{$spMsg}</div>\n";
						break;
					}
				}
			}
		}
	}
	echo "</div>\n";
	echo "<div class='container'>\n";
}

/* display header */
$weekNr = $set['weekNumber'] ? ' ('.$xx['vws_week'].' '.date('W', mktime(12,0,0,$m,$sDow+1,$y)).')' : '';
if ($winXS) {
	$header = '&nbsp;<span>'.makeD($sDayOfWk,2,true).' - '.makeD($eDayOfWk,2,true)."</span>&nbsp;";
} else {
	$header = "&nbsp;<span class='viewHdr'>".makeD($sDayOfWk,2).' - '.makeD($eDayOfWk,2)."{$weekNr}</span>&nbsp;";
}
$arrowL = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$sDoLastW}'})\">&#9664;</a>";
$arrowR = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$sDoNextW}'})\">&#9654;</a>";
$dateHdr = !$cH ? $header : "<a href=\"javascript:index({cP:'up'});\">{$header}</a>";
echo "<h5 class='floatC'>{$arrowL}{$dateHdr}{$arrowR}</h5>\n";

$cWidth = round(98 / strlen($days),1).'%';

/* display day headers */
echo "<div".($winXS ? '' : " class='scrollBoxHead'").">\n";
echo "<table class='grid'>
	<tr><th class='tCol'>{$xx['vws_time']}</th>\n";
for ($i=0;$i<7;$i++) {
	$cTime = mktime(12,0,0,$m,$sDow+$i,$y); //current time
	if (strpos($days,date("w",$cTime)) !== false) {
		$sDate = date("Y-m-d",$cTime);
		if (!$cH) {
			echo "<th class='dCol' style='width:{$cWidth}'>".makeD($sDate,($winXS ? 1 : 4),'xs')."</th>\n";
		} else {
			echo "<th class='dCol point' style='width:{$cWidth}' onclick=\"index({cP:6,cD:'{$sDate}'});\" title=\"{$xx['vws_view_day']}\">".makeD($sDate,($winXS ? 1 : 4),'xs')."</th>\n";
		}
	}
}
echo "</tr>\n</table>
	</div>";

/* retrieve events */
retrieve($sDayOfWk,$sDoNextW,'guc');

/* display days */
echo "<div".($winXS ? '' : " class='scrollBox sBoxWe' id='sBox'").">\n";
echo "<table class='grid'>
	<tr><td class='tCol tColBg'>\n";
showHours();
echo "</td>\n";
for ($i=0;$i<7;$i++) {
	$cTime = mktime(12,0,0,$m,$sDow+$i,$y); //current time
	$cDate = date("Y-m-d", $cTime); //current date
	$dayNr = date("w",$cTime);
	if (strpos($days,$dayNr) !== false) {
		$dayBg = '';
		$curSeq = 0;
		if (!empty($evtList[$cDate])) { //check day background should be set
			foreach ($evtList[$cDate] as $evt) {
				if (($evt['dbg'] & 2) and $evt['seq'] > $curSeq) {
					$dayBg = " background:{$evt['cbg']};";
					$curSeq = $evt['seq'];
				}
			}
		}
		$dow = "<td class='dCol ".(strpos($set['workWeekDays'],$dayNr) === false ? 'we0' : 'wd0'); //week end or week day
		if ($cDate == $today) {
			$dow .= ' today';
		} elseif ($cDate == $opt['nD']) {
			$dow .= ' slday';
		}
		$dow .= "'";
		echo $dow." style='width:$cWidth;{$dayBg}'>\n";
		showDay(date("Y-m-d",$cTime));
		echo "</td>\n";
	}
}
echo "</tr>\n</table>
</div>\n";
if (($set['spMiniCal'] or $set['spImages'] or $set['spInfoArea']) and !$winXS) { //show side panel
	echo "</div>\n";
}
if ($usr['privs'] > 1) {
	echo "<script>dragTime()</script>\n";
}
?>