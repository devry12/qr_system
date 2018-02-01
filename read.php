<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "absen";

$link = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error());
?>
<!-- <table class="data">
	<tr>
		<th>id</th>
		<th>Nama</th>
		<th>Jam Hadir</th>
	</tr>
	<?php

  //     $query = "SELECT user.id_users, user.nama, user.no_tlp,absen.jam_hadir
  //     FROM  user,absen
  //     WHERE absen.id_users = user.id_users";
  //
	// $data = mysqli_query($link,$query);
	// while($d=mysqli_fetch_assoc($data)){
	?>
</table> -->

<?php

    // Design initial table header
    $data = '<table class="table table-bordered table-striped">';

    $query = "SELECT user.id_users, user.nama, user.no_tlp,absen.jam_hadir
              FROM  user,absen
              WHERE absen.id_users = user.id_users";

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }

    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                <td>'.$row['id_users'].'</td>
                <td>'.$row['nama'].'</td>
                <td>'.$row['jam_hadir'].'</td>';
            $number++;
        }
    }
    else
    {
        // records now found
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>
