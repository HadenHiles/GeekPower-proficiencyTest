<?php
require_once(SERVER_ROOT . "/db/Db.php");

class Elf {

    /**
     * Elf constructor.
     */
    public function __construct() {}

    /**
     * @param $name
     * @param $fav_toy
     * @return bool|PDOStatement
     * Add a new elf to the santas_elves table
     */
    public function addElf($name, $fav_toy) {
        $bindParams = array(
            ':name' => $name,
            ':fav_toy' => $fav_toy
        );
        if($newElf = DB::run("INSERT INTO santas_elves VALUES(NULL, :name, :fav_toy)", $bindParams)) {
            return $newElf;
        }
        return false;
    }

    /**
     * @param $id
     * @param $name
     * @param $fav_toy
     * @return bool|PDOStatement
     * Update an existing elf based on id
     */
    public function updateElf($id, $name, $fav_toy) {
        $bindParams = array(
            ':id' => $id,
            ':name' => $name,
            ':fav_toy' => $fav_toy
        );
        if($newElf = DB::run("UPDATE santas_elves SET name = :name, fav_toy = :fav_toy WHERE id = :id", $bindParams)) {
            return $newElf;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool|PDOStatement
     * Delete an elf from the santas_elves table
     */
    public function deleteElf($id) {
        $bindParams = array(
            ':id' => $id
        );
        if($deletedElf = DB::run("DELETE FROM santas_elves WHERE id = :id", $bindParams)) {
            return $deletedElf;
        }
        return false;
    }
}