<?php
include('../../template/afterplay-index.php');
?>

<script>
    UserAcquisitonFramework.setComponentId('<?php echo $componentId; ?>')
        .setComponentPrizeId('<?php echo $componentPrizeId; ?>')
        .setComponentPrizeTitle('<?php echo $componentPrizeTitle; ?>')
        .setComponentScore('<?php echo $componentScore; ?>')
        .setRerrer('<?php echo $referer; ?>')
        .setUserAgentDevice('<?php echo $deviceDetector->getDeviceName(); ?>')
        .setUserAgentBrand('<?php echo $deviceDetector->getBrandName(); ?>')
        .setUserAgentModel('<?php echo $deviceDetector->getModel(); ?>')
        .setUserAgentOsName('<?php echo $deviceDetector->getOs()["name"]; ?>')
        .setUserAgentOsVersion('<?php echo $deviceDetector->getOs()["version"]; ?>')
        .setUserAgentOsPlatform('<?php echo $deviceDetector->getOs()["platform"]; ?>')
        .setUserAgentClientType('<?php echo $deviceDetector->getClient()["type"]; ?>')
        .setUserAgentClientName('<?php echo $deviceDetector->getClient()["name"]; ?>')
        .setUserAgentClientVersion('<?php echo $deviceDetector->getClient()["version"]; ?>')
        .setUserVoucherCode('<?php echo $userVoucherCode; ?>')
        .setUserVoucherExpireDate('<?php echo $userVoucherExpireDate; ?>')
        .setFilename('<?php echo $componentPrizeTitle; ?>')
        .postCentralAdminApiProxy(
            {method: 'putUserAcquisition'},
            function(response) {
                UserAcquisitonFramework.removeCookie();
            }
        );
</script>
