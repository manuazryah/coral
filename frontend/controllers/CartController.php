<?php

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\Cart;
use common\models\User;
use frontend\models\CartsignupForm;
use common\models\Settings;
use yii\base\Component;
use yii\db\MigrationInterface;
use yii\di\Instance;
use yii\db\Expression;
use common\models\OrderMaster;
use common\models\OrderDetails;
use common\models\CreateYourOwn;

class CartController extends \yii\web\Controller {

	public function init() {
		date_default_timezone_set('Asia/Kolkata');
	}

	public function actionIndex() {
		return $this->render('index');
	}

	public function actionBuynow() {
		if (yii::$app->request->isAjax) {
			$canonical_name = Yii::$app->request->post()['cano_name'];
			$qty = Yii::$app->request->post()['qty'];
			$id = Product::findOne(['canonical_name' => $canonical_name])->id;
			$stock = Product::findOne(['canonical_name' => $canonical_name])->stock;
			$date = $this->date();
			if (isset(Yii::$app->user->identity->id)) {
				$user_id = Yii::$app->user->identity->id;
				$condition = ['user_id' => $user_id];
				Cart::deleteAll('date <= :date AND user_id != :user_id', ['date' => $date, ':user_id' => Yii::$app->user->identity->id]);
			} else {
				if (!isset(Yii::$app->session['temp_user'])) {
					$milliseconds = round(microtime(true) * 1000);
					Yii::$app->session['temp_user'] = $milliseconds;
				}
				Cart::deleteAll('date <= :date AND session_id != :session_id', ['date' => $date, ':session_id' => Yii::$app->session['temp_user']]);

				$sessonid = Yii::$app->session['temp_user'];
				$condition = ['session_id' => $sessonid];
				$user_id = '';
			}
			$cart = Cart::find()->where(['product_id' => $id])->andWhere($condition)->one();
			if (!empty($cart)) {
				$quantity = ($cart->quantity) + $qty;
				$cart->quantity = $quantity > $stock ? $stock : $quantity;
//            $cart->quantity = $qty;
				$cart->save();
				$this->cart_content($condition);
			} else {
				$model = new cart;
				$model->user_id = $user_id;
				$model->session_id = Yii::$app->session['temp_user'];
				$model->product_id = $id;
				$model->quantity = $qty;
				date_default_timezone_set('Asia/Kolkata');
				$model->date = date('Y-m-d H:i:s');
				if ($model->save()) {
					$this->cart_content($condition);
				}
			}
		}
	}

	public function actionGetcartcount() {
		if (yii::$app->request->isAjax) {

			$date = $this->date();
			Cart::deleteAll('date <= :date', ['date' => $date]);
			if (isset(Yii::$app->user->identity->id)) {
				if (isset(Yii::$app->session['temp_user'])) {
					/*					 * *******Change tempuser cart to login user********* */
					$this->changecart(Yii::$app->session['temp_user']);
//
				}
				$condition = ['user_id' => Yii::$app->user->identity->id];
			} else {
				if (isset(Yii::$app->session['temp_user'])) {
					$condition = ['session_id' => Yii::$app->session['temp_user']];
				} else {
					echo '0';
					exit;
				}
			}
			$cart_items = Cart::find()->where($condition)->all();
			if (!empty($cart_items)) {
				echo count($cart_items);
				exit;
			} else {
				echo "0";
				exit;
			}
		}
	}

	public function actionGetcarttotal() {
		if (yii::$app->request->isAjax) {
			if (isset(Yii::$app->user->identity->id)) {
				$cart_items = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
				if (!empty($cart_items)) {
					echo sprintf('%0.2f', $this->total($cart_items));
				} else {
					echo '0';
				}
			} else {
				if (isset(Yii::$app->session['temp_user'])) {
					$cart_items = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();

					if (!empty($cart_items)) {
						echo sprintf('%0.2f', $this->total($cart_items));
					} else {
						echo '0';
					}
				} else {
					echo '0';
				}
			}
		}
	}

