<script src="<?= asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script> 
<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-qtip/jquery.qtip.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.min.js') ?>"></script>


<style type="text/css">
.Division{
		float: left;
		width: 300px;
		height: 100px;
    	border: 0px solid #000000;
    	margin-left: 10px;
}
</style>

 <?php $hidden = ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'hidden' ?>
 
		<div class="container">
  		<div class="list-group">
  			<?php
  			$users = json_decode(json_encode($all_users), True);
  			foreach ($users as $user) {
  			 	$imgImagen = "";
  			 	if (file_exists('uploads/'.$user['id'].'/perfil.png'))
				{
					$imgImagen = '<img src="' . base_url().'uploads/' . $user['id'] . '/perfil.png" class="img-circle" float:left width=60 height=60/>';
				} else {
                    $imgImagen = " <img alt='User Pic' src='https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg' id='profile-image1' class='img-circle' width=60 height=60/>" ;
				}
  			 	if($user['id_roles'] == '1')
  			 	{
  			 		echo " <a href='#' class='list-group-item'>";
  			 		echo $imgImagen;
  			 		echo "<span style='top: 19;left: 109;position: absolute;z-index: 1;visibility: show;'>"."<b>".$user['first_name']." ".$user['last_name']."</b></span> <span style='float:right;' class='glyphicon glyphicon-star'>Administrador</span></a>";	
  			 		echo "</a>";
  			 	}else{
  			 		echo " <a href='#' class='list-group-item'>";
  			 		echo $imgImagen;
  			 		echo "<span style='top: 19;left: 109;position: absolute;z-index: 1;visibility: show;'>"."<b>".$user['first_name']." ".$user['last_name']."</b></span></a>";  				
  			 	}
  			} ?>
		</div>
		</div>

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