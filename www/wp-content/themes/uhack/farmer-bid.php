<?php
/*
 * Template Name: Farmer's Bid
 */
get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-8 center-page">
            <div class="page-title-box">
                <h4 class="page-title">Your Bid</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-sm-8 center-page">
            <form role="form">
                <div class="form-group">
                    <p class="text-center"><strong>ORDER REQUEST</strong></p>
                    <h4 class="text-center"><strong>7 Tonner</strong></h4>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label"><b>Enter Price</b></label>
                    <input id="demo3_21" type="text" value="1" name="demo3_21" class=" form-control" data-bts-max="100000">
                </div>
                <div class="form-group">
                    <label for="range_03" class="control-label"><b>Enter committed qty.</b></label>
                    <div class="m-b-20">
                        <input type="text" id="range_03">
                    </div>
                </div>
                <div class="form-group">
                    <p><strong>Choose delivery choice</strong></p>
                    <div class="middle">

                        <label>
                            <input type="radio" name="radio" checked/>
                            <div class="front-end box">
                                <span>Self-help Delivery</span>
                            </div>
                        </label>

                        <label>
                            <input type="radio" name="radio"/>
                            <div class="back-end box">
                                <span>Delivery Partners</span>
                            </div>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Your Address</strong></p>
                        <div class="form-group">
                            <label for="inputAddress" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="col-form-label">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">City</label>
                                <input type="text" class="form-control" id="inputCity" value="Davao City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState" class="col-form-label">State</label>
                                <select id="inputState" class="form-control">
                                    <option value="davao-del-sur">Davao del Sur</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip" class="col-form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip" value="8000">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success waves-effect waves-light btn-block" id="post-bid">Post Bid</button>
                        <button type="button" class="btn btn-default waves-effect waves-light btn-block">Cancel</button>
                        <br>
                        <br>
                    </div>
                </div>
            </form>
        </div><!-- end col-->
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#post-bid').click(function() {
                swal(
                    {
                        title: 'Bid Submitted!',
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
                            window.location.replace("/farmers-main/");
                        }
                    }
                )
            })
        });
    </script>
<?php get_footer();