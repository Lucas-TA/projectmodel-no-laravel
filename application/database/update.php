<?php
/**
 * @throws Exception
 */
function update(string $table, array $fields, array $where): int
{
    if (array_is_list($fields) || array_is_list($where)) {
        throw new Exception('The array must be an associative array.');
    }

    $connect = connect();

    $sql = "UPDATE $table SET ";
    foreach (array_keys($fields) as $field) {
        $sql .= "$field = :$field, ";
    }
    $sql = trim($sql, ', ');

    $whereFields = array_keys($where);

    $sql .= " WHERE $whereFields[0] = :$whereFields[0]";

    $data = array_merge($fields, $where);

    $prepare = $connect->prepare($sql);
    $prepare->execute($data);

    return $prepare->rowCount();
}