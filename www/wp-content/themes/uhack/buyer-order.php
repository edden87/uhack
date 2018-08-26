<?php
/*
 * Template Name: Buyer's Order
 */
get_header();
    $buyer = get_option('buyer_account');

    if($buyer)
    {
        $balance = ' Balance (P '  . number_format_i18n($buyer[0]->amount) . ')';
    }
    else {
        $balance = '<a href="https://api-uat.unionbankph.com/partners/sb/convergent/v1/oauth2/authorize?client_id=dd9586f0-0456-48a3-812c-47a6e9a1bd0f&response_type=code&scope=account_balances transfers&redirect_uri=http://edf93831.ngrok.io/authenticated/" class="btn btn-sm btn-primary waves-effect waves-light mb-4">
 Sync Account</a>';
    }
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Orders </h4>
                <p><?= $balance ?></p>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-sm-4">
            <a href="/buyers-order-add/" class="btn btn-sm btn-primary waves-effect waves-light mb-4">
                <i class="mdi mdi-plus-circle"></i> Add New
            </a>
        </div>
    </div>
<?php
    $args = ['post_type' => 'order', 'posts_per_page' => '-1', 'publish_type' => 'public'];
    $loop = new WP_Query($args);
?>
    <div class="row">
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="col-md-4">
                <div class="card-box">
                    <div class="text-center">
                        <h2>#<?php the_ID(); ?></h2>
                    </div>

                    <?php if ( !empty(get_the_content()) ) : ?>
                        <p class="font-14 text-center text-muted">
                            <?= wp_strip_all_tags(get_the_content()); ?>
                        </p>
                    <?php endif; ?>

                    <div class="text-center">
                        <a href="/order-detail/?order=<?= get_the_ID(); ?>" class="btn btn-sm btn-light">View more info</a>
                    </div>

                    <?php
                        $post_id = get_the_ID();
                        $quantity = get_post_meta( $post_id, 'uhack-quantity', true);
                        $price = get_post_meta($post_id, 'uhack-price_ratio', true);

                        $budget = $quantity * $price;

                        global $wpdb;
                        $bid_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->postmeta AS a WHERE meta_key ='uhack-assoc_order' AND meta_value='$post_id'");
                    ?>
                    <div class="row mt-5 text-center">
                        <div class="col-6">
                            <h5 class="font-normal text-muted">Responses</h5>
                            <h3 class="m-b-30"><?= !empty($bid_count) ? $bid_count : '0' ?></h3>
                        </div>
                        <div class="col-6">
                            <h5 class="font-normal text-muted">Budget</h5>
                            <h3 class="m-b-30">$<?= number_format($budget); ?></h3>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        <?php endwhile; ?>
    </div>

<?php get_footer();
