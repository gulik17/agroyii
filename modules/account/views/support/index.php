<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\Support;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/account/']];
$this->params['breadcrumbs'][] = $this->title; ?>

<?= Breadcrumbs::widget([
    'homeLink' => ['label' => 'АгроСити', 'url' => '/'],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="row">
    <div class="col-lg-9">
        <h2 class="account__title-h2 title-h2"><?= $this->title ?></h2>
        <div class="change-block">
            <p>Пришлите нам описание возникшей проблемы, и мы сделаем всё для её устранения.</p>
        </div>
            <?php
            $form = ActiveForm::begin([
                'options' => ['class' => 'product-card__info card'],
            ]); ?>
            <div class="description__row">
                <div class="description__select-wrap">
                    <?= $form->field($support, 'theme', ['inputOptions' => ['class' => 'description__input']]) ?>
                </div>
                <div class="description__select-wrap">
                    <?= $form->field($support, 'name', ['inputOptions' => ['class' => 'description__input']]) ?>
                </div>
            </div>
            <div class="description__row">
                <div class="description__select-wrap">
                    <?= $form->field($support, 'email', ['inputOptions' => ['class' => 'description__input']]) ?>
                </div>
                <div class="description__select-wrap">
                    <?= $form->field($support, 'imageFiles[]', [
                            'template' => "<label class=\"modal__file-attached download d-flex\" for=\"support-imagefiles\">"
                        . "<svg width=\"35\" height=\"35\"><use xlink:href=\"/images/svg-sprite.svg#paper-clip\"></use></svg>"
                        . "<p><span class=\"card__title\">Прикрепите файлы</span><br>"
                        . "<span class=\"card__text_fade\">до 10 файлов по 1 мб</span></p>"
                        . "{input}</label>\n{error}"
                        ])->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
                </div>
            </div>
            <div class="modal__message-download files-wrap-js d-flex align-items-center"></div>
            <div class="description__row support__textarea-wrap">
                <?= $form->field($support, 'description', ['inputOptions' => ['class' => 'description__input support__textarea']])->textarea(['rows' => '6']) ?>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn_green support__btn']) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-3">
        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 308px;">
            <aside class="sidebar__menu card card-sticky-js">
                <ul>
                    <?= \app\components\AccountMenuWidget::widget(['tpl' => 'amenu', 'active' => '/account/support']); ?>
                </ul>
            </aside>
        </div>
    </div>
</div>