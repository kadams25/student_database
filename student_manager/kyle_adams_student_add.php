<!--  
Kyle Adams
CSCI 4000-W1B
11/20/2019
-->

<?php include '../view/kyle_adams_header.php'; ?>
<div id="add_student">
			<section>
				<h2>Add Student</h2>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="add_student" />
					<div id="data">
						<label>Major:</label>
						<select name="major_id">
							
						<!-- Display dropdown list of majors  -->
						<?php foreach ($majors as $major) : ?>
							<option value="<?php echo $major['majorID']; ?>">
								<?php echo $major['majorName']; ?>
							</option>
						<?php endforeach; ?>
						
						</select><br>
						<label>First Name:</label>
							<input type="input" name="firstName"><br>
						<label>Last Name:</label>
							<input type="input" name="lastName"><br>
						<label>Gender:</label>
							<select name="gender">
								<option>Male</option>
								<option>Female</option>
							</select><br>
					</div>
					<div id="button">
						<input type="submit" value="Add Student">
					</div>
				</form>
				<a href="index.php?action=list_students">View All Students</a>
			</section>
		</div>
<?php include '../view/kyle_adams_footer.php'; ?>