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
            <h2>Users <small>Add New User</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo form_open_multipart('users/add', array('id' => 'demo-form2','class'=>'form-horizontal form-label-left')); ?>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="first_name" value="<?php echo $this->input->post('first_name'); ?>" type="text" id="first-name" required="required" class="form-control ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="last_name" value="<?php echo $this->input->post('last_name'); ?>" type="text" id="last-name" name="last-name" class="form-control">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number"  name="phone" value="<?php echo $this->input->post('phone'); ?>" maxlength="15" id="phone" class="form-control">
                    <span class="text-danger"><?php echo form_error('phone');?></span>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="email" value="<?php echo $this->input->post('email'); ?>" type="text" id="first-name" required="required" class="form-control ">
                    <span class="text-danger"><?php echo form_error('email');?></span>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input name="password" value="<?php echo $this->input->post('password'); ?>" type="password" id="first-name" required="required" class="form-control ">
                    <span class="text-danger"><?php echo form_error('password');?></span>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <p style="margin-top: 8px">
                    Male
                    <input type="radio" class="flat" name="gender" id="maratial_statusM" value="<?=MALE?>" checked />
                    Female:
                    <input type="radio" class="flat" name="gender" id="maratial_statusS" value="<?=FEMALE?>" />
                </p>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input  name="dob" value="<?php echo $this->input->post('dob'); ?>" id="date_picker" class="date_picker form-control" type="text">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Role <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <select name="role" class="form-control select2" id="role">
                        <option value="">Select Role</option>
                        <option value="<?=TADMIN?>">Teacher Admin</option>
                        <!-- <option value="<?=USER?>">User</option> -->
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
                    <img style="box-shadow: 0px 0px 15px lightgray" id="blah" class="img-responsive img-circle" height="150px"/>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="reset"><i class="fa fa-times-circle"></i> Reset</button>
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


