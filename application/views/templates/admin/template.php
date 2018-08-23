<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CodeBuild</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?= base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">  

    <!-- Custom Css -->
    <link href="<?= base_url(); ?>assets/backend/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/backend/css/custom.css" rel="stylesheet">
    <?php if(isset($additional_css)) : ?>
        <?php foreach($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo base_url() . $css ;?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url(); ?>assets/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <?php $this->load->view("templates/admin/widgets/preloader"); ?>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <?php $this->load->view("templates/admin/widgets/searchbar"); ?>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php $this->load->view("templates/admin/widgets/topbar"); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php $this->load->view("templates/admin/widgets/user_info"); ?>
            <!-- #User Info -->
            <!-- Menu -->
            <?php $this->load->view("templates/admin/widgets/menu"); ?>
            <!-- #Menu -->
            <!-- Footer -->
            <?php $this->load->view("templates/admin/widgets/footer"); ?>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>
    <!--Page content-->
    <section class="content">
        <?= $content; ?>
    </section>
        
    <!-- Jquery Core Js -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url(); ?>assets/backend/js/admin.js"></script>
    <!-- Additional Scripts -->
    <?php if(isset($add_js)) : ?>
        <?php foreach($add_js as $js): ?>
            <script src="<?php echo base_url() . $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(isset($extra_js)) : ?>
        <script><?php echo $extra_js; ?></script>
    <?php endif; ?>

    <!-- Demo Js -->
    <script src="<?= base_url(); ?>assets/backend/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>  
</body>

</html>