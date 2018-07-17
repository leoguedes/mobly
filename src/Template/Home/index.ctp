<style>
    .grid-container {
        display: grid;
        grid-template: 250px / auto auto auto;
        grid-gap: 60px;
        padding: 10px;
    }
    .grid-container>div {
        background-color: rgba(255, 255, 255, 0.8);
        text-align: center;
        padding:20px 0;
        font-size: 14px;
    }
    .title {
        width: 300px;
        text-align: center;
        margin: 0 auto;
        margin-top: 10px;

    }
    .title a {
        color: #787878;
        text-decoration: none;
    }
</style>

<div class="grid-container">
    <?php foreach ($product as $prod):?>
    <div class="item1">
        <?php echo $this->Html->link($this->Html->image(
                    $prod->image,array('width'=>'200px')),
                                ['controller' => 'Product',
                                    'action' => 'view', $prod->id],
                                array('escape' => false));
        ?>
        <div class='title'>
            <?= $this->Html->link($prod->name, ['action' => 'view', $prod->id]) ?><br>
            <b><?= $this->Html->link('R$'.$prod->price, ['action' => 'view', $prod->id]) ?></b>

        </div>
    </div>
    <?php endforeach; ?>

</div>