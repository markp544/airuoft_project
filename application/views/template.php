<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>AirUofT</title>
        <link href="<?php echo base_url();?>css/airuoftcss" rel="stylesheet" type="text/css" />

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
    
            <script src="http://code.jquery.com/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/customerinfojs.js" ></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/seatjs.js" ></script>
</html>
