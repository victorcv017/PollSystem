<div class="polls view large-9 medium-8 columns content">
    <h3><?= h($poll->name) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($poll->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= $poll->has('area') ? $this->Html->link($poll->area->name, ['controller' => 'Areas', 'action' => 'view', $poll->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de creación') ?></th>
            <td><?= h($poll->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Preguntas') ?></h4>
        <?php if (!empty($poll->questions)): ?>
            <table cellpadding="0" cellspacing="0" class="table">
                <tr>

                    <th scope="col"><?= __('Content') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($poll->questions as $questions): ?>
                    <tr>

                        <td><?= h($questions->content) ?></td>
                        <td class="actions">
                            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['action' => 'view', $questions->id], ['escape' => false, 'class' => 'btn btn-outline-info']) ?>
                            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), ['action' => 'edit', $questions->id], ['escape' => false, 'class' => 'btn btn-outline-primary']) ?>
                            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-alt']), ['action' => 'delete', $questions->id], ['escape' => false, 'class' => 'btn btn-outline-danger', 'confirm' => __('¿Estas seguro de querer eliminar?', $questions->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>