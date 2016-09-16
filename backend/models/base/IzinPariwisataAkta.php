<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_akta".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property string $nomor_akta
 * @property string $tanggal_akta
 * @property string $nama_notaris
 * @property string $nomor_pengesahan
 * @property string $tanggal_pengesahan
 *
 * @property \backend\models\IzinPariwisata $izinPariwisata
 */
class IzinPariwisataAkta extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id'], 'integer'],
            [['tanggal_akta', 'tanggal_pengesahan'], 'safe'],
            [['nomor_akta', 'nama_notaris', 'nomor_pengesahan'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_akta';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'nomor_akta' => Yii::t('app', 'Nomor Akta'),
            'tanggal_akta' => Yii::t('app', 'Tanggal Akta'),
            'nama_notaris' => Yii::t('app', 'Nama Notaris'),
            'nomor_pengesahan' => Yii::t('app', 'Nomor Pengesahan'),
            'tanggal_pengesahan' => Yii::t('app', 'Tanggal Pengesahan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisata()
    {
        return $this->hasOne(\backend\models\IzinPariwisata::className(), ['id' => 'izin_pariwisata_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataAktaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataAktaQuery(get_called_class());
    }
}
