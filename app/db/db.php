<?php 
    require('dbConnection.php');

    function executeQuery($sql, $data){
        global $conn;
        $stmt = $conn->prepare($sql);

        // here i am getting the values from the conditions array
        $values = array_values($data);

        // here we are converting the conditions values to strings and are getting the total number of count 
        // from them instead of hard coding the total number of condions by writing 'ss'
        $types = str_repeat('s', count($values));

        // here we are using the bind)params to accept the values into our
        // query on the stmt object
        // the bind_params takes two arguments which are the type of data and the data it self
        // using the spread operator, we are getting all the values from the conditions array 
        // irrespective of the total number of values coming from there
        $stmt->bind_param($types, ...$values);

        // here we execute the statement
        $stmt->execute();
        return $stmt;
    }

    function selectAll($table, $conditions = []){
        global $conn;
        $sql = "SELECT * FROM $table";
        if(empty($conditions)){
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }else{
            // return records that matches our conditions...

            // initialize a counter variable
            $count = 0;
            foreach($conditions  as $key => $value){
                if($count === 0){
                    // note the sql variable here is coming from line 6 above
                    $sql = $sql . " WHERE $key=?";
                }else{
                    // note the sql variable here is coming from line 6 above
                    $sql = $sql . " AND $key=?";
                }
                // i increament the counter each time the loop runs
                $count++;
            }

            // just echoing out the sql query command for testing purposes
            echo $sql;

            $stmt = $stmt = executeQuery($sql, $conditions);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }

    }

    function selectOne($table, $conditions){
        global $conn;
        $sql = "SELECT * FROM $table";

            // initialize a counter variable
            $count = 0;
            foreach($conditions  as $key => $value){
                if($count === 0){
                    // note the sql variable here is coming from line 6 ablve
                    $sql = $sql . " WHERE $key=?";
                }else{
                    // note the sql variable here is coming from line 6 ablve
                    $sql = $sql . " AND $key=?";
                }
                // i increament the counter each time the loop runs
                $count++;
            }

            // just echoing out the sql query command for testing purposes
            echo $sql;

            // $sql = $sql . "LIMIT 1";

            $stmt = executeQuery($sql, $conditions);
            $records = $stmt->get_result()->fetch_assoc();
            return $records;
        }


    function createQuery($table, $data){
        global $conn;
        $sql = "INSERT INTO " . $table . " SET ";

        // initialize a counter variable
        $count = 0;
        foreach($data  as $key => $value){
            if($count === 0){
                // note the sql variable here is coming from line 6 ablve
                $sql = $sql . " $key=?";
            }else{
                // note the sql variable here is coming from line 6 ablve
                $sql = $sql . ", $key=?";
            }
                // i increament the counter each time the loop runs
                $count++;
            }

            $stmt = executeQuery($sql, $data);
            $id = $stmt->insert_id;
            return $id;
        
            // just echoing out the sql query command for testing purposes
            echo $sql;
    }


    function updateQuery($table, $id, $data){
        global $conn;
        $sql = "UPDATE " . $table . " SET ";

        // initialize a counter variable
        $count = 0;
        foreach($data  as $key => $value){
            if($count === 0){
                // note the sql variable here is coming from line 6 ablve
                $sql = $sql . " $key=?";
            }else{
                // note the sql variable here is coming from line 6 ablve
                $sql = $sql . ", $key=?";
            }
                // i increament the counter each time the loop runs
                $count++;
            }

            $sql = $sql . " WHERE id=?";
            $data['id'] = $id;
            $stmt = executeQuery($sql, $data);

            return $stmt->affected_rows;
        
            // just echoing out the sql query command for testing purposes
            echo $sql;
    }


    function deleteQuery($table, $id){
        global $conn;
        $sql = "DELETE FROM  $table WHERE id=?";

        $stmt = executeQuery($sql, ['id' => $id]);
        return $stmt->affected_rows;
    
        // just echoing out the sql query command for testing purposes
        echo $sql;
    }


    // populating our conditions array
    $conditions = [
        'admin' => 0,
        'username'=> 'Frank',
        'email'=> 'frank@gmail.com',
    ];

    $data = [
        'admin' => 1,
        'username'=> 'Franklin Chinedu',
        'email'=> 'franklin@gmail.com',
        'password' => '123456'
    ];

    // $id = deleteQuery('users', 3);
    // echo "<pre>", print_r($id), "</pre>";