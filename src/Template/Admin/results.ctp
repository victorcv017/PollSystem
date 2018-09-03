<!DOCTYPE html>
<html>
<head>
    <title>Resultados- Grafica</title>
    
    
</head>
<body>

	<div class="chart-container"  >
		<canvas id="Canvas-Barras" height= 10px width= 50px></canvas>
	</div>

	<!-- javascript -->
<?php

echo $this->Html->script('jquery.min',['block' => true]);
echo $this->Html->script('Chart.min',['block' => true]);
echo $this->Html->script('bar',['block' => true]);
?>


    
</body>
</html>