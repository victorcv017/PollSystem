<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('birthdate');
            echo $this->Form->control('area_id', ['options' => $areas]);
            echo $this->Form->control('service_id', ['options' => $services]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
