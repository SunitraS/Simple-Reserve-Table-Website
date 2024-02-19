<?php 
    include_once('func.php');

    if (isset($_GET['del'])) {
        $no = $_GET['del'];
        $deletedata = new booking();
        $sql = $deletedata->delete($no);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='adminCus.php'</script>";
        }
    }
?>