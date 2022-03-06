<?php 
/**
 *  13 July 2020
 *  For Common Model
 */

 namespace App\Models;

use App\Core\Model;

class CommonModel extends Model{


    /**
     * For get Data
     */
    public function getData($table,$where = ""){ 

        $sql = "SELECT * FROM ".$table." WHERE ".$where;

        $data = $this->db->getRow($sql);
        
        return $data;

    }

}

?>
