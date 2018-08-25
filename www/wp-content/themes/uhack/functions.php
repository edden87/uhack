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

