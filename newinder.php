<?php
    // session_start();

    // if (isset($_SESSION['username'])) {
    //     echo "Welcome, " . $_SESSION['username'] . "!<br>";
    //     echo '<a href="logout.php">Logout</a>';
    // } else {
    //     header("Location: login.php");
    //     exit();
    // }
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

    <form class="row gy-2 gx-3 align-items-center" method="post">

        <div class="col-auto">
            <label for="gender">Gender:</label>
            <select class="form-select" name="gender">
                <option value="">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="col-auto">
            <label for="member_type">Member Type:</label>
            <select class="form-select" name="member_type">
                <option value="">All</option>
                <option value="Seller">Seller</option>
                <option value="Member">Member</option>
            </select>
        </div>

        <div class="col-auto">
            <label for="home_address">Home Address:</label>
            <select class="form-select" name="home_address">
                <option value="">All</option>
                <option value="Cebu City">Cebu City</option>
                <option value="Danao City">Danao City</option>
                <option value="Bogo City">Bogo City</option>
            </select>
        </div>

        <div class="col-auto">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date">
        </div>
        <div class="col-auto">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date">
        </div>
        

        <div class="col-auto">
            <button type="submit" name="search" class="btn btn-primary">Filter</button>
        </div>
    </form>
    <!-- ... Rest of your code ... -->
<?php
include("filter.php");
?>

<!-- Rest of your HTML code -->

<table class="table">
    <thead>
        <tr>
            <th scope="col">members id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Gender</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Home address</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Member Type</th>
            <th scope="col">Date Created</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if (count($result) > 0) {
        foreach ($result as $row) {
            $id = $row['member_id'];
            $name = $row['first_name'];
            $lname = $row['last_name'];
            $gender = $row['gender'];
            $bdate = $row['birthdate'];
            $haddress = $row['home_address'];
            $email = $row['email'];
            $user = $row['username'];
            $pass = $row['password'];
            $mtype = $row['member_type'];
            $date = $row['date_created'];

            echo '
            <tr>
                <th scope="row">' . $id . '</th>
                <td>' . $name . '</td>
                <td>' . $lname . '</td>
                <td>' . $gender . '</td>
                <td>' . $bdate . '</td>
                <td>' . $haddress . '</td>
                <td>' . $email . '</td>
                <td>' . $user . '</td>
                <td>' . $pass . '</td>
                <td>' . $mtype . '</td>
                <td>' . $date . '</td>
            </tr>';
        }
    } else {
        echo "No results found.";
    }
    ?>
</tbody>
</table>
</body>
</html>
