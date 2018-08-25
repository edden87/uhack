<?php
/*
 * Template Name: Order Detail
 */
get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-8 center-page">
            <div class="page-title-box">
                <h4 class="page-title"><a href="/buyers-order/">Home</a> / Bidders</h4>
            </div>
        </div>
    </div>
    <?php
        $delivery_types = [
            'self-help' => 'Self-help',
            'trusted-delivery' => 'Trusted Delivery Partners',
        ];
        $order_id = $_GET['order'];
        $max_order = get_post_meta($order_id, 'uhack-quantity', true);
        $args = [
            'post_type'      => 'bids',
            'posts_per_page' => -1,
            'meta_query'     => [
                [
                    'key'   => 'uhack-assoc_order',
                    'value' => $order_id
                ]
            ]
        ];
        $order_list = new WP_Query( $args );
        $total_percentage = 0;

        foreach ($order_list->posts as $object => $post) {
            if ( get_post_meta($post->ID, 'uhack-status', true) == 'approved' )
                $total_percentage = $total_percentage + ((get_post_meta($post->ID, 'uhack-commited_qty', true) / $max_order) * 100);
        }
    ?>
    <p><strong>Order's filled (<?= $total_percentage; ?>%)</strong></p>

    <div class="progress m-b-20">
        <?php
        while ($order_list->have_posts()) : $order_list->the_post();
            $pecentage_share = 0;
            if ( get_post_meta(get_the_ID(), 'uhack-status', true) == 'approved' )
            {
                $commited_qty = get_post_meta(get_the_ID(), 'uhack-commited_qty', true);
                $pecentage_share = ($commited_qty / $max_order) * 100;
            }
        ?>

            <div class="progress-bar" role="progressbar" style="width: <?= $pecentage_share; ?>%" aria-valuenow="<?= $pecentage_share; ?>" aria-valuemin="0" aria-valuemax="100"></div>
        <?php endwhile; ?>

    </div>
<hr>
<?php if (have_posts( $order_list )) :?>
    <div class="slick-slider">
        <?php

            while ($order_list->have_posts()) : $order_list->the_post();
            $user = get_user_by( 'ID', get_post_meta(get_the_ID(), 'uhack-bidding_user_id', true) );
        ?>
            <div class="portlet">
                <div class="portlet-heading portlet-default">
                    <h3 class="portlet-title text-dark">
                        <?= $user->display_name; ?>
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" href="#bg-default"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="bg-default" class="panel-collapse collapse show">
                    <div class="portlet-body">
                        <div class="text-center">
                            <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/users/avatar-<?= rand(1, 10) ?>.jpg" alt="logo" class="thumb-lg rounded-circle mb-3">
                            <p class="text-center">
                                <a href="javascript:void(0);" class="btn btn-sm btn-light">View Profile</a>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center text-success">
                                    <p>
                                        <b>Quantity</b>
                                    </p>
                                    <h4><?= get_post_meta(get_the_ID(), 'uhack-commited_qty', true); ?>kg</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center text-info">
                                    <p>
                                        <strong>Delivery Type</strong>
                                    </p>
                                    <p><i class="fa fa-location-arrow"></i> <?= $delivery_types[get_post_meta(get_the_ID(), 'uhack-deliver_preference', true)]; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            $address_1 = get_post_meta(get_the_ID(), 'uhack-address_1', true);
                            $address_2 = get_post_meta(get_the_ID(), 'uhack-address_2', true);
                            $city = get_post_meta(get_the_ID(), 'uhack-city', true);
                            $state = get_post_meta(get_the_ID(), 'uhack-state', true);
                            $zip = get_post_meta(get_the_ID(), 'uhack-zip', true);
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center text-danger"><i class="mdi mdi-account-location"></i></h4>
                                <p class="text-center">
                                    <?= $address_1 ?> <?= $address_2; ?> <?=  $city; ?> <?=  $state; ?> <?= $zip; ?>
                                </p>
                                <div class="bidder-status-wrapper">
                                    <?php
                                    if ( get_post_meta(get_the_ID(), 'uhack-status', true) == 'approved') :
                                        if ( get_post_meta(get_the_ID(), 'uhack-deliver_preference', true) == 'self-help')
                                        {
                                            $message_string = '<a href="/direct-response-chatbox/?chat_id='.get_the_ID().'" class="btn btn-success waves-effect waves-light btn-block"><i class="ion-chatbox"></i> Message</a>';
                                        } else {
                                            $message_string = '<a href="/delivery-partner/" class="btn btn-success waves-effect waves-light btn-block"><i class="ion-map"></i> See Timeline</a>';
                                        }
                                    ?>
                                        <p class="text-center"><i class="fa fa-check-circle"></i> Approved</p>
                                        <?= $message_string ?>
                                    <?php elseif ( get_post_meta(get_the_ID(), 'uhack-status', true) == 'declined' ) : ?>
                                        <p class="text-center"><i class="fa fa-times-circle"></i> Declined</p>
                                    <?php else : ?>
                                        <p><button type="button" class="btn btn-success waves-effect waves-light btn-block approved" data-delivery="<?= get_post_meta(get_the_ID(), 'uhack-deliver_preference', true)  ?>" data-id="<?= get_the_ID() ?>" data-action="approved">Approve</button></p>
                                        <p><button type="button" class="btn btn-default waves-effect waves-light btn-block declined" data-delivery="<?= get_post_meta(get_the_ID(), 'uhack-deliver_preference', true)  ?>" data-id="<?= get_the_ID() ?>" data-action="declined">Declined</button></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

    <script>
        jQuery(document).ready(function($) {
            $('.slick-slider').slick();

            $('button.approved, button.declined').click(function() {
                var ajaxurl = '<?= admin_url('admin-ajax.php') ?>'
                var $data = {
                    'action' : 'order_action',
                    'order_id' : $(this).attr('data-id'),
                    'bid_action' : $(this).attr('data-action'),
                    'delivery_type' : $(this).attr('data-delivery')
                }
                $.post(ajaxurl, $data, function(e) {
                    if (e.success == true)
                    {
                        swal(
                            {
                                title: 'Updated!',
                                text: 'Refresing in 2 seconds...',
                                type: 'success',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }
                        ).then(
                            function () {
                            },
                            // handling the promise rejection
                            function (dismiss) {
                                if (dismiss === 'timer') {
                                    console.log(e.data.action);
                                    if (e.data.action === 'approved')
                                    {
                                        $messege = '<p class="text-center"><i class="fa fa-check-circle"></i> Approved</p>';
                                        if (e.data.delivery_type === 'self-help')
                                        {
                                            $message = '<a href="/direct-response-chatbox/?chat_id='+e.data.bid_id+'" class="btn btn-success waves-effect waves-light btn-block"><i class="ion-chatbox"></i> Message</a>';
                                        }
                                        else {
                                            $message = '<a href="/delivery-partner/" class="btn btn-success waves-effect waves-light btn-block"><i class="ion-map"></i> See Timeline</a>';
                                        }
                                        $('.bidder-status-wrapper').html('<p class="text-center"><i class="fa fa-check-circle"></i> Approved</p>' + $message);
                                    }
                                    else
                                    {
                                        $message = '<p class="text-center"><i class="fa fa-times-circle"></i> Declined</p>'
                                        $('.bidder-status-wrapper').html($message);
                                    }

                                }
                            }
                        )
                    }
                })

            })
        });
    </script>
<?php get_footer();
