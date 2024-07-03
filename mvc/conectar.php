<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Conectar{
            protected $pdo;
            public function __construct(){
                try {
                    $this->pdo = new PDO("mysql:host=localhost;dbname=dbsistemaboletos", 'root', '');
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                    echo "Fallo de conexion";
                }
            }
        }
    ?>
</body>
</html>