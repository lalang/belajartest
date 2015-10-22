<?php

namespace frontend\models;

use Yii;
use yii\helpers;
use \yii\db\Query;

class AllSearch extends \yii\db\ActiveRecord {

    public function page($cari) {
        $query = new Query;
        $query->select('judul,judul_seo')
                ->orWhere(['like', 'judul', $cari])
                ->orWhere(['like', 'judul_seo', $cari])
                ->from('page');
        $rows = $query->all();
        return $rows;
    }

    public function berita($cari) {
        $query = new Query;
        $query->select('judul_seo,judul, isi_berita')
                ->orWhere(['like', 'judul', $cari])
                ->orWhere(['like', 'isi_berita', $cari])
                ->from('berita');
        $rows = $query->all();
        return $rows;
    }

    public function bidang($cari) {
        $query = new Query;
        $query->select('id,nama')
                ->andWhere(['like', 'nama', $cari])
                ->from('bidang');
        $rows = $query->all();
        return $rows;
    }

    public function faq($cari) {
        $query = new Query;
        $query->select('id,tanya')
                ->andWhere(['like', 'tanya', $cari])
                ->from('faq');
        $rows = $query->all();
        return $rows;
    }

    public function izin($cari) {
        $query = new Query;
        $query->select('id,nama')
                ->andWhere(['like', 'nama', $cari])
                ->from('izin');
        $rows = $query->all();
        return $rows;
    }

}

?>