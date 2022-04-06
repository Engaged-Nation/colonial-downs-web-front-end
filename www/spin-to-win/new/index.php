<?php
require_once(__DIR__ . '/../../../../colonial-downs-web-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-configuration.php');
?>

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <img class="client-logo-sm" src="/images/spin-to-win/client-logo.png">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <p class="text-center h6">PREMIERE CLUB</p>
        </div>
    </div>
</div>

<div class="mb-3">
    <?php include('../template/user-acquisition-form.php'); ?>
<div>

<script>
    UserAcquisitonFramework.setAfterplayUrl(
        window.location.host + '/spin-to-win/new/afterplay/index.php'
    );

    $('#user-acquisition-form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            return;
        }

        UserAcquisitonFramework.setCookie(
            JSON.stringify(
                UserAcquisitonFramework.serializeDataFromForm(form)
            )
        );

        UserAcquisitonFramework.loadGame();
    });
</script>
