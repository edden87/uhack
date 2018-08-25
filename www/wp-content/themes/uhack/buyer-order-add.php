<?php
/*
 * Template Name: Buyer's Order Add
 */

get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-8 center-page">
            <div class="page-title-box">
                <h4 class="page-title"><a href="/buyers-order/">Home</a> / New Order</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-sm-8 center-page">
            <form role="form" method="post">
                <div class="form-group">
                    <label for="exampleInputTitle">Name of your Job Order</label>
                    <input type="text" class="form-control" id="exampleInputTitle" name="exampleInputTitle" aria-describedby="titleHelp" placeholder="Order Title">
                </div>
                <div class="form-group">
                    <label for="agriculture_type">Select Agriculture</label>
                    <select id="agriculture_type" name="agriculture_type" class="form-control select2">
                        <option>Select</option>
                        <optgroup label="Rice">
                                <option value="7-tonner" selected>7 Tonner</option>
                                <option value="jasmin">Jasmin</option>
                                <option value="brown">Brown</option>
                                <option value="nfa">NFA</option>
                                <option value="sinandomeng">Sinandomeng</option>
                        </optgroup>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Enter how much do you need (in KG):</label>
                            <input id="demo3" type="text" value="1000" name="demo3" data-bts-min="0" data-bts-max="100000">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="datepicker-autoclose">Estimated Deadline</small></label>
                            <div class="input-group">
                                <input type="text" name="deadline" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="ion-calendar"></i></span>
                                </div>
                            </div><!-- input-group -->
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Destination</h5>
                        <div class="form-group">
                            <label for="inputAddress" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2" class="col-form-label">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity" class="col-form-label">City</label>
                                <input type="text" class="form-control" id="inputCity" name="inputCity" value="Davao City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState" class="col-form-label">State</label>
                                <select id="inputState" class="form-control" name="inputState">
                                    <option value="Davao del Sur">Davao del Sur</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip" class="col-form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip" value="8000">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Delivery Preference:</p>
                            <div class="checkbox checkbox-circle">
                                <input id="checkbox7" type="checkbox" name="delivery_type[]" checked value="self-help">
                                <label for="checkbox7">
                                    Self-help Delivery
                                </label>
                            </div>
                            <div class="checkbox checkbox-circle">
                                <input id="checkbox8" type="checkbox" name="delivery_type[]" checked value="trusted-delivery">
                                <label for="checkbox8">
                                    Trusted Delivery Partner <strong class="ti-shield"></strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Farmer Preference:</p>
                        <div class="radio">
                            <input type="radio" name="farmer_preference" id="radio2" value="multiple" checked>
                            <label for="radio2">
                                Allow multiple farmers to commit to an order
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="farmer_preference" id="radio1" value="bulk">
                            <label for="radio1">
                                One farmer will commit to the whole order.
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>Publish Type</p>
                        <div class="radio">
                            <input type="radio" name="publish_type" id="publish_type1" value="anyone"
                                   checked>
                            <label for="publish_type1">Anyone can bid
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="publish_type" id="publish_type2" value="invite-only">
                            <label for="publish_type2">
                                Invite only
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-b-1">
                            <label class="control-label">Estimated price per KG ratio. <br>
                                <small><strong>Farmers will still decide on the price.</strong></small>
                            </label>
                            <input id="demo3_21" type="text" value="1" name="demo3_21" class=" form-control" data-bts-max="100000">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p>Order Description (Optional):</p>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                        <br>
                        <button id="submit" type="button" class="btn btn-success waves-effect waves-light">Post Order</button>
                        <button type="button" class="btn btn-default waves-effect waves-light">Cancel</button>
                        <br>
                        <br>
                    </div>
                </div>
            </form>
        </div><!-- end col-->
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#submit').click(function() {
                var values = {};
                var i = 0;
                $.each($('form').serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                values['action'] = 'submit_order';
                console.log(values);

                var ajaxurl = '<?= admin_url('admin-ajax.php') ?>';

                $.post(ajaxurl, values, function(e) {
                    if (e.success == true)
                    {
                        swal(
                            {
                                title: 'Order Added!',
                                text: 'Redirecting in 2 seconds...',
                                type: 'success',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }
                        ).then(
                            function () {
                            },
                            // handling the promise rejection
                            function (dismiss) {
                                if (dismiss === 'timer') {
                                    window.location.replace("/farmer-suggestion/");

                                }
                            }
                        )
                    }
                });
            });
        });
    </script>
<?php get_footer();