<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:69:"C:\phpStudy\WWW\mimishop/application/admin\view\bonus_type\index.html";i:1491897579;s:64:"C:\phpStudy\WWW\mimishop/application/admin\view\common\head.html";i:1482462994;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\header.html";i:1482462994;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\navbar.html";i:1477622210;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\footer.html";i:1490016441;}*/ ?>
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
<style>
  .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    line-height: 2;
  }
</style>
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
        <small>优惠券列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">促销管理</a></li>
        <li class="active"><a href="#">优惠券列表</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
			<div class="box-header with-border">
              <div class="pull-left">
              <select class="form-control input-sm setStatus" name="status">
                <option value="0">批量操作</option>
                <option value="1">上架优惠券</option>
                <option value="2">下架优惠券</option>
                <option value="delete">删除优惠券</option>
              </select>
              </div>
              <div class="pull-left" style="margin-left:10px;"> 
                <button type="button" class="btn btn-block btn-default btn-sm setStatusSubmit">应用</button>
              </div>
              <div class="pull-left" style="margin-left:15px;">
              <select class="form-control input-sm filterStatus" name="status">
                <option value="0">所选状态</option>
                <option value="1">上架优惠券</option>
                <option value="2">下架优惠券</option>
              </select>
              </div>
              <div class="pull-left" style="margin-left:10px;">
              <select class="form-control input-sm filterCategory" name="category">
                  <option value="0">所选分类</option>
              </select>
              </div>
              <div class="pull-left" style="margin-left:15px;">
                <a href="<?php echo url('add'); ?>" class="btn btn-block btn-primary btn-sm">添加优惠券</a>
              </div>
              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input class="form-control input-sm search" value="<?php echo isset($_GET['q']) ? $_GET['q'] :  ''; ?>" placeholder="搜索优惠券名称" type="text">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                  <tr>
					<th><input type="checkbox" class="selectAll"></th>
                    <th style="padding-left:25px;">ID</th>
					<th>优惠券名字</th>
					<th>发放类型</th>
					<th>最小订单金额</th>
                    <th>优惠券数量</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>优惠券有效期</th>
					<th>剩余优惠券数量</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php if(is_array($couponList) || $couponList instanceof \think\Collection): $i = 0; $__LIST__ = $couponList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
					  <td><input name="ids" class="postCheck" value="<?php echo $vo['type_id']; ?>" type="checkbox"></td>
                      <td style="padding-left:25px;"><?php echo $vo['type_id']; ?></td>
					  <td><?php echo $vo['type_name']; ?></td>
					  <td><?php echo $vo['send_type']; ?></td>
					  <td><?php echo $vo['min_amount']; ?></td>
                      <td><?php echo $vo['number']; ?></td>
                      <td><?php echo date('Y-m-d',$vo['start_time']); ?></td>
                      <td><?php echo date('Y-m-d',$vo['end_time']); ?></td>
                      <td>
                          <?php echo $vo['term']; ?>
                      </td>
					  <td><?php echo $vo['sy_number']; ?></td>
                    </tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
                  <thead>
                  <tr>
					<th><input type="checkbox" class="selectAll"></th>
                    <th style="padding-left:25px;">ID</th>
					<th>优惠券名字</th>
					<th>发放类型</th>
					<th>最小订单金额</th>
                    <th>优惠券数量</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>优惠券有效期</th>
					<th>剩余优惠券数量</th>
                  </tr>
                  </thead>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer with-border">

              <div class="pull-right">
				<?php echo $couponList->render(); ?>
              </div>
              <!-- /.box-tools -->
            </div>
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

<script src="STATIC_PATH/plugins/jQuery/jquery-1.9.1.min.js"></script>
<script src="STATIC_PATH/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script type="text/javascript">
  $('document').ready(function (argument) {
    // 全选、取消全选的事件
    $("th .selectAll").click(function () {
      if(this.checked){  
       $(".postCheck").each(function(){this.checked=true;});
      }else{  
       $(".postCheck").each(function(){this.checked=false;});  
      }
    });
    // 筛选方法
    $('.filter').click(function (event) {
        getUrl = '<?php echo url('index',['status'=>'filterStatus','category'=>'filterCategory']); ?>';
        getUrl = getUrl.replace("filterStatus", $('.filterStatus').val());
        getUrl = getUrl.replace("filterCategory", $('.filterCategory').val());
        location.href = getUrl;
    });
    // 搜索方法
    $('.search').keyup(function (event) {
      if (event.keyCode == "13") {
          getUrl = '<?php echo url('index',['q'=>'qstring']); ?>';
          location.href = getUrl.replace("qstring", $('.search').val());
      }
    });
    // 设置状态方法
    $('.setStatusSubmit').click(function () {
      setStatus = $(this).parent().parent().children().children('.setStatus').val();
      var ids = new Array();//声明一个存放id的数组 
      $("[name='ids']:checked").each(function(){
        ids.push($(this).val());
      });
      $.ajax({
        cache: true,
        type: "POST",
        url : '<?php echo url('setStatus'); ?>',
        data: {status:setStatus,ids:ids},
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
          msgerr("请勾选需要操作的商品");
          }
      });
    });
    // select选中
    $(".filterStatus").val("<?php echo isset($status) ? $status :  '0'; ?>");
    $(".filterCategory").val("<?php echo isset($category) ? $category :  '0'; ?>");

  });

</script>
<!-- Bootstrap 3.3.6 -->
<script src="STATIC_PATH/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="STATIC_PATH/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="STATIC_PATH/dist/js/app.min.js"></script>
</body>
</html>







