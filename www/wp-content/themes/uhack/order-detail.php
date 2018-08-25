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
                <h4 class="page-title">Bidders</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 center-page">
            <div class="portlet">
                <div class="portlet-heading portlet-default">
                    <h3 class="portlet-title text-dark">
                        Farmer 1
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
                            <img src="http://localhost:81/wp-content/themes/uhack/assets/images/avatar-1.jpg" alt="logo" class="thumb-lg rounded-circle mb-3">
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
                                    <h4>512kg</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center text-info">
                                    <p>
                                        <strong>Delivery Type</strong>
                                    </p>
                                    <p><i class="fa fa-location-arrow"></i> Self-help</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center text-danger"><i class="mdi mdi-account-location"></i></h4>
                                <p class="text-center">Sitio Katandungan, Marilog District, Davao City, 8000 Cotabato</p>
                                <p><button type="button" class="btn btn-success waves-effect waves-light btn-block">Approve</button></p>
                                <p><button type="button" class="btn btn-default waves-effect waves-light btn-block">Declined</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
