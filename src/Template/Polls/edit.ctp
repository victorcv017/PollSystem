<div class="polls form large-9 medium-8 columns content">
    <?= $this->Form->create($poll) ?>
    <fieldset>
        <legend><?= __('Edit Poll') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('area_id', ['options' => $areasp]);
            echo $this->Form->control('created_at');
            echo $this->Form->control('questions._ids', ['options' => $questions]);
            echo $this->Form->control('respondents._ids', ['options' => $respondents]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
