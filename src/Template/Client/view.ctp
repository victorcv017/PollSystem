<h1> Encuesta : <?= h($form['name']) ?> </h1>
<p> Favor de contestar la siguiente encuesta. </p>

<form  id="answer" method = "post" action='post'>
<input hidden value="<?= $this->request->getParam('_csrfToken')?>" name="_csrfToken">    

<h2>Servicio: <?= h($form['service']) ?> </h2> 
<?php $idx =0; ?>
<?php foreach ($form['dservice'] as $question): ?>
    <?php $idx++; ?>
    <label><?= $question ?>
    <input type="range" list="tickmarks" name="rangeService" onchange="updateInputService(this.value, <?php echo $idx; ?> );">
    
    <br>
<?php endforeach; ?>
<hr>

<h2>Personal </h2> 
<?php $idx =0; ?>
<?php foreach ($form['dstaff'] as $question): ?>
    <?php $idx++; ?>
    <label><?= $question ?>
    <input type="range" list="tickmarks" name="rangeStaff" onchange="updateInputStaff(this.value, <?php echo $idx; ?> );">

    <br>
<?php endforeach; ?>
<hr>

<h2>Preguntas Abiertas </h2> 
<?php $idx =0; ?>
<?php foreach ($form['dopen'] as $question): ?>
    <?php $idx++; ?>
    <label><?= $question ?>
    <input type="text" name="textOpen" onchange="updateInputOpen(this.value, <?php echo $idx; ?>);"> 
    <br>
<?php endforeach; ?>
<hr>

<input type="submit" class="button" id="send" value='Enviar Respuesta' >
<input hidden id="ansservice" name="ansservice">
<input hidden id="ansstaff" name="ansstaff">
<input hidden id="ansopen" name="ansopen">

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


<?= $this->Html->script('jquery.min.js') ?>
<script type="text/javascript">
    var ansService=[];
    var ansStaff=[];
    var ansOpen=[];


    function updateInputService(val,idx) {
                ansService[idx] = val;
                console.log("servicio", ansService[idx]);
            }
    function updateInputStaff(val,idx) {
               ansStaff[idx] = val;
               console.log("personal", ansStaff[idx]);
            }
    function updateInputOpen(val,idx) {
                ansOpen[idx] = val;
                console.log("open", ansOpen[idx]);
            }
    
    $('#answer').submit(function () {
        var data=[];
        ansService.forEach(function (ans){
            data.push(ans);
            console.log(ans);
        });
        $("#ansservice").val(JSON.stringify(data));
        var data=[];
        ansStaff.forEach(function (ans){
            data.push(ans);
            console.log(ans);
        });
        $("#ansstaff").val(JSON.stringify(data));
        var data=[];
        ansOpen.forEach(function (ans){
            data.push(ans);
            console.log(ans);
        });
        $("#ansopen").val(JSON.stringify(data));
    });
    
</script>