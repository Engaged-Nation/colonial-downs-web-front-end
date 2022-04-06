<?php
include('../../template/afterplay-index.php');
?>

<div id="continue" class="container-fluid">
    <div class="row justify-content-center">
        <button class="btn btn-primary btn-sm mb-1">Continue</button>
    </div>
</div>

<div id="continue-content" class="container-fluid d-none">
    <div class="row justify-content-center">
        <p>PRIZE AWARDED: <span class="mark"><?php echo $componentPrizeTitle; ?></span></p>
    </div>


    <div class="row justify-content-center">
        <p class="h4 mb-4">ENTER A PREMIERE CARD NUMBER</p>
    </div>

    <div class="row justify-content-center">
        <form id="new-playerscard-form" novalidate autocomplete="off" class="col-md-8">
            <div class="form-group-border">
                <div class="form-group">
                    <div class="position-relative">
                        <input id="input-playerscard" type="text" class="form-control" name="user_players_card" required>

                        <div class="invalid-tooltip">
                            Please enter a premiere card number
                        </div>
                    </div>

                    <div class="text-center mt-1">
                        <label for="input-playerscard">PREMIERE CARD #</label>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">SUBMIT</button>
            </div>
        </form>
    </div>
</div>

<div id="continue-content-after" class="container-fluid d-none">
    <div class="row justify-content-center">
        <p>User was successfully created!</p>
    </div>
</div>

<script>
    $('#continue button').on('click', function(event) {
        event.preventDefault();

        $('#continue').remove();
        $('#afterplay-message').remove();
        $('#continue-content').removeClass('d-none');
    });

    $('#new-playerscard-form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            return;
        }

        var cookieData = JSON.parse(UserAcquisitonFramework.getCookie());
        var playerscard = UserAcquisitonFramework.serializeDataFromForm(form);
        var value = JSON.stringify(
            $.extend(cookieData, playerscard)
        );

        UserAcquisitonFramework.setCookie(value)
            .setComponentId('<?php echo $componentId; ?>')
            .setComponentPrizeId('<?php echo $componentPrizeId; ?>')
            .setComponentPrizeTitle('<?php echo $componentPrizeTitle; ?>')
            .setComponentScore('<?php echo $componentScore; ?>')
            .setRerrer('<?php echo $referer; ?>')
            .setUserAgentDevice('<?php echo $deviceDetector->getDeviceName(); ?>')
            .setUserAgentBrand('<?php echo $deviceDetector->getBrandName(); ?>')
            .setUserAgentModel('<?php echo $deviceDetector->getModel(); ?>')
            .setUserAgentOsName('<?php echo $deviceDetector->getOs()['name']; ?>')
            .setUserAgentOsVersion('<?php echo $deviceDetector->getOs()['version']; ?>')
            .setUserAgentOsPlatform('<?php echo $deviceDetector->getOs()['platform']; ?>')
            .setUserAgentClientType('<?php echo $deviceDetector->getClient()['type']; ?>')
            .setUserAgentClientName('<?php echo $deviceDetector->getClient()['name']; ?>')
            .setUserAgentClientVersion('<?php echo $deviceDetector->getClient()['version']; ?>')
            .setUserVoucherCode('<?php echo $userVoucherCode; ?>')
            .setUserVoucherExpireDate('<?php echo $userVoucherExpireDate; ?>')
            .setFilename('<?php echo $componentPrizeTitle; ?>')
            .postCentralAdminApiProxy(
                {method: 'postUserAcquisition'},
                function(response) {
                    if (response.status == 'Failed') {
                        UserAcquisitonFramework.postCentralAdminApiProxy({method: 'putUserAcquisition'});
                    }

                    $('#continue-content').remove();
                    $('#continue-content-after').removeClass('d-none');
                    UserAcquisitonFramework.removeCookie();
                }
            );
    });
</script>
