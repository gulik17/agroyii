<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;

AppAsset::register($this);?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?= yii\helpers\Url::base(true) ?>">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/images/agro-gator-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/agro-gator-180x180.png">
    <link rel="apple-touch-icon" sizes="192x192" href="/images/agro-gator-192x192.png">
    <link rel="apple-touch-icon" sizes="270x270" href="/images/agro-gator-270x270.png">
    <?php $this->head() ?>
</head>
<body class="page page-inner d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <!-- Header -->
    <header class="header header-inner">
        <div class="header__top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-4 col-5">
                        <button type="button" class="header__menu-btn btn-toggle-js">agro-gator</button>
                        <ul class="header__menu block-toggle-js">
                            <li><a href="#" class="link">a-platforma</a></li>
                            <li class="active"><a href="#" class="link">agro-gator</a></li>
                            <li><a href="#" class="link">agro-ct</a></li>
                            <li><a href="#" class="link">e-agro</a></li>
                            <li><a href="#" class="link">agro-live</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-8 col-7">
                        <div class="header__links d-flex justify-content-sm-end justify-content-center">
                            <a href="tel:+74951207447" class="header__phone link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#phone"></use>
                                </svg>
                                <span>+7 495 120 74 47</span>
                            </a>
                            <a href="mailto:" class="header__phone link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#mail"></use>
                                </svg>
                                <span>Написать нам</span>
                            </a>
                            <a href="#" class="header__phone link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#map-pin"></use>
                                </svg>
                                <span>Контакты</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-5 d-flex justify-content-between align-items-sm-end align-items-start">
                        <a href="<?= yii\helpers\Url::to('/') ?>" class="link d-sm-flex d-block align-items-end justify-content-between">
                            <img src="/images/agro-gator.svg" alt="АгроСити" class="img-fluid header__logo">
                            <span class="header__logo-description">Агрегатор предложений<br> поставщиков</span>
                        </a>
                        <button type="button" class="header__hamburger hamburger-js">
                            <svg>
                                <use xlink:href="/images/svg-sprite.svg#menu"></use>
                            </svg>
                            <svg>
                                <use xlink:href="/images/svg-sprite.svg#close"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-sm-flex d-block">
                        <form method="GET" action="<?= yii\helpers\Url::to(['/catalog/search']) ?>" class="header__form form d-flex align-items-center">
                            <input type="text" name="q" placeholder="Товар, услуга или поставщик">
                            <button type="button">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#search"></use>
                                </svg>
                            </button>
                        </form>
                        <a href="#" class="link btn btn_green header__btn">Подать объявление</a>
                    </div>
                </div>
                <div class="header__bottom">
                    <p class="sidebar__title-h3 title-h3 title-h3_white">
                        Меню
                        <span class="btn-close btn-close-js"></span>
                    </p>
                    <ul class="header__menu-main header__menu-main_1">
                        <li class="submenu-link-js">
                            <a href="<?= yii\helpers\Url::to('/catalog') ?>" class="link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#food"></use>
                                </svg>
                                Продукция
                            </a>
                            <span class="submenu-link submenu-link-js"></span>
                            <ul id="w1" class="submenu">
                                <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
                            </ul>
                        </li>
                        <li><a href="<?= yii\helpers\Url::to('/provider') ?>">Поставщики</a></li>
                        <li><a href="<?= yii\helpers\Url::to('/services') ?>">Услуги</a></li>
                        <li><a href="<?= yii\helpers\Url::to('/info') ?>">Информация</a></li>
                    </ul>

                    <ul class="header__menu-main header__menu-main_2 justify-content-end">
                        <li>
                            <a href="<?= yii\helpers\Url::to('/favorites') ?>" class="header__bookmark link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#bookmark"></use>
                                </svg>
                                <span>Закладки</span>
                                <span class="header__bookmark-number<? if(!count($_SESSION['favorites'])) echo ' d-none' ?>"><?= count($_SESSION['favorites']) ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= yii\helpers\Url::to(['/account']) ?>" class="header__user link">
                                <svg>
                                    <use xlink:href="/images/svg-sprite.svg#user"></use>
                                </svg>
                                <span>Личный кабинет</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->

    <main class="<?= Yii::$app->params['mainCss'] ?>">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <!--Footer-->
    <footer class="footer mt-auto">
        <div class="footer__top">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="#" class="footer__link link">Правовая информация</a>
                <a href="#" class="link"><img src="/images/a-platforma.svg" alt="" class="footer__logo"></a>
                <a href="#" class="footer__link link">Политика конфиденциальности</a>
            </div>
        </div>
        <div class="footer__bottom">
            <p>Разработка сайта – <a href="#">интернет-агенство «Диаграмма»</a></p>
        </div>
    </footer>
    <!--Footer End-->
    
    <!--Modal-->
    <div class="profile-modal bill-modal modal mfp-hide mfp-fade" id="file-rename">
        <p class="modal_title">Переименовать файл</p>
        <p class="modal__sub-title">«Капуста белокачанная»</p>
        <form action="#" class="modal__form form">
            <label for="new-name" class="form__label">Новое название:</label>
            <input type="text" id="new-name" class="description__input" name="new-name">
            <p class="modal__text">Пишите кириллицей на русском языке</p>
            <div class="form__bottom">
                <button type="button" class="form__btn_green btn btn_green">Сохранить</button>
            </div>
        </form>
    </div>
    <div class="message-modal modal mfp-hide mfp-fade" id="message-modal">
        <div class="modal__top">
            <p>Переписка с пользователем</p>
            <div class="d-flex align-items-baseline">
                <p class="modal_title">ИП Иванова А.В.</p>
                <button type="button" class="card__btn-unblock" data-user-id="">Заблокировать</button>
            </div>
        </div>
        <div class="modal__body">
            <ul>
                
            </ul>
        </div>
        <div class="modal__bottom">
            <div class="header__form d-flex align-items-center">
                <div role="textbox" aria-multiline="true" id="message-send" contenteditable="true" spellcheck="true"></div>
                <button type="button">
                    <svg>
                        <use xlink:href="/images/svg-sprite.svg#send-plane"></use>
                    </svg>
                </button>
            </div>
            <div class="modal__message-download files-wrap-js d-flex align-items-center"></div>
            <label for="file" id="fileAttached" class="modal__file-attached download">
                <svg width="35" height="35">
                    <use xlink:href="/images/svg-sprite.svg#paper-clip"></use>
                </svg>
                <p><span class="card__title">Прикрепите файлы</span><br><span class="card__text_fade">до 10 файлов по 1 мб</span></p>
                <input type="file" id="file">
            </label>
        </div>
    </div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
