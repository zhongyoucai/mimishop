<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:64:"C:\phpStudy\WWW\mimishop/application/admin\view\member\edit.html";i:1492958675;s:64:"C:\phpStudy\WWW\mimishop/application/admin\view\common\head.html";i:1482462994;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\header.html";i:1482462994;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\navbar.html";i:1477622210;s:66:"C:\phpStudy\WWW\mimishop/application/admin\view\common\footer.html";i:1490016441;}*/ ?>
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
            编辑会员              
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo url('Index/index'); ?>"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="<?php echo url('admin/member/index'); ?>">会员</a></li>
        <li class="active">编辑会员</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- form start -->
          <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">编辑会员</h3> -->
              <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">编辑会员</a></li>
              
              <li><a href="#setting" data-toggle="tab">编辑密码</a></li>
             </ul>

             <!--  <div class="box-tools" id="activity">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div> -->
          </div>
            <div class="tab-content">
            <div class="tab-pane active" id="activity">
              <!-- Font Awesome Icons -->
              <form   method="post" action=<?php echo url('edit'); ?> id="editpost">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">用户名</label>
                  <input type="text" readOnly="true" class="form-control" id="username" name="username" value="<?php echo $usersInfo['username']; ?>" placeholder="用户名" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">昵称</label>
                  <input type="text" class="form-control" id="nickname"  value="<?php echo $usersInfo['nickname']; ?>" name="nickname" placeholder="昵称" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">邮箱</label>
                  <input type="text" class="form-control" id="email" value="<?php echo $usersInfo['email']; ?>" name="email" placeholder="邮箱">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">会员等级</label>
                  <input type="text" class="form-control" value="<?php echo $usersInfo['rank_name']; ?>" placeholder="会员等级" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">手机号</label>
                  <input type="text" class="form-control" id="mobile" value="<?php echo $usersInfo['mobile']; ?>" name="mobile" placeholder="手机号" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">消费积分</label>
                  <input type="text" class="form-control" id="score" value="<?php echo $usersInfo['score']; ?>" name="score" placeholder="消费积分" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">等级积分</label>
                  <input type="text" class="form-control" id="rank_score" value="<?php echo $usersInfo['rank_score']; ?>" name="rank_score" placeholder="等级积分" />
                </div>
                  <input type="hidden" class="form-control" id="id" value="<?php echo $usersInfo['id']; ?>" name="id"  />
              <div class="pull-right">
                <button class="btn btn-success" onclick="javascript:history.back(-1);return false;">返 回</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button"  class="btn btn-primary submit">确 定</button>
              </div>
            </form>
             
              </div>

        </div>
              <!-- /#fa-icons -->
            <div class="tab-pane" id="setting">
              <form   method="post" action=<?php echo url('editPass'); ?> id="editPass">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" class="form-control" id="repass"  value="" name="password" placeholder="密码" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">确认密码</label>
                  <input type="password" class="form-control" id="confirm" value="" name="repassword" placeholder="确认密码">
                </div>
                
                
               
                  <input type="hidden" class="form-control" id="id" value="<?php echo $usersInfo['id']; ?>" name="id"  />
              <div class="pull-right">
                <button class="btn btn-success" onclick="javascript:history.back(-1);return false;">返 回</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button"  class="btn btn-primary passsub">确 定</button>
              </div>
            </form>
             
              </div>
            </div>
            <!-- /.tab-content -->
             
          
              <!-- Font Awesome Icons -->
             
 

              <!-- /#fa-icons -->

            </div>
          </div>
          </div>
          <!-- /.nav-tabs-custom -->
          </section>
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

 <script type="text/javascript">
     $(function () {
    
      // 编辑
    $('.submit').click(function () {
        $.ajax({
          cache: true,
          type: "POST",
          url : '<?php echo url('member/edit'); ?>',
          data: $('#editpost').serialize(),
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

     $('.passsub').click(function () {
        $.ajax({
          cache: true,
          type: "POST",
          url : '<?php echo url('member/editPass'); ?>',
          data: $('#editPass').serialize(),
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
<!-- Bootstrap 3.3.6 -->
<script src="STATIC_PATH/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="STATIC_PATH/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="STATIC_PATH/dist/js/app.min.js"></script>
</body>
</html>