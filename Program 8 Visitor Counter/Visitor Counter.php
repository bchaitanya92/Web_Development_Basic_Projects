<html lang="en">
    <head>
        <title>Visitor Counter</title>
        <style>
            body{
                font-family:Arial,sans-serif;
                line-height:1.6;
                margin:0;
                padding: 20px;
                background-color:#f4f4f4;
            }
            .container{
                max-width:600px;
                margin:auto;
                background:white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            h1{
                color:#333;
                text-align:center;
            }
            .counter{
                font-size: 24px;
                text-align: center;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Welcome to Our Website</h1>
            <div class="counter">
                <?php
                $counterFile='count.txt';
                if(file_exists($counterFile)){
                    $count=(int)file_get_contents($counterFile);
                }else{
                    $count=0;
                }
                $count++;
                file_put_contents($counterFile,$count);
                echo "<h2>Visitor Count</h2>";
                echo "<p>You are visitor number:$count</p>";
                $name="counter.txt";
                $file=fopen($name,"r");
                $hits=fscanf($file,"%d");
                fclose($file);
                $hits[0]++;
                $file=fopen($name,"w");
                fprintf($file,"%d",$hits[0]);
                fclose($file);
                print "Total number of views:".$hits[0];
                ?>
            </div>
        </div>
    </body>
</html>