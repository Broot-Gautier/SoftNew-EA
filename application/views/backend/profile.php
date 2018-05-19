<script src="<?= asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
<script>
    var GlobalVariables = {
        'csrfToken'     : <?= json_encode($this->security->get_csrf_hash()) ?>,
        'baseUrl'       : <?= json_encode($base_url) ?>,
        'dateFormat'    : <?= json_encode($date_format) ?>,
        'userSlug'      : <?= json_encode($role_slug) ?>,
        'settings'      : {
            'system'    : <?= json_encode($system_settings) ?>,
            'user'      : <?= json_encode($user_settings) ?>
        },
        'user'          : {
            'id'        : <?= $user_id ?>,
            'email'     : <?= json_encode($user_email) ?>,
            'role_slug' : <?= json_encode($role_slug) ?>,
            'privileges': <?= json_encode($privileges) ?>
        }
    };

    $(document).ready(function() {
        BackendSettings.initialize(true);
    });
</script>

 <?php $hidden = ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'hidden' ?>
        <div role="tabpanel" class="tab-pane <?= $hidden ?>" id="current-user">
            <form>
                <div class="row">
                    <fieldset class="col-xs-12 col-sm-6 personal-info-wrapper">
                        <legend>
                            <?= lang('personal_information') ?>
                            <?php if ($privileges[PRIV_USER_SETTINGS]['edit'] == TRUE): ?>
                                <button type="button" class="save-settings btn btn-primary btn-xs"
                                        title="<?= lang('save') ?>">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                    <?= lang('save') ?>
                                </button>
                            <?php endif ?>
                        </legend>

                        <input type="hidden" id="user-id">

                        <div class="form-group">
                            <label for="first-name"><?= lang('first_name') ?> *</label>
                            <input id="first-name" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="last-name"><?= lang('last_name') ?> *</label>
                            <input id="last-name" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="email"><?= lang('email') ?> *</label>
                            <input id="email" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="phone-number"><?= lang('phone_number') ?> *</label>
                            <input id="phone-number" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="mobile-number"><?= lang('mobile_number') ?></label>
                            <input id="mobile-number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address"><?= lang('address') ?></label>
                            <input id="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="city"><?= lang('city') ?></label>
                            <input id="city" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="state"><?= lang('state') ?></label>
                            <input id="state" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="zip-code"><?= lang('zip_code') ?></label>
                            <input id="zip-code" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="notes"><?= lang('notes') ?></label>
                            <textarea id="notes" class="form-control" rows="3"></textarea>
                        </div>
                    </fieldset>

                    <fieldset class="col-xs-12 col-sm-6 miscellaneous-wrapper">
                    <legend><?= lang('system_login') ?></legend>

                    <div class="form-group">
                        <label for="username"><?= lang('username') ?> *</label>
                        <input id="username" class="form-control required">
                    </div>

                    <div class="form-group">
                        <label for="password"><?= lang('password') ?></label>
                        <input type="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="retype-password"><?= lang('retype_password') ?></label>
                        <input type="password" id="retype-password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="calendar-view"><?= lang('calendar') ?> *</label>
                        <select id="calendar-view" class="form-control required">
                            <option value="default">Default</option>
                            <option value="table">Table</option>
                        </select>
                    </div>

                    <div>
                        <form action = "" method = "">
                            <input type = "file" name = "userfile" size = "20" /> 
                            <br /><br /> 
                            <input type = "submit" value = "upload" /> 
                        </form> 
                    </div>

                    <button type="button" id="user-notifications" class="btn btn-default" data-toggle="button">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <?= lang('receive_notifications') ?>
                    </button>
                </fieldset>
                </div>
            </form>
        </div>