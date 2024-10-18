<?php
/*
Template Name: Home Page
*/

get_header(); 

if ( is_user_logged_in() ) { ?>
    
<style>
    .fixed-header #ast-desktop-header{
        top:32px !important;
    }
    .home-banner-part {
        position: relative;
        width: 100%;
        height: 100vh;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        animation: changeImage 30s infinite ease-in-out, scaleBackground 10s infinite ease-in-out;
    }

    .home-banner-part::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6); /* Black overlay with 60% transparency */
        z-index: 1; /* Ensures the overlay is above the background */
    }

    /* Dynamic background images from PHP */
    @keyframes changeImage {
        0% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_01.jpg'); }
        16.66% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_02.jpg'); }
        33.33% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_03.jpg'); }
        50% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_04.jpg'); }
        66.66% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_05.jpg'); }
        83.33% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_06.jpg'); }
        100% { background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_01.jpg'); }
    }

    /* Smooth scaling of the background */
    @keyframes scaleBackground {
        0%, 100% {
            background-size: 110%; /* Normal size at the start and end */
        }
        50% {
            background-size: 120%; /* Slightly scaled up in the middle */
        }
    }
</style>
    
<?php  } ?>

<section class="home-banner-part py-5" style="background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_01.jpg');">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8 my-auto text-center content">
                    <h5 class="upper lf-800 t-primary-1 f-n">Our Products</h5>
                    <h1 class="f-2 lf-800 t-light">Restart your career  to be more <span class="lf-800 t-primary">Successful<span></h1>
                    <p class="lf-600 t-light f-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt.</p>

                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <a href="" class="btn get-started-btn-outline py-3 px-5 lf-700 f-6 me-3">Contact Me</a>
                        <a href="" class="btn get-started-btn py-3 px-5 lf-700 f-6">Order Now</a>
                    </div>
            </div>
            <div class="col-12 col-lg-2"></div>

           
        </div>
    </div>
</section>


<!-- About Us -->
<section class="about-us py-5 reveal">
    <div class="container py-5">
        <div class="row">

            <div class="col-12 col-lg-7 p-5">
                    <h5 class="upper lf-700 t-primary f-n">health-bottle</h5>
                    <h3 class="f-2 lf-800 t-secondary">Healthy and tasty foods with <br> <span class="f-1 lf-800 t-primary-1">natural ingredients</span></h3>
                    <p class="lf-600 t-secondary f-n">Quisque pretium dolor turpis, quis blandit turpis semper ut. Nam malesuada eros nec luctus laoreet. Fusce sodales consequat velit eget dictum. Integer ornare magna vitae ex eleifend congue. Morbi sit amet nisi iaculis, fringilla orci nec.</p>

                    <div class="d-flex align-items-center mt-5">
                        <a href="" class="btn get-started-btn py-3 px-5 lf-700 f-6  me-3">Read more</a>
                    </div>
            </div>

            <div class="col-12 col-lg-5 my-auto p-5">
                <div>
                    <img class="img-fluid rounded" src="<?=get_stylesheet_directory_uri() . '/assets/images/health-bottle-cut.jpg'?>" alt="health-bottle">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- home-helpful  -->
