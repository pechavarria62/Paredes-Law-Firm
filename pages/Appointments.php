<!DOCTYPE html>
<html>
<head>
    <title>Appointment Booking</title>
</head>
<body>
    <h1>Book an Appointment</h1>
    <form action="/functions/Appmnts_functions.php" method="post">
        <label for="date">Select Date:</label>
        <input type="date" name="date" required><br>
        
        <label for="time">Select Time:</label>
        <input type="time" name="time" required><br>
        
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <input type="submit" value="Book Appointment">
    </form>
</body>
</html>
