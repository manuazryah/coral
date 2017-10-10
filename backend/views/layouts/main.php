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
                <link rel="shortcut icon" href="<?= yii::$app->homeUrl; ?>../images/fav.png" type="image/png" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
                <title><?= Html::encode($this->title) ?></title>
                <script src="<?= yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>
                <script>
			var homeUrl = '<?= yii::$app->homeUrl; ?>';
                </script>
		<?php $this->head() ?>
        </head>
        <body>
		<?php $this->beginBody() ?>

        <body class="page-body">



                <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebaowered By Azryah Networksr by default, "chat-visible" to make chat appear always -->
owered By Azryah Networks
                        <!-- Add "fixed" class to make the sidebar fixed always to the broowered By Azryah Networkswser viewport. -->
                        <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
                        <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
                        <div class="sidebar-menu toggle-others fixed">

                                <div class="sidebar-menu-inner">

                                    <header class="logo-env" >

                                                <!-- logo -->
                                                <div class="logo">
                                                        <a href="<?= yii::$app->homeUrl; ?>" class="logo-expanded">
                                                                <img src="<?= yii::$app->homeUrl; ?>images/logo-3.png" width="104" alt="" />
                                                        </a>

                                                        <a href="<?= yii::$app->homeUrl; ?>" class="logo-collapsed">
                                                                <img src="<?= yii::$app->homeUrl; ?>images/coralfav.png" width="40" alt="" />
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
                                                <li class="">
                                                        <a href="#">
                                                                <i class="fa fa-cog"></i>
                                                                <span class="title">Admin</span>
                                                        </a>
                                                        <ul>
                                                                <li>
									<?= Html::a('Admin Post', ['/admin/admin-post/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Admin User', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="layout-variants.html">
                                                                <i class="fa fa-desktop"></i>
                                                                <span class="title">Products</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <a href="extra-icons-fontawesome.html">
                                                                                <span class="title">Master</span>
                                                                        </a>
                                                                        <ul>
                                                                                <li>
											<?= Html::a('Category', ['/product/category/index'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('Sub Category', ['/product/sub-category/index'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('Search Tag', ['/product/master-search-tag/index'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('Brand', ['/brand/index'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('Fregrance', ['/fregrance/index'], ['class' => 'title']) ?>
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                                <li>
									<?= Html::a('Product', ['/product/product/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="#">
                                                                <i class="fa fa-envelope-o"></i>
                                                                <span class="title">Masters</span>
                                                        </a>
                                                        <ul>
                                                                <li>
									<?= Html::a('Unit', ['/product/unit/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Currency', ['/product/currency/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Country Code', ['/product/country-code/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Emirates', ['/emirates'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="<?= yii::$app->homeUrl; ?>settings">
                                                                <i class="fa fa-star"></i>
                                                                <span class="title">Settings</span>
                                                        </a>
                                                </li>

                                                <li>
                                                        <a href="">
                                                                <i class="fa fa-user"></i>
                                                                <span class="title">Users</span>
                                                        </a>
                                                        <ul>
                                                                <li>
									<?= Html::a('Users', ['/user/user/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Reviews', ['/user/customer-reviews/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li>
                                                        <a href="">
                                                                <i class="fa fa-plus"></i>
                                                                <span class="title">Create Your Own</span>
                                                        </a>
                                                        <ul>
                                                                <li>
									<?= Html::a('Gender', ['/create_your_own/gender/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Character', ['/create_your_own/characters/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Scent', ['/create_your_own/scent/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Notes', ['/create_your_own/notes/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Bottle', ['/create_your_own/bottle/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li>
                                                        <a href="">
                                                                <i class="fa-pie-chart"></i>
                                                                <span class="title">CMS</span>
                                                        </a>
                                                        <ul>
                                                                <li>
									<?= Html::a('Slider', ['/cms/slider/index'], ['class' => 'title']) ?>
                                                                </li>

                                                                <li>
									<?= Html::a('Shop By Category', ['/cms/shop-by-category/index'], ['class' => 'title']) ?>
                                                                </li>

                                                                <li>
									<?= Html::a('Blog', ['/cms/from-our-blog/index'], ['class' => 'title']) ?>
                                                                </li>

                                                                <li>
									<?= Html::a('About Page', ['/cms/about/update?id=1'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Contact Page', ['/cms/contact-page/update?id=1'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Private Label Page', ['/cms/private-label-gallery/update?id=1'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Showrooms', ['/cms/showrooms/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Others', ['/cms/cms-others/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
                                                                        <a href="">
                                                                                <span class="title">Principals</span>
                                                                        </a>
                                                                        <ul>
                                                                                <li>
											<?= Html::a('Terms & Conditions', ['/cms/principals/terms-conditions'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('Privacy Policy', ['/cms/principals/privacy-policy'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('Return Policy', ['/cms/principals/return-policy'], ['class' => 'title']) ?>
                                                                                </li>
                                                                                <li>
											<?= Html::a('FAQ', ['/cms/principals/faq'], ['class' => 'title']) ?>
                                                                                </li>
                                                                        </ul>
                                                                </li>
								<li>
									<?= Html::a('Meta Tags', ['/cms/cms-meta-tags/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li>
                                                        <a href="">
                                                                <i class="fa fa-envelope"></i>
                                                                <span class="title">Contact Us</span>
                                                        </a>
                                                        <ul>
                                                                <li>
									<?= Html::a('Subscribe', ['/contacts/subscribe/index'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('Contact Us', ['/contacts/contact-us/index'], ['class' => 'title']) ?>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
							<?= Html::a('<i class="fa fa-lock"></i><span class="title">Order</span>', ['/order/order-master/index'], ['class' => 'title']) ?>
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

                                                <li class="dropdown user-profile">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <img src="<?= yii::$app->homeUrl; ?>images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                                                                <span>
									<?= Yii::$app->user->identity->user_name ?>
                                                                        <i class="fa-angle-down"></i>
                                                                </span>
                                                        </a>

                                                        <ul class="dropdown-menu user-profile-menu list-unstyled">

                                                                <li>
									<?= Html::a('<i class="fa-wrench"></i>Change Password', ['/admin/admin-users/change-password'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
									<?= Html::a('<i class="fa-pencil"></i>Edit Profile', ['/admin/admin-users/update?id=' . Yii::$app->user->identity->id], ['class' => 'title']) ?>
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



			<?php $this->endBody() ?>
        </body>
</html>
<?php $this->endPage() ?>
