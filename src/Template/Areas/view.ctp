<div class="areas view large-9 medium-8 columns content">
    <h3><?= h($area->name) ?></h3>
    <div class="related">
        <h4><?= __('Empleados') ?></h4>
        <?php if (!empty($area->employees)): ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellidos') ?></th>
                <th scope="col"><?= __('Teléfono') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Fecha de Nacimiento') ?></th>
                <th scope="col"><?= __('Id del Servicio') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->employees as $employees): ?>
            <tr>
                <td><?= h($employees->name) ?></td>
                <td><?= h($employees->last_name) ?></td>
                <td><?= h($employees->phone) ?></td>
                <td><?= h($employees->email) ?></td>
                <td><?= h($employees->birthdate) ?></td>
                <td><?= h($employees->service_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), [ 'controller' => 'Employees', 'action' => 'view',$employee->id], ['escape' => false , 'class' => 'btn btn-outline-info']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), [ 'controller' => 'Employees', 'action' => 'edit', $employee->id], ['escape' => false , 'class' => 'btn btn-outline-primary']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-alt']), [ 'controller' => 'Employees', 'action' => 'delete', $employee->id], ['escape' => false , 'class' => 'btn btn-outline-danger', 'confirm' => __('¿Estas seguro de querer eliminar?', $area->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Encuestas') ?></h4>
        <?php if (!empty($area->polls)): ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Creada en') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($area->polls as $polls): ?>
            <tr>
                <td><?= h($polls->name) ?></td>
                <td><?= h($polls->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), [ 'controller' => 'Polls','action' => 'view',$polls->id], ['escape' => false , 'class' => 'btn btn-outline-info']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), [ 'controller' => 'Polls','action' => 'edit', $polls->id], ['escape' => false , 'class' => 'btn btn-outline-primary']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-alt']), [ 'controller' => 'Polls','action' => 'delete', $polls->id], ['escape' => false , 'class' => 'btn btn-outline-danger', 'confirm' => __('¿Estas seguro de querer eliminar?', $area->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Servicios') ?></h4>
        <?php if (!empty($area->services)): ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Descripción') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($area->services as $services): ?>
            <tr>
                <td><?= h($services->name) ?></td>
                <td><?= h($services->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), [ 'controller' => 'Services','action' => 'view',$polls->id], ['escape' => false , 'class' => 'btn btn-outline-info']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), [ 'controller' => 'Services','action' => 'edit', $polls->id], ['escape' => false , 'class' => 'btn btn-outline-primary']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-alt']), [ 'controller' => 'Services','action' => 'delete', $polls->id], ['escape' => false , 'class' => 'btn btn-outline-danger', 'confirm' => __('¿Estas seguro de querer eliminar?', $area->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
