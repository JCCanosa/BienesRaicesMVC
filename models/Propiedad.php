<?php

namespace Model;

class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'aparcamiento', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $aparcamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->aparcamiento = $args['aparcamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un título";
        }

        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }
        if(strlen($this->descripcion) < 50){
            self::$errores[] = "Debes añadir una descipción o escribir al menos 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[] = "Debes añadir un número de habitaciones";
        }
        if(!$this->wc){
            self::$errores[] = "Debes añadir un número de baños";
        }
        if(!$this->aparcamiento){
            self::$errores[] = "Debes añadir un número de plazas de parking";
        }
        if(!$this->vendedores_id){
            self::$errores[] = "Debes elegir un vendedor";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es Obligatoria";
        }
        return self::$errores;
    }


}