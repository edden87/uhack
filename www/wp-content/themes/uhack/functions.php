<?php
add_action( 'wp_enqueue_scripts', 'uhack_scripts' );
function uhack_scripts()
{
    // Dependencies
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', [], '', 'all' );
    wp_enqueue_style( 'icons', get_stylesheet_directory_uri() . '/assets/css/icons.css', ['bootstrap'], '', 'all' );
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/style.css', ['bootstrap'], '', 'all' );

//    wp_deregister_script('jquery');
//    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', [], '', 'true' );

    wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', [], '', 'false' );
    wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'waves', get_stylesheet_directory_uri() . '/assets/js/waves.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'slimscroll', get_stylesheet_directory_uri() . '/assets/js/jquery.slimscroll.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/assets/js/jquery.scrollTo.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'nicescroll', get_stylesheet_directory_uri() . '/assets/js/jquery.nicescroll.js', ['jquery'], '', 'true' );

    // Plugins
    wp_enqueue_style( 'swtichery', get_stylesheet_directory_uri() . '/plugins/switchery/switchery.min.css', ['main'], '', 'all' );
    wp_enqueue_style( 'bootstrap-taginput', get_stylesheet_directory_uri() . '/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css', ['main'], '', 'all' );
    wp_enqueue_style( 'multi-select', get_stylesheet_directory_uri() . '/plugins/multiselect/css/multi-select.css', ['main'], '', 'all' );
    wp_enqueue_style( 'select2', get_stylesheet_directory_uri() . '/plugins/select2/css/select2.min.css', ['main'], '', 'all' );
    wp_enqueue_style( 'bootstrap-touchspin', get_stylesheet_directory_uri() . '/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css', ['main'], '', 'all' );
    wp_enqueue_style( 'bootstrap-colorpicker', get_stylesheet_directory_uri() . '/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css', ['main'], '', 'all' );
    wp_enqueue_style( 'bootstrap-datepicker', get_stylesheet_directory_uri() . '/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', ['main'], '', 'all' );
    wp_enqueue_style( 'bootstrap-daterangepicker', get_stylesheet_directory_uri() . '/plugins/bootstrap-daterangepicker/daterangepicker.css', ['main'], '', 'all' );
    wp_enqueue_style( 'ion-rangeslider', get_stylesheet_directory_uri() . '/plugins/ion-rangeslider/ion.rangeSlider.css', ['main'], '', 'all' );
    wp_enqueue_style( 'ion-rangeslider-skinFlat', get_stylesheet_directory_uri() . '/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css', ['main'], '', 'all' );
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/plugins/slick/slick.css', ['main'], '', 'all' );
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/plugins/slick/slick-theme.css', ['main'], '', 'all' );

    wp_enqueue_script( 'switchery', get_stylesheet_directory_uri() . '/plugins/switchery/switchery.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'bootstrap-tagsinput', get_stylesheet_directory_uri() . '/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'multi-select', get_stylesheet_directory_uri() . '/plugins/multiselect/js/jquery.multi-select.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'quicksearch', get_stylesheet_directory_uri() . '/plugins/jquery-quicksearch/jquery.quicksearch.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'select2', get_stylesheet_directory_uri() . '/plugins/select2/js/select2.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'bootstrap-touchspin', get_stylesheet_directory_uri() . '/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'bootstrap-inputmask', get_stylesheet_directory_uri() . '/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js', ['jquery'], '', 'true' );

    wp_enqueue_script( 'moment', get_stylesheet_directory_uri() . '/plugins/moment/moment.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'mjolnic-bootstrap-colorpicker', get_stylesheet_directory_uri() . '/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'bootstrap-colorpicker', get_stylesheet_directory_uri() . '/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'daterangepicker', get_stylesheet_directory_uri() . '/plugins/bootstrap-daterangepicker/daterangepicker.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'sparkline', get_stylesheet_directory_uri() . '/plugins/jquery-sparkline/jquery.sparkline.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'custombox', get_stylesheet_directory_uri() . '/plugins/custombox/dist/custombox.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'ion-slider', get_stylesheet_directory_uri() . '/plugins/ion-rangeslider/ion.rangeSlider.min.js', ['jquery'], '', 'true' );
    wp_enqueue_script( 'jquery-sliders', get_stylesheet_directory_uri() . '/assets/pages/jquery.ui-sliders.js', ['jquery'], '0.1', 'true' );
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/plugins/slick/slick.js', ['jquery'], '', 'true' );

    // Pages
    wp_enqueue_script( 'company', get_stylesheet_directory_uri() . '/assets/pages/jquery.companies.js', ['jquery'], '0.2', 'true' );
    wp_enqueue_script( 'form-advance', get_stylesheet_directory_uri() . '/assets/pages/jquery.form-advanced.init.js', ['jquery'], '0.1', 'true' );

    // Core
    wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', ['main'], '', 'all' );
    wp_enqueue_script( 'jquery-core2', get_stylesheet_directory_uri() . '/assets/js/jquery.core.js', ['jquery', 'switchery'], '', 'true' );
    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.app.js', ['jquery-core2'], '', 'true' );
}

