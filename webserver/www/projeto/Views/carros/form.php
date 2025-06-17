<?php 
if(isset($_SESSION['usuario_logado'])){
    if($_SESSION['usuario_logado']->usuarios_nivel == 2){

?>
        <div class="container pt-4 pb-5 bg-light">
            
            <h2 class="border-bottom border-2 border-primary">
                <?= ucfirst($data['pagina']) ?>
            </h2>
            <form action="<?php echo base_url('carros/'.$data['method']); ?>" method="post">
                <div class="mb-3">
                    <label for="carros_modelo" class="form-label"> Modelo </label>
                    <input type="text" class="form-control" name="carros_modelo" value="<?= $data['carros']->carros_modelo; ?>"  id="carros_modelo">
                </div>

                 <!-- MARCA -->
                <div class="mb-3">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select class="form-select" name="marca_id" id="marca_id" required>
                        <option value="">Selecione uma marca</option>
                        <?php foreach ($data['marcas'] as $marca): ?>
                            <option value="<?= $marca->marcas_id ?>" <?= ($data['carros']->marca_id == $marca->marcas_id) ? 'selected' : '' ?>>
                                <?= $marca->marca ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="carros_ano_fabricacao" class="form-label"> Ano de Fabricação </label>
                    <input type="text" class="form-control"  name="carros_ano_fabricacao" value="<?= $data['carros']->carros_ano_fabricacao; ?>" id="carros_ano_fabricacao">
                </div>

                <div class="mb-3">
                    <label for="carros_ano_modelo" class="form-label"> Ano do modelo </label>
                    <input type="text" class="form-control"  name="carros_ano_modelo" value="<?= $data['carros']->carros_ano_modelo; ?>" id="carros_ano_modelo">
                </div>

                 <div class="mb-3">
                    <label for="carros_tipo_combustivel" class="form-label"> Tipo de combustivel </label>
                    <input type="text" class="form-control"  name="carros_tipo_combustivel" value="<?= $data['carros']->carros_tipo_combustivel; ?>" id="carros_tipo_combustivel">
                </div>

                 <div class="mb-3">
                    <label for="carros_placa" class="form-label"> Placa </label>
                    <input type="text" class="form-control"  name="carros_placa" value="<?= $data['carros']->carros_placa; ?>" id="carros_placa">
                </div>
                
                <div class="mb-3">
                    <label for="carros_cor" class="form-label"> Cor </label>
                    <input type="text" class="form-control"  name="carros_cor" value="<?= $data['carros']->carros_cor; ?>" id="carros_cor">
                </div>

                 <div class="mb-3">
                    <label for="carros_quilometragem" class="form-label"> Quilometragem </label>
                    <input type="text" class="form-control"  name="carros_quilometragem" value="<?= $data['carros']->carros_quilometragem; ?>" id="carros_quilometragem">
                </div>

                 <div class="mb-3">
                    <label for="carros_cambio" class="form-label"> Tipo do câmbio </label>
                    <input type="text" class="form-control"  name="carros_cambio" value="<?= $data['carros']->carros_cambio; ?>" id="carros_cambio">
                </div>

                <div class="mb-3">
                    <label for="carros_preco_venda" class="form-label"> Preço de venda </label>
                    <input type="text" class="form-control" name="carros_preco_venda" value="<?= $data['carros']->carros_preco_venda; ?>"  id="carros_preco_venda">
                </div>

                <div class="mb-3">
                    <label for="carros_preco_fipe" class="form-label"> Preço tabela Fipe </label>
                    <input type="text" class="form-control"  name="carros_preco_fipe" value="<?= $data['carros']->carros_preco_fipe; ?>" id="carros_preco_fipe">
                </div>

                 <div class="mb-3">
                    <label for="carros_status" class="form-label"> Status </label>
                    <input type="text" class="form-control"  name="carros_status" value="<?= $data['carros']->carros_status; ?>" id="carros_status">
                </div>

                 <div class="mb-3">
                    <label for="carros_data_cadastro" class="form-label"> Data cadastro </label>
                    <input type="text" class="form-control"  name="carros_data_cadastro" value="<?= $data['carros']->carros_data_cadastro; ?>" id="carros_data_cadastro">
                </div>             

                <input type="hidden" name="carros_id" value="<?= $data['carros']->carros_id; ?>" >

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