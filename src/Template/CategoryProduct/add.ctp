<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoryProduct $categoryProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Category Product'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoryProduct form large-9 medium-8 columns content">
    <?= $this->Form->create($categoryProduct) ?>
    <fieldset>
        <legend><?= __('Add Category Product') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $category]);
            echo $this->Form->control('product_id', ['options' => $product]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
