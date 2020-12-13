<?php 
session_start();
class DBcon{
    function __construct(){
    $conn = mysqli_connect('localhost', 'root', '', 'test');
    $this->dbcon = $conn;
    }

    public function search($txt){
        $sql = mysqli_query($this->dbcon, "SELECT * FROM test WHERE name LIKE  '%$txt%' ");
        return $sql;
    }

    public function fetch(){
        $sql = mysqli_query($this->dbcon, "SELECT * FROM test");
        return $sql;
    }

    public function fetch_onerecord($id){
        $sql = mysqli_query($this->dbcon, "SELECT * FROM test WHERE id = '$id'");
        return $sql;
    }
    
    public function delete($delete_id){
        $sql = mysqli_query($this->dbcon, "DELETE FROM test WHERE id = '$delete_id'");
        return $sql;
    }

    public function edit($id, $date, $time, $name, $tel, $user){
        $sql = mysqli_query($this->dbcon, "UPDATE test SET
                            date = '$date',
                            time = '$time',
                            name = '$name',
                            tel = '$tel'
                            WHERE id = '$id'");

        $sql1 = mysqli_query($this->dbcon, "INSERT INTO log (l_name, l_type) VALUES('$user', 'edit')");
        if(!$sql1){
            echo mysqli_error();
        }

        // return $sql;

    }

    public function login($username, $password){
        $sql = mysqli_query($this->dbcon, "SELECT * FROM member WHERE m_user = '$username' AND m_pass = '$password'");
        if(mysqli_num_rows($sql) == 1){
            $row = mysqli_fetch_array($sql);
            
            $_SESSION['name'] = $row['m_name'];
            echo "<script>window.location.href='index.php'</script>";

            
        }
    }


    

}


?>