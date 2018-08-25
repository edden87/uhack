<?php
/*
 * Template Name: Delivery Partner
 */
get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Minton</a></li>
                        <li class="breadcrumb-item"><a href="#">Extras</a></li>
                        <li class="breadcrumb-item active">Timeline</li>
                    </ol>
                </div>
                <div class="card-box widget-user">
                    <div>
                        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/users/avatar-2.jpg" class="rounded-circle" alt="user">
                        <div class="wid-u-info">
                            <h5 class="mt-0 m-b-5 font-16">Juan dela Cruz</h5>
                            <p class="text-muted m-b-5 font-13" style="white-space: normal;">Hi, I will be your delivery partner for this order. Don't hesistate to contact me.</p>
                            <small class="text-success"><i class="mdi mdi-deskphone"></i> <b>(+63) 921 8417520</b></small>
                            <br>
                            <small class=text-danger><i class="mdi mdi-truck-delivery"></i> <b>LBC Inc.</b></small>
                        </div>
                    </div>
                </div>

                <h4 class="page-title">Timeline</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-sm-12">
            <div class="timeline">
                <article class="timeline-item alt">
                    <div class="text-right">
                        <div class="time-show first">
                            <a href="#" class="btn btn-primary w-lg">Today</a>
                        </div>
                    </div>
                </article>
                <article class="timeline-item alt">
                    <div class="timeline-desk">
                        <div class="panel">
                            <div class="panel-body">
                                <span class="arrow-alt"></span>
                                <span class="timeline-icon"></span>
                                <h4 class="text-danger">1 hour ago</h4>
                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                <p><strong>Item being delivered to buyer's  target Address </strong></p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="timeline-item ">
                    <div class="timeline-desk">
                        <div class="panel">
                            <div class="panel-body">
                                <span class="arrow"></span>
                                <span class="timeline-icon"></span>
                                <h4 class="text-success">2 hours ago</h4>
                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                <p><strong>Item are being loaded to the service truck</strong></p>

                            </div>
                        </div>
                    </div>
                </article>
                <article class="timeline-item alt">
                    <div class="timeline-desk">
                        <div class="panel">
                            <div class="panel-body">
                                <span class="arrow-alt"></span>
                                <span class="timeline-icon"></span>
                                <h4 class="text-primary">4 hours ago</h4>
                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                <p><strong>Undergoing Item Count and Quality Check</strong></p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="timeline-item">
                    <div class="timeline-desk">
                        <div class="panel">
                            <div class="panel-body">
                                <span class="arrow"></span>
                                <span class="timeline-icon"></span>
                                <h4 class="text-purple">5 hours ago</h4>
                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                <p><strong>Arrived at Farmer's pick-up address</strong></p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="timeline-item alt">
                    <div class="timeline-desk">
                        <div class="panel">
                            <div class="panel-body">
                                <span class="arrow-alt"></span>
                                <span class="timeline-icon"></span>
                                <h4 class="text-muted">8 hours ago</h4>
                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                <p><strong>Service truck traveling to Farmer's pick-up address</strong></p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="timeline-item">
                    <div class="timeline-desk">
                        <div class="panel">
                            <div class="panel-body">
                                <span class="arrow"></span>
                                <span class="timeline-icon"></span>
                                <h4 class="text-purple">9 hours ago</h4>
                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                <p><strong>Preparing Service Truck for Travel</strong></p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <!-- end row -->
<?php get_footer();