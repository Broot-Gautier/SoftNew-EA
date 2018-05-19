<script src="<?= asset_url('assets/js/backend_users_admins.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users_providers.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <title><?= lang('sign_up') . ' - ' . $company_name ?></title>

<style>
        body {
            width: 100vw;
            height: 100vh;
            display: table-cell;
            vertical-align: middle;
            background-color: #CAEDF3;
        }

        #login-frame {
            width: 630px;
            margin: auto;
            background: #FFF;
            border: 1px solid #DDDADA;
            padding: 70px;
        }

        @media(max-width: 640px) {
            #login-frame {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div id="login-frame" class="frame-container">
        <h2><?= lang('backend_section') ?></h2>
        <p><?= lang('you_need_to_login') ?></p>
        <hr>
        <div class="alert hidden"></div>
        <form id="login-form">
            <div class="form-group">
                <label for="username"><?= lang('username') ?></label>
                <input style="float:right;width:408;height:25;right:30;" type="text" id="username"
                        placeholder="<?= lang('enter_username_here') ?>"
                        class="form-control"  style="float:right;width:408;height:25;right:30; " />
            </div>
            <br>
            <div class="form-group">
                <label for="token"><?= lang('token')?></label>
                <input style="float:right;width:408;height:25;right:30;" type="text" id="token"
                        placeholder="<?= lang('enter_token_here') ?>"
                        class="form-control" />
            </div>
            <br>
            <div class="form-group">
                                    <label for="provider-first-name"><?= lang('first_name') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-first-name" class="form-control required" maxlength="256">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-last-name"><?= lang('last_name') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-last-name" class="form-control required" maxlength="512">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-email"><?= lang('email') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-email" class="form-control required" max="512">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-phone-number"><?= lang('phone_number') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-phone-number" class="form-control required" max="128">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-mobile-number"><?= lang('mobile_number') ?></label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-mobile-number" class="form-control" maxlength="128">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-address"><?= lang('address') ?></label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-address" class="form-control" maxlength="256">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-city"><?= lang('city') ?></label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-city" class="form-control" maxlength="256">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-state"><?= lang('state') ?></label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-state" class="form-control" maxlength="256">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-zip-code"><?= lang('zip_code') ?></label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-zip-code" class="form-control" maxlength="64">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-username"><?= lang('username') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" id="provider-username" class="form-control required" maxlength="256">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-password"><?= lang('password') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" type="password" id="provider-password" class="form-control required" maxlength="512">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-password-confirm"><?= lang('retype_password') ?> *</label>
                                    <input style="float:right;width:408;height:25;right:30;" type="password" id="provider-password-confirm" class="form-control required" maxlength="512">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="provider-calendar-view"><?= lang('calendar') ?> *</label>
                                    <select id="provider-calendar-view" class="form-control required">
                                        <option value="default">Default</option>
                                        <option value="table">Table</option>
                                    </select>
                                </div>

                                <br>

                                <button type="button" id="provider-notifications" class="btn btn-default" data-toggle="button">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    <span><?= lang('receive_notifications') ?></span>
                                </button>

                                <br><br>

            <button href="<?= site_url('welcome/signup') ?>" type="submit" id="signin" class="btn btn-primary">
                <?= lang('sign_in') ?>
            </button>
                    </div>
            <br>



            <br><br>

            <span id="select-language" class="label label-success">
                <?= ucfirst($this->config->item('language')) ?>
            </span>

</html>
<script>
function myFunction() {
    $(#signin).click(){
        $var = document.getElementById("login-form").anchors();
        <?php var_dump(  $var) ?>;
        exit();
    }
}
</script>