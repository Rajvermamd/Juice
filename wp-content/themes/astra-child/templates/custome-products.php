<?php
/*
Template Name: Custom Product Page with Sidebar
*/
get_header();

?>

<meta name="admin-url" id="admin-url" data-url='<?php echo admin_url('admin-ajax.php'); ?>'>

<section class="home-products product-list py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar for Search and Filters -->
            <div class="col-12 col-lg-3">
                <aside class="widget-area">
                    <!-- Search -->
                    <div class="widget widget_search">
                        <input type="text" class="form-control lf-600 f-n t-secondary" style="border-radius: 5px;"  id="filter-search" placeholder="Search products...">
                    </div>

                    <!-- Sorting Filter -->
                    <div class="widget widget_sorting">
                        <h4 class="lf-700 f-6 t-secondary">Sort By</h4>
                        <select id="filter-sort" class="form-control py-1 lf-600 f-n t-secondary">
                            <option value="date">Newest</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>

                    <!-- Categories Filter -->
                    <div class="widget widget_categories">
                        <h4 class="lf-700 f-6 t-secondary">Filter by Category</h4>
                        <ul class="p-0 lf-600 f-n t-secondary ps-2">
                            <?php
                            $categories = get_terms('product_cat');
                            foreach ($categories as $category) {
                                echo '<li class="lf-600 t-secondary f-n d-flex align-items-center"><input style="width:15px;height:15px;" type="checkbox" class="filter-category me-1" value="' . $category->term_id . '">' . $category->name . '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Price Filter -->
                    <div class="widget widget_price_filter">
                        <h4 class="lf-700 f-6 t-secondary">Filter by Price</h4>
                        <input type="range" class="form-control-range" id="filter-price" min="0" max="1000" step="5" value="0">
                        <span class="lf-600 f-n t-secondary mt-3" id="price-range">Up to $1000</span>
                    </div>
                </aside>
            </div>

            <!-- Main Product List -->
            <div class="col-12 col-lg-9">
                <div class="row" id="product-list">
                    <?php
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 2,
                        'order'          => 'DESC',
                    );
                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) {
                        while ($loop->have_posts()) {
                            $loop->the_post(); 
                            global $product; // Get the product object
                            $product_id = $product->get_id();

                            // Check if the product is already in the cart
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
                                     <?= woocommerce_get_product_thumbnail() ?>
                                </div>
                                <div class="heading  p-3 " style="min-height:100px;">
                                    <a href="<?= get_permalink() ?>"><h3 class="lf-700 f-6  mb-0 t-primary"><?= get_the_title() ?></h3></a>
                                    <div class="mt-1 d-flex justify-content-start">
                                        <?php 
                                            // Display product rating
                                            if ( function_exists( 'woocommerce_template_loop_rating' ) ) {
                                            woocommerce_template_loop_rating();  // Display the product rating
                                            }
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="content p-4 d-flex justify-content-between align-items-center">
                                    <h4 class="lf-700 t-secondary f-6"><?= $product->get_price_html() ?></h4>
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
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                
                <?php 
                   // Pagination
                    $total_pages = $loop->max_num_pages;
                    if ($total_pages > 1) {
                        echo '<div id="custom-pagination" class="pagination-wrapper mt-5">';

                        // Generate the pagination links
                        $pagination_links = paginate_links(array(
                            'base'         => '%_%',
                            'format'       => '?paged=%#%',
                            'current'      => max(1, get_query_var('paged')),
                            'total'        => $total_pages,
                            'prev_text'    => '<span class="custom-prev-btn">« Prev</span>',
                            'next_text'    => '<span class="custom-next-btn">Next »</span>',
                            'type'         => 'plain', // Output pagination links as plain text to modify them later
                            'end_size'     => 2,
                            'mid_size'     => 2,
                        ));

                        // Use preg_replace_callback to add custom data attributes to pagination links
                        $pagination_links = preg_replace_callback('/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/', function ($matches) {
                            // Extract the page number from the URL
                            preg_match('/[?&]paged=([0-9]+)/', $matches[2], $page_number);
                            $page = isset($page_number[1]) ? $page_number[1] : 1;

                            // Add the data-page attribute to each link
                            return '<a' . $matches[1] . 'href="' . $matches[2] . '" data-page="' . $page . '"' . $matches[3] . '>' . $matches[4] . '</a>';
                        }, $pagination_links);

                        // Output the modified pagination links
                        echo $pagination_links;

                        echo '</div>';
                    }
                ?>

            </div>
        </div>
    </div>
</section>

<?php
get_footer();
