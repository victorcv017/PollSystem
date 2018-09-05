<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionsPoll $questionsPoll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Questions Poll'), ['action' => 'edit', $questionsPoll->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questions Poll'), ['action' => 'delete', $questionsPoll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsPoll->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions Polls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questions Poll'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questionsPolls view large-9 medium-8 columns content">
    <h3><?= h($questionsPoll->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $questionsPoll->has('question') ? $this->Html->link($questionsPoll->question->id, ['controller' => 'Questions', 'action' => 'view', $questionsPoll->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poll') ?></th>
            <td><?= $questionsPoll->has('poll') ? $this->Html->link($questionsPoll->poll->name, ['controller' => 'Polls', 'action' => 'view', $questionsPoll->poll->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($questionsPoll->id) ?></td>
        </tr>
    </table>
</div>
