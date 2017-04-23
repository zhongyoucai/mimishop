<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:68:"C:\phpStudy\WWW\mimishop/application/admin\view\bonus_type\edit.html";i:1492943366;s:64:"C:\phpStudy\WWW\mimishop/application/admin\view\common\head.html";i:1482462994;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\header.html";i:1482462994;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\navbar.html";i:1477622210;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\footer.html";i:1490016441;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>系统管理</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Msgbox -->
  <link rel="stylesheet" href="STATIC_PATH/msgbox/css/style.css">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="STATIC_PATH/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="STATIC_PATH/dist/css/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="STATIC_PATH/dist/css/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="STATIC_PATH/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="STATIC_PATH/dist/css/skins/_all-skins.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="STATIC_PATH/dist/js/html5shiv.min.js"></script>
  <script src="STATIC_PATH/dist/js/respond.min.js"></script>
  <![endif]-->
</head>
<script src="STATIC_PATH/plugins/jQuery/jquery-1.9.1.min.js"></script>
<body class="skin-blue sidebar-mini wysihtml5-supported fixed">
<div class="wrapper">

 <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>后台管理</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         <!--  <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
           
          </li> -->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
             
              <li class="footer"><a href="#">View all</a></li>
            </ul> -->
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul> -->
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
              <span class="hidden-xs"><?php echo Session('admin_user_auth.username'); ?></span>
            </a>
            <ul class="dropdown-menu">
 
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo url('user/edit'); ?>" class="btn btn-default btn-flat">个人资料</a>
                  
                </div>
                </li>
                <li>
                 <div class="box-footer">
                  
                   <a href="<?php echo url('common/logout'); ?>" class="btn btn-default btn-flat">退出</a>
                </div>
                
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="height:40px;">
        <div class="pull-left info">
          <p><?php echo Session('admin_user_auth.username'); ?> <a href="#"><i class="fa fa-circle text-success"></i> </a></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">导航</li>
        <?php if(is_array($menuTree) || $menuTree instanceof \think\Collection): $i = 0; $__LIST__ = $menuTree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="<?php echo get_menu_navbar_active($vo['id']); ?> treeview">
          <a href="<?php echo $vo['url']; ?>">
            <i class="<?php echo $vo['icon']; ?>"></i> <span><?php echo $vo['name']; ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <?php if(!(empty($vo['_child']) || ($vo['_child'] instanceof \think\Collection && $vo['_child']->isEmpty()))): ?>
          <ul class="treeview-menu">
            <?php if(is_array($vo['_child']) || $vo['_child'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                <li class="<?php echo get_menu_navbar_active($sub['id']); ?>"><a href="<?php echo url($sub['url']); ?>"><i class="<?php echo $sub['icon']; ?>"></i><?php echo $sub['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <?php endif; ?>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       促销管理
        <small>添加优惠券</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo url('admin/index/index'); ?>"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="<?php echo url('admin/bonus_type/index'); ?>">促销管理</a></li>
        <li class="active"><a href="<?php echo url('admin/bonus_type/add'); ?>">编辑优惠券</a></li>
      </ol>
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">编辑优惠券</h3>
              
            </div>
            <div class="box-body no-padding">
              <form method="post" action=<?php echo url('add'); ?> id="edit">
                <div class="box-body">
				  <div class="form-group">
                    <label for="uname" class="couponname">优惠券名称</label>
                    <input class="form-control" id="couponname" name="couponname" value="<?php echo $bonus_info['type_name']; ?>" placeholder="优惠券名称" type="text">
                  </div>
				          <div class="form-group">
                    <label for="uname" class="sendtype" style="margin-right:15px;">发放类型</label>
					            <input name="sendtype" value="0" <?php if($bonus_info['send_type'] == '0'): ?> checked="true" <?php endif; ?> onclick="showunit(0)" type="radio">
            					按用户发放
            					<input name="sendtype" value="1" <?php if($bonus_info['send_type'] == '1'): ?> checked="true" <?php endif; ?>  onclick="showunit(1)" type="radio">
            					按注册发放
            					<input name="sendtype" value="2" <?php if($bonus_info['send_type'] == '2'): ?> checked="true" <?php endif; ?>  onclick="showunit(2)" type="radio">
            					按订单金额发放
            					<input name="sendtype" value="3" <?php if($bonus_info['send_type'] == '3'): ?> checked="true" <?php endif; ?>  onclick="showunit(3)" type="radio">
            					线下发放的红包 
                  </div>
				          <div class="form-group">
                    <label for="uname" class="minamount">最小订单金额</label>
                    <input class="form-control" id="minamount" name="minamount" value="<?php echo $bonus_info['min_amount']; ?>" placeholder="最小订单金额" type="text">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="starttime">开始时间</label>
                    <input class="form-control" name="starttime" id="starttime" value="<?php echo date('Y-m-d H:i:s', $bonus_info['start_time']); ?>" placeholder="开始时间" type="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="endtime">结束时间</label>
                    <input class="form-control" id="endtime" name="endtime" placeholder="结束时间" value="<?php echo date('Y-m-d H:i:s',$bonus_info['end_time']); ?>" type="text">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="term">优惠券有效期</label>
                    <input class="form-control" id="term" name="term" placeholder="有效期" value="<?php echo $bonus_info['term']; ?>" type="text">
                  </div>
                  <div class="pull-right">
                <button class="btn btn-success" onclick="javascript:history.back(-1);return false;">返 回</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="id" value="<?php echo $bonus_info['type_id']; ?>">
                <button type="button"  class="btn btn-primary submit">确 定</button>
              </div>
              </form>

<script type="text/javascript"> 
      $(function(){
    $('.submit').click(function () {
        $.ajax({
          cache: true,
          type: "POST",
          url: '<?php echo url('bonus_type/edit'); ?>',
          data: $('#edit').serialize(),
          async: false,
            success: function(data) {
              if (data.code) {
                  msgok(data.msg);
                  setTimeout(function () {
                    location.href = data.url;
                  }, 1000);
              } else {
                  msgerr(data.msg);
              }

            },
            error: function(request) {
              msgerr("页面错误");
            }
        });
    });
          })
     
</script>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">	
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://www.vip026.com">深圳要金站网络技术有限公司</a>.</strong> All rights
    reserved.
</footer>
<script src="STATIC_PATH/plugins/jQuery/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="STATIC_PATH/msgbox/js/msgbox.js"></script>
</div>
<!-- ./wrapper -->
<script src="STATIC_PATH/plugins/jQueryUI/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="STATIC_PATH/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="STATIC_PATH/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="STATIC_PATH/plugins/layer/laydate.dev.js"></script>
<!-- AdminLTE App -->
<script src="STATIC_PATH/dist/js/app.min.js"></script>
<script>
	//添加日期
	laydate({   
		elem: '#starttime'
	});
	laydate({   
		elem: '#endtime'
	});
</script>
</body>
</html>










