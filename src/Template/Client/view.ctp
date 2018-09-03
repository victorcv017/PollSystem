<h1> Encuesta : <?= h($form['name']) ?> </h1>
<p> Favor de contestar la siguiente encuesta. </p>

<form action='post'>
<input hidden value="<?= $this->request->getParam('_csrfToken')?>" name="_csrfToken">    

<h2>Servicio: <?= h($form['service']) ?> </h2> 
<?php foreach ($form['dservice'] as $question): ?>
    
    <label><?= $question ?>
    <input type="range" list="tickmarks"> 
    <br>
<?php endforeach; ?>
<hr>

<h2>Personal </h2> 
<?php foreach ($form['dstaff'] as $question): ?>
    
    <label><?= $question ?>
    <input type="range" list="tickmarks"> 
    <br>
<?php endforeach; ?>
<hr>

<h2>Preguntas Abiertas </h2> 
<?php foreach ($form['dopen'] as $question): ?>
    
    <label><?= $question ?>
    <input type="text"> 
    <br>
<?php endforeach; ?>
<hr>

<input type="submit" class="button" value='Enviar Respuesta'>

</form>




<datalist id="tickmarks">
  <option value="0" label="0%">
  <option value="10">
  <option value="20">
  <option value="30">
  <option value="40">
  <option value="50" label="50%">
  <option value="60">
  <option value="70">
  <option value="80">
  <option value="90">
  <option value="100" label="100%">
</datalist>