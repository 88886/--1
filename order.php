<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>公共信息录入</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
    </head>
    
    <body>
        <div class="layui-card-header">
            <button class="layui-btn" onclick="xadmin.open('录入订单车信息','./order_add.html')">
           添加</button>
            <button class="layui-btn" onclick="xadmin.open('导入订单车信息','./import.html')">
        导入</button>
			<button class="layui-btn" onclick="xadmin.open('导入订单车信息','./export.php')">
        导出</button>
            <div class="layui-input-inline"><input type="text" id="key" name="key" required class="layui-input" placeholder="请输入查询年份" value=""></div>
            <button class="layui-btn" onclick="onSearch()">
            <i class="layui-icon">&#xe615;</i>查询</button>
        </div>   
        <div class="layui-card-body ">

        <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
        <thead>
        <tr width="24" bgcolor="#CCFFFF">
        <th>年度</th>
        <th>订单编号</th>
        <th>车型</th>
        <th>数量</th>
        <th>订货单位</th>
        <th>入库时间</th>
        <th>备注</th>
        <th> 操作</th></tr>
        </thead>
        <?php
        include("connect.php");//链接数据库
        $sql="select * from order_vehicle";
        $result=mysql_query($sql);
        $datanum=mysql_num_rows($result);//返回结果集中行的数目
        for($i=1;$i<=$datanum;$i++)
        {
        $info=mysql_fetch_array($result,MYSQL_ASSOC);
        echo"
        <tbody>
        <tr>";
        echo "<td>".$info['year']."</td>";
        echo "<td>".$info['id']."</td>";
        echo "<td>".$info['type']."</td>";
        echo "<td>".$info['quantity']."</td>";
        echo "<td>".$info['company']."</td>";
        echo "<td>".$info['time']."</td>";
        echo "<td>".$info['remark']."</td>";
        echo"
        <td>
        <a title='查看详细信息' onclick='xadmin.open(\"查看详细信息\",\"order_edit.php?id=$info[id]\")' href='javascript:;'>
        查看详细信息</a><br>
        <a title='删除' onclick='member_del(this,\"$info[id]\")' href='javascript:;'>
        删除</a>
        </td>
        </tr>";
        }
        echo"
        </tbody>
        </table>";
        ?>
    
    </body>
    <script>layui.use(['laydate', 'form'],
        function() {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });
        


        function member_del(obj, id){
        layer.confirm("确认删除?",function(){
        layer.msg(id);
        $.ajax({
        url: "del.php",
        data: {'id':id,'table':'order_vehicle'},
        type: "post" ,
        dataType:'json',
        success:function(data){
        if(data.code==200){
        $(obj).parents("tr").remove();
        layer.msg('已删除!', {
        icon: 1,
        time: 1000
        });
        }else{
        layer.msg("删除失败");
        }
        }
        })
        })
        }

       </script>
       <script type="text/javascript">
    function onSearch(){//js函数开始
    var storeId = document.getElementById('order_vehicle');//获取table的id标识
    var rowsLength = storeId.rows.length;//表格总共有多少行
    var key = document.getElementById("key").value;//获取输入框的值
    var searchCol = 0;//要搜索的哪一列，这里是第一列，从0开始数起
    for(var i=1;i<rowsLength;i++){//按表的行数进行循环，本例第一行是标题，所以i=1，从第二行开始筛选（从0数起）
      var searchText = storeId.rows[i].cells[searchCol].innerHTML;//取得table行，列的值
      if(searchText.match(key)){//用match函数进行筛选，如果input的值，即变量 key的值为空，返回的是ture，
        storeId.rows[i].style.display='';//显示行操作，
      }else{
        storeId.rows[i].style.display='none';//隐藏行操作
      }
    }
  }
</script>
</html>