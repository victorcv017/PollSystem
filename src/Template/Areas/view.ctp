<div class="areas view large-9 medium-8 columns content">
    <h3><?= h($area->name) ?></h3>
    <div class="related">
        <h4><?= __('Empleados') ?></h4>
        <?php if (!empty($area->employees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Birthdate') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col"><?= __('Service Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->employees as $employees): ?>
            <tr>
                <td><?= h($employees->id) ?></td>
                <td><?= h($employees->name) ?></td>
                <td><?= h($employees->last_name) ?></td>
                <td><?= h($employees->phone) ?></td>
                <td><?= h($employees->email) ?></td>
                <td><?= h($employees->password) ?></td>
                <td><?= h($employees->birthdate) ?></td>
                <td><?= h($employees->area_id) ?></td>
                <td><?= h($employees->service_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Encuestas') ?></h4>
        <?php if (!empty($area->polls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->polls as $polls): ?>
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
    <div class="related">
        <h4><?= __('Servicios') ?></h4>
        <?php if (!empty($area->services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->services as $services): ?>
            <tr>
                <td><?= h($services->id) ?></td>
                <td><?= h($services->name) ?></td>
                <td><?= h($services->description) ?></td>
                <td><?= h($services->area_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Services', 'action' => 'view', $services->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Services', 'action' => 'edit', $services->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Services', 'action' => 'delete', $services->id], ['confirm' => __('Are you sure you want to delete # {0}?', $services->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
