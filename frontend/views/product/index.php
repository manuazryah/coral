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

if (isset($meta_title) && $meta_title != '')
	$this->title = $meta_title;
else
	$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$current_action = Yii::$app->controller->action->id; // controller action id
$gender_params = \yii::$app->getRequest()->getQueryParams();

$exclusive_brands_sub = Category::find()->where(['status' => 1, 'main_category' => 1])->all();
$brands_sub = Category::find()->where(['status' => 1, 'main_category' => 2])->all();
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
				if ($catag->main_category == 1)
					$bread_crumb = "Exclusive Brands";
				else {
					$bread_crumb = "Brands";
				}
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
			<?php if (isset($gender_params['featured'])) { ?>
				<li><?= Html::a('<span>Featured</span>', ['/product/index', 'featured' => 'featured'], ['class' => '']) ?></li>
			<?php } elseif (isset($gender_params['keyword'])) {
				?>
				<li><?= Html::a('<span>Search Results</span>', ['/product/index', 'keyword' => $gender_params['keyword']], ['class' => '']) ?></li>
				<?php
			} else {
				?>

				<li><?= Html::a('<span>' . $bread_crumb . '</span>', ['/product/index', 'id' => $m_id], ['class' => '']) ?></li>
				<li class="active"><?= $m_link ?></li>
			<?php } ?>

		</ol>
	</div>
</div>

