
<html>
    <body>
        <h1>Mark Sheet</h1>
        <form method="POST" action="">
            Regno: <input type="text" name="txtreg">
            <input type="submit" value="Get Result">
        </form>
    </body>
</html>
<?php
$con = pg_connect("host=localhost user=postgres password=mamo dbname=Student");
if($con){
    echo "Successfully connected...";
}else{
    echo "Error connecting to the database";
}
    if($_POST){
        $rg=$_POST['txtreg'];
        $qry="SELECT * FROM public.Result WHERE Roll_no='$rg'";

        $result=pg_query($con,$qry);
        if(pg_num_rows($result)== 0){

        }
        else{
            $row=pg_fetch_array($result);
             echo $result;
        $nos=pg_num_rows($result);

        while($row = pg_fetch_row($result)){
            echo "<br>\n";
           
            echo "Rollno: $row[0]<br> Name: $row[1]<br> Mark: $row[2]<br> Grade: $row[3]";
        }
        }
       
    }
    ?>