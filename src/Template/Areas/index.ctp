
<div class="areas large-9 medium-8 columns content">
    <h3><?= __('Areas') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($areasp as $area): ?>
            <tr>
                <td><?= h($area->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), [ 'action' => 'view',$area->id], ['escape' => false , 'class' => 'btn btn-outline-info']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), [ 'action' => 'edit', $area->id], ['escape' => false , 'class' => 'btn btn-outline-primary']) ?>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-alt']), [ 'action' => 'delete', $area->id], ['escape' => false , 'class' => 'btn btn-outline-danger', 'confirm' => __('¿Estas seguro de querer eliminar?', $area->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Inicio')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Fin') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')]) ?></p>
    </div>
</div>
