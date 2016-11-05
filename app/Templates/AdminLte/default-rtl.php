<?php
/**
 * Frontend Default RTL Layout
 */

// Generate the Language Changer menu.
$langCode = Language::code();
$langName = Language::name();

$languages = Config::get('languages');

//
ob_start();

foreach ($languages as $code => $info) {
?>
<li class="header <?php if ($code == $langCode) { echo 'active'; } ?>">
    <a href='<?= site_url('language/' .$code); ?>' title='<?= $info['info']; ?>'><?= $info['name']; ?></a>
</li>
<?php
}

$langMenuLinks = ob_get_clean();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?> | <?= Config::get('app.name', SITETITLE); ?></title>
    <?= isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    Assets::css(array(
        // Bootstrap 3.3.5
        template_url('css/bootstrap-rtl.min.css', 'Default'),
        // Font Awesome
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        // Ionicons
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        // Theme style
        template_url('css/AdminLTE-rtl.min.css', 'AdminLte'),
        // AdminLTE Skins
        site_url('vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css'),
        // iCheck
        site_url('vendor/almasaeed2010/adminlte/plugins/iCheck/square/blue.css'),
        // Custom CSS
        template_url('css/style-rtl.css', 'AdminLte'),
    ));

    echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone

    //Add Controller specific JS files.
    Assets::js(array(
            site_url('vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js'),
        )
    );

    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-<?= Config::get('app.color_scheme', 'blue'); ?> layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= site_url(); ?>" class="navbar-brand"><strong><?= Config::get('app.name', SITETITLE); ?></strong></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown language-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class='fa fa-language'></i> <?= $langName; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?= $langMenuLinks; ?>
                    </ul>
                </li>
                <?php if (Auth::check()) { ?>
                <li <?php if($currentUri == 'profile') echo 'class="active"'; ?>>
                    <a href='<?= site_url('profile'); ?>'><i class='fa fa-user'></i> <?= __d('admin_lte', 'Profile'); ?></a>
                </li>
                <li>
                    <a href='<?= site_url('logout'); ?>'><i class='fa fa-sign-out'></i> <?= __d('admin_lte', 'Logout'); ?></a>
                </li>
                <?php } else { ?>
               <li <?php if($currentUri == 'register') echo 'class="active"'; ?>>
                    <a href='<?= site_url('register'); ?>'><i class='fa fa-user'></i> <?= __d('admin_lte', 'Sign Up'); ?></a>
                </li>
                <li <?php if($currentUri == 'login') echo 'class="active"'; ?>>
                    <a href='<?= site_url('login'); ?>'><i class='fa fa-sign-out'></i> <?= __d('admin_lte', 'Sign In'); ?></a>
                </li>
                <li <?php if($currentUri == 'password/remind') echo 'class="active"'; ?>>
                    <a href='<?= site_url('password/remind'); ?>'><i class='fa fa-user'></i> <?= __d('admin_lte', 'Forgot Password?'); ?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <?= $content; ?>
            </section>
        </div>
    </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?php if(Config::get('app.debug')) { ?>
      <small><!-- DO NOT DELETE! - Profiler --></small>
      <?php } ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework <?= VERSION; ?></b></a> - </strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php
Assets::js(array(
    // Bootstrap 3.3.5
    template_url('js/bootstrap-rtl.min.js', 'Default'),
    // AdminLTE App
    site_url('vendor/almasaeed2010/adminlte/dist/js/app.min.js'),
    // iCheck
    site_url('vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js'),
));

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) $footer : ''; // Place to pass data / plugable hook zone
?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
