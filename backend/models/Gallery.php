<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $identifier
 * @property integer $cat_id
 * @property string $url
 * @property integer $created_date
 * @property integer $rating
 *
 * @property Category $cat
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'url', 'created_date', 'rating'], 'required'],
            [['cat_id', 'created_date', 'rating'], 'integer'],
            [['url'], 'string'],
            [['cat_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => 'Identifier',
            'cat_id' => 'Cat ID',
            'url' => 'Url',
            'created_date' => 'Created Date',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['identifier' => 'cat_id']);
    }
}
