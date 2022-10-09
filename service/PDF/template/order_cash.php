<?php
include_once "../PDF.php";
$html="
<html>

<body style='tab-interval:36.0pt;word-wrap:break-word'>

<div class=WordSection1>

    <p class=MsoNormal align=center style='text-align:center'><span lang=TH
                                                                    style='font-size:24.0pt;line-height:107%;font-family:'TH Sarabun New','sans-serif'>ร้านวรเชษฐ์เกษตรภัณฑ์</span><span
                style='font-size:24.0pt;line-height:107%;font-family:'TH Sarabun New','sans-serif'>
      </span></p>

    <p class=MsoNormal align=center style='text-align:center'><span lang=TH
                                                                    style='font-size:24.0pt;line-height:107%;font-family:'TH Sarabun New','sans-serif'>ใบสั่งซื้อ</span><span
                style='font-size:24.0pt;line-height:107%;font-family:'TH Sarabun New','sans-serif'>
        
      </span></p>

    <div align=center>

        <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none;mso-yfti-tbllook:1184;mso-padding-alt:
 0cm 5.4pt 0cm 5.4pt;mso-border-insideh:none;mso-border-insidev:none'>
            <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
                <td width=301 style='width:225.4pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>วันที่วางบิล :</span><span style='font-size:
  16.0pt;font-family:'TH Sarabun New',sans-serif;color:#212529;background:white'>&nbsp;</span></span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>xxx</span></p>
                </td>
                <td width=301 style='width:225.4pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal align=right style='margin-bottom:0cm;text-align:right;
  line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>วันที่รับของ : </span><span style='font-size:
  16.0pt;font-family:'TH Sarabun New',sans-serif;color:#212529;background:white'>xxx</span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:1'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>ชื่อผู้ขาย :</span></span><span lang=TH
                                                                  style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'> </span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>xxx</span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:2'>
                <td width=301 style='width:225.4pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>วิธีการชำระเงิน :</span></span><span lang=TH
                                                                       style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'> เงินสด</span>
                    </p>
                </td>
                <td width=301 style='width:225.4pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal align=right style='margin-bottom:0cm;text-align:right;
  line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>วันที่ชำระเงิน : </span><span style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;color:#212529;
  background:white'>xxx</span><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:3;height:61.15pt'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:61.15pt'>
                    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>หมายเหตุ :</span></span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:4;height:50.2pt'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:50.2pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>รายการสินค้า</span></span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
                        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
                            <td width=84 style='width:62.75pt;border:solid windowtext 1.0pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>ประเภทสินค้า</span><span style='font-size:16.0pt;font-family:
    'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=84 style='width:62.75pt;border:solid windowtext 1.0pt;border-left:
    none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>รายการสินค้า</span><span style='font-size:16.0pt;font-family:
    'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=84 style='width:62.8pt;border:solid windowtext 1.0pt;border-left:
    none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>ยี่ห้อ</span><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=84 style='width:62.8pt;border:solid windowtext 1.0pt;border-left:
    none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>รุ่น</span><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=84 style='width:62.8pt;border:solid windowtext 1.0pt;border-left:
    none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>ราคาต่อหน่วย (บาท)</span><span style='font-size:16.0pt;
    font-family:'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=84 style='width:62.8pt;border:solid windowtext 1.0pt;border-left:
    none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>จำนวน</span><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=84 style='width:62.8pt;border:solid windowtext 1.0pt;border-left:
    none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
    padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
    color:#212529'>ราคา (บาท)</span><span style='font-size:16.0pt;font-family:
    'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                        </tr>
                    </table>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:5;height:12.95pt'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:12.95pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span lang=TH style='font-size:14.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>

              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:6;height:48.8pt'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:48.8pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif;
  color:#212529;background:white'>ค่าใช้จ่ายอื่นๆ</span></span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
   mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
                        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes'>
                            <td width=293 style='width:219.75pt;border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif;
    color:#212529'>รายการ</span><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                            <td width=293 style='width:219.75pt;border:solid windowtext 1.0pt;
    border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
    solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
    line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif;
    color:#212529'>ราคา</span><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                      
                    </span></p>
                            </td>
                        </tr>
                    </table>
                    <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>
                
              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:7;height:2.35pt'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:2.35pt'>
                    <p class=MsoNormal align=right style='margin-bottom:0cm;text-align:right;
  line-height:normal'><span lang=TH style='font-size:14.0pt;font-family:'TH Sarabun New','sans-serif';
  color:#212529;background:white'>
              </span></p>
                </td>
            </tr>
            <tr style='mso-yfti-irow:8;mso-yfti-lastrow:yes'>
                <td width=601 colspan=2 style='width:450.8pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal align=right style='margin-bottom:0cm;text-align:right;
  line-height:normal'><span lang=TH style='font-size:16.0pt;font-family:'TH Sarabun New',sans-serif';
  color:#212529;background:white'>ยอดสุทธิ :</span></span><span lang=TH
                                                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'> </span><span
                                style='font-size:16.0pt;font-family:'TH Sarabun New','sans-serif'>xxx</span></p>
                </td>
            </tr>
        </table>

    </div>

    <p class=MsoNormal align=center style='text-align:center'><span
                style='font-size:18.0pt;line-height:107%;font-family:'TH Sarabun New','sans-serif'>
      </span></p>

</div>

</body>

</html>";
PDF($html);



