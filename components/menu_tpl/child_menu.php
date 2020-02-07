<li>
    <a href="<?= yii\helpers\Url::to(['/catalog/view', 'category_id' => $category['id']]) ?>" tabindex="-1">
        <?= $category['name'] ?> <span>200</span>
    </a>
    <span class="submenu-link submenu-link-js"></span>
    <?php if (isset($category['childs'])) { ?>
    <ul class="submenu submenu-js">
        <?= $this->getChildMenuHtml($category['childs']) ?>
    </ul>
    <?php } ?>
</li>