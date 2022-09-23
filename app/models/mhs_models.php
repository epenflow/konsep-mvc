<?php

class mhs_models
{
    private $table = 'mhs';
    private $db;
    public function __construct()
    {
        // instansiasi kelas database
        $this->db = new Database;
    }
    public function getData()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllMhasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_mhs=:id_mhs');
        $this->db->bind('id_mhs', $id);
        return $this->db->single();
    }
    public function tambahData($data)
    {
        $query      = "INSERT INTO mhs VALUES ('', :nama, :email)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $q = 'DELETE FROM mhs WHERE id_mhs = :id';
        $this->db->query($q);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editData($data)
    {
        $query      = 'UPDATE mhs SET nama_mhs = :nama, email_mhs = :email WHERE id_mhs = :id';

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];
        $q = 'SELECT * FROM mhs WHERE nama_mhs LIKE :keyword';
        $this->db->query($q);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}
