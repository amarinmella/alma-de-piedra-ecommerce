<?php
if (!defined("ABSPATH")) { exit; }
add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style("adp-google-fonts", "https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap", array(), null);
    wp_enqueue_style("kadence-alma-de-piedra-style", get_stylesheet_uri(), array("kadence-global"), "1.0.3");
}, 25);
