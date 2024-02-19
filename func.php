<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'reservation');

class DB_con
{
    public $dbcon;
    function __construct()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM customer");
        return $result;
    }

    public function fetchonerecord($userID)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM customer WHERE userID = '$userID'");
        return $result;
    }

    public function update($userID,$userFName, $userLName, $userPhone, $email, $password)
    {
        $result = mysqli_query($this->dbcon, "UPDATE customer SET 
            userFName = '$userFName',
            userLName = '$userLName',
            userPhone = '$userPhone',
            email = '$email',
            password = md5($password)
            WHERE userID = '$userID'
        ");
        return $result;
    }

    public function delete($userID)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM customer WHERE userID = '$userID'");
        return $deleterecord;
    }
}


class booking
{
    public $dbcon;
    function __construct()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }


    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_booking ORDER BY booking_date");
        return $result;
    }

    public function fetchonerecord($no)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_booking WHERE no = '$no'");
        return $result;
    }

    public function update($no,$table_id, $booking_name, $booking_date, $booking_time, $booking_person, $booking_phone, $total_price, $dateCreate)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = "UPDATE tbl_booking SET 
            no = '$no',
            table_id = '$table_id',
            booking_name = '$booking_name',
            booking_date = '$booking_date',
            booking_time = '$booking_time',
            booking_person = '$booking_person',
            booking_phone = '$booking_phone',
            total_price = '$total_price',
            dateCreate = '$dateCreate' WHERE no = '$no'";
            $result = $conn->query($sql);
        return $result;
    }

    public function delete($no)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // get the table_id for the record being deleted
        $result = $conn->query("SELECT table_id FROM tbl_booking WHERE no = '$no'");
        $row = $result->fetch_assoc();
        $table_id = $row['table_id'];

        // delete the record from tbl_booking
        $sql = "UPDATE tbl_booking SET booking_name = 'Payment Failed' WHERE no = '$no'";
        $result = $conn->query($sql);

        // update the table_status column in tbl_table
        $sql = "UPDATE tbl_table SET table_status = 0 WHERE id = '$table_id'";
        $result = $conn->query($sql);

        return $result;
    }
}

?>