	public function actionSelectcart() {
		if (yii::$app->request->isAjax) {
			if (isset(Yii::$app->user->identity->id)) {
				$user_id = Yii::$app->user->identity->id;
				$cart_contents = Cart::find()->where(['user_id' => $user_id])->all();
				if (!empty($cart_contents)) {
					$this->cart_content($cart_contents);
				} else {
//                    echo 'Cart box is Empty';
					echo '<div style="padding: 25px 0px; display: flow-root;">
                               <a href="' . yii::$app->homeUrl . '"><div class="col-md-12 empty-img text-center" >
                               <img style="margin: 0 auto; float: none; left: 0px; right: 0px; vertical-align: middle; margin-bottom: 10px;" class="img-responsive" src="' . Yii::$app->homeUrl . 'images/empty-cart.jpg"/>
                               </div>
                              <span class="col-md-12 text-center">Cart is Empty. Start Shopping.</span></a>
                              </div>';
				}
			} else {
				if (isset(Yii::$app->session['temp_user'])) {

					$session_id = Yii::$app->session['temp_user'];
					$cart_contents = Cart::find()->where(['session_id' => $session_id])->all();
//                                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
					if (!empty($cart_contents)) {
						$this->cart_content($cart_contents);
					} else {
//                        echo 'Cart box is Empty';
						echo '<div style="padding: 25px 0px; display: flow-root;">
                               <a href="' . yii::$app->homeUrl . '"><div class="col-md-12 empty-img text-center" >
                               <img style="margin: 0 auto; float: none; left: 0px; right: 0px; vertical-align: middle; margin-bottom: 10px;" class="img-responsive" src="' . Yii::$app->homeUrl . 'images/empty-cart.png"/>
                               </div>
                              <span class="col-md-12 text-center">Cart is Empty. Click to Continue</span></a>
                              </div>';
					}
				} else {
//                    echo 'Cart box is Empty';
					echo '<div style="padding: 25px 0px; display: flow-root;">
                               <a href="' . yii::$app->homeUrl . '"><div class="col-md-12 empty-img text-center" >
                               <img style="margin: 0 auto; float: none; left: 0px; right: 0px; vertical-align: middle; margin-bottom: 10px;" class="img-responsive" src="' . Yii::$app->homeUrl . 'images/empty-cart.png"/>
                               </div>
                              <span class="col-md-12 text-center">Cart is Empty. Click to Continue</span></a>
                              </div>';
				}
			}
		}
	}

	public function actionMycart() {
		if (isset(Yii::$app->user->identity->id)) {
			$this->changecart(Yii::$app->session['temp_user']);
			if (isset(Yii::$app->session['create_own'])) {
				/* Change tempuser cart to login user */
				$this->addtocart();
			}
		}
		$date = $this->date();
		$shipping_limit = Settings::findOne('1');
		if (isset(Yii::$app->user->identity->id)) {
			$user_id = Yii::$app->user->identity->id;
			Cart::deleteAll('date <= :date AND user_id != :user_id', ['date' => $date, ':user_id' => $user_id]);
			$cart_items = Cart::find()->where(['user_id' => $user_id])->all();
		} else {
			if (!isset(Yii::$app->session['temp_user'])) {
				Yii::$app->session['temp_user'] = microtime(true);
			}
			Cart::deleteAll('date <= :date', ['date' => $date]);
			$sessonid = Yii::$app->session['temp_user'];
			$cart_items = Cart::find()->where(['session_id' => $sessonid])->all();
		}
		if (!empty($cart_items)) {
			$subtotal = $this->total($cart_items);
			return $this->render('buynow', ['carts' => $cart_items, 'subtotal' => $subtotal, 'shipping_limit' => $shipping_limit->value]);
		} else {
			return $this->render('emptycart');
		}
	}

	public function actionCart_remove($id) {
		$cart = Cart::findone($id);
		if ($cart->delete()) {
			return $this->redirect('mycart');
		} else {
			return $this->redirect('mycart');
		}
	}

	public function actionUpdatecart() {
		if (yii::$app->request->isAjax) {
			$cart_id = Yii::$app->request->post()['cartid'];
			$qty = Yii::$app->request->post()['quantity'];
			if (isset($cart_id)) {
				$cart = Cart::findone($cart_id);
				$stock = Product::findOne($cart->product_id)->stock;
				if ($qty == 0 || $qty == "") {
					$qty = 1;
				}
				$cart->quantity = $qty > $stock ? $stock : $qty;
				if ($cart->save()) {
					if (isset(Yii::$app->user->identity->id)) {
						$condition = ['user_id' => Yii::$app->user->identity->id];
					} else {
						$condition = ['session_id' => Yii::$app->session['temp_user']];
					}
					$cart_items = Cart::find()->where($condition)->all();
					if (!empty($cart_items)) {
						$subtotal = $this->total($cart_items);
					}
					echo json_encode(array('msg' => 'success', 'subtotal' => sprintf('%0.2f', $subtotal)));
				} else {
					echo json_encode(array('msg' => 'error', 'content' => 'Cannot be Changed'));
				}
			} else {
				echo json_encode(array('msg' => 'error', 'content' => 'Id cannot be set'));
			}
		}
	}

