<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "create_your_own".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $session_id
 * @property string $order_id
 * @property integer $gender
 * @property integer $character_id
 * @property integer $scent
 * @property string $note
 * @property integer $bottle
 * @property string $label-1
 * @property string $label-2
 * @property string $tot_amount
 * @property integer $user_status
 * @property integer $admin_status
 * @property string $comments
 */
class CreateYourOwn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'create_your_own';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'gender', 'character_id', 'scent', 'bottle', 'user_status', 'admin_status'], 'integer'],
            [['tot_amount'], 'number'],
            [['comments'], 'string'],
            [['session_id', 'order_id', 'note', 'label-1', 'label-2'], 'string', 'max' => 100],
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
            'session_id' => 'Session ID',
            'order_id' => 'Order ID',
            'gender' => 'Gender',
            'character_id' => 'Character ID',
            'scent' => 'Scent',
            'note' => 'Note',
            'bottle' => 'Bottle',
            'label-1' => 'Label 1',
            'label-2' => 'Label 2',
            'tot_amount' => 'Tot Amount',
            'user_status' => 'User Status',
            'admin_status' => 'Admin Status',
            'comments' => 'Comments',
        ];
    }
}
