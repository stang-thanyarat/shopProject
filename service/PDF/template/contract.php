<?php
require_once '../vendor/autoload.php';
include_once '../../../database/Contract.php';
include_once '../../bahtText.php';
$Contract = new Contract();
$id = $_GET['id'];
$data = $Contract->fetchById($id);
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
    <td colspan="2" class="setcenter"><h2>ร้านวรเชษฐ์เกษตรภัณฑ์</h2></td>
  </tr>
  <tr class="setcenter" >
    <td colspan="2" class="setcenter"><h2>สัญญาซื้อขาย</h2></td>
  </tr>
  <tr>
    <td>ฉบับที่ : '.$data['contract_code'].'</td>
    <td class="setright">วันที่ทำสัญญา : '.$data['date_contract'].'</td>
  </tr>
  <tr>
    <td colspan="2">ข้าพเจ้า '.$data['employee_prefix'].$data['employee_firstname'].'  '.$data['employee_lastname'].' ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ขายฝ่ายหนึ่งกับ</td>
  </tr>
  <tr class="setcenter">
    <td colspan="2">
    <table border="0">
      <tr>
        <td width="454">ข้าพเจ้า : '.$data['customer_prefix'].'</td>
        <td width="530">ชื่อ : '.$data['customer_firstname'].'</td>
        <td width="454">นามสกุล : '.$data['customer_lastname'].'</td>
        <td width="530">รหัสบัตรประชาชน : '.$data['customer_img'].'</td>
      </tr>
      </table>
      </td>
     </tr>
     <tr>
    <td colspan="2">ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ซื้อฝ่ายหนึ่ง ทั้งสองฝ่ายตกลงทำสัญญาซื้อขายทรัพย์สินมีดังข้อความต่อไปนี้</td>
  <tr>
      <td colspan="2">ข้อ ๑ ผู้ขายได้ขาย : xxx</td>
  </tr>
  <tr>
      <td colspan="2">ให้แก่ผู้ซื้อเป็นจำนวนเงิน xxx บาท '.number_format($date['all_price'], 2, '.', '').' สตางค์ ('.bahtText($date['all_price']).')</td>
  </tr>
  <tr>
      <td colspan="2">และยอมส่งมอบทรัพย์สินที่ขายให้แก่ผู้ซื้อวันที่ '.$data['date_send'].' และผู้ขายได้รับราคาดังกล่าวแล้วไปจากผู้ซื้อเสร็จแล้วตั้งแต่วันที่ '.$data['	contract_details'].' </td>
  </tr>
  <tr>
      <td colspan="2">ข้อ ๓ : '.$data['contract_details'].'</td>
  </tr>
<tr>
      <td colspan="2">ข้อ ๔ ผู้ขายและผู้ซื้อได้ทราบข้อความในสัญญานี้ดีแล้ว จึงได้ลงลายมือชื่อไว้ในสัญญานี้เป็นหลักฐาน</td>
  </tr>
  <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
   <tr class="setcenter">
    <td colspan="2">
    <table border="0">
      <tr>
        <td width="900" class="setright">ลงชื่อ '.json_decode($data['	witness1'])['prefix'].'  &nbsp;&nbsp;</td>
        <td width="374">ชื่อ : '.json_decode($data['witness1'])['name'].'</td>
        <td width="406">นามสกุล : '.json_decode($data['witness1'])['lastname'].'</td>
        <td width="284">พยานคนที่ 1</td>
      </tr>
      <tr>
        <td width="494" class="setright">ลงชื่อ '.json_decode($data['	witness2'])['prefix'].' &nbsp;&nbsp;</td>
        <td width="374">ชื่อ : '.json_decode($data['witness2'])['name'].'</td>
        <td width="406">นามสกุล : '.json_decode($data['witness2'])['lastname'].'</td>
        <td width="284">พยานคนที่ 2</td>
      </tr>
      <tr>
        <td width="494" class="setright">ลงชื่อ '.json_decode($data['	witness3'])['prefix'].'  &nbsp;&nbsp;</td>
        <td width="374">ชื่อ : '.json_decode($data['witness3'])['name'].'</td>
        <td width="406">นามสกุล : '.json_decode($data['witness3'])['lastname'].'</td>
        <td width="284">พยานคนที่ 3</td>
      </tr>
      <tr>
        <td width="494" class="setright">ลงชื่อ '.$data['employee_prefix'].'  &nbsp;&nbsp;</td>
        <td width="374">ชื่อ : '.$data['employee_firstname'].'</td>
        <td width="406">นามสกุล : '.$data['employee_lastname'].'</td>
        <td width="284">ผู้ขาย</td>
      </tr>
      <tr>
        <td width="494" class="setright">ลงชื่อ '.$data['customer_prefix'].'  &nbsp;&nbsp;</td>
        <td width="374">ชื่อ : '.$data['customer_firstname'].'</td>
        <td width="406">นามสกุล : '.$data['customer_lastname'].'</td>
        <td width="284">ผู้ซื้อ</td>
      </tr>
      </table>
      </td>
     </tr>
     <tr class="setcenter">
    <td colspan="2">&nbsp;</td>
</tr>
  <tr>
      <td colspan="2">๑.หากผู้ขายยังไม่ได้ส่งมอบทรัพย์ให้ในเวลาทำสัญญาควรจะเติมข้อความอีก ๑ ข้อว่าตราบใดที่ผู้ขายยังไม่ส่งมอบทรัพย์ให้ ยังไม่ถือว่าได้มีการซื้อขาย มิฉะนั้นผู้ซื้ออาจเสียเปรียบผู้ขาย</td>
  </tr> 
  <tr>
      <td colspan="2">๒. สัญญาซื้อขายไม่ต้องปิดอากรแสตมป์ เว้นแต่จะถือว่าสัญญานี้เป็นใบรับเงินแล้ว ถ้าสัญญาซื้อขายนี้ตั้งแต่ ๑๐ บาท ถึง ๒๐ บาท ต้องติดอากรแสตมป์ ๑๐ สตางค์ ถ้าสัญญาซื้ขายนี้เกิน ๒๐ บาท ทุก ๒๐ บาท หรือเศษของ ๒๐ บาท ต่อ ๑๐ สตางค์ ถ้าสัญญาซื้อขายต่ำกว่า ๑๐ บาท ไม่ต้องติดอากรแสตมป์</td>
  </tr>

</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output($output, 'I');

?>
