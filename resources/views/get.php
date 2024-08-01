<?php
$conn = mysqli_connect('localhost','root','','nima');
if(isset($_POST['id']))
{
    $query = mysqli_query($conn,'select * from semesters where dept_id = '.$_POST['id'].'');
    while($row = mysqli_fetch_assoc($query))
    {
        echo "<option value=".$row['id'].">".$row['sem_title'].$row['sem_time']."</option>";
    }
}
else
{
    echo 0;
}