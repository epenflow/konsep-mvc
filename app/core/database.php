<?php

// database wrapper
class Database
{
    private $host    = DB_HOST;
    private $user    = DB_USER;
    private $pass    = DB_PASS;
    private $dbName  = DB_NAME;

    // dbh : database handler
    private $dbh;
    // stmt : statement
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = "mysql:host=$this->host;dbname=$this->dbName";
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // koneksi ke database menggunakan try and catch
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // fungsi untuk menjalankan query secara generik dan fleksibel
    public function query($q)
    {
        // konfigurasi untuk mempersiapkan query jika query sudah siap maka akan masuk ke property stmt
        $this->stmt = $this->dbh->prepare($q);
    }
    // fungsi binding
    public function bind($param, $value, $type = null)
    {
        // cek nilai type apakah null
        if (is_null($type)) {
            // switch true agar switchnya dapat berjalan
            switch (true) {
                    // cek value apakah int
                case is_int($value):
                    // jika int maka typenya int
                    $type = PDO::PARAM_INT;
                    break;
                    // cek value apakah boolean
                case is_bool($value):
                    // jika bolean maka typenya bool
                    $type = PDO::PARAM_BOOL;
                    break;
                    // cek value apakah null
                case is_null($value):
                    // jika null maka typenya null
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    // default type string
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
    // fungsi execute statement
    public function execute()
    {
        $this->stmt->execute();
    }

    // fungsi fetch data, jika banyak
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // fungsi fetch data, jika single
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
