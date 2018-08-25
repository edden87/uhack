<?php
/**
 * Template Name: Farmer Main
 */

get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Farmer's Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="slick-slider">
        <div class="col-md-4">
            <div class="card-box">
                <span class="badge badge-success"><i class=" mdi mdi-account-check"></i> You are invited!</span> <span class="badge badge-light"><i class=" mdi mdi-account-multiple"></i> Multi-farmer application</span>
                <div class="text-center">
                    <h2>#234</h2>
                </div>

                <p class="font-14 text-center text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, eaque assumenda doloribus aut mollitia perferendis in perspiciatis fugit explicabo labore!
                </p>

                <div class="text-center">
                    <a href="/farmers-bid/" class="btn btn-sm btn-success">Make an Offer</a> <a href="javascript:void(0);" class="btn btn-sm btn-light">Decline</a>
                </div>
                <hr>
                <div class="text-center">
                    Application ends in
                    <br>
                    Sept. 25, 2018
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <span class="badge badge-success"><i class=" mdi mdi-account-check"></i> You are invited!</span> <span class="badge badge-light"><i class=" mdi mdi-account-multiple"></i> Multi-farmer application</span>
                <div class="text-center">
                    <h2>#5692</h2>
                </div>

                <p class="font-14 text-center text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, eaque assumenda doloribus aut mollitia perferendis in perspiciatis fugit explicabo labore!
                </p>

                <div class="text-center">
                    <a href="/farmers-bid/" class="btn btn-sm btn-success">Make an Offer</a> <a href="javascript:void(0);" class="btn btn-sm btn-light">Decline</a>
                </div>
                <hr>
                <div class="text-center">
                    Application ends in
                    <br>
                    Sept. 25, 2018
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <span class="badge badge-light"><i class=" mdi mdi-account"></i> Single-farmer application</span>
                <div class="text-center">
                    <h2>#5679</h2>
                </div>

                <p class="font-14 text-center text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, eaque assumenda doloribus aut mollitia perferendis in perspiciatis fugit explicabo labore!
                </p>

                <div class="text-center">
                    <a href="/farmers-bid/" class="btn btn-sm btn-success">Make an Offer</a>
                </div>
                <hr>
                <div class="text-center">
                    Application ends in
                    <br>
                    Sept. 12, 2018
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
<script>
    jQuery(document).ready(function($) {
        $('.slick-slider').slick();

        var ajaxurl = '<?= admin_url('admin-ajax.php') ?>';
        var values = {'action' : 'notify_farmer'}

        $.post(ajaxurl, values, function(e) {
            if (e.success == true)
            {
                swal(
                    {
                        title: 'You are Invited!',
                        text: 'An Order was match to you.',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                        confirmButtonText: 'Show me the details',
                        cancelButtonText: 'Maybe later'
                    }
                ).then(
                    function(e) {
                        window.location.replace("/farmers-bid/");
                    },
                    function (dismiss) {
                    }
                )
            }
        });
    });
</script>
<?php get_footer();
