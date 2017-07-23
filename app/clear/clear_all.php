<?php
# truncate data from all table
# $sql = "SHOW TABLES IN 1hundred_2011";
# or,
$sql="SELECT * FROM information_schema.tables  WHERE table_schema='classify';";
// $sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '".DB_NAME."'";

# use the instantiated db connection object from the init.php, to process the query
$tables = $connection -> fetch_all($sql);
//print_r($tables);

foreach($tables as $table)
{
    //echo $table['TABLE_NAME'].'<br/>';

    # truncate data from this table
    # $sql = "TRUNCATE TABLE `developer_configurations_cms`";

    # use the instantiated db connection object from the init.php, to process the query
    # $result = $connection -> query($sql);

    # truncate data from this table
    $sql = "TRUNCATE TABLE `".$table['TABLE_NAME']."`";

    # use the instantiated db connection object from the init.php, to process the query
    $result = $connection -> query($sql);
}

 ?>
