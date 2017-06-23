<?php
/*
Template Name: Index
*/

get_header(); // Подключаем хедер?>

<div class="menu mfp-with-anim mfp-hide" id="menu">
    <div class="menu__container">
        <ul class="menu__nav">
            <li class="menu__nav__item"><a href="#about"><?php echo __('[:ua]Про компанію[:en]About us[:ru]О компании'); ?></a></li>
            <li class="menu__nav__item"><a href="#advantage"><?php echo __('[:ua]Наші переваги[:en]Our benefits[:ru]Наши преимущества'); ?></a></li>
            <li class="menu__nav__item"><a href="#product"><?php echo __('[:ua]Продукти[:en]Products[:ru]Продукты'); ?></a></li>
            <li class="menu__nav__item"><a href="#products__prepare"><?php echo __('[:ua]Продукти для підготовки поверхні[:en]Products[:ru]Продукты'); ?></a></li>
            <li class="menu__nav__item"><a href="#contacts"><?php echo __('[:ua]Контакти[:en]Contacts[:ru]Контакты'); ?></a></li>
        </ul>
    </div>
</div>

<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="company__info">
                    <div class="company__info__title"><?php echo __('[:ua]про компанію[:en]About us[:ru]О компании'); ?></div>
                    <div class="company__info__name"><?php the_field('company_name'); ?></div>
                    <div class="company__info__describe"><?php the_field('company_describe'); ?></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="prod__photo">
                    <?php
                        $imagesSmall = get_field('small_slider');
                        $imagesBig = get_field('big_slider');

                        if($imagesSmall && $imagesBig):
                    ?>
                    <div class="slider__box slider__box_sm">
                        <div class="a-slider a-slider_sm">
                            <?php foreach( $imagesSmall as $imgSm ): ?>
                                <div class="slider__item" style="background: url('<?php echo $imgSm["url"]; ?>') no-repeat center">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="slider__box slider__box_lg">
                        <div class="a-slider a-slider_lg">
                            <?php foreach( $imagesBig as $imgBg ): ?>
                                <div class="slider__item" style="background: url('<?php echo $imgBg["url"]; ?>') no-repeat center"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="advantage" id="advantage">
    <div class="container">
        <div class="row center-xs">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="advantage__title section__title"><?php echo __('[:ua]Наші переваги[:en]Our benefits[:ru]Наши преимущества'); ?></div>
            </div>
        </div>
        <div class="row middle-xs">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="advantage__list"><?php the_field('advantage_list'); ?></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <div class="row center-xs">
                    <div class="sphere__container">
                        <canvas id="sphere" width="400" height="400">
                            <p>Ваш браузер не поддерживает рисование.</p>
                        </canvas>
                        <div id="glow-shadows" class="earth"></div>
                        <div id="locations"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs">
                <div class="advantage__main">
                    <div class="row">
                        <div class="leaf"></div>
                        <div class="advantage__main__text">
                            <?php the_field('main_advantage'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product" id="product">
    <div class="container">
        <div class="row center-xs">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="product__title section__title"><?php echo __('[:ua]Продукти[:en]Products[:ru]Продукты'); ?></div>
            </div>
        </div>
        <div class="row center-xs">
            <?php
                $products = get_field('products');
                if($products):
            ?>
            <div class="p-slider">
                <div class="p-slider__name">
                    <?php foreach($products as $product): ?>
                        <div class="product__name"><?php echo $product['product_name']; ?></div>
                    <?php endforeach; ?>
                </div>
                <div class="p-slider__describe">
                    <?php foreach($products as $product): ?>
                        <div class="product__describe">
                            <div class="product__describe__text">
                                <?php echo $product['product_describe']; ?>
                            </div>
                            <?php $locale = get_locale();?>
                            <div class="row end-xs">
                                <?php if($product['product_describe_file']): ?>
                                    <?php if($locale == 'uk'): ?>
                                        <button type="button"><a href="<?php echo $product['product_describe_file']['url']; ?>">Завантажити повний опис</a></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if($product['product_describe_file_ru']): ?>
                                    <?php if($locale == 'ru_RU'): ?>
                                        <button type="button"><a href="<?php echo $product['product_describe_file_ru']['url']; ?>">загрузить полное описание</a></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if($product['product_describe_file_en']): ?>
                                    <?php if($locale == 'en_US'): ?>
                                        <button type="button"><a href="<?php echo $product['product_describe_file_en']['url']; ?>">download full description</a></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="row center-xs">
            <div class="product__in-development">
                <p><strong><?php echo __('[:ua]Продукти в розробці:[:en]Products in development:[:ru]Продукты в разработке:'); ?></strong></p>
                <?php
                $pid = get_field('in-development');
                if($pid):
                    foreach($pid as $pidItem): ?>
                        <p><strong><?php echo $pidItem['product_type']; ?></strong></p>
                        <ul>
                            <?php foreach ($pidItem['product_names'] as $prodName): ?>
                                <li><?php echo $prodName['name']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

</section>

<section class="products__prepare" id="products__prepare">
    <div class="container">
        <div class="row center-xs">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="products__prepare__title section__title"><?php echo __('[:ua]продукти для підготовки поверхні[:en]Products[:ru]Продукты для подготовки поверхности'); ?></div>
            </div>
        </div>
        <div class="row center-xs">
            <?php
                $prodPrepare= get_field('products_prepare');
                if($prodPrepare):
            ?>
            <div class="products__prepare__slider">
                <div class="products__prepare__slider__type">
                    <?php  foreach($prodPrepare as $type): ?>
                        <div class="products__prepare__type"><?php echo $type['products_prepare_type_name']; ?></div>
                    <?php endforeach; ?>
                </div>
                <div class="products__prepare__slider__items">
                    <?php  foreach($prodPrepare as $type): ?>
                        <div class="products__prepare__items__container">
                        <?php  foreach($type['products_prepare_items'] as $items): ?>
                            <div class="products__prepare__items__box">
                                <div class="products__prepare__items"><?php echo $items['products_prepare_item_name']; ?></div>
                                <div class="products__prepare__description mfp-with-anim mfp-hide" data-effect="mfp-zoom-in"><?php echo $items['products_prepare_item_descr']; ?></div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <?php endif; ?>
        </div>
        <div class="row center-xs">
            <?php
                $photoPrepare = get_field('photo_prepare');

                if($photoPrepare):
            ?>
            <div class="slider__box__prepare">
                <div class="prepare__slider">
                    <?php foreach( $photoPrepare as $photos ): ?>
                        <div class="prepare__slider__item" style="background: url('<?php echo $photos["url"]; ?>') no-repeat center"></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php get_footer(); // Подключаем футер ?>