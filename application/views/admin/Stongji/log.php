<!DOCTYPE html>
<html>

<head>
	<?php include CUR_VIEW_PATH."public/head.html"?>
	 <!--编辑器-->
				
	 <!-- 编辑器配置文件 -->
     <script type="text/javascript" src="application/views/admin/js/ueditor/ueditor.config.js"></script>
     <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="application/views/admin/js/ueditor/ueditor.all.js"></script>
     <!-- 实例化编辑器 -->
</head>

<body class="body-color">
	<header>
		<?php include CUR_VIEW_PATH."public/header.html"?>

	</header>
	<!--侧边菜单栏-->
	<aside class="side-nav">
		<?php include CUR_VIEW_PATH."public/aside.html"?>
	</aside>
	<!--侧边菜单栏 end-->

	<!--主体部分-->
	<section class="body-content">
		<!--当前位置-->
		<div class="site-location">
			&nbsp;&nbsp;
			<span class="ficon ficon-weizhi"></span>&nbsp;<a href="index.php?p=admin&c=index&a=index">用户首页</a>
			&nbsp;&gt;&nbsp;<a href="">投票统计</a>
			&nbsp;&gt;&nbsp;<a href="">投票明细日志</a>
			&nbsp;&gt;&nbsp;<a>票数修改日志</a>
		</div>
		
		<!--当前位置 end-->
		<br/>

			<!--发布文章中间部分-->
				<!--上边信息-->
		<h2 style="padding: 10px">票数修改日志</h2>
        <div class="btn-group" role="group" style="padding: 5px">
            <a href="" class="btn btn-blue">全部</a>
            <a href="" class="btn btn-blue">直接改票</a>
            <a href="" class="btn btn-blue">被作废票</a>
        </div>

		<table class="table table-border table-hover" style="text-align: center">
			<tr>
				<th>修改时间</th>
				<th>操作类型</th>
				<th>详情</th>
				<th>操作原因</th>
				<th >投票时间</th>
			</tr>

			<tr>
				<td><?=date("Y-m-d H:i",time())?></td>
				<td>增加</td>
				<td>增加3票，增加5人</td>
				<td>延迟</td>
				<td><?=date("Y-m-d H:i",time())?></td>
			</tr>
		</table>
<footer>
	<?php include CUR_VIEW_PATH."public/footer.html"?>
</footer>
</section>

<p class="clear"></p>

<script src="application/views/admin/js/wow.min.js" type="text/javascript"></script>
<script src="application/views/admin/js/common.js" type="text/javascript"></script>

<!--wow 初始化-->
<script>
	if(!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
		new WOW().init();
	};
</script>
<script type="text/javascript">
			$(".a-info-ss").click(function(){
				$(".a-info .collapse").fadeToggle();
			})
		</script>

</body>

</html>