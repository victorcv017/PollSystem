<form id="create"  method="post">
    
    <label for="name">Nombre de la Encuesta</label>
    <input type="text" name="name" required>
   
    <input hidden value="<?= $this->request->getParam('_csrfToken')?>" name="_csrfToken">
    <label for="service">Servicio a Evaluar</label>
    <select name="service" required>
        <option selected>Selecciona un Servicio</option>
        <option value="cafeteria">Cafeteria</option>
        <option value="seguridad">Vigilancia</option>
        <option value="docente">Docente</option>
    </select>
    
    <hr>
    <h2>Preguntas Respecto al Servicio</h2> <button  id="newservice" type="button">Nueva pregunta</button>
    <div id="qservice">
        
    </div>
    <hr>
    <h2>Preguntas Respecto al Personal</h2> <button  id="newstaff" type="button">Nueva pregunta</button>
    <div id="qstaff">
        
    </div>
    <hr>
    <h2>Preguntas Abiertas</h2> <button  id="newopen" type="button">Nueva pregunta</button>
    <div id="qopen">
        
    </div>
    
    <input type="submit" class="button" id="send" value="Guardar">
    <input hidden id="dservice" name="dservice">
    <input hidden id="dstaff" name="dstaff">
    <input hidden id="dopen" name="dopen">
</form>
 <h2>Collapsible Sidebar Using Bootstrap 4</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        

<?= $this->Html->script('jquery.min.js') ?>
<script type="text/javascript">
    $("#newservice").click(function(){
        $("#qservice").append("<div><label contenteditable='true'>Escriba la pregunta</label><button type='button' onclick='remove(this)'>Eliminar</button><div>");
   
    });
    
    $("#newstaff").click(function(){
        $("#qstaff").append("<div><label contenteditable='true'>Escriba la pregunta</label><button type='button' onclick='remove(this)'>Eliminar</button><div>");
    });
    
    $("#newopen").click(function(){
        $("#qopen").append("<div><label contenteditable='true'>Escriba la pregunta</label><button type='button' onclick='remove(this)'>Eliminar</button><div>");
    });
    
    function remove(e){
        $(e).parent().remove();
    }
    
    $('#create').submit(function () {
        var data = [];
        $("#qservice").children().each(function (){
            data.push($(this).find('label').text());
        });
        $("#dservice").val(JSON.stringify(data));
        data = [];
        
        $("#qstaff").children().each(function (){
            data.push($(this).find('label').text());
        });
        $("#dstaff").val(JSON.stringify(data));
        data = [];
        
        $("#qopen").children().each(function (){
            data.push($(this).find('label').text());
        });
        $("#dopen").val(JSON.stringify(data));
    });
</script>