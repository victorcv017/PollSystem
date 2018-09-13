<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee,['horizontal' => true]); 
    ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
        
        
  
            echo $this->Form->control('name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('phone',
            ['validate' => 'register']
        );
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('birthdate',[
            'minYear' => 1940,
            'maxYear' => date('Y'),
            ]       
        );
            echo $this->Form->control('area_id', ['options' => $areas]);
            echo $this->Form->control('service_id', ['options' => $services]);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
