<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <?php 
      $edad = 17;

      // if($edad == 18){
      // if($edad > 18){
      // if($edad >= 18){
      //   echo 'Es mayor de edad';
      // } else {
      //   echo 'Es menor de edad';
      // }


      // if($edad <= 18){
      //   echo 'Es menor de edad';
      // } else {
      //   echo 'Es mayor de edad';
      // }

      $nota = 50;

      // if($nota >= 90){
      //   echo 'Eres excelente!';
      // } else if($nota >= 70){
      //   echo 'Bueno, un promedio como todo en tu vida!';
      // } else if($nota >= 50){
      //   echo 'Zamacuco!';  
      // } else if($nota < 50){
      //   echo 'No sirves';
      // }   

      // switch($nota) {
      //   case $nota >= 90:
      //     echo 'Eres excelente!';
      //     break;
      //   case $nota >= 70:
      //     echo 'Bueno, un promedio como todo en tu vida!';
      //     break;
      //   case $nota >= 50:
      //     echo 'Zamacuco!';
      //     break;
      //   case $nota < 50:
      //     echo 'No sirves';
      //     break;
      // }

      $dia = "Martes";
    switch ($dia) {
    case "Lunes":
        echo "Comienza la semana";
        break;
    case "Viernes":
        echo "Último día laboral";
        break;
    default:
        echo "Es un día normal";
        break;
    }

    // operadores
    $edad = 20;
    
    // $mayorEdad = true;
    //  if($edad <= 18){
    //     echo 'Es menor de edad';
    //     $mayorEdad = true;
    //   } else {
    //     echo 'Es mayor de edad';
    //     $mayorEdad = false;
    //   }
    var_dump(strtolower("Es MAYOR de edad"));
    //   $mayorEdad = ($edad <= 18) ? false : true;
        $mayorEdad = NULL ?? 10;


        var_dump($mayorEdad);

    ?>
  
  <footer>

  </footer>
   
</body>
</html>