	public function actionFindstock() {
		if (yii::$app->request->isAjax) {
			$cart_id = Yii::$app->request->post()['cartid'];
			$qty = Yii::$app->request->post()['quantity'];
			if (isset($cart_id)) {
				$cart = Cart::findone($cart_id);
				$product = Product::findOne($cart->product_id);
				if ($qty == 0 || $qty == "") {
					$qty = 1;
				}
				$quantity = $qty > $product->stock ? $product->stock : $qty;
				if ($product->offer_price == '0' || $product->offer_price == '') {
					$price = $product->price;
				} else {
					$price = $product->offer_price;
				}
				$total = $price * $quantity;
				echo json_encode(array('msg' => 'success', 'quantity' => $quantity, 'total' => sprintf('%0.2f', $total)));
			}
		}
	}

	public function actionCheckout() {
//        $this->redirect(['cart/proceed']);
		if (!isset(Yii::$app->user->identity->id)) {
			yii::$app->session['after_login'] = 'cart/proceed';
			$model = new CartsignupForm();
			if ($model->load(Yii::$app->request->post())) {
				$user = new User();
				$user->email = $model->email;
				$user->first_name = $model->first_name;
				$user->last_name = $model->last_name;
				$user->country = '1';
				$user->dob = '00-00-0000';
				$user->gender = '0';
				$user->country_code = Yii::$app->request->post()["CartsignupForm"]['country_code'];
				$user->mobile_no = $model->mobile_no;
				$user->email = $model->email;
				$user->password = '***guestpassword***';
				if ($user->save()) {
					if (Yii::$app->getUser()->login($user)) {
						$this->redirect(['cart/proceed']);
					}
				} else {
//                    var_dump($user->getErrors());
//                    exit;
					return $this->render('checkout', ['model' => $model, 'user' => $user]);
				}
			}
//            var_dump($model);exit;
			return $this->render('checkout', ['model' => $model]);
		} else {
			$this->redirect(['cart/proceed']);
		}
	}

