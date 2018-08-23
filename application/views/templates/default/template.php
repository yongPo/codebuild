<!DOCTYPE html>
   
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Youplay</title>
    <meta name="description" content="Youplay - Gaming HTML Template based on Bootstrap">
    <meta name="keywords" content="gaming, game, community, template, html, bootstrap, webpack">
    <meta name="author" content="nK">

    <link rel="icon" type="image/png" href="assets/images/dark/icon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/bootstrap/dist/css/bootstrap.min.css" />

    <!-- Flickity -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/flickity/dist/flickity.min.css" />

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/magnific-popup/dist/magnific-popup.css" />

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/slider-revolution/css/settings.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/slider-revolution/css/layers.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/slider-revolution/css/navigation.css">

    <!-- Bootstrap Sweetalert -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/bootstrap-sweetalert/dist/sweetalert.css" />

    <!-- Social Likes -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/plugin/social-likes/dist/social-likes_flat.css" />

    <!-- FontAwesome -->
    <script defer src="<?php echo base_url(); ?>assets/default/plugin/font-awesome/svg-with-js/js/fontawesome-all.min.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/default/plugin/font-awesome/svg-with-js/js/fa-v4-shims.min.js"></script>

    <!-- Youplay -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/youplay.css">

    <!-- RTL (uncomment this to enable RTL support) -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/youplay-rtl.min.css" /> -->

    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/custom.css">
    
    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/default/plugin/jquery/dist/jquery.min.js"></script>
    
    <?php if(isset($additional_css)) : ?>
        <?php foreach($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo base_url() . $css ;?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
	<!--PRELOADER-->
	<?php $this->load->view("templates/default/widgets/preloader"); ?>
	<!--NAVBAR-->
	<?php $this->load->view("templates/default/widgets/navbar"); ?>
	<!--REGISTRATION FORM-->
	<?php $this->load->view("templates/default/widgets/registration-form"); ?>
	<div id="content">
        <?= $content; ?>
    </div>
    <!--FOOTER-->
    <?php $this->load->view("templates/default/widgets/footer"); ?>
    <!--SEARCH BLOCK-->
    <?php $this->load->view("templates/default/widgets/search-block"); ?>
        
   <!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="<?php echo base_url(); ?>assets/default/plugin/object-fit-images/dist/ofi.min.js"></script>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/default/plugin/jquery/dist/jquery.min.js"></script>

<!-- Hexagon Progress -->
<script src="<?php echo base_url(); ?>assets/default/plugin/HexagonProgress/jquery.hexagonprogress.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/default/plugin/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Jarallax -->
<script src="<?php echo base_url(); ?>assets/default/plugin/jarallax/dist/jarallax.min.js"></script>

<!-- Flickity -->
<script src="<?php echo base_url(); ?>assets/default/plugin/flickity/dist/flickity.pkgd.min.js"></script>

<!-- jQuery Countdown -->
<script src="<?php echo base_url(); ?>assets/default/plugin/jquery-countdown/dist/jquery.countdown.min.js"></script>

<!-- Moment.js -->
<script src="<?php echo base_url(); ?>assets/default/plugin/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/default/plugin/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

<!-- Magnific Popup -->
<script src="<?php echo base_url(); ?>assets/default/plugin/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

<!-- Revolution Slider -->
<script src="<?php echo base_url(); ?>assets/default/plugin/slider-revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/default/plugin/slider-revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- ImagesLoaded -->
<script src="<?php echo base_url(); ?>assets/default/plugin/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Isotope -->
<script src="<?php echo base_url(); ?>assets/default/plugin/isotope-layout/dist/isotope.pkgd.min.js"></script>

<!-- Bootstrap Validator -->
<script src="<?php echo base_url(); ?>assets/default/plugin/bootstrap-validator/dist/validator.min.js"></script>

<!-- Bootstrap Sweetalert -->
<script src="<?php echo base_url(); ?>assets/default/plugin/bootstrap-sweetalert/dist/sweetalert.min.js"></script>

<!-- Social Likes -->
<script src="<?php echo base_url(); ?>assets/default/plugin/social-likes/dist/social-likes.min.js"></script>

<!-- Youplay -->
<script src="<?php echo base_url(); ?>assets/default/js/youplay.min.js"></script>
<script src="<?php echo base_url(); ?>assets/default/js/youplay-init.js"></script>


<script>
  $(".countdown").each(function() {
      var tz = $(this).attr('data-timezone');
      var end = $(this).attr('data-end');
          end = moment.tz(end, tz).toDate();
      $(this).countdown(end, function(event) {
        $(this).text(
          event.strftime('%D days %H:%M:%S')
        );
      });
  });
</script>


<!-- END: Scripts -->
    <!-- Additional Scripts -->
    <?php if(isset($add_js)) : ?>
        <?php foreach($add_js as $js): ?>
            <script src="<?php echo base_url() . $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(isset($extra_js)) : ?>
        <script><?php echo $extra_js; ?></script>
    <?php endif; ?>
</body>

</html>