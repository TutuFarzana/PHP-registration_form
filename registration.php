<!DOCTYPE html>
<html>
<head>
    <title>REGISTERATION PAGE</title>
</head>

<body>
    <h2>REGISTER</h2>
    <form method = "POST" action="<?php echo $_SERVER["PHP_SELF"]?>">

        NAME: <input type="text" name="name"><br>
        AGE: <input type="number" name="age"><br>
        MOBILE: <input type="number" name="mobile"><br>
        DESIGNATION: <input type="text" name="designation"><br>
        ADDRESS: <textarea name="address" rows="5" cols="40"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "myDB";

        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $age = $_POST["age"];
            $mobile = $_POST["mobile"];
            $designation = $_POST["designation"];
            $address = $_POST["address"];
        }


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO Employee (name,age,mobile,designation,address)  
            VALUES (:name,:age,:mobile,:designation,:address)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':address', $address);
            $stmt->execute();
        }
        catch(PDOException $e) {   
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    ?>
</body>
</html>