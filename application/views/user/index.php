<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Users</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a href="<?=base_url('users/add')?>" class="btn btn-success text-white btn-sm"><i class="fa fa-plus"></i> Add</a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Dob</th>
                                <th>Gender</th>
                                <th>Img</th>
                                <!-- <th>Status</th> -->
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $t){
                            $u_id = urlencode(base64_encode($t['id'])); ?>
                                <tr>
                                    <!-- <td><?php echo $t['id']; ?></td> -->
                                    <td><?php echo $t['first_name'].' '.$t['last_name']; ?></td>
                                    <td><?php echo $t['email']; ?></td>
                                    <td><?php echo $t['dob']; ?></td>
                                    <td><?php if($t['gender'] == FEMALE){
                                        echo "Female";
                                        }elseif($t['gender'] == MALE){
                                        echo "Male";
                                        }?></td>
                                    <td><img src="<?=base_url('uploads/'.$t['img'])?>" height="50px" class="img-responsive img-rounded" alt=""></td>
                                    <!-- <td><?php if($t['status'] == ACTIVE){
                                            echo "Active";
                                        }elseif($t['status'] == INACTIVE){
                                            echo "In Active";
                                        }?>
                                    </td> -->
                                    <td><?php switch ($t['role']){
                                            case SUPERADMIN:
                                                echo "Super Admin";
                                                break;
                                            case TADMIN:
                                                echo "Teacher Admin";
                                                break;
                                        }?>
                                    </td>
                                    <td>
                                        <?php if ($t['role'] != SUPERADMIN) {?>
                                        <a href="<?php echo site_url('users/edit/'.$u_id); ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <?php } if ($this->session->userdata('role') == SUPERADMIN && $t['role'] != SUPERADMIN) {?>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="confirmation(<?=$t['id']?>)" title="Delete"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                        <!-- <div class="pull-right">
                            <?php echo $this->pagination->create_links(); ?>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmation(id)
    {
        toastr.error("<button type='button' id='confirmationRevertYes'  class='btn btn-success btn-sm' style='margin-left: 40px; margin-top: 20px'><i class='fa fa-check'></i> YES</button><button type='button' class='btn btn-danger btn-sm' style='margin-top: 20px'><i class='fa fa-close'></i> NO</button>",'Are you sure to delete record?',
            {
                closeButton: false,
                allowHtml: true,
                onShown: function (toast) {
                    $("#confirmationRevertYes").click(function(){
                        $.ajax({
                            url: "<?=site_url('users/remove/');?>"+id,
                            success: function (data) {
                                toastr.info('info',"Your User deleted successfully.");
//                                location.reload();
                            }
                        });
                    });
                }
            });
    }
</script>