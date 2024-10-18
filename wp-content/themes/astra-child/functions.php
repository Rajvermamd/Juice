<?php
// Enqueue styles from the parent theme and child theme
function astra_child_enqueue_styles() {
    // Enqueue parent theme style
    wp_enqueue_style('astra-parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue child theme styles
    wp_enqueue_style('astra-child-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array('astra-parent-style'));

    // Enqueue additional CSS files
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array('astra-child-style'));
    wp_enqueue_style('bootstrap-icons', get_stylesheet_directory_uri() . '/assets/css/vender/bootstrap.min.css', array('astra-child-style'));
    // Uncomment to use external CDN styles
    // wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');
    wp_enqueue_style('fontawesome-icons', get_stylesheet_directory_uri() . '/assets/css/vender/fontawesome-icons.css', array('astra-child-style'));
    wp_enqueue_style('owl-carousel-css', get_stylesheet_directory_uri() . '/assets/css/vender/owl.carousel.min.css', array('astra-child-style'));
    wp_enqueue_style('owl-theme-css', get_stylesheet_directory_uri() . '/assets/css/vender/owl.theme.default.min.css', array('astra-child-style'));
}

// Enqueue JavaScript files in the footer
function astra_child_enqueue_scripts() {
    // jQuery is included with WordPress, so we enqueue it
    wp_enqueue_script('jquery');

    // Enqueue JavaScript files
    wp_enqueue_script('jquery-3.7.0.min', get_stylesheet_directory_uri() . '/assets/js/vender/jquery-3.7.0.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-ui', get_stylesheet_directory_uri() . '/assets/js/vender/jquery-ui.min.js', array('jquery'), null, true);
    wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/assets/js/vender/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-bundle', get_stylesheet_directory_uri() . '/assets/js/vender/bootstrap.bundle.min.js', array('jquery', 'popper'), null, true);
    wp_enqueue_script('moment', get_stylesheet_directory_uri() . '/assets/js/vender/moment.js', array('jquery'), null, true);
    wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/assets/js/vender/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('main-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

// Hook to load styles and scripts
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');
add_action('wp_enqueue_scripts', 'astra_child_enqueue_scripts');




// ============ AJAX PRODUCT FILTER =============
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');

function filter_products() {
    // Ensure the page number is set correctly
    $paged = isset($_POST['page']) ? $_POST['page'] : 1; 
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 2,
        'paged' => $paged,
    );

    // Search filter
    if (!empty($_POST['search'])) {
        $args['s'] = sanitize_text_field($_POST['search']);
    }

    // Category filter
    if (!empty($_POST['category'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'id',
            'terms'    => $_POST['category'],
        );
    }

    // Price filter
    if (!empty($_POST['price'])) {
        $args['meta_query'][] = array(
            'key'     => '_price',
            'value'   => $_POST['price'],
            'compare' => '<=',
            'type'    => 'NUMERIC',
        );
    }

    // Sorting filter
    if (!empty($_POST['sort'])) {
        switch ($_POST['sort']) {
            case 'price_asc':
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_price';
                $args['order'] = 'ASC';
                break;
            case 'price_desc':
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_price';
                $args['order'] = 'DESC';
                break;
            case 'date':
            default:
                $args['orderby'] = 'date';
                $args['order'] = 'DESC';
                break;
        }
    }

    // Output buffering to capture the HTML for both products and pagination
    ob_start();

    // WP Query for products
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post(); 
            global $product;
            $product_id = $product->get_id();

            $in_cart = false;
            foreach (WC()->cart->get_cart() as $cart_item) {
                if ($cart_item['product_id'] == $product_id) {
                    $in_cart = true;
                    break;
                }
            }
            ?>
            <div class="col-12 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="img-box">
                        <?= woocommerce_get_product_thumbnail(); ?>
                    </div>
                    <div class="heading p-3" style="min-height:100px;">
                        <a href="<?= get_permalink(); ?>"><h3 class="lf-700 f-6 mb-0 t-primary"><?= get_the_title(); ?></h3></a>
                        <div class="mt-1 d-flex justify-content-start">
                            <?php 
                            if ( function_exists( 'woocommerce_template_loop_rating' ) ) {
                                woocommerce_template_loop_rating();
                            }
                            ?>
                        </div>
                    </div>
                    <div class="content p-4 d-flex justify-content-between align-items-center">
                        <h4 class="lf-700 t-secondary f-6"><?= $product->get_price_html(); ?></h4>
                        <?php
                            // Check if the product is in stock
                            $in_stock = $product->is_in_stock(); // Check stock status
                            $button_class = 'btn bg-primary-1 text-light f-6';
                            $button_text = ($in_cart ? '<i class="bi bi-cart-fill"></i>' : ' <i class="bi bi-cart"></i>');
                            $disabled_attr = '';

                            // If the product is out of stock, modify button properties
                            if (!$in_stock) {
                                $button_class .= ' disabled'; // Add disabled class for styling
                                $button_text = '<i class="bi bi-cart-fill"></i> Out of Stock'; // Change button text
                                $disabled_attr = 'disabled'; // Disable the button
                            } elseif ($in_cart) {
                                $button_class .= ' disabled'; // If it's already in the cart, disable the button
                                $button_text = '<i class="bi bi-cart-fill"></i>'; // Change button text
                                $disabled_attr = 'disabled'; // Disable the button
                            }

                            echo '<a href="' . esc_url($product->add_to_cart_url()) . '" 
                            class="' . esc_attr($button_class) . '" 
                            data-product_id="' . esc_attr($product_id) . '"
                            ' . $disabled_attr . '>';
                            echo $button_text;
                            echo '</a>';
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<div class="col-12"><div class="p-3 w-100" style="background: #ff00001a;color: #f00;border-radius: 10px;">Product not found.</div></div>';
    }

    $product_html = ob_get_clean();
    
    // Pagination logic with custom data attributes
    ob_start();
    $total_pages = $loop->max_num_pages;
    if ($total_pages > 1) {
        echo '<div id="custom-pagination" class="pagination-wrapper mt-5">';

        $pagination_links = paginate_links(array(
            'base'         => '%_%',
            'format'       => '?paged=%#%',
            'current'      => max(1, $paged),
            'total'        => $total_pages,
            'prev_text'    => '<span class="custom-prev-btn">« Prev</span>',
            'next_text'    => '<span class="custom-next-btn">Next »</span>',
            'type'         => 'plain', // Output plain text pagination links
            'end_size'     => 2,
            'mid_size'     => 2,
        ));

        // Add data-page attributes to pagination links
        $pagination_links = preg_replace_callback('/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/', function ($matches) {
            preg_match('/[?&]paged=([0-9]+)/', $matches[2], $page_number);
            $page = isset($page_number[1]) ? $page_number[1] : 1;
            return '<a' . $matches[1] . 'href="' . $matches[2] . '" data-page="' . $page . '"' . $matches[3] . '>' . $matches[4] . '</a>';
        }, $pagination_links);

        echo $pagination_links;
        echo '</div>';
    }

    $pagination_html = ob_get_clean();

    echo json_encode(array(
        'products' => $product_html,
        'pagination' => $pagination_html,
    ));

    wp_reset_postdata();
    die();
}




?>


