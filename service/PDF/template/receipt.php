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
h2{
  font-size: 55pt;
  }
  td{
  font-size: 40pt;
  }
</style>
</head>

<body>
<table  width="1000" border="0">
<tr>
<td height="41" colspan="2" class="setcenter"><h2>ร้านวรเชษฐ์เกษตรภัณฑ์</h2></td>
</tr>
<tr class="setcenter">
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td height="21" colspan="2" class="setcenter">ที่อยู่ : 100/1 ม.6 ต.บ้านป้อม อ.เมือง จ.อยุธยา 1300
</td>
</tr>
<tr>
<td colspan="2" class="setcenter">เลขประจำตัวผู้เสียภาษี : xxx </td>
</tr>
<tr>
<td colspan="2" class="setcenter">เบอร์โทรติดต่อ : 035-801059 , 083-9108289</td>
</tr>
<tr class="setcenter">
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" class="setcenter"><h2>ใบเสร็จรับเงิน</h2></td>
</tr>
  <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
 <tr class="setcenter">
 <td>
 <table width="1138" border="0">
      <tr>
        <td width="546">ลูกค้า : xxx </td>
        <td width="373">เล่มที่ : xxx </td>
        <td width="205">เลขที่ : xxx </td>
      </tr>
      <tr>
        <td>ที่อยู่ : xxx </td>
        <td>วันที่ : xxx</td>
        <td>เวลา : xxx</td>
      </tr>
      <tr>
        <td>เลขประจำตัวผู้เสียภาษี : xxx </td>
        <td>เบอร์โทรติดต่อ : xxx</td>
        
      </tr>
    </table>
    </td>
  </tr>
   <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
<tr class="setcenter">
 <td>
    <table width="1148" border="1">
    <tr class="setcenter">
    <td width="316" class="setcenter">ลำดับ </td>
    <td width="283" class="setcenter">รายละเอียด</td>
    <td width="118" class="setcenter">จำนวน </td>
    <td width="121" class="setcenter">หน่วยละ </td>
    <td width="128" class="setcenter">จำนวนเงิน </td>
  </tr>
      </tr>
      <tr>
      <td width="140" class="setcenter"> 1</td>
      <td width="426">&nbsp; ใบตัดหญ้า</td>
      <td width="162" class="setcenter"> 3</td>
      <td width="304" class="setright"> 150 &nbsp;</td>
      <td width="238" class="setright"> 450 &nbsp;</td>
      </tr>
      <tr>
      <td  colspan="3">หมายเหตุ : xxx</td>
      <td width="304" class="setright">ยอดรวม : xxx &nbsp;</td>
      <td width="238" class="setright">xxx &nbsp;</td>
    </tr>
     <tr>
      <td colspan="3">&nbsp;</td>
      <td width="304" class="setright">ยอดรวมสุทธิ : xxx &nbsp;</td>
      <td width="238" class="setright">xxx &nbsp;</td>
    </tr>
   </table>
      </td>
   </tr>
   <tr>
       <td colspan="2" class="setright">สองร้อยสิบบาทถ้วน &nbsp;</td>
   </tr>
   </table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output($output, 'I');
