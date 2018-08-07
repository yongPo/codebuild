<html>
    <head>
        <title> Code Build </title>
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
        <script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="<?php echo base_url() ?>">Codebuild</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>posts">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>categories">Categories</a>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!$this->session->userdata('logged_in')) : ?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>users/login">Login</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>users/register">Register</a>
                      </li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in')) : ?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>categories/create">Create Category</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>posts/create">Create Post</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>users/logout">Logout</a>
                      </li>
                    <?php endif; ?>
                </ul>
              </div>
            </div>
        </nav>
        <div class="container pt-5">
          <?php if($this->session->flashdata('user_registered')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>' ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('post_created')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>' ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('post_updated')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>' ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('post_deleted')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>' ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('category_created')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>' ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('login_failed')): ?>
              <?= '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>' ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('user_loggedin')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>' ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('user_loggedout')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>' ?>
          <?php endif; ?>

          <?php if($this->session->flashdata('category_deleted')): ?>
              <?= '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>' ?>
          <?php endif; ?>
