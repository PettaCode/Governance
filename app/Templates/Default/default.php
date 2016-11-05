<?php
/**
 * Default Layout - a Layout similar with the classic Header and Footer files.
 */

// Generate the Language Changer menu.
$language = Language::code();

$languages = Config::get('languages');

//
ob_start();



$langMenuLinks = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="<?= $language; ?>">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Goverment Web App">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?= $title .' - ' .Config::get('app.name', SITETITLE); ?></title>

<?php
echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone

Assets::css([
    "https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en",
    "https://code.getmdl.io/1.2.1/material.grey-pink.min.css",
    template_url('css/styles.css', 'Default'),
    "https://fonts.googleapis.com/icon?family=Material+Icons",
        
]);

echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>
</head>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header">
            <div class="mdl-layout__header-row portfolio-header-row">
                <span class="mdl-layout__title">
                    
                    <span class="mdl-layout__title">Simple Goverment Portal</span>
                </span>
            </div>
            <div class="mdl-layout__header-row portfolio-navigation-row mdl-layout--large-screen-only">
                <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                    <a class="mdl-navigation__link" href='<?= site_url(); ?>' style="color: #ffffff;">Home</a>
                    <a class="mdl-navigation__link" href='<?= site_url('service'); ?>' style="color: #ffffff;">Service</a>
                    <a class="mdl-navigation__link" href='<?= site_url('about'); ?>' style="color: #ffffff;">About</a>
                    <a class="mdl-navigation__link" href='<?= site_url('contact'); ?>' style="color: #ffffff;">Contact</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer mdl-layout--small-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                <a class="mdl-navigation__link is-active" href='<?= site_url(); ?>'>Home</a>
                <a class="mdl-navigation__link" href='<?= site_url('service'); ?>'>Service</a>
                <a class="mdl-navigation__link" href='<?= site_url('about'); ?>'>About</a>
                <a class="mdl-navigation__link" href='<?= site_url('contact'); ?>'>Contact</a>
            </nav>
        </div>
<main class="mdl-layout__content">

<?= isset($afterBody) ? $afterBody : ''; // Place to pass data / plugable hook zone ?>



    <?= $content; ?>

    

                
<!-- Footer and other content-->
<footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo"><span> &copy; <?php echo date('Y'); ?> , All Rights Reserved by Goverment.
                                    </span> </div>
                                    <p>Developed By pettaCode.com</p>
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <p class="text-muted pull-right">
                    <?php if(Config::get('app.debug')) { ?>
                    <small><!-- DO NOT DELETE! - Profiler --></small>
                    <?php } ?>
                </p>
                </div>

            </footer>
        </main>
<!-- Footer and other content End Here -->

        </div>

<?php
Assets::js([
    "https://code.getmdl.io/1.2.1/material.min.js",
    template_url('js/main.js', 'Default'),
]);

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
