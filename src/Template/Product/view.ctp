<?= $this->Html->css('product_detail.css'); ?>
<main class="container">

    <!-- Left Column / Headphones Image -->
    <div class="left-column">
        <?php echo $this->Html->image($product->image, array('width' => '400', 'class' => 'active')); ?>
    </div>


    <!-- Right Column -->
    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <span><?= $product->category[0]->name ?></span>
            <h1><?= $product->name ?></h1>
            <p><?= $product->description ?></p>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <span>R$<?= $product->price ?></span>
            <a href="#" class="cart-btn">Adicionar ao Carrinho</a>
        </div>
    </div>
    <div class="features"> <h1>Caractersíticas Gerais</h1> </br>
        <?= $product->features ?>
    </div>
</main>

