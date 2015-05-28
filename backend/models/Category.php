<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $identifier
 * @property string $title
 * @property integer $visible
 * @property integer $rating
 * @property integer $parent
 * @property integer $type
 * @property integer $created_date
 *
 * @property Gallery $gallery
 */
class Category extends \yii\db\ActiveRecord
{
    public static $rating = [0,1,2,3,4,5,6,7,8,9];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'visible', 'rating', 'parent', 'type', 'created_date'], 'required'],
            [['visible', 'rating', 'parent', 'type', 'created_date'], 'integer'],
            [['title'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => 'Identifier',
            'title' => 'Заголовок',
            'visible' => '',
            'rating' => 'Рейтинг',
            'parent' => 'Родительская категория',
            'type' => 'Тип',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['cat_id' => 'identifier']);
    }
}
