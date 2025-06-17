<?php

namespace Controllers;

require_once("Models/Database.php");
require_once("Config/Helpers.php");

use Models\Database as Conexao;
use \PDO;

class Carros {

    private $carros;
    private $data;

    function __construct() {
        $this->carros = new Conexao('carros');
    }

    protected function redirect($path, $message = null) {
        if ($message) {
            $_SESSION['msg'] = $message;
        }
        header("Location: {$path}");
        exit;
    }

    // Formulário de cadastro
    function new() {
        $this->data['carros'] = (object) [
            'carros_id' => '',
            'carros_modelo' => '',
            'carros_ano_fabricacao' => '',
            'carros_ano_modelo' => '',
            'carros_tipo_combustivel' => '',
            'carros_placa' => '',
            'carros_cor' => '',
            'carros_quilometragem' => '',
            'carros_cambio' => '',
            'carros_preco_venda' => '',
            'carros_preco_fipe' => '',
            'carros_status' => '',
            'carros_data_cadastro' => '',
            'marca_id' => '',
        ];

        $marcas = new \Models\Database('marcas');
        $this->data['marcas'] = $marcas->select()->fetchAll(PDO::FETCH_OBJ);

        $this->data['pagina'] = 'Cadastrar carros';
        $this->data['method'] = 'save';
        return view('carros/form', $this->data);
    }

    // C - Cadastrar carro
    function save() {
        $requests = $_REQUEST;

        $values = [
            'carros_modelo' => $requests['carros_modelo'],
            'carros_ano_fabricacao' => $requests['carros_ano_fabricacao'],
            'carros_ano_modelo' => $requests['carros_ano_modelo'],
            'carros_tipo_combustivel' => $requests['carros_tipo_combustivel'],
            'carros_placa' => $requests['carros_placa'],
            'carros_cor' => $requests['carros_cor'],
            'carros_quilometragem' => $requests['carros_quilometragem'],
            'carros_cambio' => $requests['carros_cambio'],
            'carros_preco_venda' => $requests['carros_preco_venda'],
            'carros_preco_fipe' => $requests['carros_preco_fipe'],
            'carros_status' => $requests['carros_status'],
            'carros_data_cadastro' => $requests['carros_data_cadastro'],
            'marca_id' => $requests['marca_id']
        ];

        if ($this->carros->insert($values)) {
            $msg = ['texto' => 'Cadastrado com Sucesso!', 'color' => 'success'];
        } else {
            $msg = ['texto' => 'Não foi cadastrado!', 'color' => 'danger'];
        }
        Carros::redirect(base_url('carros'), $msg);
    }

    // R - Listar carros
    function index() {
        $join = 'marcas ON carros.marca_id = marcas.marcas_id';
        $fields = 'carros.*, marcas.marca';
        
        $this->data['carros'] = $this->carros
            ->select($join, null, null, null, $fields)
            ->fetchAll(PDO::FETCH_OBJ);

        $this->data['pagina'] = 'Listar carros';

        if (isset($_SESSION['msg'])) {
            unset($_SESSION['msg']);
        }

        return view('carros/index', $this->data);
    }

    // R - Editar
    function edit($id) {
        $this->data['carros'] = $this->carros->select(null, 'carros_id = ' . $id)->fetchObject();

        $marcas = new \Models\Database('marcas');
        $this->data['marcas'] = $marcas->select()->fetchAll(PDO::FETCH_OBJ);

        $this->data['pagina'] = 'Alterar carros';
        $this->data['method'] = 'edit_save';

        return view('carros/form', $this->data);
    }

    // R - Pesquisar
    function search() {
        $requests = $_REQUEST;
        if (isset($requests['pesquisar'])) {
            $where = 'carros_modelo like "%' . $requests['pesquisar'] . '%"'; 
            $this->data['carros'] = $this->carros->select(null, $where)->fetchAll(PDO::FETCH_OBJ);

            $msg = [
                'texto' => "Total de registros: " . count($this->data['carros']),
                'color' => "success"
            ];
            $_SESSION['msg'] = $msg;
            $this->data['pagina'] = 'Pesquisar carros';
            return view('carros/index', $this->data);
        } else {
            Carros::redirect(base_url('carros'));
        }
    }

    // U - Atualizar
    function edit_save() {
        $requests = $_REQUEST;

        $values = [
            'carros_modelo' => $requests['carros_modelo'],
            'carros_ano_fabricacao' => $requests['carros_ano_fabricacao'],
            'carros_ano_modelo' => $requests['carros_ano_modelo'],
            'carros_tipo_combustivel' => $requests['carros_tipo_combustivel'],
            'carros_placa' => $requests['carros_placa'],
            'carros_cor' => $requests['carros_cor'],
            'carros_quilometragem' => $requests['carros_quilometragem'],
            'carros_cambio' => $requests['carros_cambio'],
            'carros_preco_venda' => $requests['carros_preco_venda'],
            'carros_preco_fipe' => $requests['carros_preco_fipe'],
            'carros_status' => $requests['carros_status'],
            'carros_data_cadastro' => $requests['carros_data_cadastro'],
            'marca_id' => $requests['marca_id']
        ];

        if ($this->carros->update('carros_id = ' . $requests['carros_id'], $values)) {
            $msg = ['texto' => 'Alterado com Sucesso!', 'color' => 'success'];
        } else {
            $msg = ['texto' => 'Não foi alterado!', 'color' => 'danger'];
        }
        Carros::redirect(base_url('carros'), $msg);
    }

    // D - Deletar
    function delete($id) {
        if ($this->carros->delete('carros_id = ' . $id)) {
            $msg = ['texto' => 'Excluído com Sucesso!', 'color' => 'success'];
        } else {
            $msg = ['texto' => 'Não foi Excluído!', 'color' => 'danger'];
        }
        Carros::redirect(base_url('carros'), $msg);
    }
}
