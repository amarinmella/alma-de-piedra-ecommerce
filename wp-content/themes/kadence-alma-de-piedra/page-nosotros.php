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
          <img src="<?php echo esc_url($base_uploads . "alma-taller.jpg"); ?>" alt="Alma De Piedra — Seleccionado en Chile" />
        </div>
        <div class="adp-split-body">
          <p class="adp-eyebrow"><span class="adp-eyebrow-line"></span> Alma De Piedra • Seleccionado en Chile</p>
          <h1>Joyas que habitan tu piel</h1>
          <p>En Alma De Piedra concebimos cada joya como una pieza con sentido pensada para conectar contigo. Seleccionamos en Chile collares, chokers y accesorios con piedras naturales y gemas, junto a acabados enchapados en plata 925 y oro 18k de alta durabilidad.</p>
          <p>Cada pedido llega en una bolsita con nuestro diseño y empaque cuidado, con despacho fijo a RM, V y VI Región y envíos a todo Chile vía Blue Express.</p>
          <div class="adp-stats">
            <div class="adp-stat">
              <strong>100%</strong>
              <span>Piedras Naturales &amp; Gemas</span>
            </div>
            <div class="adp-stat">
              <strong>Oro 18k &amp; Plata 925</strong>
              <span>Enchapados Nobles</span>
            </div>
          </div>
          <div class="adp-hero-actions">
            <a class="adp-btn-primary" href="<?php echo esc_url($shop_url); ?>">Explorar Colección &rarr;</a>
            <a class="adp-btn-secondary" href="https://www.instagram.com/almadepiedra.cl/" target="_blank" rel="noopener noreferrer">Personaliza tu collar por DM</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
