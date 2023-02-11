<?php
require_once '../vendor/autoload.php';
include_once '../../../database/Contract.php';
include_once '../../../database\SalesDetails.php';
include_once '../../bahtText.php';
include_once '../../datetimeDisplay.php';
$Contract = new Contract();
$salesDetail = new SalesDetails();
if (!isset($_GET['id'])) {
  echo "Not found.";
  exit();
}
$id = $_GET['id'];
$data = $Contract->fetchByPDFId($id);

if (count($data) <= 0) {
  echo "Not found.";
  exit();
}
$detail = $salesDetail->fetchBySalesId($data['sales_list_id']);
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
  <tr class="setcenter">
    <td height="41" colspan="2" class="setcenter"><h2>ร้านวรเชษฐ์เกษตรภัณฑ์</h2></td>
</tr>
<tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
   <tr class="setcenter">
    <td height="21" colspan="2" class="setcenter">ที่อยู่ : 100/1 ม.6 ต.บ้านป้อม อ.เมือง จ.อยุธยา 1300
</td>
  </tr>
   <tr class="setcenter">
    <td colspan="2" class="setcenter">เลขประจำตัวผู้เสียภาษี : xxx </td>
  </tr>
   <tr class="setcenter">
    <td colspan="2" class="setcenter">เบอร์โทรติดต่อ : 035-801059 , 083-9108289</td>
  </tr>
  <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
  <tr class="setcenter">
    <td colspan="2" class="setcenter"><h2>ใบส่งของ</h2></td>
  </tr>
  <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
<tr class="setcenter">
<td>
<table width="1373" border="0">
<tr>
  <td width="597">ลูกค้า : ' . $data['customer_prefix'] . $data['customer_firstname'] . "  " . $data['customer_lastname'] . ' </td>
  <td width="502">เล่มที่ : ' . $_GET['id'] . ' </td>
</tr>
<tr>
  <td>วันที่ : ' . toDay() . '</td>
  <td>เวลา : ' . ShowTime($data['price_send']) . '</td>
</tr>
</table>
   </td>
 </tr>
   <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
<tr class="setcenter">
 <td>
 <table width="1381" border="1">
      <tr class="setcenter">
        <td width="140" class="setcenter">ลำดับ </td>
        <td width="517" class="setcenter">รายละเอียด</td>
        <td width="162" class="setcenter">จำนวน </td>
        <td width="290" class="setcenter">หน่วยละ </td>
        <td width="238" class="setcenter">จำนวนเงิน </td>
      </tr>
      <tr>
        <td width="140" class="setcenter"> 1</td>
        <td width="517">&nbsp; ' . $data['product_detail'] . '</td>
        <td width="162" class="setcenter"> ' . $detail['sales_pr'] . '</td>
        <td width="290" class="setright"> ' . $detail['sales_amt'] . ' &nbsp;</td>
        <td width="290" class="setright"> ' . $detail['sales_amt'] * $detail['sales_pr'] . ' &nbsp;</td>
      </tr>
      <tr>
        <td  colspan="3">หมายเหตุ : xxx</td>
        <td width="290" class="setright">ยอดรวมสุทธิ :  &nbsp;</td>
        <td width="238" class="setright">' . $data['baht'] . ' &nbsp;</td>
      </tr>
    </table>
   </td>
</tr>

  <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>
<table width="1000" border="0">
<tr class="setcenter">>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>ลงชื่อ&nbsp;' . $data['employee_prefix'] . $data['employee_firstname'] . "&nbsp;" . $data['employee_lastname'] . '&nbsp;ผู้ส่งของ</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>ลงชื่อ&nbsp;' . $data['customer_prefix'] . $data['customer_firstname'] . "  " . $data['customer_lastname'] . '&nbsp;ผู้รับของ</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output($output, 'I');
