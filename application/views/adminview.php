<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>AirUofT</title>
        <link href="<?php echo base_url();?>css/airuoftcss" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url();?>js/customerinfojs.js" ></script>
    </head>
    <body>
        <header id="header">
            <h2 id="headertitle">AirUofT</h2>
        </header>

        <!-- <div id="nav">
            <?php //$this->load->view('navigation'); ?>
        </div> -->

        <div id="main">
            <?php $this->load->view($main); ?>
        </div>

    </body>
</html>
