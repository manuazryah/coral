<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script src="<?= yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <script>
        var homeUrl = '<?= yii::$app->homeUrl;?>'
        </script>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

    <body class="page-body">



        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
            <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
            <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
            <div class="sidebar-menu toggle-others fixed">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="<?= yii::$app->homeUrl; ?>" class="logo-expanded">
                                <img src="<?= yii::$app->homeUrl; ?>images/logo.jpg" width="80" alt="" />
                            </a>

                            <a href="<?= yii::$app->homeUrl; ?>" class="logo-collapsed">
                                <img src="<?= yii::$app->homeUrl; ?>images/logo.jpg" width="40" alt="" />
                            </a>
                        </div>

                        <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                        <div class="mobile-menu-toggle visible-xs">
                            <a href="#" data-toggle="user-info-menu">
                                <i class="fa-bell-o"></i>
                                <span class="badge badge-success">7</span>
                            </a>

                            <a href="#" data-toggle="mobile-menu">
                                <i class="fa-bars"></i>
                            </a>
                        </div>


                    </header>



                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <li class="active opened active">
                            <a href="#">
                                <i class="linecons-cog"></i>
                                <span class="title">Admin</span>
                            </a>
                            <ul>
                                <li class="active">
                                    <a href="<?= yii::$app->homeUrl; ?>admin-post">
                                        <span class="title">Admin Post</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="<?= yii::$app->homeUrl; ?>admin-user">
                                        <span class="title">Admin User</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="layout-variants.html">
                                <i class="linecons-desktop"></i>
                                <span class="title">Products</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="extra-icons-fontawesome.html">
                                        <span class="title">Master</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?= yii::$app->homeUrl; ?>category">
                                                <span class="title">Category</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= yii::$app->homeUrl; ?>sub-category">
                                                <span class="title">Sub Category</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= yii::$app->homeUrl; ?>product/master-search-tag">
                                                <span class="title">Search Tag</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="<?= yii::$app->homeUrl; ?>product/product">
                                        <span class="title">Product</span>
                                    </a>
                                </li>
                            </ul>
                            <!--                            <a href="layout-variants.html">
                                                            <i class="linecons-desktop"></i>
                                                            <span class="title">Products</span>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <a href="<?= yii::$app->homeUrl; ?>category">
                                                                    <span class="title">Category</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= yii::$app->homeUrl; ?>sub-category">
                                                                    <span class="title">Sub Category</span>
                                                                </a>
                                                            </li>
                            
                                                        </ul>-->
                        </li>
                        <li>
                            <a href="#">
                                <i class="linecons-mail"></i>
                                <span class="title">Masters</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= yii::$app->homeUrl; ?>product/unit">
                                        <span class="title">Unit</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= yii::$app->homeUrl; ?>product/currency">
                                        <span class="title">Currency</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="ui-widgets.html">
                                <i class="linecons-star"></i>
                                <span class="title">Widgets</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox-main.html">
                                <i class="linecons-mail"></i>
                                <span class="title">Mailbox</span>
                                <span class="label label-success pull-right">5</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="mailbox-main.html">
                                        <span class="title">Inbox</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="extra-gallery.html">
                                <i class="linecons-beaker"></i>
                                <span class="title">Extra</span>
                                <span class="label label-purple pull-right hidden-collapsed">New Items</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="extra-icons-fontawesome.html">
                                        <span class="title">Icons</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="extra-icons-fontawesome.html">
                                                <span class="title">Font Awesome</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>

            </div>
            <div class="main-content">

                <nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->

                    <!-- Left links for user info navbar -->
                    <ul class="user-info-menu left-links list-inline list-unstyled">

                        <li class="hidden-sm hidden-xs">
                            <a href="#" data-toggle="sidebar">
                                <i class="fa-bars"></i>
                            </a>
                        </li>

                        <li class="dropdown hover-line">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa-envelope-o"></i>
                                <span class="badge badge-green">15</span>
                            </a>

                            <ul class="dropdown-menu messages">
                                <li>

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">

                                        <li class="active"><!-- "active" class means message is unread -->
                                            <a href="#">
                                                <span class="line">
                                                    <strong>Luc Chartier</strong>
                                                    <span class="light small">- yesterday</span>
                                                </span>

                                                <span class="line desc small">
                                                    This ain’t our first item, it is the best of the rest.
                                                </span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="#">
                                                <span class="line">
                                                    <strong>Salma Nyberg</strong>
                                                    <span class="light small">- 2 days ago</span>
                                                </span>

                                                <span class="line desc small">
                                                    Oh he decisively impression attachment friendship so if everything.
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="line">
                                                    Hayden Cartwright
                                                    <span class="light small">- a week ago</span>
                                                </span>

                                                <span class="line desc small">
                                                    Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="line">
                                                    Sandra Eberhardt
                                                    <span class="light small">- 16 days ago</span>
                                                </span>

                                                <span class="line desc small">
                                                    On so attention necessary at by provision otherwise existence direction.
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Repeated -->

                                        <li class="active"><!-- "active" class means message is unread -->
                                            <a href="#">
                                                <span class="line">
                                                    <strong>Luc Chartier</strong>
                                                    <span class="light small">- yesterday</span>
                                                </span>

                                                <span class="line desc small">
                                                    This ain’t our first item, it is the best of the rest.
                                                </span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="#">
                                                <span class="line">
                                                    <strong>Salma Nyberg</strong>
                                                    <span class="light small">- 2 days ago</span>
                                                </span>

                                                <span class="line desc small">
                                                    Oh he decisively impression attachment friendship so if everything.
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="line">
                                                    Hayden Cartwright
                                                    <span class="light small">- a week ago</span>
                                                </span>

                                                <span class="line desc small">
                                                    Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="line">
                                                    Sandra Eberhardt
                                                    <span class="light small">- 16 days ago</span>
                                                </span>

                                                <span class="line desc small">
                                                    On so attention necessary at by provision otherwise existence direction.
                                                </span>
                                            </a>
                                        </li>

                                    </ul>

                                </li>

                                <li class="external">
                                    <a href="mailbox-main.html">
                                        <span>All Messages</span>
                                        <i class="fa-link-ext"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown hover-line">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa-bell-o"></i>
                                <span class="badge badge-purple">7</span>
                            </a>

                            <ul class="dropdown-menu notifications">
                                <li class="top">
                                    <p class="small">
                                        <a href="#" class="pull-right">Mark all Read</a>
                                        You have <strong>3</strong> new notifications.
                                    </p>
                                </li>

                                <li>
                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        <li class="active notification-success">
                                            <a href="#">
                                                <i class="fa-user"></i>

                                                <span class="line">
                                                    <strong>New user registered</strong>
                                                </span>

                                                <span class="line small time">
                                                    30 seconds ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="active notification-secondary">
                                            <a href="#">
                                                <i class="fa-lock"></i>

                                                <span class="line">
                                                    <strong>Privacy settings have been changed</strong>
                                                </span>

                                                <span class="line small time">
                                                    3 hours ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-primary">
                                            <a href="#">
                                                <i class="fa-thumbs-up"></i>

                                                <span class="line">
                                                    <strong>Someone special liked this</strong>
                                                </span>

                                                <span class="line small time">
                                                    2 minutes ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-danger">
                                            <a href="#">
                                                <i class="fa-calendar"></i>

                                                <span class="line">
                                                    John cancelled the event
                                                </span>

                                                <span class="line small time">
                                                    9 hours ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-info">
                                            <a href="#">
                                                <i class="fa-database"></i>

                                                <span class="line">
                                                    The server is status is stable
                                                </span>

                                                <span class="line small time">
                                                    yesterday at 10:30am
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-warning">
                                            <a href="#">
                                                <i class="fa-envelope-o"></i>

                                                <span class="line">
                                                    New comments waiting approval
                                                </span>

                                                <span class="line small time">
                                                    last week
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="#">
                                        <span>View all notifications</span>
                                        <i class="fa-link-ext"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>


                    <!-- Right links for user info navbar -->
                    <ul class="user-info-menu right-links list-inline list-unstyled">
                        <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

                            <form name="userinfo_search_form" method="get" action="extra-search.html">
                                <input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />

                            </form>

                        </li>

                        <li class="dropdown user-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= yii::$app->homeUrl; ?>images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                                <span>
                                    John Smith
                                    <i class="fa-angle-down"></i>
                                </span>
                            </a>

                            <ul class="dropdown-menu user-profile-menu list-unstyled">
                                <li>
                                    <a href="#settings">
                                        <i class="fa-wrench"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#profile">
                                        <i class="fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <?php
                                echo '<li class="last">'
                                . Html::beginForm(['/site/logout'], 'post') . '<a>'
                                . Html::submitButton(
                                        '<i class="fa-lock"></i> Logout', ['class' => 'btn logout_btn']
                                ) . '</a>'
                                . Html::endForm()
                                . '</li>';
                                ?>
                            </ul>
                        </li>



                    </ul>

                </nav>

                <?= Alert::widget() ?>
                <?= $content ?>

                <!-- Main Footer -->
                <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
                <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
                <!-- Or class "fixed" to  always fix the footer to the end of page -->
                <footer class="main-footer sticky footer-type-1">

                    <div class="footer-inner">

                        <!-- Add your copyright text here -->
                        <div class="footer-text">
                            &copy; 2017 
                            All Rights Reserved. Powered By Azryah Networks
                        </div>


                        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                        <div class="go-up">

                            <a href="#" rel="go-top">
                                <i class="fa-angle-up"></i>
                            </a>

                        </div>

                    </div>

                </footer>
            </div>

            <!--    </div>
            </div>-->

            <div class="footer-sticked-chat"><!-- Start: Footer Sticked Chat -->

                <script type="text/javascript">
                    function toggleSampleChatWindow()
                    {
                        var $chat_win = jQuery("#sample-chat-window");

                        $chat_win.toggleClass('open');

                        if ($chat_win.hasClass('open'))
                        {
                            var $messages = $chat_win.find('.ps-scrollbar');

                            if ($.isFunction($.fn.perfectScrollbar))
                            {
                                $messages.perfectScrollbar('destroy');

                                setTimeout(function () {
                                    $messages.perfectScrollbar();
                                    $chat_win.find('.form-control').focus();
                                }, 300);
                            }
                        }

                        jQuery("#sample-chat-window form").on('submit', function (ev)
                        {
                            ev.preventDefault();
                        });
                    }

                    jQuery(document).ready(function ($)
                    {
                        $(".footer-sticked-chat .chat-user, .other-conversations-list a").on('click', function (ev)
                        {
                            ev.preventDefault();
                            toggleSampleChatWindow();
                        });

                        $(".mobile-chat-toggle").on('click', function (ev)
                        {
                            ev.preventDefault();

                            $(".footer-sticked-chat").toggleClass('mobile-is-visible');
                        });
                    });
                </script>



                <a href="#" class="mobile-chat-toggle">
                    <i class="linecons-comment"></i>
                    <span class="num">6</span>
                    <span class="badge badge-purple">4</span>
                </a>

                <!-- End: Footer Sticked Chat -->
            </div>

<!--            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/TweenMax.min.js"></script>
            <script src="assets/js/resizeable.js"></script>
            <script src="assets/js/joinable.js"></script>
            <script src="assets/js/xenon-api.js"></script>
            <script src="assets/js/xenon-toggles.js"></script>


             Imported scripts on this page 
            <script src="assets/js/xenon-widgets.js"></script>
            <script src="assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
            <script src="assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
            <script src="assets/js/toastr/toastr.min.js"></script>


             JavaScripts initializations and stuff 
            <script src="assets/js/xenon-custom.js"></script>-->

            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
