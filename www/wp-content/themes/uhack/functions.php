<?php
Class Uhack
{
    /* Developer Acc

            un : ratillanestorjr@gmail.com
            pw : Uh@ck12345

    */
    /* sandbox accounts:

            un: nestor
            pw: sandbox


            un: nestor2
            pw: sandbox2

    */

    private $client_id = 'dd9586f0-0456-48a3-812c-47a6e9a1bd0f';

    private $client_secret = 'lG6uI3xM5nA0lL4nY4qM5yO4tI4qG2qK2wY0oT6nK0hX7wO0qY';

    private $redirect_url = 'http://edf93831.ngrok.io/authenticated/';

    private $auth_url = 'https://api-uat.unionbankph.com/partners/sb/convergent/v1/oauth2/authorize';

    private $token_url = 'https://api-uat.unionbankph.com/partners/sb/convergent/v1/oauth2/token';

    private $balance_url = 'https://api-uat.unionbankph.com/partners/sb/accounts/v1/balances';

    private $transfer_url = 'https://api-uat.unionbankph.com/partners/sb/online/v1/transfers/single';


    /*****SCOPES for
     *
     *        auth_code_redirect | refresh_token
     *
     *        payments            x
     *        transfers
     *        account_balances
     *        account_info        x
     *        card_inquiry        x
     *
     ******/

    public function auth_code_redirect( $scope )
    {

        $url = $this->auth_url
            . '?client_id=' . $this->client_id
            . '&response_type=code'
            . '&scope=' . $scope
            . '&redirect_uri=' . $this->redirect_url;

        wp_redirect( $url );
    }

    public function access_token( $code )
    {

        $url = $this->token_url;

        $header = [
            'Accept: text/html',
            'Content-Type: application/x-www-form-urlencoded'
        ];

        $post_data = 'grant_type=authorization_code'
            . '&client_id=' . $this->client_id
            . '&redirect_uri=' . $this->redirect_url
            . '&code=' . $code;

        $method = 'post';

        $response = $this->call( $url, $method, $header, $post_data );

        /***Return
         *
         *        token_type
         *        access_token
         *        expires_in
         *        scope
         *        refresh_token
         *
         ******/

        return $response;
    }

    public function refresh_token( $code, $refresh_token, $scope )
    {

        $url = $this->token_url;

        $method = 'post';

        $header = [
            'Accept: text/html',
            'Content-type: application/x-www-form-urlencoded'
        ];

        $post_data = 'grant_type=refresh_token'
            . '&client_id=' . $this->client_id
            . '&code=' . $code
            . '&redirect_uri=' . $this->redirect_url
            . '&scope=' . $scope;

        $response = $this->call( $url, $method, $header, $post_data );


        /***Return
         *
         *        token_type: bearer <anything>
         *        access_token
         *        expires_in
         *        scope
         *        refresh_token
         *
         ******/

        return $response;

    }

    public function transfer_fund( $token, $amount = 4000 )
    {
        /***Token Scope type :
         *
         *        transfers
         *
         ***/

        $url = $this->transfer_url;

        $method = 'post';

        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
            'x-ibm-client-id: ' . $this->client_id,
            'x-ibm-client-secret: ' . $this->client_secret,
            'x-partner-id: 01bbb51e-1e6c-4bd4-af9c-450957522aac' #for dev
        ];


        $params = '{
			    	"senderTransferId":"00001",
				    "transferRequestDate":"2017-12-12T12:11:50Z",
				    "accountNo":"100614394826",
				    "amount": {
				      "currency":"PHP",
				      "value":"' . $amount . '"
				    },
				    "remarks":"Transfer remarks",
				    "particulars":"Transfer particulars",
				    "info": [
				      {
				        "index":1,
				        "name":"Recipient",
				        "value":"Rotsen Jr Ratilla"
				      },
				      {
				        "index":2,
				        "name":"Message",
				        "value":"Happy Birthday"
				      }
				    ]
			  	}';

        $response = $this->call( $url, $method, $header, $params );

        /***Return
         *
         *        tranId
         *        createdAt
         *        state
         *        senderTransferId
         *
         *****/

        return $response;

    }

    public function balance_inquiry( $token )
    {
        /***Token Scope type :
         *
         *        account_balances
         *
         ***/

        $url = $this->balance_url;

        $method = 'get';

        $header = [
            'Accept: application/json',
            'Authorization: Bearer ' . $token,
            'x-ibm-client-id: ' . $this->client_id,
            'x-ibm-client-secret: ' . $this->client_secret
        ];

        $response = $this->call( $url, $method, $header );

        /***Return
         *
         *        type
         *        amount
         *        currency
         *
         ****/

        return $response;

    }

    public function call( $url, $method, $header, $params = null )
    {

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_URL, $url );

        //curl_setopt($ch, CURLOPT_HEADER, 1);

        curl_setopt( $ch, CURLINFO_HEADER_OUT, true );

        curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        if ( $method == 'post' )
        {
            curl_setopt( $ch, CURLOPT_POST, true );

            curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
        }

        $response['response'] = curl_exec( $ch );

        $response['httpcode'] = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

        curl_close( $ch );

        /***Return
         *
         *        response (array() || Json)
         *        httpcode
         *
         ******/

        return $response['response'];
    }
}

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
    wp_enqueue_style( 'sweet-alert', get_stylesheet_directory_uri() . '/plugins/sweet-alert/sweetalert2.min.css', ['main'], '', 'all' );

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
    wp_enqueue_script( 'sweet-alert', get_stylesheet_directory_uri() . '/plugins/sweet-alert/sweetalert2.min.js', ['jquery'], '', 'true' );

    // Pages
    wp_enqueue_script( 'company', get_stylesheet_directory_uri() . '/assets/pages/jquery.companies.js', ['jquery'], '0.2', 'true' );
    wp_enqueue_script( 'form-advance', get_stylesheet_directory_uri() . '/assets/pages/jquery.form-advanced.init.js', ['jquery'], '0.3', 'true' );

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
                'type' => 'radio',
                'options' => array(
                    'multiple' => 'Allow multiple farmers to commit to an order',
                    'one' => 'One farmer will commit to the whole order.',
                ),
            ),
            array(
                'id' => $prefix . 'publish_type',
                'name' => esc_html__( 'Publish Type', 'text-domain' ),
                'type' => 'radio',
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
            array(
                'id' => $prefix . 'item',
                'name' => esc_html__( 'Item', 'text-domain' ),
                'type' => 'select',
                'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
                'options' => array(
                    '7-tonner' => '7 Tonner',
                    'jasmin' => 'Jasmin',
                    'brown' => 'Brown',
                    'nfa' => 'NFA',
                    'sinandomeng' => 'Sinandomeng',
                ),
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
                'type' => 'radio',
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

add_action( 'wp_ajax_order_action', 'order_action' );
add_action( 'wp_ajax_nopriv_order_action', 'order_action' );
function order_action()
{
    $bid_id = $_REQUEST['order_id'];
    $bid_value = $_REQUEST['bid_action'];
    $delivery_type = $_REQUEST['delivery_type'];
    $max_qty = $_REQUEST['max_qty'];

    $committed_percentage = $_REQUEST['committed_percentage'];
    $total_percentage = $_REQUEST['total_percentage'];

    $data = ['action' => $bid_value, 'bid_id' => $bid_id, 'delivery_type' => $delivery_type];

    if (isset($committed_percentage) && isset($total_percentage))
    {
        $data['total_percentage'] = $total_percentage;
        $data['committed_percentage'] = $committed_percentage;
    }

//    update_post_meta($bid_id, 'uhack-status', $bid_value);
    wp_send_json_success($data);

    wp_die();
}

add_action( 'wp_ajax_submit_order', 'submit_order' );
add_action( 'wp_ajax_nopriv_submit_order', 'submit_order' );
function submit_order()
{
    $post = $_REQUEST;

    $meta_prefix = 'uhack-';

    $args = [
        'post_title' => $post['exampleInputTitle'],
        'post_content' => $post['description'],
        'meta_input' => [
            $meta_prefix . 'buyer' => get_current_user_id(),
            $meta_prefix . 'deliver_preference' => ['self-help', 'trusted-delivery'],
            $meta_prefix . 'farmer_preference' => $post['farmer_preference'],
            $meta_prefix . 'publish_type' => $post['publish_type'],
            $meta_prefix . 'deadline' => $post['deadline'],
            $meta_prefix . 'address_1' => $post['inputAddress'],
            $meta_prefix . 'address_2' => $post['inputAddress2'],
            $meta_prefix . 'city' => $post['inputCity'],
            $meta_prefix . 'state' => $post['inputState'],
            $meta_prefix . 'zip' => $post['inputZip'],
            $meta_prefix . 'quantity' => $post['demo3'],
            $meta_prefix . 'price_ratio' => $post['demo3_21'],
            $meta_prefix . 'item' => $post['agriculture_type']
        ],
        'post_type' => 'order',
        'post_status' => 'publish'
    ];

    $post_id = wp_insert_post($args);
    wp_send_json_success(['id' => $post_id]);

    wp_die();
}

add_action( 'wp_ajax_submit_sms', 'submit_sms' );
add_action( 'wp_ajax_nopriv_submit_sms', 'submit_sms' );
function submit_sms() {
    $url = 'https://rest.nexmo.com/sms/json?';
    $params = [
            'api_key' => '1b725766',
            'api_secret' => 'd501d8d77cf1cbb5',
            'from' => 'UHACK',
            'to' => '639290035663'
    ];

    if ($_REQUEST['type'] == 'invitation')
    {
        $params['text'] = 'You got an invitation! Please make an offer. -UHACK';
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $response['response'] = curl_exec($ch);
    $response['httpcode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($response['httpcode'] == 200)
    {
        wp_send_json_success(['response' => $response['response']]);
        update_option('notify_farmer', true);
    }
    else
        wp_send_json_error(['response' => $response]);

    wp_die();
}

add_action( 'wp_ajax_notify_farmer', 'notify_farmer' );
add_action( 'wp_ajax_nopriv_notify_farmer', 'notify_farmer' );
function notify_farmer()
{
    $notify = get_option('notify_farmer');

    if ($notify == true)
    {
        delete_option('notify_farmer');
        wp_send_json_success();
    }
    else
        wp_send_json_error();

    wp_die();
}

add_action( 'wp_ajax_award_bid', 'award_bid' );
add_action( 'wp_ajax_nopriv_award_bid', 'award_bid' );
function award_bid()
{
    $bid_id = $_REQUEST['order_id'];


    $url = 'https://rest.nexmo.com/sms/json?';
    $params = [
        'api_key' => '1b725766',
        'api_secret' => 'd501d8d77cf1cbb5',
        'from' => 'UHACK',
        'to' => '639290035663'
    ];

    $params['text'] = 'You bid got awarded. -UHACK';


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $response['response'] = curl_exec($ch);
    $response['httpcode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    $api = new Uhack();
    $token = get_option('access_token');
    $api->transfer_fund($token);

    wp_die();
}





