<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active"  data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Todas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#exe" role="tab" aria-controls="exe" aria-selected="false">En Ejecución</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active card-body" id="all" role="tabpanel" aria-labelledby="home-tab">
            <table cellpadding="0" cellspacing="0" class="table">
                <thead>
                    <tr>

                        <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Creación') ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($polls as $poll): ?>
                        <tr>

                            <td><?= h($poll->name) ?></td>
                            <td><?= h($poll->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), ['action' => 'view', $poll->id], ['escape' => false, 'class' => 'btn btn-outline-info']) ?>
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), ['action' => 'edit', $poll->id], ['escape' => false, 'class' => 'btn btn-outline-primary']) ?>
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-alt']), ['action' => 'delete', $poll->id], ['escape' => false, 'class' => 'btn btn-outline-danger', 'confirm' => __('¿Estas seguro de querer eliminar?', $poll->id)]) ?>
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
                    <?= $this->Paginator->last(__('Final') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')]) ?></p>
            </div>
        </div>
        <div class="tab-pane fade card-body" id="exe" role="tabpanel" aria-labelledby="profile-tab">
            Aún no tiene encuestas asignadas :(
        </div>
    </div>
</div>


<?php $this->start('modal'); ?>
<div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true" wfd-id="844">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Selecciona el tipo de encuesta a crear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wfd-id="1096">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-user']) . '<br>Empleado', ['action' => 'add', "user"], ['escape' => false, 'class' => 'btn btn-custom-color']) ?>
                    </div>
                    <div class="col-sm">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-warehouse']) . '<br>Area', ['action' => 'add', "area"], ['escape' => false, 'class' => 'btn btn-custom-color']) ?>
                    </div>
                    <div class="col-sm">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-cogs']) . '<br>Servicio', ['action' => 'add', "service"], ['escape' => false, 'class' => 'btn btn-custom-color']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->end(); ?>

<script>
    $(document).ready(function () {
        $("#create").removeAttr('href');
        $("#create").attr('data-target', '#createModal');
        $("#create").attr('data-toggle', 'modal');
    });

    function create() {

    }

</script>
