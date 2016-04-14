<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_skdp_akta".
 *
 * @property integer $id
 * @property integer $izin_skdp_id
 * @property string $nomor_akta
 * @property string $tanggal_akta
 * @property string $nama_notaris
 * @property string $nomor_pengesahan
 * @property string $tanggal_pengesahan
 *
 * @property \backend\models\IzinSkdp $izinSkdp
 */
class IzinSkdpAkta extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_skdp_id'], 'integer'],
            [['tanggal_akta', 'tanggal_pengesahan'], 'safe'],
            [['nomor_akta', 'nama_notaris', 'nomor_pengesahan'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_skdp_akta';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_skdp_id' => Yii::t('app', 'Izin Skdp ID'),
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
    public function getIzinSkdp()
    {
        return $this->hasOne(\backend\models\IzinSkdp::className(), ['id' => 'izin_skdp_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinSkdpAktaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinSkdpAktaQuery(get_called_class());
    }
}
