<?php require_once __DIR__ . '/../../colonial-downs-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-front-end.php'; ?>
<!DOCTYPE html>
<html lang="en" class="setTo100">
<head>
    <title>Colonial Downs</title>
    <?php require_once __DIR__ . '/../../colonial-downs-portal/vendor/engaged-nation/portal-core/GoogleTagManager/Resources/public/gtm.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <base href="//<?php echo $_SERVER['HTTP_HOST']; ?>"/>
    <link rel="canonical" href="//<?php echo $_SERVER['HTTP_HOST']; ?>">
    <link rel="stylesheet" href="https://ds94t24nq4vzb.cloudfront.net/fontawesome/5-12-0/css/all.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://ds94t24nq4vzb.cloudfront.net/bootstrap/3-3-7/bootstrap.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $enConfigClient['environment']['s3_uploads_url']; ?>/images/favicon/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#ffffff">

    <script src="https://ds94t24nq4vzb.cloudfront.net/jquery/3-3-1/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ds94t24nq4vzb.cloudfront.net/bootstrap/3-3-7/bootstrap.min.js"></script>
</head>
<body>
    <div id="en-header-layout-container"></div>

    <div class="takeover">
        <div class="container main-container">
            <div id="page_outer_wrap">
                <div id="body_wrap" style="max-width: 100% !important;">
                    <div id="page_wrap">
                        <div class="embed" data-embed="fzone"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//<?php echo $enConfigClient['environment']['site_portal']; ?>/lib/js/engage.php?client_name=colonial-downs&client_id=060ac71b9ab24ab5a6277435fe1708ef" type="text/javascript"></script>

    <div id="en-footer-layout-container"></div>
</body>
</html>
