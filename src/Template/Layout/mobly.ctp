<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mobly Teste</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $this->Html->css('main.css'); ?>
    </head>
    <body>

        <header>

            <div class='shop_cart'>
                <?php // echo $this->Html->link('Mobly', '/'); ?>
                <?php
//                echo $this->Html->image('shoppingcart.png', array('width' => '36px')) . ' Carrinho';

                echo $this->Html->link($this->Html->image('shoppingcart.png', array('width' => '36px')), array('controller' => 'home', 'action' => 'myCart', 'leoguepe'), array('escape' => false));
//                echo $this->Html->link($this->Html->image('mobly.jpg', array('width' => '36px')), array('controller' => 'home', 'action' => 'myCart', 'leoguepe'));
                ?>
        </header>

        <section>
            <?= $this->element('menu') ?>
            <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </section>

