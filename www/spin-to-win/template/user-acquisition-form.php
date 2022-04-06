<div class="container-fluid">
    <p class="text-center h4 mb-4">PLEASE ENTER YOUR INFORMATION BELOW</p>

    <div class="row justify-content-center">
        <form id="user-acquisition-form" novalidate autocomplete="off" class="col-md-8">
            <div class="form-group-border">
                <div class="form-group">
                    <div class="position-relative">
                        <input id="input-first-name" type="text" class="form-control" name="user_first_name" required>

                        <div class="invalid-tooltip">
                            Please enter your first name
                        </div>
                    </div>

                    <div class="text-center mt-1">
                        <label for="input-first-name">FIRST NAME</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="position-relative">
                        <input id="input-last-name" type="text" class="form-control" name="user_last_name" required>

                        <div class="invalid-tooltip">
                            Please enter your last name
                        </div>
                    </div>

                    <div class="text-center mt-1">
                        <label for="input-last-name">LAST NAME</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <div class="position-relative">
                            <select id="input-dob-mm" class="form-control" name="user_date_of_birth_mm" required>
                                <?php
                                    echo "<option></option>";

                                    foreach (range(1, 12) as $num) {
                                        $num = str_pad($num, 2, '0', STR_PAD_LEFT);
                                        echo "<option value=\"$num\">$num</option>";
                                    }
                                ?>
                            </select>

                            <div class="invalid-tooltip">
                                Please enter a valid month
                            </div>
                        </div>

                        <div class="text-center mt-1">
                            <label for="input-dob-mm">MONTH</label>
                        </div>
                    </div>

                    <div class="form-group col">
                        <div class="position-relative">
                            <select id="input-dob-dd" class="form-control" name="user_date_of_birth_dd" required>
                                <?php
                                    echo "<option></option>";

                                    foreach (range(1, 31) as $num) {
                                        $num = str_pad($num, 2, '0', STR_PAD_LEFT);
                                        echo "<option value=\"$num\">$num</option>";
                                    }
                                ?>
                            </select>

                            <div class="invalid-tooltip">
                                Please enter a valid day
                            </div>
                        </div>

                        <div class="text-center mt-1">
                            <label for="input-dob-dd">DAY</label>
                        </div>
                    </div>

                    <div class="form-group col">
                        <div class="position-relative">
                            <select id="input-dob-yyyy" class="form-control" name="user_date_of_birth_yyyy" required>
                                <?php
                                    echo "<option></option>";

                                    foreach (range(1900, 2020) as $num) {
                                        echo "<option value=\"$num\">$num</option>";
                                    }
                                ?>
                            </select>

                            <div class="invalid-tooltip">
                                Please enter a valid year
                            </div>
                        </div>

                        <div class="text-center mt-1">
                            <label for="input-dob-yyyy">YEAR</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div class="position-relative">
                        <input id="input-email" type="email" class="form-control" name="user_email" required>

                        <div class="invalid-tooltip">
                            Please specify a valid email address
                        </div>
                    </div>

                    <div class="text-center mt-1">
                        <label for="input-email">EMAIL ADDRESS</label>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">SUBMIT</button>
            </div>

            <input type="hidden" name="user_players_card">
        </form>
    </div>
</div>
