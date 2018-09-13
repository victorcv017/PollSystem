<!---$myTemplates = [
    //'inputContainer' => '<div class="form-control">{{content}}</div>',
    'input' =>'<input name={{name}} type="{{type}}"class="form-control">{{content}}',
    'select' => '<select name="{{name}}" class="form-control">{{content}}</select>',
    'button' => '<button type="submit" class="btn btn-custom-color">Guardar</button>'
    //<input name="name" required="required" maxlength="255" id="name" type="text">
  
];
return [
    'input' =>'<input name={{name}} type={{type}} class="form-control">{{content}}',
    'select' => '<select name={{name}} class="form-control">{{content}}</select>',
    'button' => '<button type="submit" class="btn btn-custom-color">Guardar</button>'
]
-->
<?php
return [
     'input' =>'<input name={{name}} type="{{type}}"class="form-control">{{content}}',
    'select' => '<select name="{{name}}" class="form-control">{{content}}</select>',
    'button' => '<button type="submit" class="btn btn-custom-color">Guardar</button>'
];