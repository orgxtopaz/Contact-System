<?php

session_start();

if (!isset($_SESSION['login']) == 'yes') { //not logged in

    //redirect to login
    header("Location: login.php");
    exit(); // NOT DIE

}

$userID= $_SESSION["userID"];

include 'connection.php';

// Get the total number of records from our table "contacts".
$total_pages = $conn->query("SELECT * FROM `contacts` WHERE userID = '$userID'")->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 3;

if ($stmt = $conn->prepare("SELECT * FROM `contacts` WHERE userID = '$userID' ORDER BY name LIMIT ?,?")) {
	// Calculate the page to get the results we need from our table.
	
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	?>
	<!DOCTYPE html>
	<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8643/8643765.png">
	<title>Home</title>
	<html>
		<head>
			<meta charset="utf-8">
			<style>


			body{
				background-image:url('images/home.svg');
				background-repeat:no-repeat;
				background-size: cover;
				font-family: Courier, monospace;
			}

			table {
				width: 500px;
			}
			td, th {
				padding: 10px;
			}
			th {
				background-color: #6c63ff;
				color: white;
				font-weight: bold;
				font-size: 18px;
				border: 1px solid #54585d;
			}
			td {
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #f9fafb;
			}
			tr:nth-child(odd) {
				background-color: #ffffff;
			}
			.pagination {
				list-style-type: none;
				padding: 10px 0;
				display: inline-flex;
				justify-content: space-between;
				box-sizing: border-box;
			}
			.pagination li {
				box-sizing: border-box;
				padding-right: 10px;
			}
			.pagination li a {
				box-sizing: border-box;
				background-color: #e2e6e6;
				padding: 8px;
				text-decoration: none;
				font-size: 12px;
				font-weight: bold;
				color: #616872;
				border-radius: 4px;
			}
			.pagination li a:hover {
				background-color: #d4dada;
			}
			.pagination .next a, .pagination .prev a {
				text-transform: uppercase;
				font-size: 12px;
			}
			.pagination .currentpage a {
				background-color: #518acb;
				color: #fff;
			}
			.pagination .currentpage a:hover {
				background-color: #518acb;
			}
			</style>
		</head>
		<body>
            <br>
            <br>
        <div style='text-align: right; margin-left:-10px'>
        <a href ='addContact.php' style='margin-left:10px'>Add Contact</a>
        <a style='margin-left:10px'>Contacts</a>
        <a href ='Logout.php'style='margin-left:10px'>Logout</a>
        </div>
        <br>
        <center>
			<br><br>
		<table class="table table table-bordered" style='width:70%'>

				<tr>
                <th scope="col">NAME</th>
                <th scope="col">COMPANY</th>
                <th scope="col">PHONE</th>
                <th scope="col">EMAIL</th>
                
                <th scope="col"></th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['company']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['email']; ?></td>
                    <td><a href='editContact.php?update_contact=<?php echo $row['contactID'];?>&userID=<?php echo $row['userID']?> '>EDIT</a> |
                <a href="functions.php?delete_contact=<?php echo $row['contactID'];?>" onclick="return confirm('Are you sure you want to delete this contact?'); return false;" > DELETE</a>
              </td>
				</tr>
				<?php endwhile; ?>
			</table>

            
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="contactpage.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="contactpage.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="contactpage.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="contactpage.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="contactpage.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="contactpage.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="contactpage.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="contactpage.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="contactpage.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
            </center>
		</body>
	</html>
	<?php
	$stmt->close();
}
?>