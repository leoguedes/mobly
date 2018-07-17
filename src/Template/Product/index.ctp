<h1>Produtos</h1>
<table>
    <tr>
        <th>Nome</th>
        <th>Preço</th>
    </tr>

    <!-- Aqui é onde iremos iterar nosso objeto de solicitação $articles, exibindo informações de artigos -->

    <?php foreach ($product as $prod): ?>
    <tr>
        <td>
            <?= $this->Html->link($prod->name, ['action' => 'view', $prod->id]) ?> -
            <?= $this->Html->link($prod->category[0]['name'], ['action' => 'view', $prod->id]) ?>
        </td>
        <td><?= $prod->price ?></td>
    </tr>
    <?php endforeach; ?>
</table>
