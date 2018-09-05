<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poll $poll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Poll'), ['action' => 'edit', $poll->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Poll'), ['action' => 'delete', $poll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Polls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Settings'), ['controller' => 'Settings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['controller' => 'Settings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="polls view large-9 medium-8 columns content">
    <h3><?= h($poll->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($poll->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= $poll->has('area') ? $this->Html->link($poll->area->name, ['controller' => 'Areas', 'action' => 'view', $poll->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($poll->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($poll->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($poll->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Answer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($poll->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->content) ?></td>
                <td><?= h($questions->answer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Respondents') ?></h4>
        <?php if (!empty($poll->respondents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($poll->respondents as $respondents): ?>
            <tr>
                <td><?= h($respondents->id) ?></td>
                <td><?= h($respondents->name) ?></td>
                <td><?= h($respondents->last_name) ?></td>
                <td><?= h($respondents->email) ?></td>
                <td><?= h($respondents->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Respondents', 'action' => 'view', $respondents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Respondents', 'action' => 'edit', $respondents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Respondents', 'action' => 'delete', $respondents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Settings') ?></h4>
        <?php if (!empty($poll->settings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Poll Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($poll->settings as $settings): ?>
            <tr>
                <td><?= h($settings->id) ?></td>
                <td><?= h($settings->poll_id) ?></td>
                <td><?= h($settings->start_date) ?></td>
                <td><?= h($settings->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Settings', 'action' => 'view', $settings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Settings', 'action' => 'edit', $settings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Settings', 'action' => 'delete', $settings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
