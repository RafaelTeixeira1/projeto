<?php 
if (isset($_SESSION['usuario_logado'])) {
    if ($_SESSION['usuario_logado']->usuarios_nivel == 2) {
?>

<div class="container pt-4 pb-5 bg-light">
    <h2 class="border-bottom border-2 border-primary">
        <?= $data['pagina'] ?>
    </h2>

    <?php
    // Mensagem de retorno
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg']['texto'];
    }
    ?>

    <div class="container-fluid p-3">
        <form class="d-flex" action="<?= base_url('carros/search'); ?>" method="POST">
            <input class="form-control me-2" name="pesquisar" type="search" placeholder="Pesquisar" aria-label="Search">
            <button type="submit" class="btn btn-outline-success">Pesquisar</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano Fab.</th>
                <th>Ano Mod.</th>
                <th>Placa</th>
                <th>Cor</th>
                <th>KM</th>
                <th>Preço Venda</th>
                <th>
                    <a class="btn btn-primary" href="<?= base_url('carros/new') ?>">
                        Novo
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['carros'] as $carro): ?>
                <tr>
                    <td><?= $carro->carros_id ?></td>
                    <td><?= $carro->carros_modelo ?></td>
                    <td><?= $carro->marca ?></td>
                    <td><?= $carro->carros_ano_fabricacao ?></td>
                    <td><?= $carro->carros_ano_modelo ?></td>
                    <td><?= $carro->carros_placa ?></td>
                    <td><?= $carro->carros_cor ?></td>
                    <td><?= $carro->carros_quilometragem ?></td>
                    <td><?= $carro->carros_preco_venda ?></td>
                    <td>
                        <a class="btn btn-secondary" href="<?= base_url('carros/edit/'.$carro->carros_id) ?>">Editar</a>
                        <a class="btn btn-danger" href="<?= base_url('carros/delete/'.$carro->carros_id) ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php 
    } else {
        $msg = "Sem permissão de acesso";
        redirectPage(base_url('login'), $msg);
    }
} else {
    $msg = "Sem permissão de acesso";
    redirectPage(base_url('login'), $msg);
}
?>
