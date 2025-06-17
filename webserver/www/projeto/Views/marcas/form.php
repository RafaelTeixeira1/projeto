<?php 
if(isset($_SESSION['usuario_logado'])){
    if($_SESSION['usuario_logado']->usuarios_nivel == 2){

?>
        <div class="container pt-4 pb-5 bg-light">
            
            <h2 class="border-bottom border-2 border-primary">
                <?= ucfirst($data['pagina']) ?>
            </h2>
            <form action="<?php echo base_url('marcas/'.$data['method']); ?>" method="post">
                <div class="mb-3">
                    <label for="marcas_marca" class="form-label"> Modelo </label>
                   <input type="text" class="form-control" name="marca" value="<?= $data['marcas']->marca; ?>" id="marca">
                </div>

                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="<?= $data['method']; ?>" value="Salvar">
                </div>

            
            </form>

        </div>
<?php
    }else{
        $msg = "Sem permissão de acesso";
        redirectPage(base_url('login'), $msg);

    }
}else{
    $msg = "Sem permissão de acesso";
    redirectPage(base_url('login'), $msg);
}