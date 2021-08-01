<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
	$database = "employees";

    $conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT emp_no,birth_date,first_name,last_name,gender,hire_date
		FROM employees limit 20';

		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>Employees Number</th>
				<th>Birth Date</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Hire Date</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['emp_no'].'</td>
			<td>'.$row['birth_date'].'</td>
			<td>'.$row['first_name'].'</td>
			<td>'.$row['last_name'].'</td>
			<td>'.$row['gender'].'</td>
			<td>'.$row['hire_date'].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);