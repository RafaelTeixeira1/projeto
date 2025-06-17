<?php

namespace Controllers;

require_once("Models/Database.php");
require_once("Config/Helpers.php");

use Models\Database as Conexao;
use \PDO;

class Marcas {

    private $marcas;
    private $data;

    function __construct() {
        $this->marcas = new Conexao('marcas');
    }

    protected function redirect($path, $message = null) {
        if ($message) {
            $_SESSION['msg'] = $message;
        }
        header("Location: {$path}");
        exit;
    }

    function new() {
        $this->data['marcas'] = (object) [
            'marca' => ''
        ];
        $this->data['pagina'] = 'Cadastrar marcas';
        $this->data['method'] = 'save';
        return view('marcas/form', $this->data);
    }

    function save() {
        $requests = $_REQUEST;

        $values = [
            'marca' => $requests['marca']
        ];

        if ($this->marcas->insert($values)) {
            $msg = ['texto' => 'Cadastrado com Sucesso!', 'color' => 'success'];
        } else {
            $msg = ['texto' => 'Não foi cadastrado!', 'color' => 'danger'];
        }

        Marcas::redirect(base_url('marcas'), $msg);
    }

    function index() {
        $this->data['marcas'] = $this->marcas->select()->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'Listar marcas';
        if (isset($_SESSION['msg'])) {
            unset($_SESSION['msg']);
        }
        return view('marcas/index', $this->data);
    }

    function edit($id) {
        $this->data['marcas'] = $this->marcas->select(null, 'marcas_id = ' . $id)->fetchObject();
        $this->data['pagina'] = 'Alterar marcas';
        $this->data['method'] = 'edit_save';

        return view('marcas/form', $this->data);
    }

    function edit_save() {
        $requests = $_REQUEST;

        $values = [
            'marca' => $requests['marca']
        ];

        if ($this->marcas->update('marcas_id = ' . $requests['marcas_id'], $values)) {
            $msg = ['texto' => 'Alterado com Sucesso!', 'color' => 'success'];
        } else {
            $msg = ['texto' => 'Não foi alterado!', 'color' => 'danger'];
        }

        Marcas::redirect(base_url('marcas'), $msg);
    }

    function delete($id) {
        if ($this->marcas->delete('marcas_id = ' . $id)) {
            $msg = ['texto' => 'Excluído com Sucesso!', 'color' => 'success'];
        } else {
            $msg = ['texto' => 'Não foi Excluído!', 'color' => 'danger'];
        }
        Marcas::redirect(base_url('marcas'), $msg);
    }

    function search() {
        $requests = $_REQUEST;
        if (isset($requests['pesquisar'])) {
            $where = 'marca LIKE "%' . $requests['pesquisar'] . '%"';
            $this->data['marcas'] = $this->marcas->select(null, $where)->fetchAll(PDO::FETCH_CLASS);

            $msg = [
                'texto' => "Total de registros: " . count($this->data['marcas']),
                'color' => "success"
            ];
            $_SESSION['msg'] = $msg;
            $this->data['pagina'] = 'Pesquisar marcas';
            return view('marcas/index', $this->data);
        } else {
            Marcas::redirect(base_url('marcas'));
        }
    }
}
