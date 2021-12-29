<?php
$peopleList = [
    [
        'img_src'=>'img/demo/authors/sunny.png',
        'img_alt'=>'Sunny A.',
        'name'=>'Sunny A. (UI/UX Expert)',
        'job'=>'Lead Author',
        'twitter_href'=>'https://twitter.com/@myplaneticket',
        'twitter_text'=>'@myplaneticket',
        'mail_href'=>'https://wrapbootstrap.com/user/myorange',
        'mail_contact'=>'Contact Sunny',
        'banned'=>false,
    ],
    [
        'img_src'=>'img/demo/authors/josh.png',
        'img_alt'=>'Jos K.',
        'name'=>'Jos K. (ASP.NET Developer)',
        'job'=>'Partner &amp; Contributor',
        'twitter_href'=>'https://twitter.com/@atlantez',
        'twitter_text'=>'@atlantez',
        'mail_href'=>'https://wrapbootstrap.com/user/Walapa',
        'mail_contact'=>'Contact Jos',
        'banned'=>false,
    ],
    [
        'img_src'=>'img/demo/authors/jovanni.png',
        'img_alt'=>'Jovanni Lo',
        'name'=>'Jovanni L. (PHP Developer)',
        'job'=>'Partner &amp; Contributor',
        'twitter_href'=>'https://twitter.com/@lodev09',
        'twitter_text'=>'@lodev09',
        'mail_href'=>'https://wrapbootstrap.com/user/lodev09',
        'mail_contact'=>'Contact Jovanni',
        'banned'=>true,
    ],
    [
        'img_src'=>'img/demo/authors/roberto.png',
        'img_alt'=>'Jovanni Lo',
        'name'=>'Roberto R. (Rails Developer)',
        'job'=>'Partner &amp; Contributor',
        'twitter_href'=>'https://twitter.com/@sildur',
        'twitter_text'=>'@sildur',
        'mail_href'=>'https://wrapbootstrap.com/user/sildur',
        'mail_contact'=>'Contact Roberto',
        'banned'=>true,
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                                <?php foreach($peopleList as $people): ?>
                                    <? if ($people['banned'] === true): ?>
                                        <div class="banned rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                    <? else: ?>
                                        <div class="rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                    <? endif; ?>
                                        <img src="<?=$people['img_src']?>" alt="<?=$people['img_alt']?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
                                        <div class="ml-2 mr-3">
                                            <h5 class="m-0">
                                                <?=$people['name']?>
                                                <small class="m-0 fw-300">
                                                    <?=$people['job']?>
                                                </small>
                                            </h5>
                                            <a href="<?=$people['twitter_href']?>" class="text-info fs-sm" target="_blank"><?=$people['twitter_text']?></a> -
                                            <a href="<?=$people['mail_href']?>" class="text-info fs-sm" target="_blank" title="<?=$people['mail_contact']?>"><i class="fal fa-envelope"></i></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
