<?php
$conn = new mysqli("localhost", "root", "", "restaurant");

if ($conn->connect_error) {
  die("Connection Failed");
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$date = $_POST['date'];
$time = $_POST['time'];
$persons = $_POST['persons'];

/* Generate confirmation code starting with 1 */
$result = $conn->query("SELECT MAX(id) AS last_id FROM bookings");
$row = $result->fetch_assoc();
$nextId = $row['last_id'] + 1;
$confirmationCode = "1" . str_pad($nextId, 5, "0", STR_PAD_LEFT);

/* Insert booking */
$sql = "INSERT INTO bookings 
(confirmation_code, name, mobile, booking_date, booking_time, persons) 
VALUES 
('$confirmationCode','$name','$mobile','$date','$time','$persons')";

if ($conn->query($sql) === TRUE) {

  // WhatsApp message
  $message = urlencode(
    "Hello Urban Dine 🍽️\n\n".
    "My table is booked successfully.\n\n".
    "📌 Confirmation Code: $confirmationCode\n".
    "👤 Name: $name\n".
    "📞 Mobile: $mobile\n".
    "📅 Date: $date\n".
    "⏰ Time: $time\n".
    "👥 Persons: $persons\n\n".
    "Thank you!"
  );

  $whatsappUrl = "https://wa.me/918879352443?text=$message";

  echo "<script>
          alert('Booking Confirmed! Redirecting to WhatsApp...');
          window.location.href='$whatsappUrl';
        </script>";

} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
