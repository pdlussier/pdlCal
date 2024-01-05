<?php
/*
= users matrix view of events =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function showEvents($date,$uID) {
	global $xx, $evtList, $set, $eDetails;

	foreach ($evtList[$date] as $evt) {
		if ($evt['uid'] != $uID) { continue; }
		$popAttr = makePopAttrib($evt,$date);
		$bgColor = $set['eventColor'] ? $evt['cbg'] : $evt['uco'];
		$style = $bgColor ? " style='background-color:{$bgColor};'" : '';
		$class = $evt['sym'] ? 'symbol' : 'square';
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
$daysToShow = $set['XvWeeksToShow'] * 7;
$uxTime = strtotime($opt['cD'].' 12:00:00'); //Unix time of cD
$dayNr = date('w',$uxTime); //0:Su - 6:Sa

//set the start and end date of the calendar period to show
$sTime = $uxTime - ((($dayNr - $set['weekStart'] + 7) % 7) * 86400); //calendar start time
$sDate = date('Y-m-d',$sTime); //cal start date
$eDate = date('Y-m-d',$sTime + (($daysToShow - 1) * 86400)); //cal end date

$prevDate = date("Y-m-d",$sTime - (($daysToShow - 7) * 86400));
$nextDate = date("Y-m-d",$sTime + (($daysToShow - 7) * 86400));

//get users

$filter = ''; //user filter
if (count($opt['cU']) > 0 and $opt['cU'][0] != 0) {
	$filter .= "u.`ID` IN (".implode(",",$opt['cU']).") AND ";
}
if (count($opt['cG']) > 0 and $opt['cG'][0] != 0) {
	$filter .= "g.`ID` IN (".implode(",",$opt['cG']).") AND ";
}
$stH = dbQuery("SELECT u.`ID`, u.`name`, g.`color` 
	FROM `users` AS u
	INNER JOIN `groups` AS g ON g.`ID` = u.`groupID`
	WHERE {$filter}u.`status` >= 0
	ORDER BY u.`name`");
$users = $stH->fetchAll(PDO::FETCH_ASSOC); //2-dim array

if (count($users) == 0) {
	echo "<div class='scrollBox sBoxMx'><h3>{$xx['vws_no_users']}</h3></div>";
	goto end;
}

//retrieve events
retrieve($sDate,$eDate,'guc');

//display header
$dateHdr = '<span'.($winXS ? '' : ' class="viewHdr"').'>'.makeD($sDate,3)." - ".makeD($eDate,3).'</span>';
$arrowL = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$prevDate}'})\">&#9664;</a>";
$arrowR = "<a class='noPrint arrowLink' href=\"javascript:index({cD:'{$nextDate}'})\">&#9654;</a>";
echo "<div class='calHeadMx'>\n<h5>{$arrowL}{$dateHdr}{$arrowR}</h5>\n</div>";

//display matrix - users
echo '<div'.($winXS ? '' : " class='scrollBox sBoxMx' id='sBox'").">\n";
echo "<div class='rowBoxMx'>\n";
echo "<table class='matrix'>\n";
echo "<tr><th class='borderR'>\n";
if (strpos($avViews,'9') !== false) {
	echo	"<form method='post' action=\"javascript:index({cP:9});\">
<button type='submit' name='back' value='y'>{$xx['vws_evt_cats']}</button>
</form>\n";
}
echo"</th>\n</tr>\n";
echo "<tr><th class='borderR'>{$xx['vws_cal_users']}</th></tr>\n";
foreach($users as $user) {
	$style = $user['color'] ? " style='background-color:{$user['color']};'" : '';
	echo "<tr>\n<td class='rowLeft'{$style}>{$user['name']}</td>\n</tr>\n";
}
echo "</table>\n</div>\n";

//display matrix - calendar days
//calendar
echo "<div class='calBoxMx'>\n";
echo "<table class='matrix'>\n";
echo "<col span='{$daysToShow}'>\n";
//calendar months
echo "<tr>\n";
$cTime = $sTime;
for($i = 0; $i < $daysToShow; $i++) {
	$dx = date('j',$cTime); //day of month (1 - 31)
	$dxNext = date('j',$cTime+86400);
	$mx = date('n',$cTime); //month (1 - 12)
	if($dx == 1 or $dx == 15 or ($i == 0 and $dxNext != '1' and $dxNext != '15')) {
		echo "<th class='month'>".$months[$mx-1]."</th>\n";
	} else {
		echo "<th></th>\n";
	}
	$cTime += 86400; //+1 day
}
echo "</tr>\n";
//calendar week days
echo "<tr>\n";
for($i=$set['weekStart']; $i < ($set['weekStart']+$daysToShow); $i++) {
	$cTime = $sTime + (($i - $set['weekStart']) * 86400);
	$cDate = date("Y-m-d",$cTime);
	$day = ltrim(substr($cDate,8,2),"0");
	if (!$cH) {
		$day = "<span class='dom'>{$wkDays_l[$i%7]} {$day}</span>";
	} else {
		$day = "<span class='dom point' onclick=\"index({cP:6,cD:'{$cDate}'}); event.stopPropagation();\" title=\"{$xx['vws_view_day']}\">{$wkDays_l[$i%7]} {$day}</span>";
	}
	echo "<th>{$day}</th>"; //week days
}
echo "</tr>\n";
//calendar body
foreach($users as $user) {
	echo "<tr>\n";
	for($i=0; $i < $daysToShow; $i++){ //number of days to show
		$cTime = $sTime + ($i * 86400);
		$cDate = date("Y-m-d",$cTime);
		$dayBg = '';
		if (!empty($evtList[$cDate])) { //check if day background should be set
			foreach ($evtList[$cDate] as $evt) {
				if ($evt['uid'] == $user['ID'] and ($evt['dbg'] & 1)) {
					$dayBg = " style='background:{$evt['cbg']}'";
				}
			}
		}
		$dow = strpos($set['workWeekDays'],date("w",$cTime)) === false ? 'we0' : 'wd0';
		if ($cDate == $today) {
			$dow .= ' today';
		} elseif ($cDate == $opt['nD']) {
			$dow .= ' slday';
		}
		$cid = (count($opt['cC']) == 1 and $opt['cC'][0] != 0) ? $opt['cC'][0] : 0;
		$addNew = '';
		if ($usr['ID'] == $user['ID'] and $usr['privs'] > 1) {
			$dow .= ' hyper';
			$addNew = " onclick=\"newE('{$cDate}',{$cid});\" title=\"{$xx['vws_add_event']}\"";
		}
		echo "<td class='{$dow}'{$dayBg}{$addNew}>\n";
		if (!empty($evtList[$cDate])) { showEvents($cDate,$user['ID']); }
		echo "</td>\n";
	}
	echo "</tr>\n";
}
//calendar week days
echo "<tr>\n";
for($i=$set['weekStart']; $i < ($set['weekStart']+$daysToShow); $i++) {
	$cTime = $sTime + (($i - $set['weekStart']) * 86400);
	$cDate = date("Y-m-d",$cTime);
	$day = ltrim(substr($cDate,8,2),"0");
	if (!$cH) {
		$day = "<span class='dom'>{$wkDays_l[$i%7]} {$day}</span>";
	} else {
		$day = "<span class='dom point' onclick=\"index({cP:6,cD:'{$cDate}'}); event.stopPropagation();\" title=\"{$xx['vws_view_day']}\">{$wkDays_l[$i%7]} {$day}</span>";
	}
	echo "<th>{$day}</th>"; //week days
}
echo "</tr>\n";
echo "</table>\n</div>\n</div>\n";
end:
?>
