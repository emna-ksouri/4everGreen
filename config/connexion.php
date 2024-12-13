<?php
class Connexion {
    public static function connect(){
        $servername = 'localhost';
        $port = '3308';
        $username = 'root';
        $dbname = 'pfa';
        $password = '';

        try {
            $bdd = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->query("SET NAMES 'utf8'");
            return $bdd;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>

?>