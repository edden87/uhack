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
                    <h2>#5692</h2>
                </div>

                <p class="font-14 text-center text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, eaque assumenda doloribus aut mollitia perferendis in perspiciatis fugit explicabo labore!
                </p>

                <div class="text-center">
                    <a href="javascript:void(0);" class="btn btn-sm btn-success">Make an Offer</a> <a href="javascript:void(0);" class="btn btn-sm btn-light">Decline</a>
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
                    <a href="javascript:void(0);" class="btn btn-sm btn-success">Make an Offer</a>
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
    });
</script>
<?php get_footer();
