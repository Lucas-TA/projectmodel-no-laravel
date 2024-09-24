<?php
/**
 * @throws Exception
 */
function create(string $table, array $data)
{
    try {

        if (array_is_list($data)) {
            throw new Exception("data must be an associative array");
        }

        //insert into users(firstName, lastName, email, password)
        //values(:firstName, :lastName, :email, :password)
        $connect = connect();
        $sql = "INSERT INTO $table(";
        $sql.= implode(",", array_keys($data)). ") values(";
        $sql.= ':' . implode(",:", array_keys($data)).")";

        $prepare = $connect->prepare($sql);

        return $prepare->execute($data);

    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}