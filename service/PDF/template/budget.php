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
table{
border-spacing: 0px;
}
td{
	font-size:18pt;
	}
tr{
border: 0px;
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
<table width="1000" border="0px" border="">
  <tr>
    <td class="setright" colspan="2">วันที่ &lt;&lt;startDate&gt;&gt; - &lt;&lt;enddate&gt;&gt;</td>
  </tr>
  <tr>
    <td class="setcenter" colspan="2"><h2>งบแสดงฐานะการเงิน</h2></td>
  </tr>
  <tr>
    <td class="setcenter" colspan="2">
      <h2 >ร้านวรเชษฐ์เกษตรภัณฑ์</h2>
      </td>
  </tr>
  <tr>
    <td class="setright l" colspan="2">
        จำนวน(บาท)&nbsp;&nbsp;
    </td>
  </tr>
  <tr>
    <td class="t" >&nbsp;&nbsp;สินทรัพย์</td>
  </tr>
  <tr bgcolor="#CCC">
    <td width="70%" stlye="">'. 'รวม สินทรัพย์'.'</div>
    <td align="right" width="30%">&lt;&lt;summary&gt;&gt;</td>
  </tr>
  <tr>
    <td class="t">&nbsp;&nbsp;หนี้สิน+ทุน</td>
  </tr>
  <tr  bgcolor="#CCC">
    <td  width="70%">'. 'รวม หนี้สิน+ทุน'.' &nbsp;</td>
    <td align="right" width="30%">&lt;&lt;debt&gt;&gt;</td>
  </tr>
</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output($output, 'I');


?>