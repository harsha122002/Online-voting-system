<?php
session_start();
include("connect.php");

$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$vid =$_POST['userdata']['id'];

$update_votes = mysqli_query($connect, "UPDATE user set votes = '$total_votes' where id='$gid' ");
$update_user_status = mysqli_query($connect, "UPDATE user set status=1 where id='$uid' ");

if($update_votes and $update_user_status){
$groups = mysqli_query($connect, "SELECT * from user where role=2");
$groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
$_SESSION['userdata']['status']=1;
$_SESSION['groupsdata'] = $groupsdata;
    echo '
    <script>
    alert("Voting Sucessfully");
window.location= "../routs/dashboard.php";
</script>
';

}
else{
    echo '
    <script>
    alert("some error occured");
window.location= "../routs/dashboard.php";
</script>
';
}

?>