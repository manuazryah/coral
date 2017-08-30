<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_master".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $total_amount
 * @property string $order_date
 * @property integer $ship_address_id
 * @property integer $bill_address_id
 * @property integer $currency_id
 * @property string $user_comment
 * @property integer $payment_mode
 * @property integer $admin_comment
 * @property integer $payment_status
 * @property integer $admin_status
 * @property string $doc
 * @property integer $shipping_method
 */
class OrderMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'total_amount', 'order_date'], 'required'],
            [['user_id', 'ship_address_id', 'bill_address_id', 'currency_id', 'payment_mode', 'admin_comment', 'payment_status', 'admin_status', 'shipping_method'], 'integer'],
            [['total_amount'], 'number'],
            [['order_date', 'doc'], 'safe'],
            [['user_comment'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'total_amount' => 'Total Amount',
            'order_date' => 'Order Date',
            'ship_address_id' => 'Ship Address ID',
            'bill_address_id' => 'Bill Address ID',
            'currency_id' => 'Currency ID',
            'user_comment' => 'User Comment',
            'payment_mode' => 'Payment Mode',
            'admin_comment' => 'Admin Comment',
            'payment_status' => 'Payment Status',
            'admin_status' => 'Admin Status',
            'doc' => 'Doc',
            'shipping_method' => 'Shipping Method',
        ];
    }
}
