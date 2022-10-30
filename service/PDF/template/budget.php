<?php
require_once '../vendor/autoload.php';
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'margin_left' => 15,
    'margin_right' => 15,
    'margin_top' => 16,
    'margin_bottom' => 16,
    'margin_header' => 9,
    'margin_footer' => 9,
    'mirrorMargins' => true,

    'fontDir' => array_merge($fontDirs, [
        '../vendor/mpdf/mpdf/custom/font/directory',
    ]),
    'fontdata' => $fontData + [
            'thsarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' => 'THSarabunNew Bold.ttf',
                'U' => 'THSarabunNew BoldItalic.ttf'
            ]
        ],
    'default_font' => 'thsarabun',
    'defaultPageNumStyle' => 1
]);

include_once "../PDF.php";
$html = '<html>
<head>
<style type="text/css">
.setcenter {
	text-align: center;
}
.setright {
	text-align: right;
}
.l {
	background-color: #ABBE99;
	padding-top: 10px;
	padding-bottom: 10px;
}
.line {
	height: 1pt;
	width: 1200px;
	background-color: #000
}
.a {
	float: left;
	width: 50%;
}
.grey {
	background-color: #CCC;
	width: 100%;
	float: left;
}

.t {
	color: #A36627;
	font-size: 24pt;
}
td{
	font-size:18pt;
	}
.t {
	padding-top: 10px;
	padding-bottom: 10px;
}
.left{
	margin-left :1rem;
	}
.right{
	margin-right :1rem;
	}
</style>
</head>

<body>
<table width="1000" border="0">
  <tr>
    <td class="setright">วันที่ &lt;&lt;startDate&gt;&gt; - &lt;&lt;enddate&gt;&gt;</td>
  </tr>
  <tr>
    <td class="setcenter"><h2>งบแสดงฐานะการเงิน</h2></td>
  </tr>
  <tr>
    <td class="setcenter">
      <h2 >ร้านวรเชษฐ์เกษตรภัณฑ์</h2>
      </td>
  </tr>
  <tr>
    <td class="setright l">
        จำนวน(บาท)&nbsp;&nbsp;
    </td>
  </tr>
  <tr border="1">
    <td class="t" >&nbsp;&nbsp;สินทรัพย์</td>
  </tr>
  
  <tr class="grey">
    <td class="grey display"><div class="a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม สินทรัพย์</div>
    <div class="a setright">&lt;&lt;summary&gt;&gt;&nbsp;</div></td>
  </tr>
  <tr>
    <td class="t">&nbsp;&nbsp;หนี้สิน+ทุน</td>
  </tr>
  <tr >
    <td class="grey display"><div class="a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม หนี้สิน+ทุน</div>
    <div class="a setright">&lt;&lt;debt&gt;&gt;&nbsp;</div></td>
  </tr>
</table>
</body>
</html>
';


$mpdf->WriteHTML($html);
$mpdf->Output($output, 'I');


?>