	public function actionProceed() {
//        Yii::$app->session['orderid']='';exit;
		if (isset(Yii::$app->user->identity->id)) {
			if (isset(Yii::$app->session['temp_user'])) {
				/* Change tempuser cart to login user */
				$this->changecart(Yii::$app->session['temp_user']);
			}
			$cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
			$check = OrderMaster::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['not in', 'status', [4, 5]])->one();
			if (!empty($check)) {
				Yii::$app->session['orderid'] = $check->order_id;
			}
			if (!empty($cart)) {
				if (Yii::$app->session['orderid'] == '') {
//                    exit('hallo');
					$orders = $this->addOrder($cart);
					$this->orderProducts($orders, $cart);
					Yii::$app->session['orderid'] = $orders['order_id'];
					$this->redirect(array('checkout/checkout'));
				} else {
//                    exit('hai');
					$orders = $this->addOrder1($cart);
					$this->orderProducts($orders, $cart);
					$this->redirect(array('checkout/checkout'));
				}
			} else {
				$this->redirect(array('cart/mycart'));
			}
		} else if (Yii::$app->session['temp_user']) {
			yii::$app->session['after_login'] = 'cart/proceed';
			$this->redirect(array('site/login'));
		}
	}

	public function addOrder1($cart) {
		$model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
		if (!empty($model1)) {
			$model1->user_id = Yii::$app->user->identity->id;
			$total_amt = $this->total($cart);
			$model1->total_amount = $total_amt;
			$model1->net_amount = $this->net_amount($total_amt);
			$model1->status = 1;
//            date_default_timezone_set('Asia/Kolkata');
			$model1->order_date = date('Y-m-d H:i:s');
			$model1->doc = date('Y-m-d');
			if ($model1->save()) {
				return ['master_id' => $model1->id, 'order_id' => $model1->order_id];
			}
		} else {
			$this->redirect(array('cart/mycart'));
		}
	}

	public function addOrder($cart) {
		$model1 = new OrderMaster;
		if (isset(Yii::$app->user->identity->id)) {
			$serial_no = Settings::findOne(4)->value;
			$prefix = Settings::findOne(4)->prefix;
			$model1->order_id = $this->generateProductEan($prefix . $serial_no);
			$model1->user_id = Yii::$app->user->identity->id;
			$total_amt = $this->total($cart);
			$model1->total_amount = $total_amt;
			$model1->net_amount = $this->net_amount($total_amt);
			$model1->status = 1;
//            date_default_timezone_set('Asia/Kolkata');
			$model1->order_date = date('Y-m-d H:i:s');
			$model1->doc = date('Y-m-d');

			if ($model1->save()) {
				$this->Updateorderid($model1->order_id);
				return ['master_id' => $model1->id, 'order_id' => $model1->order_id];
			}
//            else {
//                var_dump($model1->getErrors());
//                exit;
//            }
		} else if (Yii::$app->session['temp_user']) {
			yii::$app->session['after_login'] = 'cart/proceed';
			$this->redirect(array('site/login'));
		}
	}

	public function orderProducts($orders, $carts) {
		foreach ($carts as $cart) {
			if ($cart->item_type == 1) {
				$prod_details = CreateYourOwn::findOne($cart->product_id);
			} else {
				$prod_details = Product::findOne($cart->product_id);
			}
			$check = OrderDetails::find()->where(['order_id' => $orders['order_id'], 'product_id' => $cart->product_id, 'item_type' => $cart->item_type])->one();
			if (!empty($check)) {
				$check->quantity = $cart->quantity;
				if ($cart->item_type == 1) {
					$price = $prod_details->tot_amount;
				} else {
					if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
						$price = $prod_details->price;
					} else {
						$price = $prod_details->offer_price;
					}
				}
				$check->amount = $price;
				$check->rate = ($cart->quantity) * ($price);
				$check->status = '0';
				$check->save();
			} else {
				$model_prod = new OrderDetails;
				$model_prod->master_id = $orders['master_id'];
				$model_prod->order_id = $orders['order_id'];
				$model_prod->product_id = $cart->product_id;
				$model_prod->quantity = $cart->quantity;
				if ($cart->item_type == 1) {
					$price = $prod_details->tot_amount;
					$model_prod->item_type = 1;
				} else {
					if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
						$price = $prod_details->price;
					} else {
						$price = $prod_details->offer_price;
					}
				}
				$model_prod->item_type = $cart->item_type;
				$model_prod->amount = $price;
				$model_prod->rate = ($cart->quantity) * ($price);
				$model_prod->status = '0';
				if ($model_prod->save()) {
//                    return TRUE;
				}
//                 else {
//                var_dump($model_prod->getErrors());
//                exit;
//            }
			}
		}
	}

	function cart_content($condition) {
		$cart_contents = Cart::findAll($condition);
		if (!empty($cart_contents)) {
			foreach ($cart_contents as $cart_content) {
				if ($cart_content->item_type == 1) {
//                    echo 'dsad';exit;
					$prod_details = CreateYourOwn::findOne($cart_content->product_id);
					$bottles = \common\models\Bottle::findOne($prod_details->bottle);
					$product_image = Yii::$app->basePath . '/../uploads/create_your_own/bottle/' . $bottles->id . '/small.' . $bottles->bottle_img;
					if (file_exists($product_image)) {
						$image = '<img src="' . Yii::$app->homeUrl . 'uploads/create_your_own/bottle/' . $bottles->id . '/small.' . $bottles->bottle_img . '" alt="item1" />';
					}
					$price = $prod_details->tot_amount;
				} else {
					$prod_details = Product::findOne($cart_content->product_id);
					if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
						$price = $prod_details->price;
					} else {
						$price = $prod_details->offer_price;
					}
					$product_image = Yii::$app->basePath . '/../uploads/product/' . $prod_details->id . '/profile/' . $prod_details->canonical_name . '.' . $prod_details->profile;
					if (file_exists($product_image)) {
						$image = '<img src="' . Yii::$app->homeUrl . 'uploads/product/' . $prod_details->id . '/profile/' . $prod_details->canonical_name . '_thumb.' . $prod_details->profile . '" alt="item1" />';
					} else {
						$image = '<img src="' . Yii::$app->homeUrl . 'uploads/product/profile_thumb.png" alt=""/>';
					}
				}
				$product_name = $cart_content->item_type == 1 ? 'Custom Perfume' : $prod_details->product_name;
				if (strlen($product_name) > 25) {
					$str = substr($product_name, 0, 25) . '...';
				} else {
					$str = $product_name;
				}
				echo '<li class="clearfix">
                       ' . $image . '
                       <span class="item-name" title="' . $product_name . '">' . $str . '</span>
                       <span class="item-price">' . $price . '</span>
                       <span class="item-quantity">Quantity: ' . $cart_content->quantity . '</span>
                       </li>';
//                <button title="Remove From Cart" class="remove-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
			}
		} else {
//            echo 'Cart box is Empty';
			echo '<div style="padding: 25px 0px; display: flow-root;">
                               <a href="' . yii::$app->homeUrl . '"><div class="col-md-12 empty-img text-center" >
                               <img style="margin: 0 auto; float: none; left: 0px; right: 0px; vertical-align: middle; margin-bottom: 10px;" class="img-responsive" src="' . Yii::$app->homeUrl . 'images/empty-cart.png"/>
                               </div>
                              <span class="col-md-12 text-center">Cart is Empty. Click to Continue</span></a>
                              </div>';
//                   Html::a ('<button class="green2">Continue shopping</button>,'.['site/index'].','.['class' => 'button']).
//                </div>';
		}
	}

	public function total($cart) {
		$subtotal = '0';
		foreach ($cart as $cart_item) {
			if ($cart_item->item_type == 1) {
				$subtotal += ($cart_item->rate * $cart_item->quantity);
			} else {
				$product = Product::findOne($cart_item->product_id);
				if ($product->offer_price == '0' || $product->offer_price == '') {
					$price = $product->price;
				} else {
					$price = $product->offer_price;
				}
				$subtotal += ($price * $cart_item->quantity);
			}
		}
		return $subtotal;
	}

	function net_amount($total_amt) {
		$limit = Settings::findOne(1)->value;
		$net_amnt = $total_amt;
		if ($limit > $total_amt) {
			$extra = Settings::findOne(2)->value;
			$net_amnt = $extra + $total_amt;
		}
		return $net_amnt;
	}

	public function generateProductEan($serial_no) {
		$orderid_exist = OrderMaster::find()->where(['order_id' => $serial_no])->one();
		if (!empty($orderid_exist)) {
			return $this->generateProductEan($serial_no + 1);
		} else {
			return $serial_no;
		}
	}

	public function Updateorderid($id) {
		$orderid = \common\models\Settings::findOne(4);
		$orderid->value = $id;
		$orderid->save();
		return;
	}

	function changecart($temp) {
		$models = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();
		foreach ($models as $msd) {
			$msd->user_id = Yii::$app->user->identity->id;
			$msd->save();
		}
	}

	function addtocart() {
		$datas = \common\models\CreateYourOwn::find()->where(['session_id' => Yii::$app->session['temp_create_yourown'], 'status' => 0])->orWhere(['user_id' => Yii::$app->user->identity->id, 'status' => 0])->all();
		if (!empty($datas)) {
			foreach ($datas as $msd) {
				$model = new Cart();
				$model->user_id = Yii::$app->user->identity->id;
				$model->product_id = $msd->id;
				$model->quantity = 1;
				$model->date = date('Y-m-d h:m:s');
				$model->rate = $msd->tot_amount;
				$model->item_type = 1;
				if ($model->save()) {
					$msd->session_id = '';
					$msd->user_id = Yii::$app->user->identity->id;
					$msd->status = 1;
					$msd->save();
				}
			}
		}
		return;
	}

	function date() {
//        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));
		$date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' - 8 days'));
		return $date;
	}

	public function actionRemoveWishlist() {
		if (yii::$app->request->isAjax) {
			$id = Yii::$app->request->post()['wish_list_id'];
			$model = \common\models\WishList::findOne($id);
			$model->delete();
			echo 1;
			exit;
		}
	}

}
