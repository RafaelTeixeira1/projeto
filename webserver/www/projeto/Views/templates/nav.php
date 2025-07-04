<!-- Abre o menu de navegação -->
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary"
            data-bs-theme="dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('/') ?>">
            <!--Logo do Projeto-->
            <img src="<?php echo base_url('public/assets/images/click_logo.png') ?>" alt="ClickLogo" width="130">
        </a>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Link Home-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="#">
                                <i class="bi bi-house-fill"></i>
                                Home
                            </a>
                        </li>

                        <!-- Link Produtos-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                            href="<?php echo base_url('home/anuncios') ?>">
                                <i class="bi bi-basket"></i>
                                Quero Vender
                            </a>
                        </li>

                        <!-- Link Produtos-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="#sobre">
                                <i class="bi bi-info-circle-fill"></i>
                                Vendidos
                            </a>
                        </li>

                         <!-- Link Produtos-->
                         <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                 href="<?php echo base_url('home/precos') ?>">
                                <i class="bi bi-info-circle-fill"></i>
                                Preços
                            </a>
                        </li>

                        <!-- Link Produtos-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                            href="<?php echo base_url('home/contato') ?>">
                                <i class="bi bi-telephone"></i>
                                Contato
                            </a>
                        </li>

                    </ul>

                    <div class="d-flex">
                        <a class="btn btn-outline-danger me-2" href="<?php echo base_url('login') ?>">
                            <i class="bi bi-person-circle"></i>
                            Adicionar Anúncio
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Fecha o menu de navegação -->