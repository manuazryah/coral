<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_details".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property string $amount
 * @property string $rate
 * @property string $doc
 * @property integer $status
 */
class OrderDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'quantity', 'amount', 'rate'], 'required'],
            [['order_id', 'product_id', 'quantity', 'status'], 'integer'],
            [['amount', 'rate'], 'number'],
            [['doc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'amount' => 'Amount',
            'rate' => 'Rate',
            'doc' => 'Doc',
            'status' => 'Status',
        ];
    }
}
