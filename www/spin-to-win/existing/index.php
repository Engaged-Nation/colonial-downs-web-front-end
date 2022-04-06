<?php
require_once(__DIR__ . '/../../../../colonial-downs-web-portal/vendor/engaged-nation/portal-core/FrontEnd/Bootstrap/client-configuration.php');
?>

<div class="container-fluid my-3">
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

<div id="first-form" class="mb-3">
    <div class="container-fluid">
        <p class="text-center h4 mb-4">PLEASE ENTER YOUR PREMIERE CARD NUMBER</p>

        <div class="row justify-content-center">
            <form id="playerscard-lookup-form" novalidate autocomplete="off" class="col-md-8">
                <div class="form-group-border">
                    <div class="form-group">
                        <div class="position-relative">
                            <input id="input-playerscard" type="text" class="form-control" name="playerscard" required>

                            <div class="invalid-tooltip">
                                cannot find premiere card number
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
</div>

<div id="second-form" class="d-none mb-3">
    <?php include('../template/user-acquisition-form.php'); ?>
<div>

<script>
    UserAcquisitonFramework.setAfterplayUrl(
        window.location.host + '/spin-to-win/existing/afterplay/index.php'
    );

    $('#playerscard-lookup-form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            return;
        }

        var data = {
            en_id: UserAcquisitonFramework.getEnIdToken(),
            method: 'getUserReachByPlayerscard',
            parameters: UserAcquisitonFramework.serializeDataFromForm(form)
        };

        $.ajax({
            type: 'POST',
            url: UserAcquisitonFramework.getFormURL(),
            data: JSON.stringify(data),
            dataType: 'json',
            contentType: 'application/json',
            success: function(response) {
                if (response.status == 'Failed') {
                    form.removeClass('was-validated')
                        .find('input')
                        .addClass('is-invalid');
                    return;
                }

                var firstForm = $('#first-form');
                var secondForm = $('#second-form');

                firstForm.addClass('d-none');
                secondForm.removeClass('d-none');

                var dobArray = response.data.dob.split('-')
                secondForm.find('select[name="user_date_of_birth_yyyy"]').prop('disabled', true).val(dobArray[0]);
                secondForm.find('select[name="user_date_of_birth_mm"]').prop('disabled', true).val(dobArray[1]);
                secondForm.find('select[name="user_date_of_birth_dd"]').prop('disabled', true).val(dobArray[2]);
                secondForm.find('input[name="user_first_name"]').prop('disabled', true).val(response.data.fname);
                secondForm.find('input[name="user_last_name"]').prop('disabled', true).val(response.data.lname);

                secondForm.find('input[name="user_email"]').val(response.data.email);
                secondForm.find('input[name="user_players_card"]').val(response.data.users_playerscard.playerscard);
            },
            error: function () {
                form.prepend('<p class="text-center bg-danger">Form has expired.</div>');
                form.find('button[type="submit"]').remove();
            }
        });
    });

    $('#user-acquisition-form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            return;
        }

        form.find('select[name="user_date_of_birth_yyyy"]').prop('disabled', false);
        form.find('select[name="user_date_of_birth_mm"]').prop('disabled', false);
        form.find('select[name="user_date_of_birth_dd"]').prop('disabled', false);
        form.find('input[name="user_first_name"]').prop('disabled', false);
        form.find('input[name="user_last_name"]').prop('disabled', false);

        UserAcquisitonFramework.setCookie(
            JSON.stringify(
                UserAcquisitonFramework.serializeDataFromForm(form)
            )
        );

        UserAcquisitonFramework.loadGame();
    });
</script>
