<?php

namespace App\Services;

use PDO;

class DbConnect
{
    private $host = "your_database_host";
    private $dbname = "your_database_name";
    private $username = "your_database_username";
    private $password = "your_database_password";

    public function connect()
    {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

namespace App\Services;

use Illuminate\Support\Facades\DB;
use PDO;

class LdapLoginService

// <?php
// error_reporting(0);

// require '../includes/DbConnect.php';
// class LoginDetails
{
    public function getUserDetails($txtUsername, $txtPassword)
    {
        $uname = $txtUsername."@intranet.slt.com.lk";
        $pwd = $txtPassword;
                
        $link = ldap_connect( 'intranet.slt.com.lk' );
        
        if(! $link )
        {
            $response_data['error'] = true;
             $response_data['message'] = 'Cannot Conenct to LDAP';
             $response_data['data'] ='';
        }
        
        ldap_set_option($link, LDAP_OPT_PROTOCOL_VERSION, 3); 
        
        if (ldap_bind( $link, $uname, $pwd ) )
        {           
            
            $sql = "select SERVICENO,UNAME,b.RTOM,STATUS,ROLE_ID ,JOBROLE , CODE from INCEN_USERS ,EMP_BASE  b   where SERVICENO =:vno AND STATUS = '1' and SERVICENO = sno";
        
            $db = new DbConnect();
            $con = $db->connect();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':vno', $txtUsername);

            if ($stmt->execute()) {

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                $con = null;
            
             $data = [];
             $response_data['error'] = false;
             $response_data['message'] = 'SUCCESS';
             $response_data['data'] = $results;
                
            //  $sql ="UPDATE app_login SET last_login=sysdate,login_count = login_count+1 WHERE username = ?";	

            //  $con_comp=  $this->con->prepare($sql);
             
            //  if($con_comp->execute([$username]))
            //  {
            //      $userupdatecount = $con_comp->rowCount();
            //      return $userupdatecount;   
            //  }
            //  else
            //  {
            //     return FAILED;
            //  }
             
              
            }
              else
              {
                $response_data['error'] = true;
                $response_data['message'] = 'Not Authorized';
                $response_data['data'] ='';
              }
        
        }
        return $response_data;
    }
}

