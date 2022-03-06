<?php 

// use App\Core;
use App\Models\UserModel as user;
/**
 *   Auther: Vanraj Kalsariya M.
 *   Purpose: Call action(Practical Test)
 *   Date: 05/03/2022
 * */
class Test extends App\Core\Controller
{
    private $mydata;
    /**
     *  Constructor called when you try to accessed any method of this class
     * */
    public function __construct()
    {
        parent::__construct();
        
        $this->loader->helper('custom');
        
        $this->mydata = json_decode(file_get_contents("php://input"), true);
        if (empty($this->mydata)) {
            $this->mydata   = $_POST;
        }
        if (session_status() === PHP_SESSION_NONE) 
        {
            session_start();
        }
        if(!isset($_SESSION['g_id']) && $this->action != "authenticate"){
            echo '<pre>';print_r($_SESSION['g_id']);
            header("Location: ".ACTION_PATH.'/test/authenticate');
            exit;
        }
    }
    /**
     *  Checked for Google oAuth2.0
     * */
    public function authenticate()
    {
        if(!empty($_POST))
        {
            if(!isset($_SESSION['g_id']))
            {
                $_SESSION['g_id'] = $_POST['g_id'];              
            }
            echo ACTION_PATH.'/test/getUser';
            exit;
        }else{
            // die('hello');
            include CURR_VIEW_PATH.'signin.php';
        }
    }
    /**
     *  SignOut from Google oAuth2.0 app as well as our web app
     * */
    public function signout()
    {
        unset($_SESSION['g_id']);
        include CURR_VIEW_PATH.'signout.php';
    }
    public function getUser()
    {   
        include CURR_VIEW_PATH.'test.php';
    }

    public function addUser()
    {

        $userModel = new user("tbl_user");

        if(!empty($_POST))
        {
            $data = filter_input_param($_REQUEST);
            if(isset($_FILES['profile_pic']))
            {
              $file_name = $_FILES['profile_pic']['name'];
              $file_size =$_FILES['profile_pic']['size'];
              $file_tmp =$_FILES['profile_pic']['tmp_name'];
              $file_type=$_FILES['profile_pic']['type'];
              $tmp = explode('.',$_FILES['profile_pic']['name']);
              $file_ext=strtolower(end($tmp));
              move_uploaded_file($file_tmp,UPLOAD_PATH."users/".$file_name);

              $data['profile_pic'] = "users/".$file_name;
            }
           $result = $userModel->addUser($data);
           header("Location: ".ACTION_PATH.'/test/getUser');
           exit;
        }else{
            $country = $userModel->getCountry();
            $education = $userModel->getEducationList();
            include CURR_VIEW_PATH.'add_user.php';
        }
    }

    public function editUser($id='')
    {
        $parts = explode("/", $_SERVER['PATH_INFO']);
        $id =  end($parts);
        $userModel = new user("tbl_user");
        if(!empty($_POST))
        {
            $data = filter_input_param($_REQUEST);
          
            if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['name'] != '')
            {
              $file_name = $_FILES['profile_pic']['name'];
              $file_size =$_FILES['profile_pic']['size'];
              $file_tmp =$_FILES['profile_pic']['tmp_name'];
              $file_type=$_FILES['profile_pic']['type'];
              $tmp = explode('.',$_FILES['profile_pic']['name']);
              $file_ext=strtolower(end($tmp));
              move_uploaded_file($file_tmp,UPLOAD_PATH."users/".$file_name);

              $data['profile_pic'] = "users/".$file_name;
            }else{
                unset($data['profile_pic']);
            }
            $result = $userModel->addUser($data,$id);
           header("Location: ".ACTION_PATH.'/test/getUser');
           exit;
        }else{
            $users =  $userModel->getUsers($id);
            if(!empty($users)){
                $country = $userModel->getCountry();
                $education = $userModel->getEducationList();
                $city = $userModel->get_city('',false);
                include CURR_VIEW_PATH.'add_user.php';
            }else{
                include CURR_VIEW_PATH.'404.php';
            }
        }
    }

    public function get_user_list()
    {
        $userModel = new user("tbl_user");

        $users = $userModel->getUsers();
       
        $data = array();
        if(!empty($users))
        {
            foreach($users as $key=>$value)
            {
                if($value['profile_pic'] != ''){
                    $data1['profile_pic'] = "<img src='/".UPLOAD_PATH.'/'.$value['profile_pic']."' style='width:112px'>";
                }else{
                    $data1['profile_pic'] =  '-';
                }
                $data1['name'] = $value['name'];
                $data1['email'] = $value['email'];
                $data1['age'] = $value['age'];
                $data1['status'] = $value['status'] == 1 ? 'Active' :'Inactive';
                $data1['action'] = ' <a href="'.ACTION_PATH.'/test/editUser/'.$value['id'].'" type="button" class="btn-sm btn-info">EDIT</a> <a type="button" class="btn-sm btn-danger" href="javascript:deleteUser('.$value['id'].')">DELETE</a>';
                $data[] = $data1;
            }
        }

        $json_data = array(
            "recordsTotal" => intval($userModel->total()), 
            "recordsFiltered" => intval(count($users)),
            "start" => $_REQUEST['start'],
            "length" => $_REQUEST['length'],
            "data" => $data,
        );
        echo json_encode($json_data);
    }

    public function deleteUser()
    {
         if(!empty($_POST['id']))
         {
             $userModel = new user("tbl_user");

             $users = $userModel->deleteUser($_POST['id']);
         }
         return true;
    }

    public function get_city()
    {
        $res = "";
        if(!empty($_POST['id']) && is_numeric($_POST['id']))
        {
            $userModel =  new user("tbl_user");
            $res = $userModel->get_city($_POST['id']);
        }
        echo $res;
    }

}

?>
