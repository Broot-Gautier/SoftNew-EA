<script type="text/javascript">
  $(document).ready(function (e) {
    $('#upload').on('click', function () {
      var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);

       // var nameUsuario =<?= json_encode($user_settings['first_name']) ?>;
       // var lastNameUsuario =<?= json_encode($user_settings['last_name']) ?>;
       // document.write(nameUsuario);
       var idUsuario = <?= json_encode($user_settings['id']) ?>;
      //  form_data.append('nameUser',nameUsuario);
        form_data.append('idUser',idUsuario);
        
        $.ajax({
                url: "<?php echo site_url().'/ajaximageupload/upload_file' ?>", // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (response) {
                  $('#msg').html(response); // display success response from the server
                },
                error: function (response) {
                  $('#msg').html(response); // display error response from the server
                }
                    });
                });
            });
</script>
<script src="<?= asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script> 
<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-qtip/jquery.qtip.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.min.js') ?>"></script>

 <?php $hidden = ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'hidden' ?>
        <div class="container">
            
                <!--div class="row"-->
                <!--div class="col-md-15 "-->
                    <div class="panel panel-default">
                            <div class="panel-heading" align="center">  <h3><?= $user_settings["first_name"]?>  <?= $user_settings["last_name"]?></h3></div>
                            <div class="panel-body">
                            <div class="box box-info">
                            <div class="box-body">
                            <div class="col-sm-6">
                            <?php 
                                if (file_exists('uploads/'.$user_settings['id'].'/perfil.png'))
                                {
                                    echo'<img src="' . base_url().'uploads/' . $user_settings['id'] . '/perfil.png" class="img-circle img-responsive" width=200 height=200>';

                                } else {
                                    echo "<div  align='center'> <img alt='User Pic' src='https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg' id='profile-image1' class='img-circle img-responsive' width=200 height=200>" ;
                                }
                            ?>
                            <br>
                            <button style="margin-left: 60px; padding: 8px" type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">Upload file</button>

                                    <!-- Modal -->
                                    <div id="uploadModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">File upload form</h4>
                                              </div>
                                              <div class="modal-body">
                                                <!-- Form -->  
                                                  <p id="msg"></p>
                                                  <input type="file" id="file" name="file" />
                                                  <br>
                                                  <button id="upload">Upload</button>           
                                            </div>
    
                                          </div>
                                        </div>
                                    <!--Upload Image Js And Css-->
                                    </div>
                                <br>
                            <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br>
<br>
<br>
<br>
<br>

                    <div class="clearfix"></div>
                    <hr style="margin:5px 0 5px 0;">

<?= json_encode($user_settings) ?> 
<div for="first-name"><?= lang('first_name') ?><?= $user_settings["first_name"] ?> </div>
    
<div class="col-sm-5 col-xs-6 tital "><label for="last-name"><?= lang('last_name') ?> </label> <div class="col-sm-7"><?= $user_settings["last_name"] ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div class="col-sm-7">15 Jun 2016</div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7">11 Jun 1998</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Place Of Birth:</div><div class="col-sm-7">Shirdi</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7">Indian</div>