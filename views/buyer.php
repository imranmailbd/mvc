<?php
/** @var $model \app\models\Buyer */
?>

<h2>Buyer Registration Form</h2>
<div id="SuccMsg"></div>
<?php $form = \app\core\form\Form::begin('http://localhost/mvc/buyer','post') ?>
    <div class="row">
        <div class="col">
            <?php  echo $form->field($model,'buyer') ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model,'buyer_email') ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php  echo $form->field($model,'receipt_id') ?>
        </div>

        <div class="col">
            <?php  echo $form->field($model,'amount') ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php  echo $form->field($model,'city') ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model,'phone') ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php  echo $form->field($model,'entry_by') ?>
        </div>
        <div class="col">
            <?php  echo $form->field($model,'note') ?>
        </div>
    </div>

<button type="submit" id="subButton" class="btn btn-primary">Submit</button>
<?php echo \app\core\form\Form::end() ?>