<div id="our-product">
	<div class="container">
		<div class="input-group gender-selection hidden-xs">
			<div id="radioBtn" class="btn-group">
				<span>Type:</span>
				<?php if (isset($gender_params['type'])) { ?>
					<a class="btn btn-primary btn-sm <?= (!empty($gender_params['type']) && $gender_params['type'] == 1) ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="Y" id="1" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>" main-categ="<?= $main_categry ?>"featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">Women</a>
					<a class="btn btn-primary btn-sm <?= ($gender_params['type'] == 0 && $gender_params['type'] != "") ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="0" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>"main-categ="<?= $main_categry ?>"featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">Men</a>
					<a class="btn btn-primary btn-sm <?= (!empty($gender_params['type']) && $gender_params['type'] == 2) ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="2" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>"main-categ="<?= $main_categry ?>" featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">Unisex</a>
					<a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>"main-categ="<?= $main_categry ?>" featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">All</a>
				   <?php } else { ?>
					<a class="btn btn-primary btn-sm  notActive gender-select" data-toggle="happy" data-title="Y" id="1" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>" main-categ="<?= $main_categry ?>"featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">Women</a>
					<a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="0" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>"main-categ="<?= $main_categry ?>"featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">Men</a>
					<a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="2" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>"main-categ="<?= $main_categry ?>"featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">Unisex</a>
					<a class="btn btn-primary btn-sm active gender-select" data-toggle="happy" data-title="N" id="" pro_cat="<?php
					if (isset($id)) {
						echo $id;
					}
					?>"main-categ="<?= $main_categry ?>"featured="<?php
					   if (isset($featured_status)) {
						   echo $featured_status;
					   }
					   ?>" keyword="<?php
					   if (isset($keyword)) {
						   echo $keyword;
					   }
					   ?>">All</a>
				   <?php } ?>
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
						<?php if (isset($featured_status) || $main_categry == 1 || isset($keyword)) {
							?>
							<div class="panel-body lit-blue">
								<div class="slide-container">
									<div class="list-group" id="mg-multisidetabs">
										<a data-toggle="collapse" href="#exclusive_resp" class="list-group-item active-head "><span>Exclusive Brands</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
										<div class="panel list-sub" style="display: block">

											<div id="exclusive_resp" class="panel-body panel-collapse collapse <?= (!empty($id) && $main_categry == 1) ? 'in' : '' ?>" >
												<div class="list-group">
													<?php
													foreach ($exclusive_brands_sub as $exclusive_brands) {

														if (isset($catag->id)) {
															if ($exclusive_brands->id == $catag->id) {
																$active_class = 'list-group-item active';
															} else {
																$active_class = 'list-group-item';
															}
														} else {
															$active_class = 'list-group-item';
														}
														if (isset($featured_status) || isset($keyword)) {
															?>
															<?= Html::a('<span>' . $exclusive_brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $exclusive_brands->category_code, 'category' => 1, 'featured' => $featured_status, 'keyword' => $keyword], ['class' => $active_class])
															?>
															<?php
														} else {
															?>
															<?= Html::a('<span>' . $exclusive_brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $exclusive_brands->category_code, 'category' => 1], ['class' => $active_class])
															?>
															<?php
														}
														?>

													<?php } ?>
												</div>
											</div>
										</div>
									</div><!-- ./ end list-group -->
								</div><!-- ./ end slide-container -->
							</div>
						<?php } ?>
						<?php if (isset($featured_status) || $main_categry == 2 || isset($keyword)) { ?><!-- ./ end panel-body -->
							<div class="panel-body lit-blue">
								<div class="slide-container">
									<div class="list-group" id="mg-multisidetabs">
										<a data-toggle="collapse" href="#brand_resp" class="list-group-item active-head "><span>Brands</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
										<div class="panel list-sub" style="display: block">
											<div id="brand_resp" class="panel-body panel-collapse collapse <?= (!empty($id) && $main_categry == 2) ? 'in' : '' ?>" >
												<div class="list-group">
													<?php
													foreach ($brands_sub as $brands) {
														if (isset($catag->id)) {
															if ($brands->id == $catag->id) {
																$active_class = 'list-group-item active';
															} else {
																$active_class = 'list-group-item';
															}
														} else {
															$active_class = 'list-group-item';
														}
														?>
														<?php
														if (isset($featured_status) || isset($keyword)) {
															?>
															<?= Html::a('<span>' . $brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $brands->category_code, 'category' => 2, 'featured' => $featured_status, 'keyword' => $keyword], ['class' => $active_class])
															?>
															<?php
														} else {
															?>
															<?= Html::a('<span>' . $brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $brands->category_code, 'category' => 2], ['class' => $active_class])
															?>
															<?php
														}
														?>
													<?php } ?>
												</div>
											</div>
										</div>
									</div><!-- ./ end list-group -->
								</div><!-- ./ end slide-container -->
							</div>
						<?php } ?>
						<!--                                                <div class="panel-body lit-blue" style="padding-left: 0px;">
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
														</div> ./ end list-group
													</div> ./ end slide-container
												</div> ./ end panel-body -->
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

					<div class="list-group lit-blue">
						<div id="radioBtn" class="btn-group">
							<!--                                                        <a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="Y">All</a>
														<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="W">Women</a>
														<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="M">Men</a>
														<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="U">Unisex</a>-->
							<?php if (isset($gender_params['type'])) { ?>
								<a class="btn btn-primary btn-sm <?= (!empty($gender_params['type']) && $gender_params['type'] == 1) ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="Y" id="1" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>" main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">Women</a>
								<a class="btn btn-primary btn-sm <?= ($gender_params['type'] == 0 && $gender_params['type'] != "") ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="0" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>"main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">Men</a>
								<a class="btn btn-primary btn-sm <?= (!empty($gender_params['type']) && $gender_params['type'] == 2) ? 'active' : 'notActive' ?> gender-select" data-toggle="happy" data-title="N" id="2" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>"main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">Unisex</a>
								<a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>"main-categ="<?= $main_categry ?>" featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">All</a>
							   <?php } else { ?>
								<a class="btn btn-primary btn-sm  notActive gender-select" data-toggle="happy" data-title="Y" id="1" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>" main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">Women</a>
								<a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="0" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>"main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">Men</a>
								<a class="btn btn-primary btn-sm notActive gender-select" data-toggle="happy" data-title="N" id="2" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>"main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">Unisex</a>
								<a class="btn btn-primary btn-sm active gender-select" data-toggle="happy" data-title="N" id="" pro_cat="<?php
								if (isset($id)) {
									echo $id;
								}
								?>"main-categ="<?= $main_categry ?>"featured="<?php
								   if (isset($featured_status)) {
									   echo $featured_status;
								   }
								   ?>" keyword="<?php
								   if (isset($keyword)) {
									   echo $keyword;
								   }
								   ?>">All</a>
							   <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-lg-3 col-md-3 col-sm-12 hidden-xs left-accordation panel-body">
			<div class="panel panel-default">
				<?php if (isset($featured_status) || $main_categry == 1 || isset($keyword)) { ?>
					<div class="panel-body lit-blue">
						<div class="slide-container">
							<div class="list-group" id="mg-multisidetabs">
								<a data-toggle="collapse" href="#collapse4" class="list-group-item active-head "><span>Exclusive Brands</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
								<div class="panel list-sub" style="display: block">

									<div id="collapse4" class="panel-body panel-collapse collapse <?= (!empty($id) && $main_categry == 1) ? 'in' : '' ?>" >
										<div class="list-group">
											<?php
											foreach ($exclusive_brands_sub as $exclusive_brands) {

												if (isset($catag->id)) {
													if ($exclusive_brands->id == $catag->id) {
														$active_class = 'list-group-item active';
													} else {
														$active_class = 'list-group-item';
													}
												} else {
													$active_class = 'list-group-item';
												}
												if (isset($featured_status) || isset($keyword)) {
													if (isset($featured_status)) {
														?>

														<?= Html::a('<span>' . $exclusive_brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $exclusive_brands->category_code, 'featured' => 'featured'], ['class' => $active_class])
														?>
													<?php } else {
														?>
														<?= Html::a('<span>' . $exclusive_brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $exclusive_brands->category_code, 'keyword' => $keyword], ['class' => $active_class])
														?>
													<?php }
													?>
												<?php } else {
													?>
													<?= Html::a('<span>' . $exclusive_brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $exclusive_brands->category_code], ['class' => $active_class])
													?>
													<?php
												}
												?>

											<?php } ?>
										</div>
									</div>
								</div>
							</div><!-- ./ end list-group -->
						</div><!-- ./ end slide-container -->
					</div>
				<?php } ?>
				<?php if (isset($featured_status) || $main_categry == 2 || isset($keyword)) { ?><!-- ./ end panel-body -->
					<div class="panel-body lit-blue">
						<div class="slide-container">
							<div class="list-group" id="mg-multisidetabs">
								<a data-toggle="collapse" href="#collapse5" class="list-group-item active-head "><span>Brands</span><span class="glyphicon glyphicon-menu-down mg-icon pull-right"></span></a>
								<div class="panel list-sub" style="display: block">
									<div id="collapse5" class="panel-body panel-collapse collapse <?= (!empty($id) && $main_categry == 2) ? 'in' : '' ?>" >
										<div class="list-group">
											<?php
											foreach ($brands_sub as $brands) {
												if (isset($catag->id)) {
													if ($brands->id == $catag->id) {
														$active_class = 'list-group-item active';
													} else {
														$active_class = 'list-group-item';
													}
												} else {
													$active_class = 'list-group-item';
												}
												?>
												<?php
												if (isset($featured_status) || isset($keyword)) {
													?>
													<?= Html::a('<span>' . $brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $brands->category_code, 'featured' => $featured_status, 'keyword' => $keyword], ['class' => $active_class])
													?>
												<?php } else {
													?>
													<?= Html::a('<span>' . $brands->category . '</span><span class="fa fa-caret-right pull-left">', ['product/index', 'id' => $brands->category_code], ['class' => $active_class])
													?>
													<?php
												}
												?>
											<?php } ?>
										</div>
									</div>
								</div>
							</div><!-- ./ end list-group -->
						</div><!-- ./ end slide-container -->
					</div>
				<?php } ?><!-- ./ end panel-body -->
			</div><!-- ./ end panel panel-default-->
		</div>
		<!-- ./ endcol-lg-6 col-lg-offset-3 -->

		<div class="col-md-9 product-list">
			<div class="international-brands">

				<?=
				$dataProvider->totalcount > 0 ? ListView::widget([
					    'dataProvider' => $dataProvider,
					    'itemView' => '_view2',
					    'pager' => [
						'firstPageLabel' => 'first',
						'lastPageLabel' => 'last',
						'prevPageLabel' => '<',
						'nextPageLabel' => '>',
						'maxButtonCount' => 3,
					    ],
					]) : $this->render('no_product');
				?>

			</div>
		</div>

	</div>
</div>

<div class="pad-20"></div>