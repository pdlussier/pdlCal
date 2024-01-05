<?php
/*
= pdlCal style sheet =

Copyright 2019 Pascal-Denis Lussier; built on LuxCal 
Copyright 2009-2019 LuxSoft - www.LuxSoft.eu
License http://www.gnu.org/licenses/gpl.html GPL version 3

*/

header('content-type:text/css');

/* ---- LOAD USER-INTERFACE THEME DEFINITIONS ---- */

//get calendar in use
$calID = unserialize($_COOKIE['LXCcid']);

//start session
$calPath = rtrim(substr(dirname($_SERVER["PHP_SELF"]),0,-4),'/').'/';
session_set_cookie_params(1800,$calPath); //set cookie path
session_name('PHPsid_'.$calID);
session_start();
if (!empty($_SESSION['theme'])) { //theme file specified
	$theme = $_SESSION['theme'];
	require "./{$theme}";
} else { //no theme specified, take theme from db
	chdir('../'); //change working directory
	require 'common/toolboxd.php'; //get database tools + LCV
	require 'lcconfig.php'; //get db credentials
	$dbH = dbConnect($calID); //connect to db
	$stH = dbQuery("SELECT `name`,`value` FROM `styles`");
	$th = array();
	while (list($name,$value) = $stH->fetch(PDO::FETCH_NUM)) {
		$th[$name] = $value;
	}
	$theme = 'db theme';
}

//preprocessing
$buttonHt = intval(($th['MBUTS'] * $th['PSXXX']) + 8); //height buttons
$tInputHt = intval(($th['MFFLD'] * $th['PSXXX']) + 4); //height buttons
$selectHt = intval(($th['MFFLD'] * $th['PSXXX']) + 6); //height buttons
$sBoxHdTp = $th['PSXXX'] + 8; //month/week/day view scrollbox head top
$sBoxTp = $thHt + $sBoxHdTp + 4; //month/week/day view scrollbox top
$navBar = $th['PTBAR'] + $buttonHt + 16 + $th['sCtOf']; //offset navbar bottom
$offCal = $navBar + 2 + $th['sCtOf']; //offset calendar
$offUpc = $navBar; //offset side bar Upcoming
$offTod = $navBar + 20; //offset side bar Todo
$offToa = $navBar + 40; //offset side bar To approve

//serve styles
echo
// ---- make HTML 5 elements block-level for consistent styling ----
"/*theme: {$theme}*/

