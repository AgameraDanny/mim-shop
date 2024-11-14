<!-- THEME File -->
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does happen. When this occurs the version of the template file will be bumped and the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */

echo '<span class="debug">Start Hook: woocommerce_before_single_product</span>';
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

    <!-- Before Product Summary: Title and Excerpt -->
    <div class="product-title-excerpt">
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        echo '<span class="debug">Start Hook: woocommerce_before_single_product_summary</span>';

        ?>
        <h1 class="product-title"><?php the_title(); ?></h1>
        <div class="product-excerpt">
            <?php
            // Display the product short description
            //echo apply_filters('woocommerce_short_description', $product->get_short_description());
            echo '<span>' . apply_filters('woocommerce_short_description', get_the_excerpt()) . '</span>';
            ?>

            <?php
            // Get the global product object
            global $product;
            // Display the average rating and number of reviews
            if ($product->get_average_rating() > 0) {
                // Get the average rating
                $average_rating = $product->get_average_rating();

                // Get the number of reviews
                $review_count = $product->get_review_count();

                // Display the rating and number of reviews
                echo '<div class="col-2">';

                echo '<div class="left">';
                echo apply_filters('woocommerce_template_single_rating', wc_get_rating_html($average_rating, $review_count));
                echo '</div>';

                // Optionally, add the number of reviews next to the rating
                echo '<div class="right"> (' . $review_count . ' ' . __('customer reviews', 'woocommerce') . ') </div>';
                echo '</div>';
            }
            ?>

        </div>
    </div>

    <div class="product-wrapper">
        <div class="product-left">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            echo '<span class="debug">Start Hook: woocommerce_before_single_product_summary 2</span>';
            do_action('woocommerce_before_single_product_summary');

            ?>
        </div>

        <div class="product-center">
            <?php
            /**
             * Hook: woocommerce_before_add_to_cart_form.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            echo '<span class="debug">Start Hook: woocommerce_before_add_to_cart_form</span>';

            // Display short description here before the Add to Cart form
            if (has_excerpt()) {
                echo '<div class="product-short-description">';
                echo '<h2>Description</h2>';
                //echo '<p>' . apply_filters('woocommerce_short_description', get_the_excerpt()) . '</p>';
                echo '<div>' . apply_filters('woocommerce_product_description', get_the_content()) . '</div>';
                echo '</div>';
            }
            //Add a custom field here
            
            do_action('woocommerce_before_add_to_cart_form');
            ?>
        </div>


        <div class="product-right">
            <div class="summary entry-summary">
                <?php
                // Unhook the title, ratings, and excerpts (short description) from the product summary
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); // Removes the product title
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10); // Removes the product rating
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20); // Removes the product excerpt (short description)
                
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked custom_price_vat_text - 15 (insert custom price text here)
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                echo '<span class="debug">Start Hook: woocommerce_single_product_summary</span>';

                // Output the price including VAT text between the price and the add-to-cart button
                add_action('woocommerce_single_product_summary', 'custom_price_vat_text', 15);

                // Trigger the WooCommerce hooks
                do_action('woocommerce_single_product_summary');
                ?>
            </div>
        </div>

        <?php
        // Define the custom action that outputs the VAT text
        function custom_price_vat_text()
        {
            // Ensure we are within a valid product context
            global $product;

            // Get the price and calculate the VAT
            $price = $product->get_price();
            $vat_value = $price * 0.16; // Assuming 16% VAT 
        
            // Output the custom text with price and VAT details
            echo '<p class="vat-text">Price incl. 16% VAT: ' . wc_price($vat_value) . '<br /> excl. delivery costs</p>';
        }
        ?>



    </div>

    <div>
        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * @hooked woocommerce_upsell_display - 5 (run before product data tabs)
         * @hooked woocommerce_output_product_data_tabs - 15 (run after upsells)
         * @hooked woocommerce_output_related_products - 20 (run last)
         */

        // Remove the default hooks
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

        // Re-hook with new priorities
        add_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 5); // Show upsell first
        add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 15); // Show product data tabs second
        add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 25); // Show related products last
        
        // Debug message for hook order
        echo '<span class="debug">Start Hook: woocommerce_after_single_product_summary</span>';

        // Trigger the hooks
        do_action('woocommerce_after_single_product_summary');
        ?>
    </div>


</div>

<?php do_action('woocommerce_after_single_product'); ?>