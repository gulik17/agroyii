<li>
    <p><?= $category['name'] ?> <span>200</span></p>
    <span class="submenu-link submenu-link-js"></span>
    <?php if (isset($category['childs'])) { ?>
    <ul class="submenu submenu-js">
        <?= $this->getChildMenuHtml($category['childs']) ?>
    </ul>
    <?php } ?>
</li>