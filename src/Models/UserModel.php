<?php
namespace App\Models;
/**
 *   Auther: Vanraj Kalsariya M.
 *   Controller called: Test.php 
 *   Date: 05/03/2022
 * */
use App\Core\Model;

class UserModel extends Model{


    public function getUsers($id='')
    {
        if(!empty($id))
        {
            $users = $this->selectByPk($id);
        }else{
            $searchme =array();
            $orderby =array();
            $condition = '1=1';
            $sortingsql = ' order by id desc';
            if(isset($_REQUEST['columns']))
            {
                foreach($_REQUEST['columns'] as $searchcolumn)
                {
                    $searchme[$searchcolumn['data']]['value'] = $searchcolumn['search']['value'];
                }
            }

            if(isset($searchme['name']['value']) && $searchme['name']['value'] !='' )
            {
                $condition .= " AND name like '%".addslashes($searchme['name']['value'])."%'"; 
            }
            if(isset($searchme['email']['value']) && $searchme['email']['value'] !='' )
            {
                $condition .= " AND email like '%".addslashes($searchme['email']['value'])."%'"; 
            }
            if(isset($searchme['age']['value']) && $searchme['age']['value'] !='' )
            {
                $condition .= " AND TIMESTAMPDIFF(YEAR, dob, CURDATE()) like '%".addslashes($searchme['age']['value'])."%'"; 
            }
            if(isset($searchme['status']['value']) && $searchme['status']['value'] !='' )
            {
               if(strstr($searchme['status']['value'],'a')) 
                {
                    $condition .= " AND status = 1"; 
                }else if(strstr($searchme['status']['value'],'i')){
                    $condition .= " AND status =0 "; 
                }else{
                    $condition .= " AND status != '' "; 
                }
            }
            if(isset($_REQUEST['order']))
            {
                $sortColumn = $_REQUEST['columns'][$_REQUEST['order'][0]['column']]['data'];
                $sort = $_REQUEST['order'][0]['dir'];   
                $sortingsql =" order by ".$sortColumn." ".$sort; 
            }
            $sql = "select id,profile_pic,name,email,DATE_FORMAT(FROM_DAYS(DATEDIFF(now(),dob)), '%Y')+0 AS age,status from $this->table  WHERE ".$condition." ".$sortingsql;

            $users = $this->db->getAll($sql);

        }
        return $users;
    }

    public function addUser($users,$id='')
    {
        if(!empty($id))
        {
            $users['id'] = $id;
            return $this->update($users);
        }else{
            return $this->insert($users);
        }
    }
    
    public function deleteUser($id)
    {
        $sql = "SELECT profile_pic from $this->table where id=$id";
        $row = $this->db->getRow($sql);
        
        unlink(UPLOAD_PATH.$row['profile_pic']);
        return $this->delete($id);
    }

    public function getCountry()
    {
        
        $sql = "SELECT * FROM tbl_country";
        $country = $this->db->getAll($sql);

        return $country;
    }

    public function getEducationList()
    {
        $sql = "SELECT * FROM tbl_education_list";
        $country = $this->db->getAll($sql);

        return $country;   
    }
    public function get_city($id="",$is_html = true)
    {
        if($id){
            $sql = "SELECT * FROM tbl_city where country_id=$id";
        }else{
            $sql = "SELECT * FROM tbl_city";
        }
        $city = $this->db->getAll($sql);
        $html = "";
        if(!empty($city))
        {
            if($is_html)
            {
                $html .= '<select id="city" name="city_id"  class="form-control">';
                foreach ($city as $key => $value) 
                {
                    $html .='<option  value="'.$value['id'].'">'.$value['city_name'].'</option>';
                }
                $html .='</select>';
                return $html;
            }
            else
            {
                return $city;       
            }
        }
    }

}