footer, aside {display:block;}
"
.// ---- general: site ----- cursor:default;
"
* {padding:0; margin:0;}
body, select, th, td {font:{$th['PSXXX']}px {$th['FFXXX']};}
a, input, label, select {cursor:pointer;}
input[type='text'], input[type='password'], textarea {font-family:inherit; font-size:{$th['MFFLD']}em; padding:2px 4px 2px; color:{$th['CFFLD']}; background:{$th['BFFLD']}; border-radius:2px; border:1px solid #666; cursor:text;}
input[type='text'], input[type='password'] {height:{$tInputHt}px; margin:0px 6px 3px 0px; padding:1px 3px 2px;border: 2px ridge #ccc; border-radius: 8px; text-align: center;vertical-align:middle;}
button {font-size:12px; height:22px; padding:2px 8px 0px; color:{$th['CBUTS']}; background:{$th['BBUTS']}; border-radius:8px; border:1px solid #fff; cursor:pointer; margin:0px 3px 4px 3px; vertical-align: middle;}

input[type='file'] {font-size:{$th['MBUTS']}em; border-color:#666; background:{$th['BBUTS']};}
input[type='file']:hover, button:hover {border-color:{$th['EBUTS']}; color: #9DD84F;}
select {padding:0 2px; font-size:{$th['MFFLD']}em; height:{$selectHt}px; color:{$th['CDROP']}; background:{$th['BDROP']}; border-radius:2px; border:1px solid #666;}

button.center.noPrint {position:unset;display:block;top:120px;z-index:200}
select option {padding:0 2px;}
body {background:{$th['BXXXX']}; color:{$th['CXXXX']};}
th {height:{$thHt}px; color:{$th['CBHAR']}; background:{$th['BBHAR']}; cursor:default;}
td {vertical-align:top;}
a {color:{$th['CXXXX']}; text-decoration:none;}
a:hover {text-shadow:0.2em 0.3em 0.2em #F88;}
a.urlembed {font-weight:bold; text-decoration:underline;}
hr {margin:10px 0px; border:1px solid {$th['BBHAR']};}
p {text-align:justify;}
img {border-style:none;}
mark {color:{$th['BHLIT']}; font-weight:bold; text-decoration:underline;}


h1 {font:bold {$th['PTBAR']}px {$th['FFXXX']}; padding: 10px 25px 10px 83px;".($th['sTbSw'] ? ' text-shadow:0.2em 0.3em 0.2em #888;' : '')." text-align:center;}
h2 {font:bold {$th['PPGTL']}px {$th['FFXXX']};}
h3 {font:bold {$th['PTHDL']}px {$th['FFXXX']};}
h4 {font:bold {$th['MTHDM']}em {$th['FFXXX']};}
h5 {font:bold {$th['MDTHD']}em {$th['FFXXX']};}
h6 {font:bold {$th['MSNHD']}em {$th['FFXXX']};}

h5.floatC {padding:0;}
#usrMenu.menu.usrMenu {visibility:hidden;display:none;}
.floatR.navLink {cursor:pointer;}

ul, ol {margin:0 25px;}
li {margin:4px 0;}

.fontS {font-size:{$th['MSMAL']}em;}
.bold {font-weight:bold;}

.floatR {float:right;}
.floatL {float:left;}
.floatC {text-align:center;}
.center {display:block; margin:auto;}
.inline {display:inline;}
.clear {clear:both;}

.point {cursor:pointer;}
.arrow {cursor:default;}
.move {cursor:move;}
.hyper:hover {cursor:pointer; background:{$th['BGCTH']}; overflow:hidden;}
.select:hover {cursor:pointer; background:red;}
.link {text-decoration:underline; color:{$th['CLINK']}; background:{$th['BLINK']};}
.pageTitle {margin:0 0 20px 5%;}
.noButton {border:none; background:none; cursor:pointer; text-decoration:underline;}
.confirm {margin:auto; width:70%; text-align:center; color:{$th['CCONF']}; background:{$th['BCONF']};}
.warning {margin:auto; width:70%; text-align:center; color:{$th['CWARN']}; background:{$th['BWARN']};}
.error {margin:auto; width:70%; text-align:center; color:{$th['CERRO']}; background:{$th['BERRO']};}
.inputError {background:{$th['BHLIT']} !important;}
.hired {color:#FF0000; font-weight:bold;}
.hide, .hpot {display:none;}
.noWrap {white-space:nowrap;}
.alert {position:relative; top:15%; text-align:center;}
.alert span {display:inline-block; padding:30px 60px; font-size:1.2em; background:white; border:1px solid red; border-radius:5px; box-shadow:5px 5px 5px #888;}

#cid {margin:6px auto;width:120px;}


"
.// ---- common ----
"
img.logo {
    background-image: url(https://downmystreetandupyours.org/public/favicon.png);
    background-size: contain;
    position: absolute;
    left: 17px;
    top: -1px;
    margin-bottom: 0px;
    width: 45px;
    height: 41px;
    z-index: 855;
}
#optMenu {visibility:hidden;display:none;}
div.logoYes {padding:0 10px 0 80px;}
div.logoNo {padding:0 10px;}
div.topBar {line-height:25px; color:{$th['CTBAR']}; background:{$th['BTBAR']};}
div.navBar {line-height:29px; background:{$th['BBHAR']}; border:2px inset {$th['EXXXX']}; border-style:solid none;}
div.content {left:0; top:76px; right:0; bottom:30px;position:absolute;}
div.contentE {padding:0 4px; font-size:{$th['MPWIN']}em;}
div.contentH {position:absolute; left:0; top:30px; right:0; bottom:5px; padding:3px 10px; font-size:{$th['MPWIN']}em; color:{$th['CXWIN']}; background:{$th['BXWIN']};}
footer {position:relative; left:0; right:0; bottom:1px; padding:0px 10px; font-size:0.8em; color:#fff; background:{$th['BBHAR']}; border:1px solid {$th['EXXXX']}; border-style:solid none; text-align:center;}
.footLB {font:italic bold 1.1em arial,sans-serif; color:#0033FF;}
.footLR {font:italic bold 1.1em roboto,sans-serif; color:#91c733; padding-right: 20px;}
div#toapBar {position:absolute; top:{$offToa}px; right:60px; height:60%; width:200px; padding:4px; border:2px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; background:{$th['BOVBX']}; z-index:22; overflow:hidden; display:none;}
div#todoBar {position:absolute; top:{$offTod}px; right:40px; height:60%; width:200px; padding:4px; border:2px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; z-index:21; overflow:hidden; display:none;}
div#upcoBar {position:absolute; top:{$offUpc}px; right:20px; height:60%; width:200px; padding:4px; border:2px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:#fff; background:{$th['BOVBX']}; z-index:20; overflow:hidden; display:none;}
div.barTop {margin-bottom:8px; padding:0 10px; line-height:28px; font-weight:bold; color:{$th['CBHAR']}; background:{$th['BBHAR']};}
div.barBody {position:absolute; top:60px; bottom:0px; width:96%; overflow:auto;}
div#sideMenu {position:absolute; top:{$navBar}px; right:4px; width:0; padding:4px 0; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; z-index:100; overflow:hidden; transition:0.5s;}
div#optPanel {position:absolute; top:{$navBar}px; left:4px; height:0; padding:0 4px; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; z-index:100; overflow:hidden; transition:0.5s;}
div.option {float:left; margin:0 2px;display:none;}
div.optHead {margin:2px 8px; color:{$th['CBHAR']}; background:{$th['BBHAR']};}
div.optList {max-height:206px; overflow-y:scroll;}
div.smGroup {margin:4px 0; border-top:1px solid #D0D0D0;}
div.smGroup p {padding:2px 4px; cursor:pointer; white-space:nowrap; transition:0.3s;}
div.smGroup p:hover {background:#E0E0E0;}
.closeX {position:absolute; top:4px; right:4px; cursor:pointer;}
.note {color:{$th['CBHAR']};}
"
.// ---- all pages -----
"
.scroll {overflow:auto;}
.dtPick {cursor:pointer; font-size:14px;}
div.scrollBoxHead {position:absolute; left:0; right:0; padding:0; overflow-y:scroll;width: 101%;}
div.scrollBoxYe {position:absolute; left:0; top:20px; right:0; bottom:0px; padding:0 5px; overflow:auto;}
div.scrollBoxMo, .scrollBoxWe, .scrollBoxDa {position:absolute; left:0; top:115px; right:0; bottom:0px; padding:0 5px; overflow-y:scroll;}

div.scrollBoxUp, .scrollBoxCh {position:absolute; left:0; top:85px; right:0; bottom:0; padding:0 5px; overflow:auto;}
div.scrollBoxAd {position:absolute; left:0; top:85px; right:0; bottom:0; padding:0 5px; overflow:auto;}
div.scrollBoxTs {position:absolute; left:0; top:125px; right:0; bottom:0; overflow:auto;}
div.scrollBoxSt {position:absolute; left:0; top:105px; right:0; bottom:0; overflow:auto;}
div.scrollBoxTn {position:absolute; left:0; top:50px; right:0; bottom:0; overflow:auto;}
div.scrollBoxMx {position:absolute; left:0; top:84px; right:0; bottom:0; overflow:auto;}
div.calHeadMx {margin-left:185px; text-align:center;}
div.rowBoxMx {position:absolute; left:5px; top:0; width:180px;}
div.calBoxMx {position:absolute; left:185px; top:0; right:5px; overflow-x:scroll;}

.centerBox {display:table; margin:20px auto;}
.centerBoxFix {width:900px; margin:24px auto;}

div.conField {margin-bottom:10px;}
div.conField input, textarea {margin-top:4px; width:100%;}

table.mgrid td.holder{vertical-align:top; width:16%; padding:2px;}

table.grid {width:100%; border-collapse:collapse; table-layout:fixed;}
table.grid .wkCol {width:25px;}
table.grid .tCol {width:50px;}
table.grid .dCol {}
table.grid .dCol7 {width:14%;}
table.grid .tColBg {background:{$th['BGWTC']};}
table.grid tr.monthWeek {height:115px;}
table.grid tr.yearWeek {height:40px;}
table.grid th {border:3px ridge {$th['EXXXX']}; overflow:hidden;}
table.grid td {border:1px solid {$th['EXXXX']}; overflow:hidden;}
table.grid td.wnr {border:none; vertical-align:middle; background:{$th['BGWTC']}; text-align:center;}
table.grid td.we0 {color:{$th['CGWE2']}; background:{$th['BGWE2']};}
table.grid td.we1 {color:{$th['CGWE1']}; background:{$th['BGWE1']};}
table.grid td.wd0 {color:{$th['CGWD2']}; background:{$th['BGWD2']};}
table.grid td.wd1 {color:{$th['CGWD1']}; background:{$th['BGWD1']};}
table.grid td.out {color:{$th['CGOUT']}; background:{$th['BGOUT']};}
table.grid td.blank {border:none; background:rgba(0,0,0,0);}
table.grid td.today {border:1px solid {$th['EGTOD']}; color:{$th['CGTOD']}; background:{$th['BGTOD']};}
table.grid td.slday {border:1px solid {$th['EGSEL']}; color:{$th['CGSEL']}; background:{$th['BGSEL']};}

table.matrix {width:100%; border-collapse:collapse; table-layout:fixed;}
table.matrix th.month {text-align:left; font-weight:bold;}
table.matrix th.rowName {font-weight:bold;}
table.matrix tr {height:46px;}
table.matrix tr.headMx {height:20px; }
th.month {font-size: 110%;font-weight:600;}
table.matrix col {width:42px;}
table.matrix td {border:1px solid {$th['EXXXX']}; overflow:hidden;}
table.matrix td.rowName {padding:5px;}
table.matrix td.we {background:{$th['BGWE1']};}
table.matrix td.wd {background:{$th['BGWD2']};}
table.matrix td.today {border:1px solid {$th['EGTOD']}; background:{$th['BGTOD']};}
table.matrix td.slday {border:1px solid {$th['EGSEL']}; background:{$th['BGSEL']};}

table.contact {border-collapse:collapse;}
table.contact td {padding:4px 10px; vertical-align:top;}

fieldset {width:auto; margin-bottom:10px; padding:16px; border:1px solid #888888; background:{$th['BINBX']}; border-radius:5px;}
fieldset.upc {width:50%; margin:10px auto 20px auto;}
fieldset.upc-m {width:90%; margin:10px auto 20px auto;}
legend {font-weight:bold; padding:0 5px; background:{$th['BINBX']};}

iframe.csHelp {width:100%; height:100%; border:none;}
"
.// -- view: all --
"
.viewHdr {display:inline-block; min-width:350px;}
.arrowLink {font: 1.3em/1.4em sans-serif; padding: 0px 20px;}
.chkBox {color:{$th['CCHBX']}; background:{$th['BCHBX']}; padding-right:2px;}
.chkBox:hover {background:{$th['BGCTH']};}
"
.// -- view: year/month --
"
.square {float:left; width:8px; height:8px; border:1px solid {$th['EXXXX']};}
.square.point {width:90%;background:#419636}
.symbol {float:left; position:relative; top:-4px;}
.event {margin-top:2px;}
.evtTitle {display:block; font-size:{$th['MEVTI']}em;}
.dom1 {padding:0 2px; color:{$th['CGTFD']}; background:{$th['BGTFD']};}
.dom {padding:0 2px; color:{$th['CGTFD']};}
.firstDom {padding:0 2px; color:{$th['CGTFD']}; background:{$th['BGTFD']};}
.wnr {color:{$th['CGWTC']};}
.thNail {max-width:100%;}
"
.// -- view: week / day / dw_functions --
"
var {display:block; border:1px solid {$th['EXXXX']}; border-style:none none solid none;}
.day ul {margin:5px; padding:0px 15px;}
.timeFrame {position:relative; margin-top:20px;}
.times {border:1px solid {$th['EXXXX']}; border-style:none none solid none; text-align:center; color:{$th['CGWTC']};}
.dates {position:absolute; left:0px; top:0px; width:100%;}
.evtBox {position:absolute; border:1px solid {$th['EXXXX']}; z-index:1; overflow:hidden; border-radius:5px; box-shadow:10px 10px 25px grey;}
.dwEvent {margin-top:2px; padding-left:3px;}
.dwEventNw {margin-top:2px; padding-left:3px; white-space:nowrap}
"
.// -- view: upcoming / changes / search / dw_functions --
"
div.subHead {width:80%; margin:20px 40px 0px 5%}
td.widthCol1 {width:120px;}
td.eBox {padding-left:5px;}
.toApprove {border-left:2px solid #ff0000;}
"
.// -- event window --
"
div.evtCanvas {padding:8px; border-radius:12px;color:{$th['CXWIN']}; background:{$th['BXWIN']}; cursor:default;}
table.evtForm {width:100%; margin:0; border-spacing:2px;}
table.evtForm .c01, .c11 {width:90px;}
table.evtForm .c12 {width:130px;}
table.evtForm .c13 {width:130px;}
div.apdBar {text-align:center; margin:4px 0; font-weight:bold;}
div.evtExt {margin:4px 0; border-bottom:2px solid {$th['BBHAR']}; cursor:pointer;}
div.evtExt span {font-size:0.7em; background:red; border:1px solid red;}
div.repBox {position:absolute; left:40px; top:30px; padding:6px; border:1px solid {$th['EXXXX']}; border-radius:5px; box-shadow:5px 5px 5px #888; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; z-index:20; display:none;}
div.ewButtons {margin:18px auto 0;}
"
.// ---- thumbnails page ----
"
div.tnForm {width:30%; float:left; margin:0 0 6px 5%; padding:12px; border:1px solid #888888; background:{$th['BINBX']}; border-radius:5px;}
table.tnForm tr {height:20px;}
div.tnHelp {width:40%; float:right; margin:0 5% 6px 0; padding:12px; border:1px solid #888888; background:{$th['BINBX']}; border-radius:5px;}
div.tnBox {position:relative; float:left; width:100px; height:120px; margin:6px; background:{$th['BINBX']};}
div.tnBox div {position:absolute; top:0; right:0; bottom:0; left:0; cursor:pointer;}
div.tnBox input {width:1px; opacity:0; pointer-events:none;}
div.tnBox span {position:absolute; top:0; left:0; font-size:0.8em;}
div.tnBox span:hover {cursor:pointer; background:red;}
div.tnBox img {position:absolute; top:0; left:15px; max-width:80px; max-height:80px;}
div.tnBox p {position:absolute; left:0px; bottom:0px; width:95%; font-size:0.8em; text-align:center;}
"
.// ---- admin pages -----
"
table.list {border-spacing:4px; white-space:nowrap}
.pTitleAdm {margin-left:80px; font:bold {$th['PPGTL']}px {$th['FFXXX']};color:#ddd;}
.takeRest {width:100%;}
.stylesL {display:inline-block; float:left; cursor:default; vertical-align:top;}
.stylesR {display:inline-block; float:right; cursor:default; vertical-align:top;}
.style {margin:6px 12px;}
.setting {cursor:default; margin-bottom:2px;}
.sLabel {display:inline-block; width:320px; text-align:right; margin-right:6px;vertical-align:middle;}
label, .label {cursor:default; text-align:right; padding:0 6px 0 6px;vertical-align:top;}
.aside {width:28%; margin:0 10px 10px 0; padding:10px; border:2px solid {$th['EXXXX']}; border-radius:5px; font-size:{$th['MOVBX']}em; color:{$th['COVBX']}; background:{$th['BOVBX']}; float:right;right:3%;position:absolute;}
.butHead {margin:20px auto 10px auto;}
"
.// ---- Onmouseover popup Styles (toolbox.js poptext) ----
"
div#htmlPop {position:absolute; width:150px; font-size:{$th['MPOPU']}em ; padding:4px; border-radius:5px; box-shadow:5px 5px 5px #888; visibility:hidden; z-index:10;}
div#htmlPop img {max-width:200px; max-height:200px;}
.normal {border:1px solid {$th['EHNOR']}; color:{$th['CHNOR']}; background:{$th['BHNOR']};}
.private {border:1px solid {$th['EHPRI']}; color:{$th['CHPRI']}; background:{$th['BHPRI']};}
.repeat {border:1px solid {$th['EHREP']}; color:{$th['CHREP']}; background:{$th['BHREP']};}
"
.// ---- Date Picker Styles -----
"
.dpTable {width:150px; text-align:center; color:#505050; background:{$th['BINBX']}; border:2px outset #D0D0D0;}
.dpTable th {font-size:11px; font-weight:bold; background:{$th['BBHAR']}; color:{$th['CBHAR']};}
.dpTable td {font-size:11px;}
.dpTD {border:1px solid {$th['BINBX']};}
.dpTDHover {border:1px solid #888888; cursor:pointer; color:red;}
.dpHilight {border:1px solid #888888; color:red; font-weight:bold;}
.dpTitle {font:bold 12px sans-serif; color:{$th['CXXXX']};}
.dpArrow {padding:0 6px; cursor:pointer;}
.dpButton {font:bold 10px sans-serif; color:{$th['CBUTS']}; background:{$th['BBUTS']}; cursor:pointer;}
"
.// ---- Time Picker Styles -----
"
.tpFrame {max-height:180px; width:165px; overflow:auto; font:10px/11px courier,monospace; text-align:center; color:#505050; border:1px solid #AAAAAA;}
.tpAM {background:#EEFFFF;}
.tpPM {background:#FFCCEE;}
.tpEM {background:#DDFFDD;}
.tpPick:hover {background:#A0A0A0; color:red; cursor:pointer;}
"
?>
