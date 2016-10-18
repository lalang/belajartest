<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class D3dashController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetjson()
    {
        $username = "admin";
        $password = "jakart3kit3";
        $host = "10.15.34.83";
        $database = "ptsp_talend";

        $server = mysql_connect($host, $username, $password);

        $connection = mysql_select_db($database, $server);

        $myquery = "SELECT lokasi, jenisizin, thbl, status, kaun FROM dtwh_dash_1;";

        $result = mysql_query($myquery);
        if (!$result) {
            echo mysql_error();
            die;
        }

        $data = array();

        for ($x = 0; $x < mysql_num_rows($result); $x++) {
            $data[] = mysql_fetch_assoc($result);
        }

        mysql_close($server);
        
        header("Content-type: text/csv");
        echo json_encode($data);
    }
}
