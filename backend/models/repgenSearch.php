<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use backend\models\repgen;
use yii\db\Query;
use app\models\RepgenSyntax;
use backend\models\JenisIzin;

/**
 * backend\models\repgenSearch represents the model behind the search form about `backend\models\repgen`.
 */
 class repgenSearch extends repgen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NoReg', 'NoReg_TDP_Simultan', 'Jenis_Izin', 'No_SK', 'Tanggal_SK', 'Tanggal_Expired', 'NPWP', 'Nama_Perusahaan', 'Nama_Pimpinan', 'Jabatan_Pimpinan', 'Alamat_Perusahaan', 'Bentuk_Perusahaan', 'Telpon_Perusahaan', 'Fax_Perusahaan', 'Kelembagaan', 'KBLI_1', 'KBLI_2', 'KBLI_3', 'KBLI_4', 'KBLI_5', 'Status_Perusahaan', 'Zonasi', 'Kewenangan', 'kode_lokasi', 'Status_Permohonan'], 'safe'],
            [['Kekayaan_Bersih_Perusahaan', 'Modal_Disetor', 'Aktiva_Tetap_Investasi', 'Aktiva_Tetap_Peralatan'], 'number'],
            [['kode_propinsi', 'kode_kabupaten', 'kode_kecamatan', 'kode_kelurahan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $jenisIzin = NULL, $view = NULL, $columns = NULL, $where = NULL, $group = NULL, $order = NULL)
    {
        //$query = repgen::find();

        /*$connection = new yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=ptspdki_db',
            'username' => 'root',
            'password' => 'admin',
        ]);
        $connection->open();*/

        // return a set of rows. each row is an associative array of column names and values.
        // an empty array is returned if the query returned no results
        /*$command = $connection->createCommand('SELECT * FROM satuan');
        $posts = $command->queryAll();*/

        // return a single row (the first row)
        // false is returned if the query has no result
        /*$post = Yii::$app->db->createCommand('SELECT * FROM post WHERE id=1')
                   ->queryOne();*/

        // return a single column (the first column)
        // an empty array is returned if the query returned no results
        /*$titles = Yii::$app->db->createCommand('SELECT title FROM post')
                     ->queryColumn();*/

        // return a scalar value
        // false is returned if the query has no result
        /*$count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM post')
                     ->queryScalar();*/

        if ($columns) {
            $cols = implode(',', $columns);
        } else {
            //$cols = 'NoReg';
            //$where = 'NoReg IS NULL';
            $cols = 'NoReg';
            $where = 'NoReg IS NULL';
        }
        
        $where = str_replace('NoReg', 'a.kode_registrasi', $where);
        $where = str_replace('tanggal_sk', 'a.tanggal_izin', $where);
        
        $cols = str_replace('Counts', 'Count(*) AS Counts', $cols);

        $idJenisIzin = JenisIzin::findOne(['nama' => $jenisIzin])->id;
        $sqlselect = RepgenSyntax::findOne(['jenis_izin_id' => $idJenisIzin])->sqlsyntax;
        $sqlselect = $sqlselect." AND ".$where;
        $sqlcount = RepgenSyntax::findOne(['jenis_izin_id' => $idJenisIzin])->sqlfrom;
        $sqlcount = "select COUNT(*) FROM ".$sqlcount." WHERE ".$where;
        $count = Yii::$app->db->createCommand($sqlcount)->queryScalar();
        
        //$query = Yii::$app->db->createCommand($command)->queryAll();
        //$query = (new Query)->select($cols)->from($view)->where($where)->groupBy($group)->orderBy($order);

        /*
            'pagination' => false,
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        */
        
        $dataProvider = new SqlDataProvider([
            'sql' => $sqlselect,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 15,
            ],
            /*
            'sort' => [
                'attributes' => [
                    'title',
                    'view_count',
                    'created_at',
                ],
            ],
            */
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        return $dataProvider;

        /*
        $query->andFilterWhere([
            'Tanggal_SK' => $this->Tanggal_SK,
            'Tanggal_Expired' => $this->Tanggal_Expired,
            'Kekayaan_Bersih_Perusahaan' => $this->Kekayaan_Bersih_Perusahaan,
            'Modal_Disetor' => $this->Modal_Disetor,
            'Aktiva_Tetap_Investasi' => $this->Aktiva_Tetap_Investasi,
            'Aktiva_Tetap_Peralatan' => $this->Aktiva_Tetap_Peralatan,
            'kode_propinsi' => $this->kode_propinsi,
            'kode_kabupaten' => $this->kode_kabupaten,
            'kode_kecamatan' => $this->kode_kecamatan,
            'kode_kelurahan' => $this->kode_kelurahan,
        ]);

        $query->andFilterWhere(['like', 'NoReg', $this->NoReg])
            ->andFilterWhere(['like', 'NoReg_TDP_Simultan', $this->NoReg_TDP_Simultan])
            ->andFilterWhere(['like', 'Jenis_Siup', $this->Jenis_Siup])
            ->andFilterWhere(['like', 'Jenis_Izin', $this->Jenis_Izin])
            ->andFilterWhere(['like', 'No_SK', $this->No_SK])
            ->andFilterWhere(['like', 'NPWP', $this->NPWP])
            ->andFilterWhere(['like', 'Nama_Perusahaan', $this->Nama_Perusahaan])
            ->andFilterWhere(['like', 'Nama_Pimpinan', $this->Nama_Pimpinan])
            ->andFilterWhere(['like', 'Jabatan_Pimpinan', $this->Jabatan_Pimpinan])
            ->andFilterWhere(['like', 'Alamat_Perusahaan', $this->Alamat_Perusahaan])
            ->andFilterWhere(['like', 'Bentuk_Perusahaan', $this->Bentuk_Perusahaan])
            ->andFilterWhere(['like', 'Telpon_Perusahaan', $this->Telpon_Perusahaan])
            ->andFilterWhere(['like', 'Fax_Perusahaan', $this->Fax_Perusahaan])
            ->andFilterWhere(['like', 'Kelembagaan', $this->Kelembagaan])
            ->andFilterWhere(['like', 'KBLI_1', $this->KBLI_1])
            ->andFilterWhere(['like', 'KBLI_2', $this->KBLI_2])
            ->andFilterWhere(['like', 'KBLI_3', $this->KBLI_3])
            ->andFilterWhere(['like', 'KBLI_4', $this->KBLI_4])
            ->andFilterWhere(['like', 'KBLI_5', $this->KBLI_5])
            ->andFilterWhere(['like', 'Status_Perusahaan', $this->Status_Perusahaan])
            ->andFilterWhere(['like', 'Zonasi', $this->Zonasi])
            ->andFilterWhere(['like', 'Kewenangan', $this->Kewenangan])
            ->andFilterWhere(['like', 'kode_lokasi', $this->kode_lokasi])
            ->andFilterWhere(['like', 'Status_Permohonan', $this->Status_Permohonan]);
        */
    }
}