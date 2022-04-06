<?php
// Quick way of preventing user for easily memorizing the url.
// $enId is the portal_client.hid pass it as a url param to access the page.
$enId = '060ac71b9ab24ab5a6277435fe1708ef';
if (empty($_GET['en_id']) || $_GET['en_id'] != $enId) return;

require_once(__DIR__ . '/../../../colonial-downs-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-configuration.php');

$assetVersion = ($enConfigClient['environment']['env'] == 'dev') ? time() : $enConfigClient['environment']['deploy_id'];
$enIdToken = $enEncryptionClient->encrypt(
    [
        'client_alias' => $enConfigClient->getClientAlias(),
        'date_expire' => (new \DateTime())->add(new \DateInterval('PT1H'))->format('Y-m-d H:i:s')
    ]
);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags for boostrap v4.4.1 -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://ds94t24nq4vzb.cloudfront.net/bootstrap/4-4-1/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css?v=<?php echo $assetVersion; ?>">

        <script src="https://ds94t24nq4vzb.cloudfront.net/jquery/3-3-1/jquery-3.3.1.min.js"></script>
        <script src="https://ds94t24nq4vzb.cloudfront.net/bootstrap/4-4-1/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="dynamic-content">
            <div class="container-fluid my-5">
                <div class="row justify-content-center">
                    <div class="col">
                        <p class="text-center h1 mb-0">WELCOME TO</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-auto">
                        <img class="client-logo-lg img-fluid" src="/images/spin-to-win/client-logo.png">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col">
                        <p class="text-center h1">PREMIERE CLUB</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid mb-3">
                <div class="row">
                    <div class="col">
                        <p class="text-center display-4">NEW<br>MEMBERS</p>

                        <div class="text-center mt-4">
                            <button data-path="/spin-to-win/new/index.php"
                                type="button"
                                class="btn btn-block btn-lg btn-outline-light user-acquisition-path">
                                    CLICK HERE
                            </button>
                        </div>
                    </div>

                    <div class="col">
                        <p class="text-center display-4">EXISTING<br>MEMBERS</p>

                        <div class="text-center mt-4">
                            <button data-path="/spin-to-win/existing/index.php"
                                type="button"
                                class="btn btn-block btn-lg btn-outline-light user-acquisition-path">
                                    CLICK HERE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sticky-bottom">
            <div class="bg-white py-2"></div>

            <footer class="container-fluid py-2">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="small mb-0">17225 Jersey Avenue</p>
                        <p class="small mb-0">Lemoore, CA 93245-9760</p>
                        <p class="small mb-0">1.800.942.6886</p>
                    </div>

                    <div class="col-md-auto">
                        <img class="client-logo-xs" src="/images/spin-to-win/client-logo.png">
                    </div>

                    <div class="col">
                        <button onclick="window.location.href='//' + location.host + '/spin-to-win/index.php?en_id=<?php echo $enId; ?>';"
                            id="reset-btn"
                            type="button"
                            class="btn btn-sm btn-primary float-right d-none">
                                RESET
                        </button>
                    </div>
                </div>
            </footer>
        </div>

        <div id="loading-icon" class="not-loaded"></div>

        <script src="../js/user-acquisition/configuration.js?v=<?php echo $assetVersion; ?>"></script>
        <script src="../js/user-acquisition/framework.js?v<?php echo $assetVersion; ?>"></script>
        <script>
            UserAcquisitonFramework.setFormURL(
                '<?php echo $enConfigClient["environment"]["site_portal"] . "/api/public/centraladminapi/proxy" ?>'
            );

            UserAcquisitonFramework.setEnIdToken('<?php echo $enIdToken ?>');

            $('.user-acquisition-path').on('click', function() {
                $('#reset-btn').removeClass('d-none');
            });
        </script>
    </body>
</html>
