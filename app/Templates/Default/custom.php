<?php
/**
 * Custom Layout - a Layout similar with the classic Header and Footer files.
 */

?>
<!DOCTYPE html>
<html lang="<?= Language::code(); ?>">
<head>
    <meta charset="utf-8">
    <title><?= $title .' - ' .Config::get('app.name', SITETITLE); ?></title>
<?php
echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone

Assets::css([
    site_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'),
    site_url('vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css'),
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    template_url('css/style.css', 'Default'),
]);

echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= site_url('dashboard'); ?>"><strong><?= Config::get('app.name', SITETITLE); ?></strong></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if (Auth::check()) { ?>
                <li <?php if($currentUri == 'dashboard') echo 'class="active"'; ?>>
                    <a href='<?= site_url('dashboard'); ?>'><i class='fa fa-dashboard'></i> <?= __d('default', 'Dashboard'); ?></a>
                </li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 5px;">
                <?php if (Auth::check()) { ?>
                <li <?php if($currentUri == 'profile') echo 'class="active"'; ?>>
                    <a href='<?= site_url('profile'); ?>'><i class='fa fa-user'></i> <?= __d('default', 'Profile'); ?></a>
                </li>
                <li>
                    <a href='<?= site_url('logout'); ?>'><i class='fa fa-sign-out'></i> <?= __d('default', 'Logout'); ?></a>
                </li>
                <?php } else { ?>
                <li <?php if($currentUri == 'login') echo 'class="active"'; ?>>
                    <a href='<?= site_url('login'); ?>'><i class='fa fa-sign-out'></i> <?= __d('default', 'User Login'); ?></a>
                </li>
                <li <?php if($currentUri == 'password/remind') echo 'class="active"'; ?>>
                    <a href='<?= site_url('password/remind'); ?>'><i class='fa fa-user'></i> <?= __d('default', 'Forgot Password?'); ?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<?= isset($afterBody) ? $afterBody : ''; // Place to pass data / plugable hook zone ?>

<div class="container">
    <p><img src='<?= template_url('images/nova.png', 'Default'); ?>' alt='<?= Config::get('app.name', SITETITLE); ?>' style="max-width: 360px; height: auto;"></p>

    <?= $content; ?>
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                <p class="text-muted">Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework <?= VERSION; ?></b></a></p>
            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">
                    <?php if(Config::get('app.debug')) { ?>
                    <small><!-- DO NOT DELETE! - Profiler --></small>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php
Assets::js([
    'https://code.jquery.com/jquery-1.12.4.min.js',
    site_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js'),
]);

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
