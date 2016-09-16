<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataAkta as BaseIzinPariwisataAkta;

/**
 * This is the model class for table "izin_pariwisata_akta".
 */
class IzinPariwisataAkta extends BaseIzinPariwisataAkta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id'], 'integer'],
            [['tanggal_akta', 'tanggal_pengesahan'], 'safe'],
            [['nomor_akta', 'nama_notaris', 'nomor_pengesahan'], 'string', 'max' => 50]
        ]);
    }
	
}
