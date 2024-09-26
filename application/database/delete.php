<?php
/**
 * @throws Exception
 */
function delete(string $table, array $where)
{
    if (array_is_list($where)) {
       throw new Exception('The array field must be an associative array');
    }

    $connect = connect();

    $whereField = array_keys($where);

    $sql = "DELETE FROM $table WHERE ";
    $sql .= " $whereField[0] = :$whereField[0]";

    $prepare = $connect->prepare($sql);
    $prepare->execute($where);

    return $prepare->rowCount();

}