<!DOCTYPE html>
<html>
    <head>
        <title>Comments and Ratings</title>
    </head>
    <body>
        <h1>Leave a Comment and Rating</h1>
        <form action="funtion.php" method="post">
            <textarea name="comment" rows="4" cols="50" maxlength="150" required></textarea><br>
            <label for="rating">Rating (1 to 5 stars):</label>
            <input type="number" name="rating" min="1" max="5" required><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
