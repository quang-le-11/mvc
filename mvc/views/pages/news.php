<h2>
<?php
    echo $data["number"];
?>
</h2>

<?php 
while($row = mysqli_fetch_array($data["student"]))
{
    echo $row["hoten"];
}
?>