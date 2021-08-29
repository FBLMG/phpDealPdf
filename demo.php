<?php
/**
 * Created by PhpStorm.
 * User: hongzhuangxian
 * Date: 2021/8/29
 * Time: 10:21 PM
 */


use setasign\Fpdi\Fpdi;

require_once('fpdf/fpdf.php');
require_once('FPDI/src/autoload.php');
#源文件地址
$file = 'upload/old.pdf';
#保存目标文件地址
$saveFile = 'upload/new.pdf';
#初始化对象，最终生成100*150mm的PDF
$pdf = new Fpdi('P','mm', array(100,150));
#设置模版对象
$pdf->AddPage();
$pdf->setSourceFile($file);
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx,0, 0,100,150);
#设置字体以及大小
$pdf->SetFont('Helvetica','',7);
#设置字体颜色
$pdf->SetTextColor(0, 0, 0);
#填充指定区域
$pdf->SetXY(13.5, 103);
#填充指定内容
$pdf->Write(0, '1234567');
#保存指定路径【F：保存成PDF，I：浏览器展示PDF，D：下载PDF】
$pdf->Output('F', $saveFile);