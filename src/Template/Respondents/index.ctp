<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Respondent[]|\Cake\Collection\CollectionInterface $respondents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respondents index large-9 medium-8 columns content">
    <h3><?= __('Respondents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respondents as $respondent): ?>
            <tr>
                <td><?= $this->Number->format($respondent->id) ?></td>
                <td><?= h($respondent->name) ?></td>
                <td><?= h($respondent->last_name) ?></td>
                <td><?= h($respondent->email) ?></td>
                <td><?= h($respondent->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respondent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respondent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respondent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondent->id)]) ?>
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
