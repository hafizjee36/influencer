<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Influencer</h2>
            <ul class="nav navbar-right panel_toolbox">
                <?php if($this->session->userdata('role')== SUPERADMIN){ ?>
                <li >
                     <button class="btn btn-success btn-sm add" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add</button>
                </li>
                <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 5%">SR</th>
                                <th>Title</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            <?php $count=1; foreach($results as $key =>$r){?>
                            <tr>
                                <td><?=$r['id']?></td>
                                <td><?=$r['title']?></td>
                                <td style="white-space: nowrap">
                                    <a class="btn btn-warning btn-sm" href="<?=base_url('influencer.html?id='.$r['id'].'&mode=edit')?>" title="Edit"><i class="fa fa-pencil"></i> </a>
                                    <?php if($this->session->userdata('role')== SUPERADMIN){ ?>
                                    <a class="btn btn-danger btn-sm" href="<?=base_url('influencer.html?id='.$r['id'].'&mode=delete')?>" onclick="return confirm('Are you sure?')" title="Delete"><i class="fa fa-trash"></i> </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <?= form_open('influencer.html')?>
            <input hidden name="id" value="<?= $id ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" value="<?=$title?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3"><?=$desc?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
            </div>
            <?= form_close();?>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(function() {
        <?php if($this->input->get('mode') == 'edit'):?>
            $('#addModal').modal('toggle');
             $('.modal-title').html('<i class="fa fa-pencil"></i> Edit Influencer');
        <?php endif;?>
        $('.add').click(function() {
            $('.modal-title').html('<i class="fa fa-plus"></i> New Influencer');
        });
    });
    function confirmation(id)
    {
        toastr.error("<button type='button' id='confirmationRevertYes'  class='btn btn-success btn-sm' style='margin-left: 40px; margin-top: 20px'><i class='fa fa-check'></i> YES</button><button type='button' class='btn btn-danger btn-sm' style='margin-top: 20px'><i class='fa fa-close'></i> NO</button>",'Are you sure to delete record?',
            {
                closeButton: false,
                allowHtml: true,
                onShown: function (toast) {
                    $("#confirmationRevertYes").click(function(){
                        $.ajax({
                            url: "<?=site_url('influencer-remove/');?>"+id,
                            success: function (data) {
                                toastr.success('success',"Class deleted successfully.");
                                $("#result").html(data);
                            }
                        });
                    });
                }
            });
    }
</script>