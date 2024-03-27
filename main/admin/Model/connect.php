<?php
    class connect
    {
        var $db=null;
        function __construct()
        {
            $dsn='mysql:host=localhost; dbname=coffee';
            $user='root';
            $pass='';// nếu xài xamp, wamp, laragon thì $pass='';
            // kết nối dựa vào class PDO
            try {
                $this->db=new PDO($dsn, $user, $pass, array(PDO:: MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
                // echo "Kết nối thành công";
            } catch (\Throwable $th) {
                //throw $th;
                echo "Kết nối ko thành công";
                echo $th;
            }
        }
        // phương thức truy van tra ra nhieu row
        function getList($select)
        {
            $result=$this->db->query($select); // $this->db->query(select from hanghoa); 
            return $result;// trả về 1 table
        }
        // phương thức truy cần trả về 1 row
        function getInstance($select)
        { 
            $results=$this->db->query($select);// $this->db->query(select from hanghoa); 
            $result=$results->fetch();// $result là arry chỉ chứa 1 dòng, [mahh:1, tenhh:giay....] 
            return $result;
        }
        // câu lệnh insert, update, delete ai làm? exec
        function exec($query)
        {
            $results=$this->db->exec($query); 
            return $results;
        }
        // dùng prepare
        function execp($query)
        {
            $statement=$this->db->prepare($query); 
            return $statement;
        }
    }
?>