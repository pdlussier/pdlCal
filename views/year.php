<?php
/*
= year view of events =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function showEvents($date) {
	global $xx, $evtList, $set, $eDetails;

	foreach ($evtList[$date] as $evt) {
		$popAttr = makePopAttrib($evt,$date);
		$bgColor = $set['eventColor'] ? $evt['cbg'] : $evt['uco'];
		$style = $bgColor ? " style='background-color:{$bgColor};'" : '';
		$class = $evt['sym'] ? 'symbol' : 'square';
		$class .= ($evt['app'] and !$evt['apd']) ? ' aBorder' : '';
		$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
		$onClick = ($eDetails or $evt['mayE']) ? "class='{$class} point'{$style} onclick=\"{$click}; event.stopPropagation();\"" : "class='{$class} arrow'{$style}";
		$title = $evt['mayE'] ? $xx['vws_edit_event'] : ($eDetails ? $xx['vws_see_event'] : '');
		echo "<div {$onClick}{$popAttr} title=\"{$title}\">{$evt['sym']}</div>\n";
	}
}

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$evtList = array();
if ($set['yearStart']) { //start with month $set['yearStart']
	$m = $set['yearStart'];
	$y = (intval(substr($opt['cD'],5,2)) >= $m) ? intval(substr($opt['cD'],0,4)) : intval(substr($opt['cD'],0,4)) - 1;
	$prevDate = date("Y-m-d",mktime(12,0,0,$m,1,$y-1));
	$nextDate = date("Y-m-d",mktime(12,0,0,$m,1,$y+1));

	//set the start date and end date of the period to show
	$fromM = $m; //start month
	$tillM = $fromM + 12; //month following end month
} else { //use current date to determine start month
	$m = substr($opt['cD'],5,2);
	$y = substr($opt['cD'],0,4);
	$jumpRows = $set['YvRowsToShow'] - intval($set['YvRowsToShow']*0.5);
	$prevDate = date("Y-m-d",mktime(12,0,0,$m-$set['YvColsToShow']*$jumpRows,1,$y));
	$nextDate = date("Y-m-d",mktime(12,0,0,$m+$set['YvColsToShow']*$jumpRows,1,$y));

	//set the start date and end date of the period to show
	$fromM = $m - ($m-1)%$set['YvColsToShow']; //start month
	$tillM = $fromM + $set['YvColsToShow'] * $set['YvRowsToShow']; //month following end month
}
$sDate = date("Y-m-d",mktime(12,0,0,$fromM,1,$y)); //start date
$eDate = date("Y-m-d",mktime(12,0,0,$tillM,0,$y)); //end date

//display header
$dateHdr = '<span'.($winXS ? '' : ' class="viewHdr"').'>'.makeD($sDate,3)." - ".makeD($eDate,3).'</span>';
$arrowL = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$prevDate}'})\">&#9664;</a>";
$arrowR = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$nextDate}'})\">&#9654;</a>";
echo "<h5 class='floatC'>{$arrowL}{$dateHdr}{$arrowR}</h5>\n";

//retrieve events
retrieve($sDate,$eDate,'guc');

//display calendar
echo '<div'.($winXS ? '' : " class='scrollBox sBoxYe' id='sBox'").">\n";
echo "<table class='mgrid'>\n";
$cm = $fromM; //current month
for($p=0;$p<$set['YvRowsToShow'];$p++){ //number of rows to show
	echo '<tr>';
	for($q=0;$q<$set['YvColsToShow'];$q++){ //# of months per row
		echo '<td class="holder">';

		//collect month info
		$timeDay1 = mktime(12,0,0,$cm,1,$y); //Unix time of 1st day of month
		$day1 = date("Y-m-d",$timeDay1);
		$thisM = substr($day1,5,2);
		$thisY = substr($day1,0,4);
		$sOffset = (date("w",$timeDay1) - $set['weekStart'] + 7) % 7; //offset first day
		$eOffset = date("t",$timeDay1) + $sOffset; //offset last day
		$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35); //4,5 or 6 weeks

		//display month header
		if (!$cH) {
			echo "<h4 class='floatC'>".makeD($day1,3)."</h4>\n";
		} else {
			echo "<h4 class='floatC point' onclick=\"index({cP:2,cD:'{$day1}'});\" title=\"{$xx['vws_view_month']}\">".makeD($day1,3)."</h4>\n";
		}
		echo "<table class='grid'>\n";
		if ($set['weekNumber']) { echo "<col class='wkCol'>"; } //add week # column
		echo "<col span='7' class='dCol7'>\n";
		echo "<tr>\n";
		if ($set['weekNumber']) { echo '<th>'.$xx['vws_wk'].'</th>'; } //week # hdr
		for ($i = 0; $i < 7; $i++) echo "<th>{$wkDays_s[($set['weekStart'] + $i) % 7]}</th>"; //week days
		echo "</tr>\n";

		//display month
		for ($i = 0; $i < $daysToShow; $i++) {
			$cTime = mktime(12,0,0,$thisM,$i-$sOffset +1,$thisY);
			$cDate = date("Y-m-d",$cTime);
			if ($i%7 == 0) { //new week
				echo "<tr class='yearWeek'>";
				if ($set['weekNumber']) { //display week nr
					echo !$cH ? "<td class='wnr'>" : "<td class='wnr hyper' onclick=\"index({cP:4,cD:'{$cDate}'});\" title=\"{$xx['vws_view_week']}\">";
					echo date("W", $cTime + 86400)."</td>\n";
				}
			}
			if ($i >= $sOffset and $i < $eOffset) { //day in month
				$dayBg = '';
				$curSeq = 0;
				if (!empty($evtList[$cDate])) { //check day background should be set
					foreach ($evtList[$cDate] as $evt) {
						if (($evt['dbg'] & 1) and $evt['seq'] > $curSeq) {
							$dayBg = " style='background:{$evt['cbg']}'";
							$curSeq = $evt['seq'];
						}
					}
				}
				$dow = strpos($set['workWeekDays'],date("w",$cTime)) === false ? 'we0' : 'wd0';
				if ($cDate == $today) {
					$dow .= ' today';
				} elseif ($cDate == $opt['nD']) {
					$dow .= ' slday';
				}
				$day = ltrim(substr($cDate,8,2),"0");
				$day = !$cH ? "<span class='dom floatR'>{$day}</span>" : "<span class='dom floatR hyper' onclick=\"index({cP:6,cD:'{$cDate}'}); event.stopPropagation();\" title=\"{$xx['vws_view_day']}\">{$day}</span>";
				$cid = (count($opt['cC']) == 1 and $opt['cC'][0] != 0) ? $opt['cC'][0] : 0;
				$addNew = '';
				if ($usr['privs'] > 1) {
					$dow .= ' hyper';
					$addNew = " onclick=\"newE('{$cDate}',{$cid});\" title=\"{$xx['vws_add_event']}\"";
				}
				echo "<td class='{$dow}'{$dayBg}{$addNew}>{$day}<div>&nbsp;</div>\n";
				if (!empty($evtList[$cDate])) { showEvents($cDate); }
			} else {
				echo "<td class='blank'>";
			}
			echo "</td>\n";
			if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week,wrap to left
		}
		echo "</table>\n</td>\n";
		$cm++;
	}
	echo "</tr>\n";
}
echo "</table>\n</div>\n";
?>
