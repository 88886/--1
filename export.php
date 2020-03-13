<html>
<head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>正在导出</legend>
</fieldset>
		
<?php
		include('connect.php');//链接数据库
session_start();
require_once "./lib/PHPExcel.php";
require_once "./lib/PHPExcel/IOFactory.php";
require_once "./lib/PHPExcel/Reader/Excel5.php";
	$objPHPExcel = new PHPExcel();
    // 操作第一个工作表
    $objPHPExcel->setActiveSheetIndex(0);
    // 设置sheet名
    $objPHPExcel->getActiveSheet()->setTitle('xx列表');
 
    // 设置表格宽度
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
 
 
    // 列名表头文字加粗
    $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
    // 列表头文字居中
    $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
    // 列名赋值
    $objPHPExcel->getActiveSheet()->setCellValue('A1', '年度');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', '订单编号');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', '车型');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', '数量');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', '订货单位');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', '入库时间');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', '备注');
    // 数据起始行
    $row_num = 2;
    // 向每行单元格插入数据
        // 设置所有垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A' . $row_num . ':' . 'J' . $row_num)->getAlignment()
            ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        // 设置价格为数字格式
        $objPHPExcel->getActiveSheet()->getStyle('D' . $row_num)->getNumberFormat()
            ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00);
        // 居中
        $objPHPExcel->getActiveSheet()->getStyle('E' . $row_num . ':' . 'H' . $row_num)->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
        // 设置单元格数值
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $row_num, $value['id']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row_num, $value['type']);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $row_num, $value['quantity']);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $row_num, $value['company']);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $row_num, $value['time']);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $row_num, $value['remark']);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $row_num, date('Y-m-d h:i:s',$value['createtime']));
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $row_num, $value['state'] ? '√' : '×');
        $objPHPExcel->getActiveSheet()->setCellValue('G' . $row_num, date('Y-m-d h:i:s',$value['statetime']));
		$row_num++;
		
    
 
    $outputFileName = time() . '.xls';
    $xlsWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header('Content-Disposition:inline;filename="' . $outputFileName . '"');
    header("Content-Transfer-Encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    $xlsWriter->save("php://output");
?>
<body>
</body>
</html>