<?php
/*
= upcoming events view =

This file is part of the LuxCal Web Calendar.
Copyright 2009-2020 LuxSoft - www.LuxSoft.eu
License https://www.gnu.org/licenses/gpl.html GPL version 3

The LuxCal Web Calendar is distributed WITHOUT ANY WARRANTY.
*/

function showEvents(&$events,$date) {
	global $set, $usr, $hoverBox, $eDetails, $xx, $upcoTxt;
	
	foreach ($events as $evt) {
		if ($set['eventColor']) {
			$eStyle = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
		} else {
			$eStyle = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
		}
		$eStyle = $eStyle ? ' style="'.$eStyle.'"' : '';
		$chBox = '';
		if ($evt['cbx']) {
			$mayCheck = ($usr['privs'] > 2 or ($usr['privs'] > 1 and $evt['uid'] == $usr['ID'])); //boolean
			$chBox .= !$evt['mde'] ? (strpos($evt['chd'], $date) ? $evt['cmk'] : '&#x2610;') : '?';
			$cBoxAtt = ($mayCheck and !$evt['mde']) ? "class='chkBox floatL point' onclick=\"checkE(this,{$evt['eid']},'{$date}',{$usr['ID']});\"" : 'class="chkBox floatL arrow"';
			$chBox = "<span title='{$evt['clb']}' {$cBoxAtt}>{$chBox}</span>";
		}
		$popAttr = $hoverBox ? makePopAttrib($evt,$date) : '';
		$toAppr = ($evt['app'] and !$evt['apd']) ? ' toAppr' : '';
		$time = makeHovT($evt);
		echo "<table>\n<tr>\n<td class='widthCol1'>{$time}</td>\n<td class='eBox{$toAppr}'>";
		if ($eDetails or $evt['mayE']) {
			$click = ($evt['mayE'] ? 'editE' : 'showE')."({$evt['eid']},'{$date}')";
			$title = $evt['mayE'] ? $xx['vws_edit_event'] : ($eDetails ? $xx['vws_see_event'] : '');
			echo "<div class='evtTitle bold'>{$chBox}<div class='point'{$eStyle} onclick=\"{$click};\"{$popAttr} title=\"{$title}\">{$evt['tix']}</div></div>\n";
			echo makeE($evt,$set['evtTemplUpc'],'bx',"<br>")."\n";
		} else {
			echo "<div class='evtTitle bold'>{$chBox}<div{$eStyle}{$popAttr}>{$evt['tix']}</div></div>\n";
		}
		echo "</td>\n</tr>\n</table><br>\n";
		//text version - add event
		$upcoTxt .= "\n{$time}\n".html_entity_decode($evt['tix'],ENT_QUOTES)."\n";
		if ($eDetails or $evt['mayE']) {
			$upcoTxt .= str_replace("<br>","\n",html_entity_decode(makeE($evt,$set['evtTemplUpc'],'br',"\n"),ENT_QUOTES))."\n";
		}
	}
}

//sanity check
if (empty($lcV)) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //launch via script only

//initialize
$evtList = array();
$hoverBox = array_diff(str_split($set['evtTemplPop']),str_split($set['evtTemplUpc'])); //if pop > upc display hover box
$eTime = strtotime($opt['cD'].' 12:00:00') + (($set['lookaheadDays']-1) * 86400); //Unix time of end date
$eDate = date("Y-m-d", $eTime);
$fName = 'upco.txt';
$rName = str_replace('.','-'.date("Ymd-Hi").'.',$fName);

//display header
$tSpan = makeD($opt['cD'],2)." - ".makeD($eDate,2);
echo "<div class='subHead'>
	<button class='noPrint floatR' type='button' title='{$xx['vws_download_title']}' onclick=\"location.href='dloader.php?ftd=./files/{$fName}&amp;nwN={$rName}'\">{$xx['vws_download']}</button>
	<h5 class='subHead bold'>{$tSpan}</h5>
	</div>\n";

//header down-loadable text file
$upcoTxt = "\n{$set['calendarTitle']}\n".str_repeat('=',strlen($set['calendarTitle']))."\n";
$upcoTxt .= "\n{$xx['title_upcoming']}  {$tSpan}\n".str_repeat('=',strlen($xx['title_upcoming']."  ".$tSpan))."\n";

//retrieve events
retrieve($opt['cD'],$eDate,'guc');

//display upcoming events
echo "<div".($winXS ? '' : " class='scrollBox sBoxUp' id='sBox'").">\n";
$fsClass = $winXS ? 'upc-m' : 'upc';
if ($evtList) {
	foreach($evtList as $date => &$events) {
		if ($events) {
			$evtDate = makeD($date,5);
			$upcoTxt .= "\n{$evtDate}\n".str_repeat('-',strlen($evtDate)); //text version - new date
			echo "<fieldset class='{$fsClass}'>\n<legend>{$evtDate}</legend>\n";
			showEvents($events,$date);
			echo "</fieldset>";
		}
	}
} else {
	echo "<div class='floatC'>{$xx['none']}</div>\n";
}
echo "</div>\n";
file_put_contents("./files/{$fName}",$upcoTxt,LOCK_EX); //save upco text file
?>
