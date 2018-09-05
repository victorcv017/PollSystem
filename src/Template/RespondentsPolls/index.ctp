<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RespondentsPoll[]|\Cake\Collection\CollectionInterface $respondentsPolls
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Respondents Poll'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respondentsPolls index large-9 medium-8 columns content">
    <h3><?= __('Respondents Polls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poll_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respondent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respondentsPolls as $respondentsPoll): ?>
            <tr>
                <td><?= $this->Number->format($respondentsPoll->id) ?></td>
                <td><?= $respondentsPoll->has('poll') ? $this->Html->link($respondentsPoll->poll->name, ['controller' => 'Polls', 'action' => 'view', $respondentsPoll->poll->id]) : '' ?></td>
                <td><?= $respondentsPoll->has('respondent') ? $this->Html->link($respondentsPoll->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $respondentsPoll->respondent->id]) : '' ?></td>
                <td><?= h($respondentsPoll->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respondentsPoll->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respondentsPoll->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respondentsPoll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondentsPoll->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
