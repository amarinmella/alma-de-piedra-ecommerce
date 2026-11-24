<?php
if (!defined("ABSPATH")) { exit; }

add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style("adp-google-fonts", "https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap", array(), null);
    wp_enqueue_style("kadence-alma-de-piedra-style", get_stylesheet_uri(), array("kadence-global"), "1.0.11");
}, 25);

/**
 * Registrar campo RUT en WooCommerce Checkout Block (Chile).
 */
add_action("woocommerce_init", function () {
    if (function_exists("woocommerce_register_additional_checkout_field")) {
        woocommerce_register_additional_checkout_field(array(
            "id"       => "adp/rut",
            "label"    => "RUT (para boleta y despacho)",
            "location" => "contact",
            "required" => true,
            "attributes" => array(
                "autocomplete" => "off",
                "placeholder"  => "12.345.678-9",
            ),
        ));
    }
});

/**
 * Adaptar etiqueta de Ciudad a Comuna en Chile.
 */
add_filter("woocommerce_get_country_locale", function ($locale) {
    if (isset($locale["CL"])) {
        $locale["CL"]["city"]["label"] = "Comuna";
        $locale["CL"]["city"]["placeholder"] = "Ej: Providencia, Viña del Mar";
    } else {
        $locale["CL"] = array(
            "city" => array(
                "label" => "Comuna",
            ),
        );
    }
    return $locale;
});

/**
 * Filtros rápidos por categoría en /coleccion/ y archivos de categoría.
 */
add_action("woocommerce_before_shop_loop", function () {
    if (!is_shop() && !is_product_category()) {
        return;
    }
    $shop_url = function_exists("wc_get_page_permalink") ? wc_get_page_permalink("shop") : home_url("/coleccion/");
    $cats = array(
        array("slug" => "", "label" => "Todas", "url" => $shop_url),
        array("slug" => "enchapado-en-oro", "label" => "Enchapado en oro", "url" => home_url("/product-category/enchapado-en-oro/")),
        array("slug" => "enchapado-en-plata", "label" => "Enchapado en plata", "url" => home_url("/product-category/enchapado-en-plata/")),
        array("slug" => "piedras-naturales", "label" => "Piedras naturales", "url" => home_url("/product-category/piedras-naturales/")),
        array("slug" => "chokers", "label" => "Chokers", "url" => home_url("/product-category/chokers/")),
        array("slug" => "otros", "label" => "Otros", "url" => home_url("/product-category/otros/")),
    );
    $current_slug = is_product_category() ? get_queried_object()->slug : "";
    echo '<nav class="adp-cat-filters" aria-label="Filtrar por categoría">';
    foreach ($cats as $cat) {
        $active = ($cat["slug"] === $current_slug) ? " is-active" : "";
        echo '<a class="adp-cat-chip' . $active . '" href="' . esc_url($cat["url"]) . '">' . esc_html($cat["label"]) . '</a>';
    }
    echo '</nav>';
}, 15);

/**
 * Acordeón de cuidados, despacho y personalización en la ficha de producto.
 */
add_action("woocommerce_single_product_summary", function () {
    ?>
    <div class="adp-product-accordion">
      <details open>
        <summary>Materiales y Cuidados del Enchapado</summary>
        <div class="adp-acc-body">
          <p>Nuestras joyas están seleccionadas en Chile con acabados enchapados en oro 18k o enchapados en plata 925 junto a piedras naturales y gemas.</p>
          <ul>
            <li>Evita el contacto directo con perfumes, cremas, alcohol gel o agua (ducha, mar o piscina).</li>
            <li>Guárdala seca y por separado en su bolsita para conservar su brillo por más tiempo.</li>
          </ul>
        </div>
      </details>
      <details>
        <summary>Despacho y Empaque</summary>
        <div class="adp-acc-body">
          <p><strong>Despacho fijo $3.500 CLP</strong> en Santiago (RM), V y VI Región. Envíos a otras regiones de Chile vía <strong>Blue Express</strong> con seguimiento.</p>
          <p>Cada pedido llega en una bolsita con nuestro diseño, lista para guardar o regalar.</p>
        </div>
      </details>
      <details>
        <summary>¿Quieres personalizar tu collar?</summary>
        <div class="adp-acc-body">
          <p>Si buscas un largo especial o combinar piedras naturales y gemas, escríbenos por mensaje directo y lo vemos juntas.</p>
          <p><a class="adp-inline-link" href="https://www.instagram.com/almadepiedra.cl/" target="_blank" rel="noopener noreferrer">Escribir por DM a @almadepiedra.cl &rarr;</a></p>
        </div>
      </details>
    </div>
    <?php
}, 35);

/**
 * Shortcode de formulario de contacto limpio para /contacto/.
 */
