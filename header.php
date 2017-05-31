<?php
/**
* Чистый Шаблон для разработки
* Шаблон хэдера
* @package WordPress
* @subpackage clean
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<meta http-equiv="Cache-Control" content="public">
<meta http-equiv="Cache-Control" content="no-store">
<meta http-equiv="Cache-Control" content="max-age=34700">

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<title><?php the_title(); ?></title>

<?php //wp_enqueue_script("jquery"); ?>
<?php wp_head(); // Необходимо для работы плагинов и функционала wp ?>

    <style type="text/css">
        #page-preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            height: 100vh;
            background: #fff;
            z-index: 100500;
        }
        #page-preloader .spinner {
            width: 150px;
            height: 150px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -75px 0 0 -75px;
        }
    </style>

</head>
<body>

<div id="page-preloader">
        <span class="spinner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
        </span>
</div>
<div id="top"></div>
<?php
    $lang = get_locale();
?>

<div class="wrapper wrap">
    <header class="header">
        <div class="container">
            <div class="row middle-xs">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a href="#menu" class="menu_btn" data-effect="mfp-zoom-in">
                        <span></span>
                    </a>
                    <div class="switch__lang">
                        <?php dynamic_sidebar('lang'); ?>
                    </div>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
                    <div class="title">
                        <div class="title__wrap">
                            <div class="title__c-name"><a href="#top">International Coating Technologies</a></div>
                        </div>
                        <div class="title__slogan">
                            <?php if($lang == 'uk'): ?>
                                <div class="title__slogan__item title__slogan__item_uk">Захищаємо створене людиною</div>
                            <?php elseif($lang == 'en_US'): ?>
                                <div class="title__slogan__item title__slogan__item_en">Protect created by human</div>
                            <?php else: ?>
                                <div class="title__slogan__item title__slogan__item_ru">ЗАЩИЩАЕМ СОЗДАННОЕ ЧЕЛОВЕКОМ</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs col-sm col-md-2 col-lg-2">
                    <div class="row end-xs">
                        <div class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