add_action( 'init', 'remove_adminbar' );
function remove_adminbar()
{
    show_admin_bar(false);
}

//add_action( 'wp_footer', 'chatbox', 99 );
function chatbox()
{
    ?>
    <script>
        jQuery(document).ready(function($) {
            $('.btn.chatbox-btn').on('click', function (e) {
                $('.chatbox-btn').not(this).popover('hide');
            });
        });

        function save_chat(obj)
        {
            var chatText = jQuery(obj).text();
            var chatTime = moment().format("h:mm");
            if (chatText == "") {
                sweetAlert("Oops...", "You forgot to enter your chat message", "error");
            } else {
                jQuery('<li class="clearfix"><div class="chat-avatar"><img src="assets/images/avatar-1.jpg" alt="male"><i>' + chatTime + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>John Deo</i><p>' + chatText + '</p></div></div></li>').appendTo('.conversation-list');
                jQuery('.conversation-list').scrollTo('100%', '100%', {
                    easing: 'swing'
                });
                jQuery('.chatbox-btn').popover('hide');
            }
        }
    </script>
    <?php
}

add_action( 'init', 'uhack_register_post_types' );
function uhack_register_post_types()
{
    register_post_type( 'Order', [
                                   'description'          => '',
                                   'labels'               => [
                                       'name'               => _x( 'Orders', 'post type general name', 'text-domain' ),
                                       'singular_name'      => _x( 'Order', 'post type singular name', 'text-domain' ),
                                       'menu_name'          => _x( 'Orders', 'admin menu', 'text-domain' ),
                                       'name_admin_bar'     => _x( 'Order', 'add new Order on admin bar', 'text-domain' ),
                                       'add_new'            => _x( 'Add New', 'post_type', 'text-domain' ),
                                       'add_new_item'       => __( 'Add New Order', 'text-domain' ),
                                       'edit_item'          => __( 'Edit Order', 'text-domain' ),
                                       'new_item'           => __( 'New Order', 'text-domain' ),
                                       'view_item'          => __( 'View Order', 'text-domain' ),
                                       'search_items'       => __( 'Search Orders', 'text-domain' ),
                                       'not_found'          => __( 'No orders found.', 'text-domain' ),
                                       'not_found_in_trash' => __( 'No orders found in Trash.', 'text-domain' ),
                                       'parent_item_colon'  => __( 'Parent Order:', 'text-domain' ),
                                       'all_items'          => __( 'All Orders', 'text-domain' ),
                                   ],
                                   'public'               => false,
                                   'hierarchical'         => false,
                                   'exclude_from_search'  => true,
                                   'publicly_queryable'   => false,
                                   'show_ui'              => true,
                                   'show_in_menu'         => true,
                                   'show_in_nav_menus'    => false,
                                   'show_in_admin_bar'    => false,
                                   'menu_position'        => 80,
                                   'menu_icon'            => null,
                                   'capability_type'      => 'post',
                                   'capabilities'         => [],
                                   'map_meta_cap'         => null,
                                   'supports'             => ['title', 'editor'],
                                   'register_meta_box_cb' => null,
                                   'taxonomies'           => [],
                                   'has_archive'          => false,
                                   'rewrite'              => [
                                       'slug'       => 'Order',
                                       'with_front' => false,
                                       'feeds'      => false,
                                       'pages'      => true,
                                   ],
                                   'query_var'            => true,
                                   'can_export'           => true,
                               ]
    );

    register_post_type( 'bids', [
                                  'description'          => '',
                                  'labels'               => [
                                      'name'               => _x( 'Bids', 'post type general name', 'text-domain' ),
                                      'singular_name'      => _x( 'Bid', 'post type singular name', 'text-domain' ),
                                      'menu_name'          => _x( 'Bids', 'admin menu', 'text-domain' ),
                                      'name_admin_bar'     => _x( 'Bid', 'add new bids on admin bar', 'text-domain' ),
                                      'add_new'            => _x( 'Add New', 'post_type', 'text-domain' ),
                                      'add_new_item'       => __( 'Add New Bid', 'text-domain' ),
                                      'edit_item'          => __( 'Edit Bid', 'text-domain' ),
                                      'new_item'           => __( 'New Bid', 'text-domain' ),
                                      'view_item'          => __( 'View Bid', 'text-domain' ),
                                      'search_items'       => __( 'Search Bids', 'text-domain' ),
                                      'not_found'          => __( 'No bids found.', 'text-domain' ),
                                      'not_found_in_trash' => __( 'No bids found in Trash.', 'text-domain' ),
                                      'parent_item_colon'  => __( 'Parent Bid:', 'text-domain' ),
                                      'all_items'          => __( 'All Bids', 'text-domain' ),
                                  ],
                                  'public'               => false,
                                  'hierarchical'         => false,
                                  'exclude_from_search'  => true,
                                  'publicly_queryable'   => false,
                                  'show_ui'              => true,
                                  'show_in_menu'         => true,
                                  'show_in_nav_menus'    => false,
                                  'show_in_admin_bar'    => false,
                                  'menu_position'        => 80,
                                  'menu_icon'            => null,
                                  'capability_type'      => 'post',
                                  'capabilities'         => [],
                                  'map_meta_cap'         => null,
                                  'supports'             => ['title', 'editor', 'comments'],
                                  'register_meta_box_cb' => null,
                                  'taxonomies'           => [],
                                  'has_archive'          => false,
                                  'rewrite'              => [
                                      'slug'       => 'bids',
                                      'with_front' => false,
                                      'feeds'      => false,
                                      'pages'      => true,
                                  ],
                                  'query_var'            => true,
                                  'can_export'           => true,
                              ]
    );

}

function order_metabox( $meta_boxes ) {
    $prefix = 'uhack-';

    $meta_boxes[] = array(
        'id' => 'uhack_order',
        'title' => esc_html__( 'Order Meta', 'text-domain' ),
        'post_types' => array( 'order' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => false,
        'fields' => array(
            array(
                'id' => $prefix . 'buyer',
                'type' => 'user',
                'name' => esc_html__( 'Buyer', 'text-domain' ),
                'field_type' => 'select_advanced',
            ),
            array(
                'id' => $prefix . 'deliver_preference',
                'name' => esc_html__( 'Deliver Preference', 'text-domain' ),
                'type' => 'checkbox_list',
                'options' => array(
                    'self-help' => 'Self-help',
                    'trusted-delivery' => 'Trusted Delivery',
                ),
            ),
            array(
                'id' => $prefix . 'farmer_preference',
                'name' => esc_html__( 'Farmer Preferences', 'text-domain' ),
                'type' => 'checkbox_list',
                'options' => array(
                    'multiple' => 'Allow multiple farmers to commit to an order',
                    'one' => 'One farmer will commit to the whole order.',
                ),
            ),
            array(
                'id' => $prefix . 'publish_type',
                'name' => esc_html__( 'Publish Type', 'text-domain' ),
                'type' => 'checkbox_list',
                'options' => array(
                    'anyone' => 'Anyone can bid',
                    'invite' => 'Invite only',
                ),
            ),
            array(
                'id' => $prefix . 'address_1',
                'type' => 'text',
                'name' => esc_html__( 'Address', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'address_2',
                'type' => 'text',
                'name' => esc_html__( 'Address 2', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'city',
                'type' => 'text',
                'name' => esc_html__( 'City', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'state',
                'type' => 'text',
                'name' => esc_html__( 'State', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'zip',
                'type' => 'text',
                'name' => esc_html__( 'Zip', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'deadline',
                'type' => 'text',
                'name' => esc_html__( 'Estimated Deadline', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'quantity',
                'type' => 'text',
                'name' => esc_html__( 'Quantity', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'price_ratio',
                'type' => 'text',
                'name' => esc_html__( 'Price Ratio', 'text-domain' ),
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'uhack_bids',
        'title' => esc_html__( 'Bids Meta', 'text-domain' ),
        'post_types' => array( 'bids' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => false,
        'fields' => array(
            array(
                'id' => $prefix . 'commited_qty',
                'type' => 'text',
                'name' => esc_html__( 'Commited Qty.', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'assoc_order',
                'type' => 'post',
                'name' => esc_html__( 'Associated Order', 'text-domain' ),
                'post_type' => 'Order',
                'field_type' => 'select_advanced',
            ),
            array(
                'id' => $prefix . 'bidding_user_id',
                'type' => 'text',
                'name' => esc_html__( 'Bidding Farmer', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'address_1',
                'type' => 'text',
                'name' => esc_html__( 'Address', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'address_2',
                'type' => 'text',
                'name' => esc_html__( 'Address 2', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'city',
                'type' => 'text',
                'name' => esc_html__( 'City', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'state',
                'type' => 'text',
                'name' => esc_html__( 'State', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'zip',
                'type' => 'text',
                'name' => esc_html__( 'Zip', 'text-domain' ),
            ),
            array(
                'id' => $prefix . 'deliver_preference',
                'name' => esc_html__( 'Delivery Preference', 'text-domain' ),
                'type' => 'select',
                'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
                'options' => array(
                    'self-help' => 'Self-help Delivery',
                    'trusted-delivery' => 'Trusted Delivery Partners',
                ),
            ),
            array(
                'id' => $prefix . 'status',
                'name' => esc_html__( 'Status', 'text-domain' ),
                'type' => 'checkbox_list',
                'options' => array(
                    'approved' => 'Approved',
                    'declined' => 'Declined',
                ),
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'order_metabox' );


