<?php

use yii\web\View;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\Pjax;

$this->title = 'User Customs';
$this->params['breadcrumbs'][] = $this->title;

// $this->registerJs(
//     <<< JS
//         $(document).ready( function () {
//             // $('').DataTable();
//             alert('2222')
//         } );
//     JS,
//     View::POS_END
// );
YiiAsset::register($this);

?>
<div class="user-custom-index row">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Custom', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p class="col-12">
        <?= $this->render('_form', compact('user', 'userCustom')); ?>
    </p>

    <button id="button_id">asdsad</button>
    <?php Pjax::begin(['id' => 'users']) ?>
    <div class="pd-20 card-box mb-30">
        <table id="datatable" class="table table-striped multiple-select-row data-table-export nowrap" style="width:100%">
        </table>
    </div>
    <?php Pjax::end() ?>




</div>

<script type="text/javascript">
    // $(document).ready(function() {
    //     // $('').DataTable();
    //     alert('ásdasd')
    // });

    // alert('111');

    let asd = $(document).ready(function() {
        $('#button_id').click(function() {
            $('#usercustom-use_name').value = 'asdasd';
        })
    });
</script>