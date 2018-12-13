<?php

namespace Clases;

class Productos
{

    //Atributos
    public $id;
    public $cod;
    public $titulo;
    public $precio;
    public $precio_descuento;
    public $precio_mayorista;
    public $stock;
    public $desarrollo;
    public $categoria;
    public $subcategoria;
    public $keywords;
    public $description;
    public $fecha;
    public $meli;
    public $url;
    private $con;
    public $var1;
    public $var2;
    public $var3;
    public $var4;
    public $var5;
    public $var6;
    public $var7;
    public $var8;

    //Metodos
    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function add()
    {
        $sql   = "INSERT INTO `productos`(`cod`, `titulo`,`cod_producto`, `precio`, `precio_descuento`, `precio_mayorista`, `stock`, `desarrollo`, `categoria`, `subcategoria`, `keywords`, `description`, `fecha`, `meli`, `url`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`) VALUES ('{$this->cod}', '{$this->titulo}','{$this->cod_producto}', '{$this->precio}', '{$this->precio_descuento}', '{$this->precio_mayorista}', '{$this->stock}', '{$this->desarrollo}', '{$this->categoria}', '{$this->subcategoria}', '{$this->keywords}', '{$this->description}', '{$this->fecha}', '{$this->meli}', '{$this->url}', '{$this->var1}', '{$this->var2}', '{$this->var3}', '{$this->var4}', '{$this->var5}', '{$this->var6}', '{$this->var7}', '{$this->var8}')";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function edit()
    {
        $sql = "UPDATE `productos` SET
        `cod` = '{$this->cod}',
        `titulo` = '{$this->titulo}',
        `precio` = '{$this->precio}',
        `cod_producto` = '{$this->cod_producto}',
        `precio_descuento` = '{$this->precio_descuento}',
        `precio_mayorista` = '{$this->precio_mayorista}',
        `stock` = '{$this->stock}',
        `desarrollo` = '{$this->desarrollo}',
        `categoria` = '{$this->categoria}',
        `subcategoria` = '{$this->subcategoria}',
        `keywords` = '{$this->keywords}',
        `description` = '{$this->description}',
        `fecha` = '{$this->fecha}',
        `meli` = '{$this->meli}',
        `var1` = '{$this->var1}',
        `var2` = '{$this->var2}',
        `var3` = '{$this->var3}',
        `var4` = '{$this->var4}',
        `var5` = '{$this->var5}',
        `var6` = '{$this->var6}',
        `var7` = '{$this->var7}',
        `var8` = '{$this->var8}'
        WHERE `id`='{$this->id}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function delete()
    {
        $sql   = "DELETE FROM `productos` WHERE `cod`  = '{$this->cod}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function view()
    {
        $sql   = "SELECT * FROM `productos` WHERE id = '{$this->id}' ||  cod = '{$this->cod}' ORDER BY id DESC";
        $notas = $this->con->sqlReturn($sql);
        $row   = mysqli_fetch_assoc($notas);
        return $row;
    }

    function list($filter,$order,$limit) {
        $array = array();
        if (is_array($filter)) {
            $filterSql = "WHERE ";
            $filterSql .= implode(" AND ", $filter);
        } else {
            $filterSql = '';
        }

        if ($order != '') {
            $orderSql = $order;
        } else {
            $orderSql = "id DESC";
        }

        if ($limit != '') {
            $limitSql = "LIMIT " . $limit;
        } else {
            $limitSql = '';
        }

        $sql = "SELECT * FROM `productos` $filterSql  ORDER BY $orderSql $limitSql";
        $notas = $this->con->sqlReturn($sql); 
        if ($notas) {
            while ($row = mysqli_fetch_assoc($notas)) {
                $array[] = $row;
            }
            return $array ;
        } 
    }

    function paginador($filter,$cantidad) {
        $array = array();
        if (is_array($filter)) {
            $filterSql = "WHERE ";
            $filterSql .= implode(" AND ", $filter);
        } else {
            $filterSql = '';
        }
        $sql = "SELECT * FROM `productos` $filterSql";
        $contar = $this->con->sqlReturn($sql);
        $total = mysqli_num_rows($contar);
        $totalPaginas = $total / $cantidad;
        return floor($totalPaginas);       
    }
}
