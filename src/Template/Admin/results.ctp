
<div class="chart-container"  >
    <canvas id="Canvas-Barras" height= 10px width= 50px></canvas>
</div>

<?php for ($i = 0 ; $i < sizeof($questions) ; $i++): ?>
    <h3><?= $questions[$i] ?></h3>
    <label><?= $ansopen[$i] ?></label>
    <br>
<?php endfor; ?>

<!-- javascript -->
<?php
echo $this->Html->script('jquery.min', ['block' => true]);
echo $this->Html->script('Chart.min', ['block' => true]);
echo $this->Html->script('bar', ['block' => true]);
?>

<script>
    graph(<?= h($gradeService)?>,<?= h($gradeStaff)?>);
</script>

