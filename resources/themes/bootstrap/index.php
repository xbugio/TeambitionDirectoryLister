<!DOCTYPE html>
<html>
    <head>
        <title>Teambition 网盘共享工具</title>
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/folder.png">
        <!-- STYLES -->
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">
        <!-- SCRIPTS -->
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/jquery.min.js"></script>
        <script src="<?php echo THEMEPATH; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/directorylister.js"></script>
        <!-- META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
    </head>
    <body>
        <div id="page-navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <p class="navbar-text">
                    <?php echo $nodeName; ?>
                </p>
                <div class="navbar-right">
                    <ul id="page-top-nav" class="nav navbar-nav">
                        <li>
                            <a href="javascript:void(0)" id="page-top-link">
                                <i class="fa fa-arrow-circle-up fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="page-content" class="container">
            <div id="directory-list-header">
                <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-10">文件名</div>
                    <div class="col-md-2 col-sm-2 col-xs-2 text-right">大小</div>
                    <div class="col-md-3 col-sm-4 hidden-xs text-right">修改日期</div>
                </div>
            </div>

            <ul id="directory-listing" class="nav nav-pills nav-stacked">
                <?php $fileTypes = include(THEMEPATH.'/fileTypes.php');?>
                <?php foreach($nodes as $node): ?>
                    <li data-name="<?php echo $node['name']; ?>" data-href="<?php $node['link']; ?>">
                        <a href="<?php echo $node['link']; ?>" class="clearfix" data-name="<?php echo $node['name']; ?>">
                            <div class="row">
                                <span class="file-name col-md-7 col-sm-6 col-xs-9">
                                    <i class="fa <?php if($node['type']=='folder'){echo $fileTypes['folder'];}else{echo $fileTypes[$node['ext']]??$fileTypes['other'];}; ?> fa-fw"></i>
                                    <?php echo $node['name']; ?>
                                </span>
                                <span class="file-size col-md-2 col-sm-2 col-xs-3 text-right">
                                    <?php if($node['type']=='file'){echo $node['size'];} ?>
                                </span>
                                <span class="file-modified col-md-3 col-sm-4 hidden-xs text-right">
                                    <?php echo $node['updated']; ?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer">
            Teambition 网盘共享工具
        </div>
    </body>
</html>
