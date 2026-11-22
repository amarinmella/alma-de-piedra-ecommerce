<?php
get_header();
$uploads = wp_upload_dir();
$base_uploads = trailingslashit($uploads["baseurl"]) . "2026/11/";
$shop_url = function_exists("wc_get_page_permalink") ? wc_get_page_permalink("shop") : home_url("/coleccion/");
?>
<main id="primary" class="site-main">
  <section class="adp-section">
    <div class="adp-container">
      <div class="adp-split">
        <div class="adp-split-media">
          <img src="<?php echo esc_url($base_uploads . "alma-taller.jpg"); ?>" alt="Taller Alma De Piedra" />
        </div>
        <div class="adp-split-body">
          <p class="adp-eyebrow"><span class="adp-eyebrow-line"></span> Taller Alma De Piedra • Santiago de Chile</p>
          <h1>Artesanía meditativa y nobleza mineral</h1>
          <p>En Alma De Piedra concebimos cada joya como un amuleto cotidiano. Seleccionamos a mano minerales naturales —cuarzo rosa, piedra luna, amatista y lapislázuli de la cordillera chilena— y los engarzamos sobre plata 925 y enchapados de oro 18k de alta durabilidad.</p>
          <p>Trabajamos en lotes pequeños desde nuestro taller en Santiago, con despacho fijo a RM, V y VI Región y envíos a todo Chile vía Blue Express.</p>
          <div class="adp-stats">
            <div class="adp-stat">
              <strong>100%</strong>
              <span>Piedras Auténticas</span>
            </div>
            <div class="adp-stat">
              <strong>Oro 18k &amp; Plata 925</strong>
              <span>Metales Nobles</span>
            </div>
          </div>
          <a class="adp-btn-primary" href="<?php echo esc_url($shop_url); ?>">Explorar Colección &rarr;</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
