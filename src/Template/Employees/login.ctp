<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic ">
                <?= $this->Html->image("img-01.png", ['class' => 'js-tilt']); ?>
            </div>

            <form class="login100-form validate-form" method='post'>
                <span class="login100-form-title">
                    Iniciar Sesión / Empleado
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Email valido requerido ej: alguien@dominio.com">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
                    <input class="input100" type="password" name="password" placeholder="Contraseña">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="wrap-input100 validate-input" data-validate = "Código de empresa requerido">
                    <input class="input100" type="text" name="enterprise" placeholder="Código de Empresa">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Iniciar Sesión
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Olvide mi
                    </span>
                    <a class="txt2" href="#">
                        Contraseña
                    </a>
                    <br>
                    <span class="txt1">
                        Olvide el
                    </span>
                    <a class="txt2" href="#">
                        Código de Empresa
                    </a>
                </div>
                <div class="text-center p-t-136">
                    <input hidden value="<?= $this->request->getParam('_csrfToken')?>" name="_csrfToken">
                </div>

            </form>
        </div>
    </div>
</div>