<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinSkdpAkta as BaseIzinSkdpAkta;

/**
 * This is the model class for table "izin_skdp_akta".
 */
class IzinSkdpAkta extends BaseIzinSkdpAkta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_skdp_id'], 'integer'],
            [['tanggal_akta', 'tanggal_pengesahan'], 'safe'],
            [['nomor_akta', 'nama_notaris', 'nomor_pengesahan'], 'string', 'max' => 50]
        ]);
    }
	
}
