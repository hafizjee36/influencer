<script type="text/javascript">
    <?php if($this->session->flashdata('info')){  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php } if($this->session->flashdata('error')){?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } ?>
</script>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Users <small>Edit User</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php $u_id = urlencode(base64_encode($user['id']));
             echo form_open_multipart('users/edit/'.$u_id, array('id' => 'demo-form2','class'=>'form-horizontal form-label-left')); ?>
             <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger text-center" id="info-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong><i class="fa fa-check"></i></strong>
                    <?=$this->session->flashdata('error')?>
                </div>
            <?php } ?>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $user['first_name']); ?>" type="text" id="first-name" required="required" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $user['last_name']); ?>" type="text" id="last-name" name="last-name" class="form-control">
                    <span class="text-danger"><?php echo form_error('last_name');?></span> </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number"  name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $user['phone']); ?>" maxlength="15" id="phone" class="form-control">
                    <span class="text-danger"><?php echo form_error('phone');?></span>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" type="text" id="first-name" required="required" class="form-control ">
                    <span class="text-danger"><?php echo form_error('email');?></span>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="password" value="<?php echo $this->input->post('password'); ?>" type="password" id="first-name"  class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <p style="margin-top: 8px">
                    <?php
                    $gender = array(
                        "Male" =>MALE,
                        "Female"=>FEMALE,
                    );
                    foreach($gender as $key => $role)
                    { ?>
                        <?=$key?>
                        <input type="radio" class="flat" name="gender" id="maratial_statusM" value="<?=$role?>" <?php if($role == $user['gender']) {echo "Checked";}?> />
                    <?php  } ?>
                </p>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input  name="dob" value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : $user['dob']); ?>" id="date_picker" class="date_picker form-control" required="required" type="text">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Role <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <select name="role" class="form-control select2" id="role">
                        <option <?php if($user['role'] == TADMIN){ echo "selected"; }?> value="<?=TADMIN?>">Teacher Admin</option>
                       <!--  <option <?php if($user['role'] == USER){ echo "selected"; }?> value="<?=USER?>">Site Manager</option> -->
                    </select>
                    <span class="text-danger"><?php echo form_error('role');?></span>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">
                </label>
                <div class="col-md-2 col-sm-2 ">
                    <label>
                        <input name="status"  value="1" type="checkbox" class="js-switch" checked /> Status
                    </label>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Profile Picture
                </label>
                <div class="col-md-2 col-sm-2 ">
                    <input  name="img" onchange="readURL(this);" id="prof_img" class="date-picker form-control"  type="file" style="display: none">
                    <i onclick="get_img()" class="fa fa-camera fa-3x" style="opacity: .7; cursor: pointer"></i>
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <img style="box-shadow: 0px 0px 15px lightgray" id="blah" src="<?=base_url('uploads/'.$user['img'])?>" class="img-responsive img-circle" height="150px"/>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3 text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Submit</button>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>

    function get_img() {
        $('#prof_img').click();
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