add_shortcode("adp_contact_form", function () {
    $sent = false;
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["adp_contact_nonce"])) {
        if (!wp_verify_nonce($_POST["adp_contact_nonce"], "adp_contact_submit")) {
            $error = "No pudimos validar tu envío. Por favor, recarga la página e inténtalo de nuevo.";
        } else {
            $name    = sanitize_text_field($_POST["adp_name"] ?? "");
            $email   = sanitize_email($_POST["adp_email"] ?? "");
            $subject = sanitize_text_field($_POST["adp_subject"] ?? "Consulta desde la web");
            $message = sanitize_textarea_field($_POST["adp_message"] ?? "");

            if (empty($name) || !is_email($email) || empty($message)) {
                $error = "Por favor completa tu nombre, un correo válido y tu mensaje.";
            } else {
                $to = get_option("adp_contact_email", get_option("admin_email"));
                $body = "Nombre: {$name}\nCorreo: {$email}\nAsunto: {$subject}\n\nMensaje:\n{$message}";
                $headers = array("Reply-To: {$name} <{$email}>");
                if (wp_mail($to, "[Alma De Piedra] " . $subject, $body, $headers)) {
                    $sent = true;
                } else {
                    $error = "Hubo un problema al enviar el mensaje. También puedes escribirnos por Instagram @almadepiedra.cl.";
                }
            }
        }
    }

    ob_start();
    ?>
    <div class="adp-contact-grid">
      <div class="adp-contact-card">
        <h3>Escríbenos</h3>
        <p class="adp-contact-intro">¿Tienes dudas sobre alguna piedra natural, un pedido o quieres personalizar tu collar? Te respondemos a la brevedad.</p>
        <?php if ($sent) : ?>
          <div class="adp-alert-success">¡Gracias por tu mensaje! Lo recibimos correctamente y te responderemos pronto.</div>
        <?php else : ?>
          <?php if ($error) : ?>
            <div class="adp-alert-error"><?php echo esc_html($error); ?></div>
          <?php endif; ?>
          <form method="post" class="adp-contact-form">
            <?php wp_nonce_field("adp_contact_submit", "adp_contact_nonce"); ?>
            <p>
              <label for="adp_name">Nombre *</label>
              <input id="adp_name" name="adp_name" type="text" required placeholder="Tu nombre" />
            </p>
            <p>
              <label for="adp_email">Correo electrónico *</label>
              <input id="adp_email" name="adp_email" type="email" required placeholder="tu@correo.cl" />
            </p>
            <p>
              <label for="adp_subject">Asunto</label>
              <input id="adp_subject" name="adp_subject" type="text" placeholder="Consulta sobre joya, pedido o personalización" />
            </p>
            <p>
              <label for="adp_message">Mensaje *</label>
              <textarea id="adp_message" name="adp_message" rows="5" required placeholder="Cuéntanos en qué te podemos ayudar..."></textarea>
            </p>
            <button type="submit" class="adp-btn-primary">Enviar mensaje &rarr;</button>
          </form>
        <?php endif; ?>
      </div>
      <div class="adp-contact-info">
        <h3>Canales directos</h3>
        <p><strong>Instagram DM:</strong> <a class="adp-inline-link" href="https://www.instagram.com/almadepiedra.cl/" target="_blank" rel="noopener noreferrer">@almadepiedra.cl</a></p>
        <p><strong>Despachos:</strong> Santiago (RM), V y VI Región ($3.500 CLP) y todo Chile vía Blue Express.</p>
        <p><strong>Preguntas frecuentes:</strong> Revisa nuestra guía rápida de materiales, cuidados y envíos en <a class="adp-inline-link" href="<?php echo esc_url(home_url("/preguntas-frecuentes/")); ?>">Preguntas Frecuentes</a>.</p>
      </div>
    </div>
    <?php
    return ob_get_clean();
});

/**
 * Barra legal y enlaces útiles en el footer.
 */
add_action("kadence_after_footer", function () {
    echo '<div class="adp-legal-bar"><div class="adp-container adp-legal-inner">';
    echo '<a href="' . esc_url(home_url("/preguntas-frecuentes/")) . '">Preguntas Frecuentes</a>';
    echo '<span aria-hidden="true">&middot;</span>';
    echo '<a href="' . esc_url(home_url("/contacto/")) . '">Contacto</a>';
    echo '<span aria-hidden="true">&middot;</span>';
    echo '<a href="' . esc_url(home_url("/terminos-y-condiciones/")) . '">Términos y Condiciones</a>';
    echo '<span aria-hidden="true">&middot;</span>';
    echo '<a href="' . esc_url(home_url("/cambios-y-devoluciones/")) . '">Cambios, Devoluciones y Garantía</a>';
    echo '<span aria-hidden="true">&middot;</span>';
    echo '<a href="' . esc_url(home_url("/politica-de-privacidad/")) . '">Política de Privacidad</a>';
    echo '</div></div>';
});

/**
 * Botón flotante de WhatsApp (se muestra automáticamente al configurar 'adp_whatsapp_number').
 */
add_action("wp_footer", function () {
    $phone = preg_replace("/[^0-9]/", "", (string) get_option("adp_whatsapp_number", ""));
    if (empty($phone)) {
        return;
    }
    $text = rawurlencode("Hola Alma De Piedra, tengo una consulta sobre sus joyas.");
    $url  = "https://wa.me/{$phone}?text={$text}";
    echo '<a class="adp-wsp-float" href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" aria-label="Escribir por WhatsApp a Alma De Piedra">WhatsApp</a>';
});
