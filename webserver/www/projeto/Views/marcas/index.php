<?php 
if (isset($_SESSION['usuario_logado'])) {
    if ($_SESSION['usuario_logado']->usuarios_nivel == 2) {
?>

<div class="container pt-4 pb-5 bg-light">
    <h2 class="border-bottom border-2 border-primary">
        <?= $data['pagina'] ?>
    </h2>

    <!-- Mensagem de retorno -->
    <?php
    if (isset($_SESSION['msg'])) {
        echo '<div class="alert alert-' . $_SESSION['msg']['color'] . '">';
        echo $_SESSION['msg']['texto'];
        echo '</div>';
        unset($_SESSION['msg']);
    }
    ?>

    <!-- Barra de pesquisa -->
    <div class="container-fluid p-3">
        <form class="d-flex" action="<?= base_url('marcas/search'); ?>" method="POST" role="search">
            <input class="form-control me-2" name="pesquisar" type="search" placeholder="Pesquisar" aria-label="Search">
            <button type="submit" class="btn btn-outline-success">Pesquisar</button>
        </form>
    </div>

    <!-- Tabela de marcas -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">
                    <a class="btn btn-primary" href="<?= base_url('marcas/new'); ?>">
                        Novo
                    </a>
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($data['marcas'] as $marcas) { ?>
            <tr>
                <td><?= $marcas->marcas_id; ?></td>
                <td><?= $marcas->marca; ?></td>
                <td>
                    <a class="btn btn-secondary" href="<?= base_url('marcas/edit/' . $marcas->marcas_id); ?>">Editar</a>
                    <a class="btn btn-danger" href="<?= base_url('marcas/delete/' . $marcas->marcas_id); ?>">Excluir</a>
                </td>
            </tr>
            <?php } ?>
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
