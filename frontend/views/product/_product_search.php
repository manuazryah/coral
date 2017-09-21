<ul class="search-dropdown">
        <?php
        $p = 0;
        foreach ($products as $value) {
                $p++;
                $product_detail = common\models\Product::findOne($value);
                ?>
                <li class="<?= $p == 1 ? 'search-selected' : '' ?>" id="<?= $product_detail->product_name ?>"><?= $product_detail->product_name ?></li>
        <?php } ?>
</ul>

