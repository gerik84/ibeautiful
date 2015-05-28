<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mime_type".
 *
 * @property integer $identifier
 * @property string $mime_type
 */
class MimeType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mime_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mime_type'], 'required'],
            [['mime_type'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => 'Identifier',
            'mime_type' => 'Mime Type',
        ];
    }
}
