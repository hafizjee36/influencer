<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Influencer - Login</title>

    <!-- Bootstrap -->
    <link href="<?=base_url('assets/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('assets/')?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url('assets/')?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/')?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>

    <div class="login_wrapper" style="margin-top: 0">
        <div class="animate form login_form">
            <section class="login_content">
                <?=form_open('login/do_login')?>
                <img hidden src="<?=base_url('assets/images/logo.png')?>" width="330px" style="margin-bottom: 20px">
                    <h1>Influencer Login</h1>
                <?php if($this->session->flashdata('error')){?>
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> <?=$this->session->flashdata('error')?>
                    </div>
                <?php } ?>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="Email / Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success btn-block submit" href="index.html">Log in</button>
<!--                        <a class="reset_pass" href="#">Lost your password?</a>-->
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <p>© <?=date('Y')?> Influencer. All Rights Reserved.</p>
                        </div>
                    </div>
                <?=form_close()?>
            </section>
        </div>

    </div>
</div>
</body>
</html>
