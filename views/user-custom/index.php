<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\UserCustom;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Customs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-custom-index row">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Custom', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p class="col-12">
        <?= $this->render('_form', compact('user', 'userCustom')); ?>
    </p>
    <?php Pjax::begin(['id' => 'users']) ?>
    <div class="col-12">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'use_name',
                'use_lastname',
                'use_phone',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, UserCustom $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]);  ?>

    </div>
    <!-- <div class="pd-20 card-box mb-30">
        <table id="recmer-tabla-orden" class="table table-striped multiple-select-row data-table-export nowrap" style="width:100%">
        </table>
    </div> -->
    <?php Pjax::end() ?>




</div>

<!-- <script type="text/javascript">
    createTable();

    function createTable() {
        var columns = [{
                title: 'Nombre',
                target: 1,
                data: function(item) {
                    return item.per_nombre;
                }
            },
            {
                title: 'Apellido Paterno',
                target: 1,
                data: function(item) {
                    return item.per_materno;
                }
            },
            {
                title: 'Apellido Materno',
                target: 1,
                data: function(item) {
                    return item.per_paterno;
                }
            },
            {
                title: 'Punto De Venta',
                target: 1,
                data: function(item) {
                    return item.punven_nombre;
                }
            },
            {
                orderable: false,
                title: 'Opciones',
                target: 8,
                className: 'no-exportar',
                data: function(item) {
                    let actions = `<a class="btn btn-info" href=/pv-personal/view?id=${item.punvenper_id}
                                title="Ver producto"><span class="icon-copy fa fi-eye" aria-hidden="true">
                                </span></span></a>
                                <a class="btn btn-warning" href=/pv-personal/update?id=${item.punvenper_id}
                                title="Ver Actualizar producto"><span class="icon-copy fa fa-pencil" aria-hidden="true">
                                </span></span></a>`;
                    return actions;
                }
            },
        ];
        table = $('#recmer-tabla-orden').DataTable({
            responsive: true,
            'processing': true,
            'serverSide': true,
            dom: 'lfrt<"bottom"ip>',
            language: {
                loadingRecords: "<span class=loader></span>",
                lengthMenu: "Mostrar _MENU_ registros por página",
                zeroRecords: "No existen registros...",
                infoEmpty: "Los datos no se han cargado...",
                infoFiltered: "(filtrando de _MAX_ registros)",
                sInfo: `Mostrando _START_-_END_  de _TOTAL_ registros.`,
                sSearch: "Buscar: ",
                searchPlaceholder: "Buscar...",
                paginate: {
                    "previous": "<<",
                    "next": ">>"
                }
            },
            columns: columns,
            ajax: function(data, callback, settings) {
                //console.log(data);
                $.get('/pv-personal/', {
                    limite: data.length,
                    inicio: data.start,
                    search: data.search.value,
                    columna: data.order[0].column,
                    dir: data.order[0].dir
                }, function(res) {
                    console.log(res);
                    callback({
                        recordsTotal: res.count,
                        recordsFiltered: res.count,
                        data: res.objects
                    });
                }, );
            },
        });
        // table.ajax.reload();
    }
</script> -->