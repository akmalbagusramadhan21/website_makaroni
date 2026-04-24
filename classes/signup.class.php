<?php

class Signup extends Dbhandler {

  protected function setUser($username, $pwd, $email, $privilegeLevel = 0, $attempt = 3) {
    $registerDate = date("Y-m-d");
    $conn = $this->conn();

    $sql = "INSERT INTO members (Username, Password, Email, PrivilegeLevel, Attempt, RegisteredDate)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
      header("location: ../signup.php?error=stmtfailed");
      exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt->bind_param("sssiss", $username, $hashedPwd, $email, $privilegeLevel, $attempt, $registerDate);

    if (!$stmt->execute()) {
      $stmt->close();
      header("location: ../signup.php?error=stmtfailed");
      exit();
    }

    // Get MemberID
    $memberID = $conn->insert_id;

    // Create cart
    $sql2 = "INSERT INTO orders (MemberID) VALUES (?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $memberID);
    $stmt2->execute();
    $stmt2->close();

    $stmt->close();
  }

  protected function checkUser($username, $email) {
    $conn = $this->conn();
    $sql = "SELECT Username FROM members WHERE Username = ? OR Email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
      header("location: ../signup.php?error=stmtfailed");
      exit();
    }

    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    return $result->num_rows > 0;
  }
}
