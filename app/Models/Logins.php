<?php namespace App\Models;

use CodeIgniter\Model;

class Logins extends Model{
    //find first email in DB and take user id, hash and access lvl
    function getuser($mail){
        $db = db_connect();
        $result=$db->table('user')
        ->where('email',$mail)
        ->limit(1)
        ->get()
        ->getRowArray();
        return $result;
    }

    function getformuser($id){
        $db = db_connect();
        $result=$db->table('user')
        ->select('id,email,accesslvl')
        ->where('id',$id)
        ->limit(1)
        ->get()
        ->getRowArray();
        return $result;
    }

    function updateformuser($id,$data){
        $db = db_connect();
        $result=$db->table('user')
        ->where('id',$id)
        ->update($data);
    }
}
?>
