<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RespondentsPoll $respondentsPoll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respondents Poll'), ['action' => 'edit', $respondentsPoll->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respondents Poll'), ['action' => 'delete', $respondentsPoll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondentsPoll->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respondents Polls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondents Poll'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respondentsPolls view large-9 medium-8 columns content">
    <h3><?= h($respondentsPoll->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Poll') ?></th>
            <td><?= $respondentsPoll->has('poll') ? $this->Html->link($respondentsPoll->poll->name, ['controller' => 'Polls', 'action' => 'view', $respondentsPoll->poll->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respondent') ?></th>
            <td><?= $respondentsPoll->has('respondent') ? $this->Html->link($respondentsPoll->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $respondentsPoll->respondent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($respondentsPoll->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($respondentsPoll->created_at) ?></td>
        </tr>
    </table>
</div>
