<?php
if (empty($_POST) || !isset($_POST['prizeId'])) return;

require_once(__DIR__ . '/../../../../colonial-downs-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-configuration.php');
require_once(__DIR__ . '/../../../../colonial-downs-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-device-detector.php');

$componentId = $_POST['component']['id'];
$referer = $_SERVER['HTTP_REFERER'];
$componentScore = isset($_POST['score']) ? $_POST['score'] : '';
$userVoucherCode = !empty($_POST['userVoucherCode']) ? $_POST['userVoucherCode'] : time() + mt_rand(1, 999) + mt_rand(1, 999);

$dateTime = new \DateTime();
$dateTime->modify('+3 day');
$userVoucherExpireDate = !empty($_POST['userVoucherExpireDate']) ? $_POST['userVoucherExpireDate'] : $dateTime->format('Y-m-d');

$rewardListById = [
    1 => '1,000 ENTRIES',
    2 => '500 ENTRIES',
    3 => '750 ENTRIES',
    4 => '1,000 ENTRIES',
    5 => '1,500 ENTRIES',
    6 => '2,000 ENTRIES',
    7 => '1,500 ENTRIES',
    8 => '3,000 ENTRIES',
    9 => '2,000 ENTRIES',
    10 => '3,500 ENTRIES'
];
$componentPrizeId = isset($_POST['prizeId']) ? $_POST['prizeId'] : '';
$componentPrizeTitle = isset($rewardListById[$componentPrizeId]) ? $rewardListById[$componentPrizeId] : '';

$deviceDetector->parse();
?>

<div id="afterplay" class="container-fluid my-3">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <img class="client-logo-md" src="/images/spin-to-win/client-logo.png">
        </div>
    </div>

    <div id="afterplay-message">
        <div class="row justify-content-center mb-3">
            <div class="col">
                <p class="text-center h1">PREMIERE CLUB</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">
                <p class="text-center display-4">
                    CONGRATULATIONS!
                    <br>
                    <span class="mark"><?php echo $componentPrizeTitle; ?></span> AWAIT IN YOUR INBOX.
                    <br class="mb-5">
                    CHECK YOUR EMAIL AND ACTIVATE YOUR ENTRIES INTO THE
                    <br>
                    <span class="mark">$12,000 RAPID FIRE DRAWING.</span>
                </p>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col">
                <p class="text-center h3 mark">
                    PLEASE HAND THE TABLET TO YOUR PREMIERE CLUB REPRESENTATIVE.
                </p>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col">
                <p class="text-center h3">
                    GOOD LUCK!
                </p>
            </div>
        </div>
    </div>
</div>
