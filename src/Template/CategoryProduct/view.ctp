<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoryProduct $categoryProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category Product'), ['action' => 'edit', $categoryProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category Product'), ['action' => 'delete', $categoryProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoryProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Category Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoryProduct view large-9 medium-8 columns content">
    <h3><?= h($categoryProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $categoryProduct->has('category') ? $this->Html->link($categoryProduct->category->name, ['controller' => 'Category', 'action' => 'view', $categoryProduct->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $categoryProduct->has('product') ? $this->Html->link($categoryProduct->product->name, ['controller' => 'Product', 'action' => 'view', $categoryProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoryProduct->id) ?></td>
        </tr>
    </table>
</div>
