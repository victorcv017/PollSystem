<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $answer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Respondents Polls'), ['controller' => 'RespondentsPolls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respondents Poll'), ['controller' => 'RespondentsPolls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="answers form large-9 medium-8 columns content">
    <?= $this->Form->create($answer) ?>
    <fieldset>
        <legend><?= __('Edit Answer') ?></legend>
        <?php
            echo $this->Form->control('content');
            echo $this->Form->control('respondents_polls_id', ['options' => $respondentsPolls]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
