<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionsPoll $questionsPoll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Questions Polls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questionsPolls form large-9 medium-8 columns content">
    <?= $this->Form->create($questionsPoll) ?>
    <fieldset>
        <legend><?= __('Add Questions Poll') ?></legend>
        <?php
            echo $this->Form->control('question_id', ['options' => $questions]);
            echo $this->Form->control('poll_id', ['options' => $polls]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
