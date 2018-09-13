<div class="polls form large-9 medium-8 columns content">
    <?= $this->Form->create($poll) ?>
    <fieldset>
        <legend><?= __('Editar Encuesta') ?></legend>
        <?php
            echo $this->Form->control('name',['label' => 'Nombre', 'class' => 'form-control']);
            echo $this->Form->control('area_id', ['options' => $areas, 'label' => 'Area', 'class' => 'form-control']);
            echo $this->Form->control('questions._content', ['options' => $questions, 'class' => 'form-control']);
            //var_dump($questions);
        ?>
    </fieldset>
    
    <br>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-custom-color']) ?>
    <?= $this->Form->end() ?>
</div>
