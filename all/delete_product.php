<?php
include '../db.php';
if(isset($_POST['delete'])) {
$medicine_check_item = $_POST['check_item'];
foreach ($medicine_check_item as $medicine_id) {
$delete_qry = "DELETE FROM medicines WHERE id = '$medicine_id' ";
$delete_qry_run = mysqli_query($con, $delete_qry);
}
header('location:product.php');
} else {
echo mysqli_error();
}
?>