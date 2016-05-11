<!doctype html> 
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]--> 
<!--[if IE 7]> <html class="no-js lt-ie9lt-ie8" lang=""> <![endif]--> 
<!--[if IE 8]> <html class="no-js lt-ie9" lang=""> <![endif]--> 
<!--[if gt IE 8]><!--> <html class="no-js" lang=""><!--<![endif]-->     
<head>         
    <meta charset="utf-8">         
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">         
    <title></title>
    <meta name="description" content="">         <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">         
    <link rel="stylesheet"href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/style.css" />     
</head>     

<body>
<!--[if lt IE 8]>     <p class="browserupgrade">You are using an<strong>outdated</strong> browser. Please <ahref="http://browsehappy.com/">upgrade your browser</a> to improve yourexperience.</p>     <![endif]-->     
    <?php             $arr =$this->session->flashdata();              
        if(!empty($arr['flash_message'])){ 
            $html = '<div class="bg-warning container flash-message">';
            $html .= $arr['flash_message'];                  $html .= '</div>'; 
            echo $html;             }         
    ?>     
    <div id="header">
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="LOGO">
            <div class="userinfo">
                <h1>Home</h1>
                 <h2>Welcome <?php echo $email; ?>! </h2>
                    <a href="<?php echo base_url('main/logout/'); ?>">Logout</a>
            </div>
        </div>
    </div>

    <div class="container">         
    <divclass="row">
