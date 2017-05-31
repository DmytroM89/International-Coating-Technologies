</div>


<footer class="footer" id="contacts">
    <div class="container">
    <div class="contacts">
        <div class="row center-xs">
            <div class="contacts__box">
                <div class="contacts__box_middle">
                    <div class="contacts__text">
                        <?php the_field('contact_text'); ?>
                    </div>
                    <button class="callBack" data-effect="mfp-zoom-in" type="button"><?php echo __('[:ua]Замовити зворотній дзвінок[:en]Request a call back[:ru]Заказать обратный звонок'); ?></button>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

<div class="callback__form mfp-with-anim mfp-hide" id="callBack">
    <div class="container">
        <div class="callback__form__wrap">
            <?php
            $lang = get_locale();
            if($lang == 'uk') : ?>
                <?php echo do_shortcode('[contact-form-7 id="38" title="Callback UA"]'); ?>
            <?php elseif ($lang == 'en_US'): ?>
                <?php echo do_shortcode('[contact-form-7 id="51" title="Callback EN"]'); ?>
            <?php else: ?>
                <?php echo do_shortcode('[contact-form-7 id="102" title="Callback RU"]'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>