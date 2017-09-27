<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\SubCategory;
use yii\helpers\Url;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$current_action = Yii::$app->controller->action->id; // controller action id
?>
<style>
	.summary{
		display: none;
	}
</style>
<div class="pad-20 hide-xs"></div>

<div class="container">
	<div class="breadcrumb">
		<span class="current-page"><?php
			if (isset($catag->category)) {
				echo $catag->category;
				$m_id = $catag->category_code;
				$m_link = $catag->category;
			} else {
				echo 'PRODUCTS';
				$m_id = '';
				$m_link = 'PRODUCTS';
			}
			?></span>
		<ol class="path">
			<li><?= Html::a('<span>Home</span>', ['index'], ['class' => '']) ?></li>
			<li><?= Html::a('<span>our products</span>', ['/product/index', 'id' => $m_id], ['class' => '']) ?></li>
			<li class="active"><?= $m_link ?></li>
		</ol>
	</div>
</div>

<div id="our-product">
	<div class="container">
		<div class="input-group gender-selection hidden-xs">
			<div id="radioBtn" class="btn-group">
				<span>Type:</span>
				<a class="btn btn-primary btn-sm <?= $type == 1 && $type != "" ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="Y" id="1" pro_cat="<?php
				if (isset($id)) {
					echo $id;
				}
				?>" main-categ="<?= $main_categry ?>">Women</a>
				<a class="btn btn-primary btn-sm <?= $type == 0 && $type != "" ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="0" pro_cat="<?php
				if (isset($id)) {
					echo $id;
				}
				?>"main-categ="<?= $main_categry ?>">Men</a>
				<a class="btn btn-primary btn-sm <?= $type == 2 && $type != "" ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="2" pro_cat="<?php
				if (isset($id)) {
					echo $id;
				}
				?>"main-categ="<?= $main_categry ?>">Unisex</a>
				<a class="btn btn-primary btn-sm <?= $type == "" ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="" pro_cat="<?php
				if (isset($id)) {
					echo $id;
				}
				?>"main-categ="<?= $main_categry ?>">All</a>
			</div>
		</div>

		<div class="panel-body hidden-lg hidden-md hidden-sm filter col-xs-8" >
			<a data-toggle="collapse" href="#collapse2">
				<i class="fa fa-align-justify " aria-hidden="true"></i> Category
			</a>
			<!--<h3 class="hidden visible-xs pull-right side_filter_toggle"><i class="fa fa-align-justify "></i>Filter</h3>-->
			<div id="collapse2" class="panel-collapse collapse" >
				<div class="col-lg-3 col-md-3 col-sm-12 left-accordation panel-body">
					<div class="panel panel-default">
						<div class="panel-body lit-blue" style="padding-left: 0px;">
							<div class="slide-container">
								<div class="list-group" id="mg-multisidetabs">
									<div class="panel list-sub" style="display: block">
										<div id="collapse1" class="panel-body" >
											<div class="list-group">
												<a href="#" class="list-group-item active"><span>Our featured products</span><span class="fa fa-caret-right pull-left"></span></a>
												<a href="#" class="list-group-item"><span class="fa fa-caret-left pull-left"></span><span>international brands</span></a>
												<a href="#" class="list-group-item"><span class="fa fa-caret-left pull-left"></span><span>new arrivals</span></a>
												<a href="#" class="list-group-item"><span class="fa fa-caret-left pull-left"></span><span>trending</span></a>
												<a href="#" class="list-group-item"><span class="fa fa-caret-left pull-left"></span><span>something special</span></a>
											</div>
										</div>
									</div>
								</div><!-- ./ end list-group -->
							</div><!-- ./ end slide-container -->
						</div><!-- ./ end panel-body -->
					</div><!-- ./ end panel panel-default-->
				</div><!-- ./ endcol-lg-6 col-lg-offset-3 -->
			</div>
		</div>
		<div class="panel-body hidden-lg hidden-md hidden-sm filter col-xs-4" >
			<a data-toggle="collapse" href="#collapse0" style="float: right;">
				Filter&nbsp;&nbsp;&nbsp;&nbsp;<i style="margin-right: 0px;" class="fa fa-align-justify " aria-hidden="true"></i>
			</a>
			<!--<h3 class="hidden visible-xs pull-right side_filter_toggle"><i class="fa fa-align-justify "></i>Filter</h3>-->
			<div id="collapse0" class="panel-collapse collapse" >
				<div class="input-group gender-selection">
					<!--                    <div id="radioBtn" class="btn-group">
								<span>Type:</span>
								<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="Y">All</a>
								<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="W">Women</a>
								<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="M">Men</a>
								<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="U">Unisex</a>
							    </div>-->
					<div class="list-group lit-blue">
						<div id="radioBtn" class="btn-group">
							<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="Y">All</a>
							<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="W">Women</a>
							<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="M">Men</a>
							<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="U">Unisex</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-3 col-md-3 col-sm-12 hidden-xs left-accordation panel-body">
			<?php if (!empty($main_categry)) { ?>
				<div class="panel panel-default">
					<div class="panel-body lit-blue">
						<div class="slide-container">
							<div class="list-group" id="mg-multisidetabs">
								<a href="#" class="list-group-item active-head "><span>
										<?= $main_categry == 1 ? "Our Products" : "Inetrnational Products " ?></span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
								<div class="panel list-sub" style="display: block">
									<div class="panel-body">
										<div class="list-group">
											<?php
											foreach ($categories as $category) {

												if (isset($catag->id)) {
													if ($category->id == $catag->id) {
														$active_class = 'list-group-item active';
													} else {
														$active_class = 'list-group-item';
													}
												} else {
													$active_class = 'list-group-item';
												}
												?>

												<?= Html::a('<span>' . $category->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $category->category_code, 'category' => $main_categry], ['class' => $active_class])
												?>


																											<!--<a href="#" class="list-group-item active"><span>Our featured products</span><span class="fa fa-caret-right pull-left"></span></a>-->
											<?php }
											?>
										</div>
									</div>
								</div>
							</div><!-- ./ end list-group -->
						</div><!-- ./ end slide-container -->
					</div><!-- ./ end panel-body -->
				</div><!-- ./ end panel panel-default-->
			<?php } else {
				?>
				<div class="panel panel-default">
					<div class="panel-body lit-blue">
						<div class="slide-container">
							<div class="list-group" id="mg-multisidetabs">
								<?= Html::a('<span>Exclusive Brands</span>', ['product/index', 'category' => 1, 'featured' => 1], ['class' => 'list-group-item active-head'])
								?>
								<?= Html::a('<span>Brands</span>', ['product/index', 'id' => $category->category_code, 'category' => $main_categry], ['class' => 'list-group-item active-head'])
								?>
	<!--								<a data-toggle="collapse" href="#collapse1" class="list-group-item active-head "><span>Exclusive Brands</span></a>
								<a data-toggle="collapse" href="#collapse1" class="list-group-item active-head "><span>Brands</span></a>-->

							</div><!-- ./ end list-group -->
						</div><!-- ./ end slide-container -->
					</div><!-- ./ end panel-body -->
				</div>

			<?php }
			?>
		</div><!-- ./ endcol-lg-6 col-lg-offset-3 -->

		<div class="col-md-9 product-list">
			<div class="international-brands">

				<?=
				ListView::widget([
				    'dataProvider' => $dataProvider,
				    'itemView' => '_view2',
				]);
				?>

			</div>
		</div>

	</div>
</div>

<div class="pad-20"></div>