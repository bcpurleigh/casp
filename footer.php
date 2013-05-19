</div>

<footer>
  <div class="container clearfix">
    <div class="about block">
      <? $about = get_page_by_title('about'); ?>
      <h3 class="about-title"><a href="<?= get_permalink($about); ?>">About</a></h3>
      <p><?= nl2br($about->post_content); ?></p>
    </div>
    <div class="contact block">
      <h3>Contact</h3>
      <?= do_shortcode('[contact]') ?>
    </div>
  </div>
  <div class="copyright container">
    Copyright <?= date('Y') ?> Capital As Power. <a href="http://www.capitalaspower.com">www.capitalaspower.com</a>. All rights reserved | Designed by Moxy Creative House
  </div>
</footer>

<?php wp_footer(); ?>

<? if (is_single()): ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=314097502035233";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>		
<script type="text/javascript">
  window.___gcfg = {lang: 'en-GB'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<? endif; ?>

<script>
    var _gaq=[['_setAccount','XXXXXX'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src='//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>