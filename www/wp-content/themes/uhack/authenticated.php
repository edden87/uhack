<?php
/*
 * Template Name: authenticated
 */
get_header(); ?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <?php
                    $code = $_GET['code'];
                    update_option('auth_session', $code);

                    $api = new Uhack();
                    $token_request = json_decode($api->access_token($code));
                    update_option('access_token', $token_request->access_token);
                    update_option('buyer_account', json_decode($api->balance_inquiry($token_request->access_token)))
                ?>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <script>
        jQuery(document).ready(function($) {
            swal(
                {
                    title: 'Sync Account!',
                    text: 'Redirecting in 2 seconds...',
                    type: 'success',
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                }
            ).then(
                function() {
                },
                function (dismiss) {
                    if ( dismiss === 'timer' )
                    {
                        window.location.replace("/buyers-order");
                    }
                }
            )
        })

    </script>
<?php get_footer();