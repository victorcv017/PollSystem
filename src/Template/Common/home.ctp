<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic">
                <h4 class="text-center text-secondary">SOY UN EMPLEADO</h4>
                <?= $this->Html->image("img-01.png", [
                    "alt" => "Empleado",
                    'url' => ['controller' => 'Employees', 'action' => 'login'],
                    'class' => 'js-tilt'
                ]); ?>
            </div>
            <div class="login100-pic">
                <h4 class="text-center text-secondary">SOY UNA EMPRESA</h4>
                <?=
                $this->Html->image("img-02.png", [
                    "alt" => "Empresa",
                    'url' => ['controller' => 'Companies', 'action' => 'login'],
                    'class' => 'js-tilt'
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
<style>
    .wrap-login100{
        padding : 50px 130px 33px 95px !important;
    }
</style>
