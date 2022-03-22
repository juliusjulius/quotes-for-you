<?php session_start(); ?>



<?php require('dynamicHF/header.php'); ?>


<div class="jumbotron shadow bg-white rounded categoryJumbo">
    <h1 class="Citaty">Alkohol</h1>
    <p>Pevne veríme že nájdete tie najlepšie inšpiratívne citáty.</p>
</div>

    <p class="arrow text-center">&#8595;</p>


<div class="container">
    <?php
    for ($i = 0; $i < 10; $i++) {
        ?>

        <div class="row text-center ">

            <div class="col-sm text-center shadow post">
                <p>Ak mi poviete, kde je absolútna tma, tak Vám tú guľu nedám. No čo? Neviete? O polnoci v tuneli černochovi v prdeli.
                    Ak mi poviete, kde je absolútna tma, tak Vám tú guľu nedám. No čo? Neviete? O polnoci v tuneli černochovi v prdeli.
                    Ak mi poviete, kde je absolútna tma, tak Vám tú guľu nedám. No čo? Neviete? O polnoci v tuneli černochovi v prdeli.
                    Ak mi poviete, kde je absolútna tma, tak Vám tú guľu nedám. No čo? Neviete? O polnoci v tuneli černochovi v prdeli.
                    Ak mi poviete, kde je absolútna tma, tak Vám tú guľu nedám. No čo? Neviete? O polnoci v tuneli černochovi v prdeli.</p>
            </div>
        </div>

    <?php } ?>
</div>

<?php include('dynamicHF/footer.php'); ?>