<li>
    <p>
        <svg width="28" height="28">
            <use xlink:href="/images/svg-sprite.svg#<?= $item['img'] ?>"></use>
        </svg>
    </p>
    <a href="<?= yii\helpers\Url::to([$item['link']]) ?>" class="card__title link<?= ($this->active == $item['link']) ? ' active' : '' ?>"><?= $item['name'] ?></a>
    <!--<span class="card__sign card__sign_orange">3</span>-->
    <!--<span class="card__sign card__sign_red">!</span>-->
</li>