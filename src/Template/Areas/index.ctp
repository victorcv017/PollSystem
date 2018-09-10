
<div class="areas large-9 medium-8 columns content">
    <h3><?= __('Areas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($areasp as $area): ?>
            <tr>
                <td><?= h($area->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $area->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $area->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $area->id], ['confirm' => __('¿Estas seguro de querer eliminar?', $area->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')]) ?></p>
    </div>
</div>
