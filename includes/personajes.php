<?php

class Personaje {
    public $nombre;
    public $especie;
    public $puntosExperiencia;
    
    public function __construct($nombre, $especie) {
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->puntosExperiencia = 0;
    }
    
    public function mostrar() {
        return $this->nombre . " (" . $this->especie . ") - Experiencia: " . $this->puntosExperiencia . " puntos";
    }
}

class Guerrero extends Personaje {
    public $enemigosAbatidos;
    public $danoSufrido;
    
    public function __construct($nombre, $especie, $enemigosAbatidos, $danoSufrido) {
        parent::__construct($nombre, $especie);
        $this->enemigosAbatidos = $enemigosAbatidos;
        $this->danoSufrido = $danoSufrido;
        $this->puntosExperiencia = ($enemigosAbatidos * 10) + ($danoSufrido * 5);
    }
    
    public function mostrar() {
        return parent::mostrar() . " - Enemigos: " . $this->enemigosAbatidos . " - Daño: " . $this->danoSufrido;
    }
}

class Mago extends Personaje {
    public $secretosDescubiertos;
    public $hechizosLanzados;
    
    public function __construct($nombre, $especie, $secretosDescubiertos, $hechizosLanzados) {
        parent::__construct($nombre, $especie);
        $this->secretosDescubiertos = $secretosDescubiertos;
        $this->hechizosLanzados = $hechizosLanzados;
        $this->puntosExperiencia = ($secretosDescubiertos * 5) + ($hechizosLanzados * 10);
    }
    
    public function mostrar() {
        return parent::mostrar() . " - Secretos: " . $this->secretosDescubiertos . " - Hechizos: " . $this->hechizosLanzados;
    }
}

class Explorador extends Personaje {
    public $objetivosDescubiertos;
    public $vecesSinSerDescubierto;
    
    public function __construct($nombre, $especie, $objetivosDescubiertos, $vecesSinSerDescubierto) {
        parent::__construct($nombre, $especie);
        $this->objetivosDescubiertos = $objetivosDescubiertos;
        $this->vecesSinSerDescubierto = $vecesSinSerDescubierto;
        $this->puntosExperiencia = ($objetivosDescubiertos * 10) + ($vecesSinSerDescubierto * 5);
    }
    
    public function mostrar() {
        return parent::mostrar() . " - Objetivos: " . $this->objetivosDescubiertos . " - Sin detección: " . $this->vecesSinSerDescubierto;
    }
}

?>