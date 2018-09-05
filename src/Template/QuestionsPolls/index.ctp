<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuestionsPoll[]|\Cake\Collection\CollectionInterface $questionsPolls
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Questions Poll'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questionsPolls index large-9 medium-8 columns content">
    <h3><?= __('Questions Polls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poll_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionsPolls as $questionsPoll): ?>
            <tr>
                <td><?= $this->Number->format($questionsPoll->id) ?></td>
                <td><?= $questionsPoll->has('question') ? $this->Html->link($questionsPoll->question->id, ['controller' => 'Questions', 'action' => 'view', $questionsPoll->question->id]) : '' ?></td>
                <td><?= $questionsPoll->has('poll') ? $this->Html->link($questionsPoll->poll->name, ['controller' => 'Polls', 'action' => 'view', $questionsPoll->poll->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $questionsPoll->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionsPoll->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionsPoll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsPoll->id)]) ?>
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
