<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$Start_date=$_GET['Start_date'];
$End_date=$_GET['End_date'];
$destroytime=time();
if ($destroytime>1546271999){
    die('页面已过期');
}
$url='http://'.$_SERVER['SERVER_NAME'].'/api/get-feedback?starttime='.$Start_date.'&endtime='.$End_date;

$data = file_get_contents($url);

$data1=json_decode($data);
function object2array(&$data1) {
    $object = json_decode( json_encode( $data1),true);
    return  $object;
}

$data1=object2array($data1);

$list=[];
foreach ($data1 as $k =>$v){
    $list[]=$data1[$k];

}

$num=count($list);
?>
<body>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="" method="get">
            开始时间: <input type="date" name="Start_date" />
            结束时间: <input type="date" name="End_date" />
            <input type="submit" />
        </form>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>序号</th>
                <th>领取时间</th>
                <th>姓名</th>
                <th>手机号</th>
                <th>问题1</th>
                <th>问题2</th>
                <th>问题3</th>
                <th>问题4</th>
                <th>问题5</th>
                <th>问题6</th>
                <th>最终结果</th>
            </tr>
            </thead>
            <?php if($num>0){?>
            <tbody>
            <?php  foreach ($list as $k =>$v){?>
                <tr>
                    <td><?php echo $k+1;?></td>
                    <td><?php echo $list[$k]['createtime'];?></td>
                    <td><?php echo $list[$k]['name'];?></td>
                    <td><?php echo $list[$k]['phonenumber'];?></td>
                    <td><?php echo $list[$k]['question1'];?></td>
                    <td><?php echo $list[$k]['question2'];?></td>
                    <td><?php echo $list[$k]['question3'];?></td>
                    <td><?php echo $list[$k]['question4'];?></td>
                    <td><?php echo $list[$k]['question5'];?></td>
                    <td><?php echo $list[$k]['question6'];?></td>
                    <td><?php echo $list[$k]['final_id'];?></td>
                    </tr>
            <?php }?>
            <?php }else{?>
                <tr><td colspan="6" class="text-center">暂无记录</td></tr>
            <?php }?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
