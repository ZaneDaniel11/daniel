<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=store_database", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['search'])) {
     
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $member_type = isset($_POST['member_type']) ? $_POST['member_type'] : '';
        $home_address = isset($_POST['home_address']) ? $_POST['home_address'] : '';
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

       
        $sql = "SELECT * FROM `members_table` WHERE 1";

        if (!empty($gender)) {
            $sql .= " AND `gender` = :gender";
        }

        if (!empty($member_type)) {
            $sql .= " AND `member_type` = :member_type";
        }

        if (!empty($home_address)) {
            $sql .= " AND `home_address` = :home_address";
        }

        if (!empty($start_date) && !empty($end_date)) {
            $sql .= " AND `date_created` BETWEEN :start_date AND :end_date";
        }

        $sql .= " ORDER BY `member_id` ASC";

        $stmt = $pdo->prepare($sql);

        if (!empty($gender)) {
            $stmt->bindParam(':gender', $gender);
        }

        if (!empty($member_type)) {
            $stmt->bindParam(':member_type', $member_type);
        }

        if (!empty($home_address)) {
            $stmt->bindParam(':home_address', $home_address);
        }

        if (!empty($start_date) && !empty($end_date)) {
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // If no search criteria are selected, fetch all data
        $stmt = $pdo->query("SELECT * FROM `members_table`");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>