<section class="home-helpful py-5 reveal" style="background-color:#f9f9f9;">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8 text-center">
                <h5 class="upper lf-700 t-primary-1 f-n">Our benefits</h5>
                <h3 class="f-2 lf-800 t-secondary">Why customers choose us</h3>
                <p class="f-n lf-600 t-secondary">Quisque pretium dolor turpis, quis blandit turpis semper ut. Nam malesuada eros nec luctus laoreet. Fusce sodales consequat velit eget dictum. Integer ornare magna vitae ex eleifend congue. Morbi sit amet nisi iaculis, fringilla orci nec.</p>
            </div>
            <div class="col-12 col-lg-2"></div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-lg-3">
                <div class="card p-3 d-flex flex-column justify-content-center align-items-center h-100 text-center">
                    <div class="icon-box mb-4">
                        <img class="img-fluid rounded" src="<?=get_stylesheet_directory_uri() . '/assets/images/icons/icons8-vegan-food-50.png'?>" alt="health-bottle">
                    </div>
                    <h3 class="lf-700 f-6 t-primary">Only natural food</h3>
                    <p class="lf-600 f-n t-secondary">Nam malesuada eros nec luctus laoreet fusce sodales consequat</p>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card p-3 d-flex flex-column justify-content-center align-items-center h-100 text-center">
                    <div class="icon-box mb-4">
                        <img class="img-fluid rounded" src="<?=get_stylesheet_directory_uri() . '/assets/images/icons/icons8-wok-50.png'?>" alt="health-bottle">
                    </div>
                    <h3 class="lf-700 f-6 t-primary">Various dishes</h3>
                    <p class="lf-600 f-n t-secondary">Nullam faucibus a libero quis vestibulum proin vestibulum</p>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card p-3 d-flex flex-column justify-content-center align-items-center h-100 text-center">
                    <div class="icon-box mb-4">
                        <img class="img-fluid rounded" src="<?=get_stylesheet_directory_uri() . '/assets/images/icons/icons8-open-delivered-box-100.png'?>" alt="health-bottle">
                    </div>
                    <h3 class="lf-700 f-6 t-primary">Handy packaging</h3>
                    <p class="lf-600 f-n t-secondary">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card p-3 d-flex flex-column justify-content-center align-items-center h-100 text-center">
                    <div class="icon-box mb-4">
                        <img class="img-fluid rounded" src="<?=get_stylesheet_directory_uri() . '/assets/images/icons/icons8-frying-pan-100.png'?>" alt="health-bottle">
                    </div>
                    <h3 class="lf-700 f-6 t-primary">No frying</h3>
                    <p class="lf-600 f-n t-secondary">Donec vitae turpis orci. In dignissim risus sed iaculis laoreet</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                    <a href="" class="btn get-started-btn py-3 px-5 lf-700 f-6  me-3">Read more</a>
            </div>
        </div>
    </div>
</section>

