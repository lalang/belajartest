<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "menu_navigasi".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $nama
 * @property string $nama_en
 * @property string $link
 * @property string $link_en
 * @property string $target
 * @property integer $urutan
 * @property string $publish
 */
class MenuNavigasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_navigasi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'nama' => 'Nama',
            'nama_en' => 'Nama En',
            'link' => 'Link',
            'link_en' => 'Link En',
            'target' => 'Target',
            'urutan' => 'Urutan',
            'publish' => 'Publish',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\MenuNavigasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MenuNavigasiQuery(get_called_class());
    }
	
}
