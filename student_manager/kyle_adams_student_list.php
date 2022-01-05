<!--  
Kyle Adams
CSCI 4000-W1B
11/19/2019
-->

<?php include '../view/kyle_adams_header.php'; ?>
<!-- Display a list of students -->
<div id="index">
			<h2>Student List</h2>
			<section>
				<h3><?php echo $major_name; ?></h3>
				<table>
					<tr>
						<th>Student ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Gender</th>
						<th>&nbsp;</th>
					</tr>

					<?php foreach ($student as $s) : ?>
					<tr>
						<td style="text-align: center"><?php echo $s['studentID']; ?></td>
						<td><?php echo $s['firstName']; ?></td>
						<td><?php echo $s['lastName']; ?></td>
						<td style="text-align: center"><?php echo $s['gender']; ?></td>
						<td>
							<form action="." method="post">
							<input type="hidden" name="action"
                           		   value="delete_student" />
							<input type="hidden" name="student_id" 
								   value="<?php echo $s['studentID']; ?>">
							<input type="hidden" name="major_id" 
								   value="<?php echo $s['majorID']; ?>">
							<input type="submit" value="Delete">
							</form>
						</td>
					</tr>
					<?php endforeach; ?>

				</table>
				<a href="?action=show_add_form">Add Student</a><br>
			</section>
			<!-- Display links for all majors -->
			<aside>
				<ul>
					<h3 class="index">Majors</h3>
	 				<?php foreach ($majors as $major) : ?> 
				 		<li>
							<a href=".?major_id=<?php echo $major['majorID']; ?>">
								<?php echo $major['majorName']; ?></a>
						</li>
			 		<?php endforeach; ?>
			 	</ul>
			</aside>
		</div>
<?php include '../view/kyle_adams_footer.php'; ?>