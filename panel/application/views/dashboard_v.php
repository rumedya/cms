<!DOCTYPE html>
<html lang="tr">
<head>
<?php $this->load->view("includes/head");?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->
    <!-- APP NAVBAR ==========-->
    <!--========== END app navbar -->
    <?php $this->load->view("includes/navbar");?>
    <!-- APP ASIDE ==========-->
    <?php $this->load->view("includes/aside");?>
    <!--========== END app aside -->
    <!-- navbar search -->
    <?php $this->load->view("includes/navbar-search");?>


<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <?php $this->load->view("dashboard_v/content");?>
            <!-- #dash-content -->
    </div><!-- .wrap -->
    <!-- APP FOOTER -->
    <?php $this->load->view("includes/footer");?>
    <!-- /#app-footer -->
</main>
<!--========== END app main -->



    <!-- APP CUSTOMIZER -->
    <!-- SIDE PANEL -->
    <?php $this->load->view("includes/right-aside");?>
    <?php $this->load->view("includes/include_script")?>
</body>
</html>