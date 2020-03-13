<link href="Classes/PHPExcel.php.css" rel="stylesheet" type="text/css">
<form><from id="file1" action=""><input type="file"><input type="submit"><input type="reset"></form>
<?php
	
$file = $_FILES['file'];
if ($file['error'] == 4) $this->error('请选择上传excel文件');
$file_types = explode ( ".", $file['name'] );
$excel_type = array('xls','csv','xlsx');
if (!in_array(strtolower(end($file_types)),$excel_type)){
    $this->error("不是Excel文件，请重新上传");
}
//设置获取excel对象
$objReader = \PHPExcel_IOFactory::createReader('Excel5');//配置成2003版本，因为office版本可以向下兼容
$objPHPExcel = $objReader->load($file['tmp_name'],$encode='utf-8');//$file 为解读的excel文件
//dump($objPHPExcel);die;
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
$success_item = $fail_item = 0;
//发货
$order_model = new OrderModel();
//开始读取数据
for($j=3;$j<=$highestRow;$j++)
{
    $order_num = $objPHPExcel->getActiveSheet()->getCell('A'.$j)->getValue();
    $poster = $objPHPExcel->getActiveSheet()->getCell("AB".$j)->getValue();//物流公司
    $logistics = $objPHPExcel->getActiveSheet()->getCell("AC".$j)->getValue();//物流单号
    $comm = $objPHPExcel->getActiveSheet()->getCell("V".$j)->getValue();//卖家备注
    //判断条件
    if(!is_null($order_num) && $order_num){
        $res = $order_model->where('order_num',$order_num)->field('itemid,status')->find();
        if ($res && $res['status'] == 2) {
            if ((!is_null($poster) && $poster) || (!is_null($logistics) && $logistics)) {
                //更改状态
                OrderPlanModel::addLog($res['itemid'],'确认发货',$comm);
                $order_model->Update([
                    'status'=>3,
                    'poster'=>$poster,
                    'logistics'=>$logistics,
                ],['itemid'=>$res['itemid']]);
                $success_item ++;
            } else {
                $fail_item ++;
            }
        } else {
            $fail_item ++;
        }
    } else {
        $fail_item++;
    }
}
$this->success('成功条数:'.$success_item.'，失败条数：'.$fail_item);
 ?>