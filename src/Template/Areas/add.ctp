<div class="areas form large-9 medium-8 columns content">
    <?= $this->Form->create($area) ?>
    <fieldset>
        <legend><?= __('Nueva Area') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nombre']);
            //echo $this->Form->control('company_id', ['options' => $companies]);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
