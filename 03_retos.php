<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retos funciones y condicionales</title>
</head>
<body>
    <?php 
        //************************* RETO 1 */
        //*** Formato 1, funcion tradicional
        // 1.0 enfoque tradicional
        // function parOImpar($numero)  {
        // mas moderno y recomendado al utilizar los tipos y tener validaciones por el tipo de dato implicitamente
        function parOImpar(int $numero) : string {

            // *** NO hace falta definirlo si le defines el tipo al argumento (1.0) int $numero
            // if (!is_numeric($numero)) {
            //     return "El valor ingresado no es un número.";
            // }

            // *** Forma 1: Tradicional con condicionales
            // if ($numero % 2 == 0) {
            //     return "El número $numero es PAR.";
            // } else {
            //     return "El número $numero es IMPAR.";
            // }

            // *** Forma 2: Ternatio
            // $res = ($numero % 2 == 0) ? "El número $numero es PAR." : "El número $numero es IMPAR.";
            // return $res;

            // *** Forma 3: Ternatio y retorno, al no usar el valor 
            // de la operacion en la funcion, podemos retornarlo directamente
            return ($numero % 2 == 0) ? "El número $numero es PAR." : "El número $numero es IMPAR.";

        }

        //*** Formato 2, funcion de fecla
        $parOImparFlecha = fn(int $numero) : string => ($numero % 2 == 0) ? "El número $numero es PAR." : "El número $numero es IMPAR.";

        // Ejemplos de uso

        //*** Para el Formato 2, funcion de fecla
        echo $parOImparFlecha(10);   // PAR
        echo "<br>";
        echo $parOImparFlecha(7);    // IMPAR
        echo "<br>";
        
        //*** Para el Formato 1, funcion tradicional
        // echo $parOImparFlecha("abc"); // No es número
        // echo parOImpar(10);   // PAR
        // echo "<br>";
        // echo parOImpar(7);    // IMPAR
        // echo "<br>";
        // echo parOImpar("abc"); // No es número
        //************************* RETO 2 */

        function precioFinal(int $precio, int $descuento) : string {

            if (!is_numeric($precio) || $precio < 0) {
                return "Precio inválido.";
            }

          
    if (!is_numeric($descuento) || $descuento < 0 || $descuento > 100) {
        return "Descuento inválido (debe ser entre 0 y 100).";
    }

    // Caso 0%
    if ($descuento == 0) {
        return "Precio sin descuento: $" . number_format($precio, 2);
    }

    // Caso 100%
    if ($descuento == 100) {
        return "El producto es GRATIS.";
    }

    // Caso entre 1% y 99%
    $precio_final = $precio - ($precio * ($descuento / 100));
    return "Precio con $descuento% de descuento: $" . number_format($precio_final, 2);

}

// Ejemplos de uso
echo precioFinal(100, 0);    // No descuento
echo "<br>";
echo precioFinal(100, 25);   // Descuento normal
echo "<br>";
echo precioFinal(50, 100);   // Gratis
echo "<br>";
echo precioFinal("abs", -5);   // Error
echo "<br>";
  
 
   
     
    ?>
  
  <footer>

  </footer>
   
</body>
</html>