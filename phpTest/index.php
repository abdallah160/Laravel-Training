<?php
include("database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary-subtle">
        <div class="container-fluid">
                <a class="navbar-brand" href="#">Employee Management System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
        </div>
    </nav>

    <div class="container mt-4 mb-4 ">
        
        <div class="row gap-4 justify-content-center">
            <div class="col-md-3 bg-primary-subtle rounded-3 p-4 ">
                <h3 class="mb-4">Add New Department</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="deptname" class="form-label">Department Name:</label>
                        <input type="text" id="deptname" name="dept_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="deptlocation" class="form-label">Department Location:</label>
                        <input type="text" id="deptlocation" name="dept_location" class="form-control" required>
                    </div>

                    <button type="submit" name="add_department" class="btn btn-warning">Add Department</button>
                </form>
            </div>

            <div class="col-md-3 bg-primary-subtle rounded-3 p-4">
                <h3 class="mb-4">Add New Employee</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required/>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="">Select...</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date of Joining:</label>
                        <input type="date" id="date" name="date_of_joining" class="form-control" required/>
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">Department:</label>
                        <input type="text" id="department" name="department" class="form-control" required/>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" required/>
                    </div>

                    <div class="mb-3">
                        <label for="phonenum" class="form-label">Phone Number:</label>
                        <input type="tel" id="phonenum" name="phone_number" class="form-control" required/>
                    </div>

                    <div class="mb-3">
                        <label for="emailid" class="form-label">Email:</label>
                        <input type="email" id="emailid" name="email" class="form-control" required/>
                    </div>

                    <button type="submit" name="Add_Employee" class="btn btn-warning">Add Employee</button>
                </form>
            </div>
            
            <div class="col-md-3 bg-primary-subtle rounded-3 p-4">
                <h3 class="mb-4">Add Leaving</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="employee" class="form-label">Select Employee:</label>
                        <select id="employee" name="employee_id" class="form-select" required>
                            <option value="">Choose...</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT EmpID, EmpName FROM employee");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['EmpID'] . "'>" . htmlspecialchars($row['EmpName']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="leavedate" class="form-label">Leave Date:</label>
                        <input type ="date" id="leavedate" name="leave_date" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="days" class="form-label">Days:</label>
                        <input type="number" id="days" name="days" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason:</label>
                        <input type="text" id="reason" name="reason" class="form-control" required />
                    </div>

                    <button type="submit" name="add_leaving" class="btn btn-warning">Add Leaving</button>
                </form>
            </div>
        </div>

        <div class="row mt-4 gap-4 justify-content-center">
            <div class="col-md-3 bg-primary-subtle rounded-3 p-4">
                <h3 class="mb-4">Add Salary</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="employee" class="form-label">Select Employee:</label>
                        <select id="employee" name="employee_id" class="form-select" required>
                            <option value="">Choose...</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT EmpID, EmpName FROM employee");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['EmpID'] . "'>" . htmlspecialchars($row['EmpName']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="basicpay" class="form-label">Add Basic Pay:</label>
                        <input type="number" id="basicpay" name="basic_pay" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="da" class="form-label">DA:</label>
                        <input type="number" id="da" name="da" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="hra" class="form-label">HRA:</label>
                        <input type="number" id="hra" name="hra" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="medicalallowance" class="form-label">Medical Allowance:</label>
                        <input type="number" id="medicalallowance" name="medical_allowance" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="childeducation" class="form-label">Child Education:</label>
                        <input type="number" id="childeducation" name="child_education" class="form-control"/>
                    </div>
                        <button type="submit" name="add_salary" class="btn btn-warning">Add Salary</button>
                </form>
            </div>
            <div class="col-md-3 bg-primary-subtle rounded-3 p-4">
                <h3 class="mb-4">Add Project</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                    <label for="projname" class="form-label">Project Name:</label>
                    <input type="text" id="projname" name ="proj_name" class="form-control" required />
                    </div>

                    <div class="mb-3">
                    <label for="duration" class="form-label">Duration:</label>
                    <input type="number" id="duration" name ="duration" class="form-control" required />
                    </div>

                    <div class="mb-3">
                    <label for="startingdate" class="form-label">Starting Date:</label>
                    <input type="date" id="startingdate" name ="starting_date" class="form-control" required />
                    </div>

                    <div class="mb-3">
                    <label for="endingdate" class="form-label">Ending Date:</label>
                    <input type="date" id="endingdate" name ="ending_date" class="form-control" required />
                    </div>

                    <div class="mb-3">
                    <label for="projhead" class="form-label">Project Head:</label>
                    <input type="text" id="projhead" name ="proj_head" class="form-control" required />
                    </div>

                    <div class="mb-3">
                    <label for="deliverydate" class="form-label">Delivery Date:</label>
                    <input type="date" id="deliverydate" name ="delivery_date" class="form-control" required />
                    </div>
                    <button type="submit" name="add_project" class="btn btn-warning">Add Project</button>
                </form>
            </div>

            <div class="col-md-3 bg-primary-subtle rounded-3 p-4">
                <h3 class="mb-4">Connect a Project to Department</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="project" class="form-label">Select Project:</label>
                        <select id="project" name="project_id" class="form-select" required>
                            <option value="">Choose...</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT ProjectID, ProjectName FROM project");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['ProjectID'] . "'>" . htmlspecialchars($row['ProjectName']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Select Department:</label>
                        <select id="department" name="department_id" class="form-select" required>
                            <option value="">Choose...</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT DeptID, DepartmentName FROM department");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['DeptID'] . "'>" . htmlspecialchars($row['DepartmentName']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="connect_project" class="btn btn-warning">Connect</button>
                </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>

<?php
$departmentMessage = '';
$employeeMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_department'])) {
    $deptName = $_POST['dept_name'];
    $deptLocation = $_POST['dept_location'];
    $sql = "INSERT INTO department (DepartmentName, Location) VALUES ('$deptName', '$deptLocation')";
    mysqli_query($conn, $sql);
    $departmentMessage = "Department added successfully.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Add_Employee'])) {
    $empName = $_POST['name'];
    $empGender = $_POST['gender'];
    $empDate = $_POST['date_of_joining'];
    $empDepartment = $_POST['department'];
    $empAddress = $_POST['address'];
    $empPhoneNum = $_POST['phone_number'];
    $empEmail = $_POST['email'];
    $sql = "INSERT INTO employee (EmpName, Gender, DateOfJoining, DepartmentID, Address, PhoneNumber, EmailID) VALUES ('$empName', '$empGender', '$empDate', '$empDepartment', '$empAddress', '$empPhoneNum', '$empEmail')";
    mysqli_query($conn, $sql);
    $employeeMessage = "Employee registered successfully.";
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_leaving'])) {
    $empID = $_POST['employee_id'];
    $leaveDate = $_POST['leave_date'];
    $days = $_POST['days'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO leaving (EmpID, LeaveDate , NumberOfDays, Reason) VALUES ('$empID', '$leaveDate', '$days', '$reason')";
    mysqli_query($conn, $sql);
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['add_project'])){
    $projName = $_POST['proj_name'];
    $projDuration = $_POST['duration'];
    $projStartDate = $_POST['starting_date'];
    $projEndDate= $_POST['ending_date'];
    $projHead = $_POST['proj_head'];
    $projDelivery = $_POST['delivery_date'];
    $sql = "INSERT INTO project (ProjectName, Duration, StartingDate, EndingDate, ProjectHead, DeliveryDate) VALUES ('$projName', '$projDuration', '$projStartDate', '$projEndDate', '$projHead', '$projDelivery')";
    mysqli_query($conn, $sql);

}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_salary'])){
    $empID = $_POST["employee_id"];
    $salary = $_POST["basic_pay"];
    $da = $_POST["da"];
    $hra = $_POST["hra"];
    $medicalAllowance = $_POST["medical_allowance"];
    $childEducation = $_POST["child_education"];
    $sql = "INSERT INTO salary (EmpID, BasicPay, DA, HRA, MedicalAllowance, ChildEducation) VALUES ('$empID', '$salary', '$da', '$hra', '$medicalAllowance', '$childEducation')";
    mysqli_query($conn, $sql);
}

if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['connect_project'])){
    $projID = $_POST['project_id'];
    $deptID = $_POST['department_id'];
    $sql = "INSERT INTO project_department (DepartmentID, ProjectID) VALUES ('$deptID','$projID')";
    mysqli_query($conn, $sql);
}


mysqli_close($conn);
?>
