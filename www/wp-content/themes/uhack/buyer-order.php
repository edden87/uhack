<?php
/*
 * Template Name: Buyer's Order
 */
get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Orders</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-sm-4">
            <a href="order-add.html" class="btn btn-sm btn-primary waves-effect waves-light mb-4">
                <i class="mdi mdi-plus-circle"></i> Add New
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card-box">
                <div class="text-center">
                    <h2>#5679</h2>
                </div>

                <p class="font-14 text-center text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, eaque assumenda doloribus aut mollitia perferendis in perspiciatis fugit explicabo labore!
                </p>

                <div class="text-center">
                    <a href="javascript:void(0);" class="btn btn-sm btn-light">View more info</a>
                </div>

                <div class="row mt-5 text-center">
                    <div class="col-6">
                        <h5 class="font-normal text-muted">Responses</h5>
                        <h3 class="m-b-30">0</h3>
                    </div>
                    <div class="col-6">
                        <h5 class="font-normal text-muted">Budget</h5>
                        <h3 class="m-b-30">$1540</h3>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>

<?php get_footer();
