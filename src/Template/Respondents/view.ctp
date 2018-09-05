<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Respondent $respondent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respondent'), ['action' => 'edit', $respondent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respondent'), ['action' => 'delete', $respondent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respondents view large-9 medium-8 columns content">
    <h3><?= h($respondent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($respondent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($respondent->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($respondent->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($respondent->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($respondent->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Polls') ?></h4>
        <?php if (!empty($respondent->polls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($respondent->polls as $polls): ?>
            <tr>
                <td><?= h($polls->id) ?></td>
                <td><?= h($polls->name) ?></td>
                <td><?= h($polls->area_id) ?></td>
                <td><?= h($polls->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Polls', 'action' => 'view', $polls->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Polls', 'action' => 'edit', $polls->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Polls', 'action' => 'delete', $polls->id], ['confirm' => __('Are you sure you want to delete # {0}?', $polls->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
