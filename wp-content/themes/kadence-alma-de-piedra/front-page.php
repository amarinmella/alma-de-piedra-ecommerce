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
        <p class="adp-eyebrow"><span class="adp-eyebrow-line"></span> Colección Atemporal • Hecho en Chile</p>
        <h1>La elegancia serena de la piedra y el metal.</h1>
        <p class="adp-lead">Joyas artesanales concebidas como amuletos cotidianos. Metales enchapados nobles y piedras minerales seleccionadas a mano en Santiago de Chile.</p>
        <div class="adp-hero-actions">
          <a class="adp-btn-primary" href="<?php echo esc_url($shop_url); ?>">Explorar Colección &rarr;</a>
          <a class="adp-btn-secondary" href="#filosofia">Nuestra Esencia</a>
        </div>
        <div class="adp-hero-badges">
          <div class="adp-hero-badge">
            <strong>Oro 18k &amp; Plata 925</strong>
            <span>Enchapados de alta durabilidad</span>
          </div>
          <div class="adp-hero-badge">
            <strong>Piedras Genuinas</strong>
            <span>Cuarzo, Turmalina &amp; Lapislázuli</span>
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
          <h4>Pago Directo &amp; Asistido</h4>
          <p>Transferencia bancaria con validación y confirmación rápida.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="adp-section">
    <div class="adp-container">
      <div class="adp-section-head">
        <div>
          <p class="adp-eyebrow">Categorías de Autor</p>
          <h2>Joyas concebidas para el tacto</h2>
        </div>
        <p class="adp-sub">Diseños sutiles creados en pequeños lotes, respetando la morfología única de cada mineral y la pureza geométrica del engarce.</p>
      </div>
      <div class="adp-bento">
        <a class="adp-bento-card adp-bento-card--wide" href="<?php echo esc_url(home_url("/product-category/collares-enchapados/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-collares-oro.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Cálido &amp; Luminoso</span>
            <h3>Collares enchapados en oro</h3>
            <p>Capas generosas de oro de 18 quilates sobre bases resistentes al pH diario.</p>
            <span class="adp-bento-link">Explorar collares de oro &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--narrow" href="<?php echo esc_url(home_url("/product-category/collares-en-plata/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-collares-plata.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Brillo Lunar</span>
            <h3>Collares en plata</h3>
            <p>La sutileza de la plata en líneas etéreas y colgantes de pulido espejo.</p>
            <span class="adp-bento-link">Ver piezas en plata &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--narrow" href="<?php echo esc_url(home_url("/product-category/chokers/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-chokers.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Geometría Orgánica</span>
            <h3>Chokers</h3>
            <p>Ajuste ceñido y armónico creado con perlas irregulares de río y cuentas facetadas.</p>
            <span class="adp-bento-link">Descubrir chokers &nearr;</span>
          </div>
        </a>
        <a class="adp-bento-card adp-bento-card--wide" href="<?php echo esc_url(home_url("/product-category/piedras-naturales/")); ?>">
          <div class="adp-bento-bg" style="background-image: url('<?php echo esc_url($base_uploads . "cat-piedras-naturales.jpg"); ?>');"></div>
          <div class="adp-bento-content">
            <span class="adp-bento-tag">Fuerza Mineral</span>
            <h3>Piedras naturales</h3>
            <p>Cada gema es irrepetible. Cuarzos, amatistas y lapislázuli de la cordillera chilena.</p>
            <span class="adp-bento-link">Ver gemas seleccionadas &nearr;</span>
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
    </div>
  </section>

  <section class="adp-section" id="filosofia">
    <div class="adp-container">
      <div class="adp-split">
        <div class="adp-split-media">
          <img src="<?php echo esc_url($base_uploads . "alma-taller.jpg"); ?>" alt="Taller Alma De Piedra en Santiago de Chile" loading="lazy" />
        </div>
        <div class="adp-split-body">
          <p class="adp-eyebrow"><span class="adp-eyebrow-line"></span> Nuestra Filosofía</p>
          <h2>El alma en cada pieza: artesanía meditativa y nobleza mineral</h2>
          <p>En Alma De Piedra entendemos la joyería como una prolongación de tu propia energía. Cada pieza se moldea pacientemente en nuestro taller de Santiago de Chile, combinando metales hipoalergénicos con minerales tallados por la naturaleza.</p>
          <p>Rechazamos la producción en masa. Preferimos ensamblar en series pequeñas donde cada engarce recibe la atención precisa, asegurando que tus collares y chokers conserven su luz durante años.</p>
          <div class="adp-stats">
            <div class="adp-stat">
              <strong>100%</strong>
              <span>Piedras Auténticas</span>
            </div>
            <div class="adp-stat">
              <strong>Chile</strong>
              <span>Confección Local</span>
            </div>
          </div>
          <a class="adp-btn-primary" href="<?php echo esc_url(home_url("/nosotros/")); ?>">Conoce Nuestra Historia &rarr;</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
