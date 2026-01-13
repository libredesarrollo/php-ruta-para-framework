<?php
class Persona {
    // Las propiedades pueden ser public, private o protected
    public function __construct(
        public string $nombre,
        public int $edad
    ) {}
    function test() {
        $this->saludar();
    }

    protected function saludar(): string {
        return "Hola, mi nombre es {$this->nombre} y tengo {$this->edad} años.";
    }
}

$juan = new Persona("Juan", 25);
// echo $juan->saludar();

/*class Persona2 {
    // Las propiedades pueden ser public, private o protected
    public $nombre;
    public $edad;
    public function __construct(

    ) {}

    public function saludar(): string {
        return "Hola, mi nombre es {$this->nombre} y tengo {$this->edad} años.";
    }
}

$juan = new Persona2();
$juan->nombre = 'Andres';
echo $juan->nombre;
// echo $juan->saludar();*/



class Empleado extends Persona {
    public function __construct(
        string $nombre,
        int $edad,
        public float $salario
    ) {
        // Llamamos al constructor de Persona
        parent::__construct($nombre, $edad);
    }

    public function trabajar(): string {
        $this->saludar();
        return "{$this->nombre} está trabajando por un sueldo de {$this->salario}.";
    }
}

$empleado = new Empleado("Ana", 30, 2500);
// echo $empleado->saludar(); // Heredado
echo $empleado->trabajar(); // Propio


abstract class Ciudadano {
    public function __construct(public string $dni) {}

    // Obliga a las clases hijas a definir este método
    abstract public function obtenerDerechos(): string;

    // Método normal que todas las hijas heredarán
    public function mostrarIdentidad(): string {
        return "Identificación: {$this->dni}";
    }
}

class Residente extends Ciudadano {
    public function obtenerDerechos(): string {
        return "Tiene derecho a voto y salud pública.";
    }
}

// $residente = new Ciudadano("1111"); // NO PUEDES CREAR LA INSTANCIA DE UNA CLASE ABSTRACTA
$residente = new Residente("1111");
echo $residente->obtenerDerechos();

interface Autenticable {
    public function login(): bool;
}

interface Autorizable {
    public function verificarPermisos(): array;
}

// Una clase Persona que además es un Usuario del sistema
class Usuario extends Persona implements Autenticable, Autorizable {
    public function login(): bool {
        // Lógica de inicio de sesión
        return true;
    }

    public function verificarPermisos(): array {
        return ['admin', 'editor'];
    }
}