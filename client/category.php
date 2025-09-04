
<?php
        // echo "<option>Hello from category</option>"; 
        // echo "hello<br>";
        // include("./common/dbconfig.php");
        // $query = "select * from category";

        // $res = $conn->query($query);
        // print_r($res);
        // foreach ($res as $row) {
        //         print_r($row);
        //         $name = ucfirst($row['name']);
        //         $id = $row['id'];
        //         echo  "<option value=$id>$id</option>";
        //         // echo  "<option value=$id>$name</option>";
        // }
        ?>

<select class="form-control" name="category" id="category">
        <option value="mobile">Select a category</option>
        <?php
        // echo "<option>Hello from category</option>"; 
        include("./common/dbconfig.php");
        $query = "select * from category";
        $res = $conn->query($query);
        print_r($res);
        foreach ($res as $row) {
                $name = ucfirst($row['name']);
                $id = $row['id'];
                // echo  "<option value=$id>$id</option>";
                echo  "<option value=$id>$name</option>";
        }
        ?>

</select>
