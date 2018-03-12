
				<?php the_footer_useful(); // Вывести статьи Полезной информации ?>

			</div> <?php //main-layout__content ?>
		</div> <?php //content__wrap ?>
	</div> <?php //container ?>
</div> <?php //content__inner ?>
</div> <!-- main-layout -->
<div class="footer">
	<div class="footer-bottom">
		<div class="container">
			<div class="footer__inner">
				<div class="footer__item footer-logo">
					<img data-aload="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="" class="footer-logo_img">
					<div class="footer-logo__txt">© 2017 Все права защищены</div>
				</div>
				<div class="footer__item footer__menus">
					<div class="footer__menu footer__menu_1">
						<?php 
		                    wp_nav_menu( array(
		                        'menu' 				=> 8,
		                        'depth'             => 1,
		                        'container'         => 'ul',
		                        'menu_class'        => 'foot-menu-1',
		                        'container_class'   => 'cont',
		                        'container_id'      => '',
		                    ));
						?>					
					</div>
					<div class="footer__menu footer__menu_2">
						<?php 
		                    wp_nav_menu( array(
		                        'menu' 				=> 9,
		                        'depth'             => 1,
		                        'container'         => 'ul',
		                        'menu_class'        => 'foot-menu-2',
		                        'container_class'   => 'cont',
		                        'container_id'      => '',
		                    ));
						?>									
					</div>
					<div class="footer__menu footer__menu_1">
						<?php 
		                    wp_nav_menu( array(
		                        'menu' 				=> 10,
		                        'depth'             => 1,
		                        'container'         => 'ul',
		                        'menu_class'        => 'foot-menu-3',
		                        'container_class'   => 'cont',
		                        'container_id'      => '',
		                    ));
						?>									
					</div>
				</div>
				<div class="footer__item footer__pay">
					<div class="footer__title footer__title_pay">Способы оплаты:</div>
					<div class="footer__visa"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-footer-pay.png" alt=""></div>
					<div class="footer__title footer__title_pay">Расскажите о нас:</div>
					<div class="footer__share"><?php echo do_shortcode( '[addtoany]' ) ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="popup-form_feedback" class="popup-form mfp-hide">
	<div class="b-form">
		<div class="b-form__title">Заказать звонок</div>
		<?php echo do_shortcode( '[contact-form-7 id="625" title="Заказать обратный звонок"]' ) ?>
	</div>
</div>
<div id="popup-form_order" class="popup-form mfp-hide">
	<div class="b-form">
		<div class="b-form__title">Заказать<span id="js-form-order-title" class="b-form__subtitle"></span></div>
		<?php echo do_shortcode( '[contact-form-7 id="737" title="Заказать 1 клик"]' ) ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php the_field('option_code_bottom','option'); ?>
<script>
	var home_url="<?php echo home_url(); ?>";
	var theme_url="<?php echo get_template_directory_uri(); ?>";
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115183858-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115183858-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47953226 = new Ya.Metrika({
                    id:47953226,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47953226" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
