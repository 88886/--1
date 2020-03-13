<!DOCTYPE html>
<html class="x-admin-sm">
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
        <?php
        include('connect.php');//链接数据库
        $id=$_GET['id'];
        $sql="select * from order_vehicle where id='$id'";
        $result=mysql_query($sql);
        $info=mysql_fetch_array($result,MYSQL_ASSOC);
        echo"<div class='layui-fluid'>
        <div class='layui-row'>
            <form class='layui-form' action='order_update.php' method='POST'>
                <div class='layui-form-item'>
                    <label for='id' class='layui-form-label'>
                        <span class='x-red'>*</span>年度</label>
                    <div class='layui-input-inline'>
                        <input type='text' id='year' name='year' class='layui-input' onclick='change()' value='$info[year]'></div>
                    </div>
                <div class='layui-form-item'>
                            <label for='time' class='layui-form-label'>
                                <span class='x-red'>*</span>订单编号</label>
                            <div class='layui-input-inline'>
                                <input type='text' id='id' name='id' required  readonly class='layui-input' value='$info[id]'></div>
                            </div>
                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>入库时间</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='time' class='layui-input' value='$info[time]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>车型</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='type' class='layui-input' value='$info[type]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>颜色代码</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='color' class='layui-input' value='$info[color]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>批次</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='batch' name='batch' class='layui-input' onclick='change()' value='$info[batch]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>车辆数量</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='quantity' class='layui-input' value='$info[quantity]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>品种代码</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='specie' class='layui-input' value='$info[specie]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>档位</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='gear' class='layui-input' value='$info[gear]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>发动机代码</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='motor' class='layui-input' value='$info[motor]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>订货单位</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='company' class='layui-input' value='$info[company]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>订单车批次编号</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='sn' class='layui-input' value='$info[sn]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>特殊要求</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='especial' class='layui-input' value='$info[especial]'></div>
                                </div>
                                <div class='layui-form-item'>
                                <label for='subject' class='layui-form-label'>
                                    <span class='x-red'>*</span>备注</label>
                                <div class='layui-input-inline'>
                                    <input type='text' id='subject' name='remark' class='layui-input' value='$info[remark]'></div>
                                </div>
                <div class='layui-form-item'>
                    <label for='L_repass' class='layui-form-label'></label>
                    <button class='layui-btn' lay-filter='add' lay-submit=''>提交</button></div>
            </form>
        </div>
    </div>";
    ?>
    </body>
    <script>layui.use('form', function(){
                var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功
                
                //……
                
                //但是，如果你的HTML是动态生成的，自动渲染就会失效
                //因此你需要在相应的地方，执行下述方法来进行渲染
                form.render();
  
              });  
                </script>
    <script>
                    function change() {
                    var year=document.getElementById("year");
                    var batch=document.getElementById("batch");
                    var id=document.getElementById("id");
                    id.value="0"+year.value+batch.value;
                 }
                </script>
                <script>
                    layui.use('laydate', function(){
                      var laydate = layui.laydate;
                      
                      
                      //年选择器
                      laydate.render({
                        elem: '#year'
                        ,type: 'year'
                      });
                      
                      //年月选择器
                      laydate.render({
                        elem: '#time'
                        ,format: 'yyyy/MM/dd'
                      });
                      
                    });
                    </script>
</html>