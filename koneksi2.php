<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
	$database = "employees";

    $conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT dept_no,dept_name
		FROM departments';

		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>Departments Number</th>
				<th>Departments Name</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['dept_no'].'</td>
			<td>'.$row['dept_name'].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);