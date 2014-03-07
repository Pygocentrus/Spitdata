<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo $BASE.'/'.$UI; ?>" />        
        <title><?php echo $site; ?></title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../../ui/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="../../ui/css/fonts/fonts.css">
        <link rel="stylesheet" href="../../ui/css/custom-style.css">
        <?php if ($currentPage=='admin'): ?>
            <link href="../../ui/css/jquery.confirmon.css" rel="stylesheet" media="screen">
        <?php endif; ?>
        <?php if ($currentPage=='api'): ?>
            <link href="../../ui/css/custom-admin.css" rel="stylesheet" media="screen">
        <?php endif; ?>
        <link rel="icon" type="image/png" href="../../ui/assets/favicon.png">
    </head>
    <body>
        <?php echo $this->render('back/nav.htm',$this->mime,get_defined_vars()); ?>
        
