<div class="container p-5">

            <div class="row  mt-5">
                

                <div
                    class="mx-auto border border-3 border-danger rounded p-5 col-lg-5 bg-dark text-white ">
                    <div class="text-center mt-3 mb-3">
                        <?php if(isset($msg)){echo $msg;} ?>
                        <img src="<?php echo base_url('public/assets/images/click_logo.png') ?>" alt="ClickCarro" width="300">
                        <h2 class="p-3">Aceso ao Sistema</h2>
                    </div>

                    <form action="<?php echo base_url('login/auth') ?>" method="post">
                        <!-- input login -->
                        <div class="mb-3">
                            <label for="login" class="form-label">
                                <i class="bi bi-person"></i>
                                Email/CPF
                            </label>
                            <input type="text" name="login"
                                placeholder="Informe o seu login"
                                class="form-control" id="login">
                            <div id="loginHelp" class="form-text">Entre com o
                                seu email ou CPF.
                            </div>
                        </div>
                        
                        <!-- input senha -->
                        <div class="mb-3">
                            <label for="senha"class="form-label">
                                <i class="bi bi-lock"></i>
                                Senha
                            </label>

                            <input type="password" placeholder="Informe a senha" name="senha" class="form-control"id="senha">
                        </div>

                        <!-- inpup check -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input"
                                id="checkme">
                            <label class="form-check-label" for="checkme">Manter-me Conectado</label>
                        </div>
                        
                        <!-- botão Logar -->
                        <p class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Acessar 
                                <i class="bi bi-box-arrow-in-right"></i>
                            </button>
                        </p>
                        
                    </form>

                </div>

            </div>
        </div>