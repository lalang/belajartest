<?php

use yii\widgets\Pjax;

$this->title = 'Pelayanan - dashboard';
$this->params['breadcrumbs'][] = $this->title;

$style = '
.cd-top.cd-is-visible {
  visibility: visible;
  opacity: 1;
}
.cd-top.cd-fade-out {
  opacity: .5;
}
';
$this->registerCss($style);
$this->registerCssFile(YII::getAlias('@test').'/js/dc/dc.css');

$this->registerJsFile('https://d3js.org/d3.v3.min.js');
//$this->registerJsFile('/js/d3/d3.min.js');
$this->registerJsFile(YII::getAlias('@test').'/js/crossfilter/crossfilter.js');
$this->registerJsFile(YII::getAlias('@test').'/js/dc/dc.js');
$this->registerJsFile(YII::getAlias('@test').'/js/colorbrewer.js');
$this->registerJsFile(YII::getAlias('@test').'/js/d3dash_1.js');

$search = '
';
$this->registerJs($search);

Pjax::begin();

?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="dc-data-count">
                    <span>
                        <span class="filter-count"></span>&nbsp;perizinan&nbsp;terpilih
                        <!--
                        <span class="filter-count"></span>&nbsp;selected out of&nbsp;
                        <span class="total-count"></span>&nbsp;records
                        -->
                        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="javascript:dc.filterAll(); dc.renderAll();">Reset All</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Lokasi pelayanan</div>
            <div class="panel-body" id="body-chart-ring-loc">
                <div id="chart-ring-loc">
                    <!--
                    <span>
                        <a class="reset" href="javascript:locRingChart.filterAll();dc.redrawAll();" style="display: none;">Reset</a>
                    </span>
                    -->
                </div>
            </div>
            <div class="panel-footer"><span id="chart-ring-loc-sel">...</span></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Produk perizinan</div>
            <div class="panel-body" id="body-chart-row-izin">
                <div id="chart-row-izin"></div>
            </div>
            <div class="panel-footer"><span id="chart-row-izin-sel">...</span></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Periode pelayanan</div>
            <div class="panel-body" id="body-chart-period">
                <div id="chart-period"></div>
            </div>
            <div class="panel-footer"><span id="chart-period-sel">...</span></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Status produk</div>
            <div class="panel-body" id="body-chart-status">
                <div id="chart-status"></div>
            </div>
            <div class="panel-footer"><span id="chart-status-sel">...</span></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">...</div>
            <div class="panel-body">
            </div>
            <div class="panel-footer"><span id="-sel">...</span></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">...</div>
            <div class="panel-body">
            </div>
            <div class="panel-footer"><span id="-sel">...</span></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">...</div>
            <div class="panel-body">
            </div>
            <div class="panel-footer"><span id="-sel">...</span></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">...</div>
            <div class="panel-body">
            </div>
            <div class="panel-footer"><span id="-sel">...</span></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">...</div>
            <div class="panel-body">
            </div>
            <div class="panel-footer"><span id="-sel">...</span></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">...</div>
            <div class="panel-body">
            </div>
            <div class="panel-footer"><span id="-sel">...</span></div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<a href="#0" class="cd-top">Top</a>

<?php Pjax::end(); ?>

