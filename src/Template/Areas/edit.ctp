
<div class="areas form large-9 medium-8 columns content">
    <?= $this->Form->create($area) ?>
    <fieldset>
        <legend><?= __('Editar Area') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
