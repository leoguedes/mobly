<?= $this->Html->css('cart.css'); ?>
<table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->

    <!-- Table Header -->
    <thead>
        <tr>
            <th></th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
    </thead>
    <!-- Table Header -->

    <!-- Table Body -->
    <tbody>
        <?php foreach ($sessionInfo['Products'] as $product): ?>
            <tr>
                <td><?= $this->Html->image($product['image'], array('width' => '120')); ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['count'] ?></td>
                <td>R$<?= $product['price'] ?></td>
            </tr><!-- Table Row -->
        <?php endforeach; ?>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>R$<?= $sessionInfo['Order']['Total'] ?></td>

        </tr>
    </tbody>
</tbody>
<!-- Table Body -->

</table>