<?php
//Conexion a la base de datos
class Data
{
    private static $instancia = NULL;

    public static function createInstance()
    {
        $host = gethostname();
        
        switch ($host) {
            case "DESKTOP-6JS75HP": //Lara: Desktop
                if (!isset(self::$instancia)) { //Hacemos referencia a nuestra instancia
                    $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    self::$instancia = new PDO('mysql:host=127.0.0.1:3702;dbname=db_anc', 'root', '', $optionsPDO);
                }
                break;

            case "LAPTOP-VAHCRQFH": //Lara: Laptop
                if (!isset(self::$instancia)) { //Hacemos referencia a nuestra instancia
                    $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    self::$instancia = new PDO('mysql:host=localhost;dbname=db_anc', 'root', '', $optionsPDO);
                }
                break;
            case "Luis": //Luis: Laptop
                if (!isset(self::$instancia)) { //Hacemos referencia a nuestra instancia
                    $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    self::$instancia = new PDO('mysql:host=127.0.0.1;dbname=db_anc', 'root', '', $optionsPDO);
                }
                break;
            case "DESKTOP-G5VBRNC":
                if (!isset(self::$instancia)) { //Hacemos referencia a nuestra instancia
                    $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    self::$instancia = new PDO('mysql:host=127.0.0.1;dbname=db_anc', 'root', '', $optionsPDO);
                }
                break;
            case "cp-19.webhostbox.net":
                if (!isset(self::$instancia)) { //Hacemos referencia a nuestra instancia
                    $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    // echo 'Llego a data y case';
                    // self::$instancia = new PDO('mysql:host=localhost:3306;dbname=crhershe_db_anc', 'crhershe_teamcode', 'EWa512kewpse', $optionsPDO);
                    // self::$instancia = new PDO('mysql:host=localhost:3306;dbname=crhershe_db_anc', 'crhershe_teamcode', '', $optionsPDO);
                    // self::$instancia = new PDO('mysql:host=localhost;dbname=crhershe_db_anc', 'crhershe_teamcode', '', $optionsPDO);
                    // self::$instancia = new PDO('mysql:host=localhost;dbname=crhershe_db_anc', 'crhershe_teamcode', 'EWa512kewpse', $optionsPDO);
                    
                    // self::$instancia = new PDO('mysql:host=localhost;dbname=crhershe_db_anc', 'crhershe@localhost', '', $optionsPDO);
                    // self::$instancia = new PDO('mysql:host=localhost;dbname=crhershe_db_anc', 'crhershe@localhost', 'EWa512kewpse', $optionsPDO);
                    try{
                        self::$instancia = new PDO('mysql:host=localhost;dbname=crhershe_db_anc', 'crhershe_teamcode', 'Rjll2000', $optionsPDO);
                        
                    } catch (PDOException $pe) {
                        die("Could not connect to the database $dbname :" . $pe->getMessage());
                    }
                }
            break;

            default:
                echo "No se encontro ningun host, debe configurar el archivo data.php";
                echo "El nombre que debe poner en el case es:";
                print_r($host . "<br>");
                echo "Luego de cambiar su nombre de host en el case configure su conexion para la base de datos dentro del scope de ese case";
                break;
        }
        
        return self::$instancia;
    }
}
