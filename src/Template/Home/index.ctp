<?= $this->Html->css('home_grid.css'); ?>
<div class="grid-container">
    <?php $products = isset($categoryProduct->product) ? $categoryProduct->product : $product; ?>
    <?php foreach ($products as $product): ?>
        <div class="item1">
            <?php
            echo $this->Html->link($this->Html->image(
                            $product->image, array('width' => '200px')), ['controller' => 'Product',
                'action' => 'view', $product->id], array('escape' => false));
            ?>
            <div class='title'>
                <?=
                $this->Html->link($product->name, ['controller' => 'Product',
                    'action' => 'view', $product->id])
                ?><br>
                <b><?=
                    $this->Html->link('R$' . $product->price, ['controller' => 'Product',
                        'action' => 'view', $product->id])
                    ?></b>

            </div>
        </div>
    <?php endforeach; ?>

</div>