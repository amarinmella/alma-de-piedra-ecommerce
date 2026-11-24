<?php
get_header();
$uploads = wp_upload_dir();
$base_uploads = trailingslashit($uploads["baseurl"]) . "2026/11/";
$shop_url = function_exists("wc_get_page_permalink") ? wc_get_page_permalink("shop") : home_url("/coleccion/");
?>
<main id="primary" class="site-main adp-front-page">
  <section class="adp-hero" style="background-image: url('<?php echo esc_url($base_uploads . "alma-hero.jpg"); ?>');">
    <div class="adp-container">
      <div class="adp-hero-inner">
        <p class="adp-eyebrow"><span class="adp-eyebrow-line"></span> Colección Atemporal • Seleccionado en Chile</p>
        <h1>Joyas que habitan tu piel.</h1>
        <p class="adp-lead">Joyas con sentido seleccionadas para conectar contigo. Piezas enchapadas en oro 18k y plata 925 junto a piedras naturales y gemas elegidas en Chile.</p>
        <div class="adp-hero-actions">
          <a class="adp-btn-primary" href="<?php echo esc_url($shop_url); ?>">Explorar Colección &rarr;</a>
          <a class="adp-btn-secondary" href="#filosofia">Nuestra Esencia</a>
        </div>
        <div class="adp-hero-badges">
          <div class="adp-hero-badge">
            <strong>Enchapado Oro 18k &amp; Plata 925</strong>
            <span>Acabados nobles de alta durabilidad</span>
          </div>
          <div class="adp-hero-badge">
            <strong>Piedras Naturales &amp; Gemas</strong>
            <span>Seleccionadas con sentido en Chile</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="adp-values">
    <div class="adp-container">
      <div class="adp-values-grid">
        <div class="adp-value-item">
          <h4>Despacho Fijo $3.500 CLP</h4>
          <p>Santiago (RM), V Región y VI Región con entrega ágil.</p>
        </div>
        <div class="adp-value-item">
          <h4>Envíos a todo Chile</h4>
          <p>Vía Blue Express con código de seguimiento en tiempo real.</p>
        </div>
        <div class="adp-value-item">
          <h4>Transferencia &amp; Descuentos</h4>
          <p>Pago por transferencia bancaria y cupones de descuento en tu compra.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="adp-section">
    <div class="adp-container">
      <div class="adp-section-head">
        <div>
          <p class="adp-eyebrow">Nuestra Selección</p>
          <h2>Joyas concebidas para el tacto</h2>
        </div>
        <p class="adp-sub">Una curaduría de piezas sutiles pensadas para acompañarte cada día, destacando la belleza única de las piedras naturales y gemas.</p>
      </div>
      <div class="adp-bento">
        <a class="adp-bento-card adp-bento-card--half" href="<?php echo esc_url(home_url("/product-category/enchapado-en-oro/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-collares-oro.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Cálido &amp; Luminoso</span>
            <h3>Enchapado en oro</h3>
            <p>Capas generosas de oro de 18 quilates sobre bases resistentes para el uso diario.</p>
            <span class="adp-bento-link">Explorar enchapado en oro &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--half" href="<?php echo esc_url(home_url("/product-category/enchapado-en-plata/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-collares-plata.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Brillo Lunar</span>
            <h3>Enchapado en plata</h3>
            <p>La sutileza del enchapado en plata 925 en líneas etéreas y colgantes de pulido espejo.</p>
            <span class="adp-bento-link">Ver enchapado en plata &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--third" href="<?php echo esc_url(home_url("/product-category/piedras-naturales/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-piedras-naturales.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Fuerza Mineral</span>
            <h3>Piedras naturales</h3>
            <p>Piedras naturales y gemas irrepetibles seleccionadas por su carácter y energía.</p>
            <span class="adp-bento-link">Ver piedras y gemas &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--third" href="<?php echo esc_url(home_url("/product-category/chokers/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-chokers.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Geometría Orgánica</span>
            <h3>Chokers</h3>
            <p>Ajuste ceñido y armónico creado con perlas de río y cuentas facetadas.</p>
            <span class="adp-bento-link">Descubrir chokers &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--third" href="<?php echo esc_url(home_url("/product-category/otros/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "alma-hero.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Edición Especial</span>
            <h3>Otros</h3>
            <p>Accesorios y piezas complementarias elegidas para completar tu estilo cotidiano.</p>
            <span class="adp-bento-link">Explorar más piezas &nearr;</span>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section class="adp-section-alt" id="novedades">
    <div class="adp-container">
      <div class="adp-section-head">
        <div>
          <p class="adp-eyebrow">Novedades &amp; Favoritos</p>
          <h2>Piezas destacadas de la temporada</h2>
        </div>
        <a class="adp-btn-secondary" href="<?php echo esc_url($shop_url); ?>">Ver Colección Completa &rarr;</a>
      </div>
      <?php echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC"]'); ?>
      <div class="adp-custom-banner">
        <div>
          <p class="adp-eyebrow">A tu medida</p>
          <h3>Personaliza tu collar</h3>
          <p>¿Quieres combinar piedras naturales y gemas o elegir un largo especial? Escríbenos por mensaje directo y lo vemos juntas.</p>
        </div>
        <a class="adp-btn-primary" href="https://www.instagram.com/almadepiedra.cl/" target="_blank" rel="noopener noreferrer">Personalizar por DM &rarr;</a>
      </div>
    </div>
  </section>

  <section class="adp-section" id="filosofia">
    <div class="adp-container">
      <div class="adp-split">
        <div class="adp-split-media">
          <img src="<?php echo esc_url($base_uploads . "alma-taller.jpg"); ?>" alt="Alma De Piedra — Joyas que habitan tu piel" loading="lazy" />
        </div>
        <div class="adp-split-body">
          <p class="adp-eyebrow"><span class="adp-eyebrow-line"></span> Nuestra Esencia</p>
          <h2>Joyas seleccionadas con sentido para conectar contigo</h2>
          <p>En Alma De Piedra entendemos la joyería como una prolongación de tu propia energía. Seleccionamos en Chile cada pieza buscando equilibrio entre metales enchapados en oro 18k o plata 925 y la autenticidad de las piedras naturales y gemas.</p>
          <p>Creemos en elegir con intención: joyas atemporales, cómodas y luminosas que habitan tu piel y te acompañan en cada momento del día.</p>
          <div class="adp-stats">
            <div class="adp-stat">
              <strong>100%</strong>
              <span>Piedras Naturales &amp; Gemas</span>
            </div>
            <div class="adp-stat">
              <strong>Chile</strong>
              <span>Selección con Sentido</span>
            </div>
          </div>
          <a class="adp-btn-primary" href="<?php echo esc_url(home_url("/nosotros/")); ?>">Conoce Nuestra Historia &rarr;</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
