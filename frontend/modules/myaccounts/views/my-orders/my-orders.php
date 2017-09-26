<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use common\models\OrderDetails;
use common\models\Product;
use common\models\Fregrance;
?>
<div class="pad-20 hide-xs"></div>

<div class="container">
	<div class="breadcrumb">
		<span class="current-page">My orders</span>
		<ol class="path">
			<li><?= Html::a('<span>Home</span>', ['/site/index'], ['class' => '']) ?></li>
			<li><?= Html::a('<span>My account</span>', ['/myaccounts/user/index'], ['class' => '']) ?></li>
			<li class="active">My orders</li>
		</ol>
	</div>
</div>

<div id="our-product" class="my-account">
	<div class="container">
		<?= Yii::$app->controller->renderPartial('_leftside_menu'); ?>

		<div class="col-lg-8 col-md-8 col-sm-12 hidden-xs my-account-cntnt">

			<?php
			foreach ($my_orders as $my_order) {
				$order_products = OrderDetails::find()->where(['order_id' => $my_order->order_id])->all();
				?>
				<div class="orders-box">
					<div class="track">
						<button class="product-id"><?= $my_order->order_id ?></button>
						<button class="track-btn"><i class="fa fa-map-marker" aria-hidden="true"></i>Track</button>
					</div>
					<?php
					foreach ($order_products as $order_product) {
						$product_detail = Product::find()->where(['id' => $order_product->product_id])->one();
						?>
						<div class="ordered-pro-dtls">
							<div class="pro-img-box col-lg-2 col-md-2 col-sm-2 col-xs-2">
								<!--<img src="<?= yii::$app->homeUrl; ?>images/products/escape2tumb.png"/>-->
								<a href="<?= Yii::$app->homeUrl . 'product_detail/' . $product_detail->canonical_name ?>"><img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_detail->id . '/profile/' . $product_detail->canonical_name . '_thumb.' . $product_detail->profile ?>"/></a>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<a href="<?= Yii::$app->homeUrl . 'product_detail/' . $product_detail->canonical_name ?>"><p class="cart-pro-heading"><?= $product_detail->product_name ?></p></a>
								<?php $product_type = Fregrance::findOne($product_detail->product_type); ?>
								<a href="<?= Yii::$app->homeUrl . 'product_detail/' . $product_detail->canonical_name ?>"><p class="cart-pro-subheading"><?= $product_type->name; ?></p>
								</a>
		<!--<p class="product-discp"><?= $product_detail->main_description; ?></p>-->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 price">AED  <?= $product_detail->price; ?></div>

							<!--							<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 delivered-date">Delivered on <?= date('D, M y', strtotime($order_product->delivered_date)) ?>
															<span>Your item has been delivered</span>
														</div>-->
							<?php if ($order_product->status == 1) { ?>
								<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 delivered-date">Delivered on <?= date('D, M dS y', strtotime($order_product->delivered_date)) ?>
									<span>Your item has been delivered</span>
								</div>
							<?php } else { ?>
								<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 delivered-date" style="min-width: 300px;
								     max-width: 300px;">
									<span></span>
								</div>
							<?php } ?>
						</div>

						<?php
					}
					?>
					<div class="pro-order-detail">
						<p class="ordered-date">Ordered on <?= date('D, M dS y', strtotime($my_order->order_date)) ?> </p>
						<p class="order-total">Order Total: AED <?= $my_order->total_amount ?></p>
					</div>

				</div>
				<?php
			}
			?>
		</div>

		<div class="hidden-lg hidden-md hidden-sm col-xs-12 my-account-cntnt">
			<?php foreach ($my_orders as $my_order) {
				?>
				<div class="orders-box col-xs-12">
					<div class="track">
						<button class="product-id">0D508055878917637000</button>
						<button class="track-btn hidden-xs"><i class="fa fa-map-marker" aria-hidden="true"></i>Track</button>
						<button title="Track Your Product" class="track-btn"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
					</div>
					<div class="ordered-pro-dtls">
						<div class="pro-img-box col-xs-3">
							<img src="images/products/escape2tumb.png"/>
						</div>
						<div class="col-xs-9">
							<p class="cart-pro-heading">WAVES</p>
							<p class="cart-pro-subheading">David of coolwater </p>
							<p class="product-discp">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
						</div>
						<div class="col-xs-12 price">AED 200</div>
						<div class="col-xs-12 delivered-date">Delivered on Tue, Aug 10th ‘17
							<span>Your item has been delivered</span>
						</div>
					</div>
					<div class="pro-order-detail">
						<p class="ordered-date">Ordered on Fri, Jul 25th ’17 </p>
						<p class="order-total">Order Total: AED 200</p>
					</div>
				</div>
			<?php } ?>




		</div>


	</div>
</div>

<div class="pad-20"></div>
