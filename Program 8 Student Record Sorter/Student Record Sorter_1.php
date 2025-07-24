<html>
<head>
    <title>Student Record Sorter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Records</h1>
        <?php
        $host = 'localhost';
        $dbname = 'bchaitanya';
        $username = 'root';
        $password = '';
        
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->query("SELECT * FROM student");
            $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            function selectionSort(&$arr, $n) {
                for ($i = 0; $i < $n - 1; $i++) {
                    $min_idx = $i;
                    for ($j = $i + 1; $j < $n; $j++) {
                        if ($arr[$j]['marks'] > $arr[$min_idx]['marks']) {
                            $min_idx = $j;
                        }
                    }
                    if ($min_idx != $i) {
                        $temp = $arr[$i];
                        $arr[$i] = $arr[$min_idx];
                        $arr[$min_idx] = $temp;
                    }
                }
            }
            
            selectionSort($students, count($students));
            
            echo "<table>";
            echo "<tr><th><center>ID</center></th><th><center>Name</center></th><th><center>GPA</center></th></tr>";
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td><center>" . htmlspecialchars($student['usn']) . "</center></td>";
                echo "<td><center>" . htmlspecialchars($student['name']) . "</center></td>";
                echo "<td><center>" . htmlspecialchars($student['marks']) . "</center></td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>
