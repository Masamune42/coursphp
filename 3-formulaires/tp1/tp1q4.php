<?php
$ht = filter_input(INPUT_POST, 'HT',
        FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$tva = filter_input(INPUT_POST, 'Taux',
        FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
?>
<form name="Prix" method="post">
    <fieldset>
        <legend>Calcul des taxes</legend>
        <label for="HT">Prix HT</label>
        <input type="number" step="0.01" name="HT"
<?php
if ($ht !== false) {
    echo ' value="' . $ht . '"';
}
?>> €<br>
        <label for="Taux">Taux de TVA</label>
        <input type="number" step="0.1" name="Taux"
<?php
if ($tva !== false) {
    echo 'value="' . $tva . '"';
}
?>> %<br>
        <input type="submit" value="Calculer" name="Calculer"><br>
               <?php
               if (is_float($ht) && is_float($tva)):
                   $MontantTVA =
                       number_format(($ht * $tva) / 100, 2, ' € ', ' ');
                   $MontantTTC =
                           number_format($ht * (1 + $tva / 100), 2, ' € ', ' ');
                   ?>
                    <label for="TVA">Montant de la TVA</label>
                    <input type="text" name="TVA" readonly value="<?= $MontantTVA ?>">
                    <br>
                    <label for="TTC">Montant TTC</label>
                    <input type="text" name="TTC" readonly value="<?= $MontantTTC ?>">
                    <br>
                <?php endif; ?>
    </fieldset>
</form>
