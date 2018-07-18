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

            <?php echo $this->Html->link('Mobly', '/'); ?>


        </header>

        <section>
            <?= $this->element('menu') ?>
            <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </section>

