<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RespondentsPoll $respondentsPoll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $respondentsPoll->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $respondentsPoll->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Respondents Polls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respondentsPolls form large-9 medium-8 columns content">
    <?= $this->Form->create($respondentsPoll) ?>
    <fieldset>
        <legend><?= __('Edit Respondents Poll') ?></legend>
        <?php
            echo $this->Form->control('poll_id', ['options' => $polls]);
            echo $this->Form->control('respondent_id', ['options' => $respondents]);
            echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
