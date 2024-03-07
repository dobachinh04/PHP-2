<?php

namespace Admin\Mvcoop2\Models;

use Admin\Mvcoop2\Commons\Model;

class Search extends Model
{
    public function Searched()
    {
        if (isset($_GET['search'])) {
            try {
                $fillervalues = $_GET['search'];
                $sql = "SELECT * FROM users WHERE CONCAT(id, name, email) LIKE '%$fillervalues%' ";

                $stmt = $this->conn->prepare($sql);

                $stmt->execute();

                return $stmt->fetchAll();
            } catch (\Exception $e) {
                echo 'ERROR: ' . $e->getMessage();
                die;
            }
        }
    }
}