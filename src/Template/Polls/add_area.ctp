<form id="create"  method="post">
    <div class="form-group">
        <label for="name" >Nombre de la Encuesta</label>
        <input type="text" name="name" required class="form-control">
        <br>
        <input hidden value="<?= $this->request->getParam('_csrfToken') ?>" name="_csrfToken">
        <label for="area">Area a Evaluar</label>
        <select name="area" required class="form-control">
            <option selected>Selecciona un Area</option>
            <?php foreach ($areas as $key => $value): ?>
                <?php echo "<option value='$key'>$value</option>"; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="card">
        <div class="card-header"> 
            <div class="d-flex">
                <div class="">Preguntas Respecto al Servicio</div>
                <div class="ml-auto"><button type="button" id="newservice" class="btn btn-link"><i class="fa fa-plus-circle"></i></button></div>
            </div>
        </div>
        <div class="card-body" id="qservice">
        </div>
    </div>
    <div class="card">
        <div class="card-header"> 
            <div class="d-flex">
                <div class="">Preguntas Respecto a la Persona</div>
                <div class="ml-auto"><button type="button" id="newstaff" class="btn btn-link"><i class="fa fa-plus-circle"></i></button></div>
            </div>
        </div>
        <div class="card-body" id="qstaff">
        </div>
    </div>
    <div class="card">
        <div class="card-header"> 
            <div class="d-flex">
                <div class="">Preguntas Abiertas</div>
                <div class="ml-auto"><button type="button" id="newopen" class="btn btn-link"><i class="fa fa-plus-circle"></i></button></div>
            </div>
        </div>
        <div class="card-body" id="qopen">
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-custom-color" id="send" value="Guardar">
    <!--<input type="button" onclick="show()" class="btn btn-custom-color" id="send" value="Guardar">-->
    <input hidden id="dservice" name="dservice">
    <input hidden id="dstaff" name="dstaff">
    <input hidden id="dopen" name="dopen">
</form>
<script type="text/javascript">
    $("#newservice").click(function () {
        $("#qservice").append("\
            <div>\n\
                <div class='row'>\n\
                    <div class='col-12 col-md-8'>\n\
                        <input type='text' class='form-control' placeholder='Escriba la Pregunta' required>\n\
                    </div>\n\
                    <div class='col-6 col-md-4'>\n\
                        <button type='button' class='btn btn-outline-danger' onclick='remove(this)'>Eliminar</button>\n\
                    </div>\n\
                <div class='row'><div class='col'>&nbsp;</div></div>\n\
            </div>");

    });

    $("#newstaff").click(function () {
        $("#qstaff").append("\
            <div>\n\
                <div class='row'>\n\
                    <div class='col-12 col-md-8'>\n\
                        <input type='text' class='form-control' placeholder='Escriba la Pregunta' required>\n\
                    </div>\n\
                    <div class='col-6 col-md-4'>\n\
                        <button type='button' class='btn btn-outline-danger' onclick='remove(this)'>Eliminar</button>\n\
                    </div>\n\
                <div class='row'><div class='col'>&nbsp;</div></div>\n\
            </div>");
    });

    $("#newopen").click(function () {
        $("#qopen").append("\
            <div>\n\
                <div class='row'>\n\
                    <div class='col-12 col-md-8'>\n\
                        <input type='text' class='form-control' placeholder='Escriba la Pregunta' required>\n\
                    </div>\n\
                    <div class='col-6 col-md-4'>\n\
                        <button type='button' class='btn btn-outline-danger' onclick='remove(this)'>Eliminar</button>\n\
                    </div>\n\
                <div class='row'><div class='col'>&nbsp;</div></div>\n\
            </div>");
    });

    function remove(e) {
        $(e).parent().parent().remove();
    }

    $('#create').submit(function () {
        var data = [];
        $("#qservice").children().each(function () {
            data.push($(this).find('input').val());
        });
        $("#dservice").val(JSON.stringify(data));
        data = [];

        $("#qstaff").children().each(function () {
            data.push($(this).find('input').val());
        });
        $("#dstaff").val(JSON.stringify(data));
        data = [];

        $("#qopen").children().each(function () {
            data.push($(this).find('input').val());
        });
        $("#dopen").val(JSON.stringify(data));
    });
    /*
    function show(){
        var data = [];
        $("#qservice").children().each(function () {
            data.push($(this).find('input').val());
        });
        $("#dservice").val(JSON.stringify(data));
        console.log(data);
        data = [];

        $("#qstaff").children().each(function () {
            data.push($(this).find('input').val());
        });
        $("#dstaff").val(JSON.stringify(data));
        console.log(data);
        data = [];

        $("#qopen").children().each(function () {
            data.push($(this).find('input').val());
        });
        $("#dopen").val(JSON.stringify(data));
        console.log(data);
    }*/
</script>
