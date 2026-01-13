<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <?php 
    function sum(int $a, int $b): string {
        // echo $a + $b;
        return $a + $b;
    }
    function hi($name){
        // $name = 'Andres';
        echo  'Hola '. $name;
    }
    $name = 'Andres';
    // hi($name);
    // hi(5);
    $a = sum(5,3);
    var_dump($a);
    ?>
  
  <footer>
    <?php hi("Trump"); ?>
  </footer>
   
</body>
</html>