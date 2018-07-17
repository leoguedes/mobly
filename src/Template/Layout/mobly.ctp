<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CSS Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
            }


            /* Style the header */
            header {
                background-color: #2e353d;
                padding: 30px;
                text-align: center;
                color: #b81a1a;
                font-size: 90px;
                font-weight: bold;
            }
            .header a {
                text-decoration: none;
            }

            /* Create two columns/boxes that floats next to each other */
            nav {
                float: left;
                width: 15%;
                height: 700px; /* only for demonstration, should be removed */
                background: #f5f5f5;
                padding: 20px;
            }

            /* Style the list inside the menu */
            nav ul {
                list-style-type: none;
                padding: 0;
            }

            article {
                float: left;
                padding: 20px;
                width: 70%;
                background-color: #f1f1f1;
                height: 300px; /* only for demonstration, should be removed */
            }

            /* Clear floats after the columns */
            section:after {
                content: "";
                display: table;
                clear: both;
            }


            /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
            @media (max-width: 600px) {
                nav, article {
                    width: 100%;
                    height: auto;
                }
            }
        </style>
    </head>
    <body>

        <header>

                <?php echo $this->Html->link('Mobly', '/');?>


        </header>

        <section>
        <?= $this->element('menu') ?>

        <?= $this->Flash->render() ?>
            <div class="container clearfix">
        <?= $this->fetch('content') ?>
            </div>
        </section>

