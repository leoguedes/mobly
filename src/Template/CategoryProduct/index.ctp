<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoryProduct[]|\Cake\Collection\CollectionInterface $categoryProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Category Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoryProduct index large-9 medium-8 columns content">
    <h3><?= __('Category Product') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoryProduct as $categoryProduct): ?>
            <tr>
                <td><?= $this->Number->format($categoryProduct->id) ?></td>
                <td><?= $categoryProduct->has('category') ? $this->Html->link($categoryProduct->category->name, ['controller' => 'Category', 'action' => 'view', $categoryProduct->category->id]) : '' ?></td>
                <td><?= $categoryProduct->has('product') ? $this->Html->link($categoryProduct->product->name, ['controller' => 'Product', 'action' => 'view', $categoryProduct->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoryProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoryProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoryProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoryProduct->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
