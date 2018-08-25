<?php
/**
 * Template Name: Direct Response Chatbox
 */
get_header();
?>
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">#5213</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <!-- CHAT -->
        <div class="col-lg-8 center-page">
            <div class="card-box">
                <h4 class="m-t-0 m-b-20 header-title"><b>Chat</b></h4>

                <div class="chat-conversation">
                    <ul class="conversation-list nicescroll">
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/avatar-1.jpg" alt="male">
                                <i>10:00</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>John Deo</i>
                                    <p>
                                        Hello!
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/users/avatar-5.jpg" alt="Female">
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Smith</i>
                                    <p>
                                        Hi, How are you? What about our next meeting?
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/avatar-1.jpg" alt="male">
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>John Deo</i>
                                    <p>
                                        Yeah everything is fine
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/users/avatar-5.jpg" alt="male">
                                <i>10:02</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Smith</i>
                                    <p>
                                        Wow that's great
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-12 text-center drc-wrapper">
                            <div class="btn-group m-b-10">
                                <button type="button" class="btn btn-info waves-effect chatbox-btn" data-toggle="popover" data-placement="top" data-html="true" data-content='<button type="button" class="btn btn-default btn-sm btn-block btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">Hello!</button><br><button type="button" class="btn btn-default btn-sm btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">Good day!</button><br><button type="button" class="btn btn-default btn-sm btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">Thank you!</button>'><i class="ion-happy"></i></button>
                                <button type="button" class="btn btn-info waves-effect chatbox-btn" data-toggle="popover" data-placement="top" data-html="true" data-content='<button type="button" class="btn btn-default btn-sm btn-block btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">We are preparing...</button><br><button type="button" class="btn btn-default btn-sm btn-block btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">On its way...</button>'><i class="ion-chatbox"></i></button>
                                <button type="button" class="btn btn-info waves-effect chatbox-btn" data-toggle="popover" data-placement="top" data-html="true" data-content='<button type="button" class="btn btn-default btn-sm btn-block btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">I am sorry!</button><br><button type="button" class="btn btn-default btn-sm btn-block btn-custom waves-effect w-md m-b-5 chatbox-response" onclick="save_chat(this)">We encounter a problem...</button>'><i class="ion-sad"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end col-->
    </div>
    <!-- end row -->
    <script>
        jQuery('.btn.chatbox-btn').on('click', function (e) {
            jQuery('.chatbox-btn').not(this).popover('hide');
        });

        function save_chat(obj)
        {
            var chatText = jQuery(obj).text();
            var chatTime = moment().format("h:mm");
            if (chatText == "") {
                sweetAlert("Oops...", "You forgot to enter your chat message", "error");
            } else {
                jQuery('<li class="clearfix"><div class="chat-avatar"><img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/avatar-1.jpg" alt="male"><i>' + chatTime + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>John Deo</i><p>' + chatText + '</p></div></div></li>').appendTo('.conversation-list');
                jQuery('.conversation-list').scrollTo('100%', '100%', {
                    easing: 'swing'
                });
                jQuery('.chatbox-btn').popover('hide');
            }
        }
    </script>
<?php get_footer();