<!-- Home Products -->
<section class="home-products py-5 reveal">

    <?php
        // Define the query arguments to fetch WooCommerce products
        $args = array(
        'post_type'      => 'product', // WooCommerce products post type
        'posts_per_page' => 9,        // Number of products to display
        'order'          => 'DESC',    // Order of products
        );

        // Create a new WP_Query instance
        $loop = new WP_Query($args);

        // echo"<pre>";
        // print_r($loop->posts);
        // echo"</pre>";
    ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8 text-center">
                <h5 class="upper lf-700 t-primary-1 f-n">Nutrition plans</h5>
                <h3 class="f-2 lf-800 t-secondary">Choose Your Nutrition</h3>
                <p class="lf-600 t-secondary f-n">Explore a world of quality and innovation with our diverse range of products, each carefully selected to enhance your lifestyle.</p>
            </div>
            <div class="col-12 col-lg-2"></div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-lg-1"></div>
            <div class="col-12 col-lg-10">
                <div class="row">
                    <?php 
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
                    <?php } }else{ ?>
                            <div class="col-12">
                                <div class="p-3 w-100 " style="background: #ff00001a;color: #f00;border-radius: 10px;">Product not found.</div>
                            </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-lg-1"></div>
        </div>
       
    </div>
</section>


<!-- benefits -->
<section class="home-benefits py-5 reveal" style="background-color:#f9f9f9;">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-5 my-auto">
                <h3 class="f-2 lf-800 t-primary upper">Product Benefits</h3>
                <p class="lf-600 f-n t-secondary mt-5">Discover how our products can enhance your life, bringing quality, innovation, and convenience to your everyday experiences.</p>
                <a href="" class="btn get-started-btn py-3 px-5 lf-700 f-6 mt-2">Explore More</a>
            </div>

            <div class="col-12 col-lg-7">
                <div class="row px-5">
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card p-3 h-100">
                            <div class="icon-text d-flex align-items-center">
                                <span class="icon f-5 t-primary me-2"><i class="bi bi-star-fill"></i></span>
                                <h3 class="lf-700 f-6 upper t-secondary mb-0">Superior Quality</h3>
                            </div>
                            <div class="content mt-3">
                                <p class="lf-600 f-n t-secondary">Our products are crafted with the finest materials and undergo rigorous quality checks to ensure long-lasting performance and satisfaction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card p-3 h-100">
                            <div class="icon-text d-flex align-items-center">
                                <span class="icon f-5 t-primary me-2"><i class="bi bi-lightning-fill"></i></span>
                                <h3 class="lf-700 f-6 upper t-secondary mb-0">Innovative Design</h3>
                            </div>
                            <div class="content mt-2">
                                <p class="lf-600 f-n t-secondary">Experience cutting-edge technology and sleek designs that not only look great but also enhance functionality and user experience.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card p-3 h-100">
                            <div class="icon-text d-flex align-items-center">
                                <span class="icon f-5 t-primary me-2"><i class="bi bi-heart-fill"></i></span>
                                <h3 class="lf-700 f-6 upper t-secondary mb-0">Customer Satisfaction</h3>
                            </div>
                            <div class="content mt-2">
                                <p class="lf-600 f-n t-secondary">Our products are designed with you in mind, aiming to exceed your expectations and provide a delightful user experience every time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card p-3 h-100">
                            <div class="icon-text d-flex align-items-center">
                                <span class="icon f-5 t-primary me-2"><i class="bi bi-gear-fill"></i></span>
                                <h3 class="lf-700 f-6 upper t-secondary mb-0">Versatility</h3>
                            </div>
                            <div class="content mt-2">
                                <p class="lf-600 f-n t-secondary">From everyday use to special occasions, our products are versatile enough to meet a wide range of needs and preferences.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Testimonials -->
<section class="home-testimonial py-5 reveal">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8 text-center">
                <h5 class="upper lf-700 t-primary-1 f-n">our Awesome clients</h5>
                <h3 class="f-2 lf-800 t-secondary">Testimonials</h3>
            </div>
            <div class="col-12 col-lg-2"></div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8">
                <div class="owl-carousel owl-theme">
                    <div class="item py-4 px-3">
                        <div class="card p-4 text-center">
                            <div class="content">
                                <p class="t-secondary lf-600 f-6">Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt, pharetra eros nec, posuere odio. Nullam eget bibendum sem, venenatis lacinia justo.</p>
                            </div>
                            <div class="author d-flex flex-column justify-content-center align-items-center mt-4">
                                <div class="img-box">
                                    <img class="img-fluid me-3" src="<?=get_stylesheet_directory_uri() . '/assets/images/cl-01.jpg'?>" alt="John Doe">
                                </div>
                                <div class="name ">
                                    <h3 class="lf-700 f-6 upper t-primary mb-0">John Doe</h3>
                                    <p class="t-secondary lf-600 f-n mb-0">Ceo & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item py-4 px-3">
                        <div class="card p-4 text-center">
                            <div class="content">
                                <p class="t-secondary lf-600 f-6">Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt, pharetra eros nec, posuere odio. Nullam eget bibendum sem, venenatis lacinia justo.</p>
                            </div>
                            <div class="author d-flex  flex-column justify-content-center align-items-center mt-4">
                                <div class="img-box mb-3">
                                    <img class="img-fluid me-3" src="<?=get_stylesheet_directory_uri() . '/assets/images/cl-02.jpg'?>" alt="John Doe">
                                </div>
                                <div class="name">
                                    <h3 class="lf-700 f-6 upper t-primary mb-0">John Doe</h3>
                                    <p class="t-secondary lf-600 f-n mb-0">Ceo & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item py-4 px-3 text-center">
                        <div class="card p-4">
                            <div class="content">
                                <p class="t-secondary lf-600 f-6">Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt, pharetra eros nec, posuere odio. Nullam eget bibendum sem, venenatis lacinia justo.</p>
                            </div>
                            <div class="author d-flex flex-column justify-content-center align-items-center mt-4">
                                <div class="img-box mb-3">
                                    <img class="img-fluid me-3" src="<?=get_stylesheet_directory_uri() . '/assets/images/cl-04.jpg'?>" alt="John Doe">
                                </div>
                                <div class="name">
                                    <h3 class="lf-700 f-6 upper t-primary mb-0">John Doe</h3>
                                    <p class="t-secondary lf-600 f-n mb-0">Ceo & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item py-4 px-3 text-center">
                        <div class="card p-4">
                            <div class="content">
                                <p class="t-secondary lf-600 f-6">Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt, pharetra eros nec, posuere odio. Nullam eget bibendum sem, venenatis lacinia justo.</p>
                            </div>
                            <div class="author d-flex flex-column justify-content-center align-items-center mt-4">
                                <div class="img-box mb-3">
                                    <img class="img-fluid" src="<?=get_stylesheet_directory_uri() . '/assets/images/cl-05.jpg'?>" alt="John Doe">
                                </div>
                                <div class="name ">
                                    <h3 class="lf-700 f-6 upper t-primary mb-0">John Doe</h3>
                                    <p class="t-secondary lf-600 f-n mb-0">Ceo & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-2"></div>
        </div>
    </div>
</section>

<!-- Discover -->
<section class="home-discover py-5 " style="background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/images/SLIDE_02.jpg');">
    <div class="container py-5 ">
        <div class="row py-5">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8 text-center content">
                <h3 class="upper lf-700 t-primary f-n">Product Benefits</h3>
                <h3 class="f-2 lf-800 t-light">Discover Products That Enhance Your Lifestyle</h3>
                <p class="lf-600 f-n t-light">Explore our curated collection of high-quality products designed to bring convenience, style, and innovation to your everyday life. From essential items to unique finds, we have something for everyone.</p>

                <a href="" class="btn get-started-btn py-3 px-5 mt-5 lf-700 f-6">Shop Now</a>
            </div>
            <div class="col-12 col-lg-2"></div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="about-us py-5 reveal">
    <div class="container py-5">
        <div class="row">

            <div class="col-12 col-lg-6 p-5">
                    <h5 class="upper lf-700 t-primary-1 f-n">health-bottle</h5>
                    <h3 class="f-2 lf-800 t-secondary"><span class="f-2 lf-800 t-primary-1">Free </span> food delivery every day at your convenience</h3>
                    <p class="lf-600 t-secondary f-n">Quisque pretium dolor turpis, quis blandit turpis semper ut. Nam malesuada eros nec luctus laoreet. Fusce sodales consequat velit eget dictum. Integer ornare magna.</p>
                    
                    <div class="icon-text d-flex align-items-center mt-5">
                        <span class="icon f-5 lf-800 me-2 t-primary-1"><i class="bi bi-clock"></i></span>
                        <span class="lf-700 f-6 t-secondary"> Every day from 8:00 to 12:00</span>
                    </div>

                    <div class="icon-text d-flex align-items-center mt-3">
                        <span class="icon f-5 lf-800 me-2 t-primary-1"><i class="bi bi-whatsapp"></i></span>
                        <span class="lf-700 f-6 t-secondary"> 1 (800) 233-2742</span>
                    </div>

                    <div class="d-flex align-items-center mt-5">
                        <a href="" class="btn get-started-btn py-3 px-5 lf-700 f-6  me-3">Read more</a>
                    </div>
            </div>

            <div class="col-12 col-lg-6 my-auto ">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid rounded" src="<?=get_stylesheet_directory_uri() . '/assets/images/front-view-young-female-courier.jpg'?>" alt="health-bottle">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Blogs -->
<section class="home-blog py-5 reveal">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-8 text-center">
                <h5 class="upper lf-700 t-primary-1 f-n">Latest news</h5>
                <h3 class="f-2 lf-800 t-secondary">From Our Blog</h3>
               
            </div>
            <div class="col-12 col-lg-2"></div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-lg-4 mb-4 p-4">
                <div class="card h-100">
                    <div class="img-box">
                        <img class="img-fluid" src="<?=get_stylesheet_directory_uri() . '/assets/images/SLIDE_01.jpg'?>" alt="">
                     </div>
                    <div class="heading  p-3 " style="min-height:100px;">
                        <div class="mt-1 d-flex justify-content-start">
                            <div >
                                <div class="category d-flex justify-content-start align-items-center">
                                    <span class="lf-600 f-7 t-secondary me-3"><i class="bi bi-clock"></i>&nbsp; 21 Jan, 2018</span>
                                    <span class="lf-600 f-7 t-secondary me-3"><i class="bi bi-chat"></i>&nbsp; 23 Comments</span>
                                </div>
                                <a href="#"><h3 class="mt-1 lf-700 f-5  mb-0 t-primary">How many calories an adult needs per day</h3></a>
                                <p class="lf-600 mt-1 f-6-5 t-secondary">Morbi volutpat nisi a ligula vestibulum placerat. Suspendisse venenatis pulvinar nibh sed convallis. Cras elementum nunc a purus s</p>
                            </div>  
                                                        
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4 p-4">
                <div class="card h-100">
                    <div class="img-box">
                        <img class="img-fluid" src="<?=get_stylesheet_directory_uri() . '/assets/images/SLIDE_02.jpg'?>" alt="">
                     </div>
                    <div class="heading  p-3 " style="min-height:100px;">
                        <div class="mt-1 d-flex justify-content-start">
                            <div >
                                <div class="category d-flex justify-content-start align-items-center">
                                    <span class="lf-600 f-7 t-secondary me-3"><i class="bi bi-clock"></i>&nbsp; 21 Jan, 2018</span>
                                    <span class="lf-600 f-7 t-secondary me-3"><i class="bi bi-chat"></i>&nbsp; 23 Comments</span>
                                </div>
                                <a href="#"><h3 class="mt-1 lf-700 f-5  mb-0 t-primary">Best products for fitness nutrition and muscles</h3></a>
                                <p class="lf-600 mt-1 f-6-5 t-secondary">Morbi volutpat nisi a ligula vestibulum placerat. Suspendisse venenatis pulvinar nibh sed convallis. Cras elementum nunc a purus s …</p>
                            </div>  
                                                        
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4 p-4">
                <div class="card h-100">
                    <div class="img-box">
                        <img class="img-fluid" src="<?=get_stylesheet_directory_uri() . '/assets/images/SLIDE_03.jpg'?>" alt="">
                     </div>
                    <div class="heading  p-3 " style="min-height:100px;">
                        <div class="mt-1 d-flex justify-content-start">
                            <div >
                                <div class="category d-flex justify-content-start align-items-center">
                                    <span class="lf-600 f-7 t-secondary me-3"><i class="bi bi-clock"></i>&nbsp; 21 Jan, 2018</span>
                                    <span class="lf-600 f-7 t-secondary me-3"><i class="bi bi-chat"></i>&nbsp; 23 Comments</span>
                                </div>
                                <a href="#"><h3 class="mt-1 lf-700 f-5  mb-0 t-primary">Best products for fitness nutrition and muscles</h3></a>
                                <p class="lf-600 mt-1 f-6-5 t-secondary">Morbi volutpat nisi a ligula vestibulum placerat. Suspendisse venenatis pulvinar nibh sed convallis. Cras elementum nunc a purus s</p>
                            </div>  
                                                        
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row  mt-5">
            <div class="col-12 text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="" class="btn get-started-btn py-3 px-5 lf-700 f-6  me-3">Read more</a>
                    </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
