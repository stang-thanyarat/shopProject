<?php

require_once '../vendor/autoload.php';
require_once '../../../database/Order.php';
$Order = new Order();
$orderl = new Order();
if (!isset($_GET['id'])) {
  echo "Not found.";
  exit();
}
$id = $_GET['id'];
$data = $Order->fetchAllOrder($id);

if (count($data) <= 0) {
  echo "Not found.";
  exit();
}
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
font-size: 36pt;
}
td{
font-size: 28pt;
}
</style>
</head>

<body>
<table  width="1000" border="0">
  <tr >
    <td colspan="2" class="setcenter"><h2>ร้านวรเชษฐ์เกษตรภัณฑ์</h2></td>
  </tr>
  <tr >
    <td colspan="2" class="setcenter"><h2 >ใบสั่งซื้อ</h2></td>
  </tr>
  <tr>
    <td>วันที่วางบิล :&nbsp;'. $data['datebill'] . '</td>
    <td class="setright">วันที่รับของ : '. $data['datereceive'] . '</td>
  </tr>
  <tr>
    <td colspan="2">ชื่อผู้ขาย : '. $data['sell_name'] . '</td>
  </tr>
  <tr>
    <td>วิธีการชำระเงิน : '. $data['payment_sl'] . '</td>
    <td class="setright">วันที่ชำระเงิน : '. $data['payment_dt'] . '</td>
  </tr>
  <tr>
    <td colspan="2">หมายเหตุ : '. $data['note'] . '</td>
  </tr>
  <br>
  <tr>
    <td colspan="2" class="setcenter"><h3>รายการสินค้า</h3><br>
      <table width="1000" border="1">
        <tr>
          <td width="450">รายการสินค้า</td>
          <td width="200">ราคาต่อหน่วย (บาท)</td>
          <td width="120">จำนวน</td>
          <td width="200">ราคา (บาท)</td>
        </tr>
        <tr>
          <td>'. $data['product_id'] . '</td>
          <td>'. $data['order_pr'] . '</td>
          <td>'. $data['order_amt'] . '</td>
          <td>'. $data['order_pr'] . '</td>
        </tr>
      </table>
    </td>
  </tr>
  <br>
  <tr>
    <td colspan="2" class="setcenter"><h3>ค่าใช้จ่ายอื่นๆ</h3><br>
    <table width="1000" border="1">
      <tr>
        <td width="454">รายการ</td>
        <td width="530">ราคา</td>
      </tr>
      <tr>
        <td>'. $data['listother'] . '</td>
        <td>'. $data['priceother'] . '</td>
      </tr>
    </table>
    </td>
  </tr>
  <br>
  <tr>
    <td colspan="2" class="setright">ยอดสุทธิ : '. $data['priceother'] . '</td>
  </tr>
</table>
</body>
</html>
';


$mpdf->WriteHTML($html);
$mpdf->Output($output, 'I');


?>