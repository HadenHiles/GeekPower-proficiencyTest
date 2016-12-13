<?php
require_once("../includes.php");
require_once(SERVER_ROOT . "/db/Db.php");
require_once(SERVER_ROOT . "/pages/Elf.php");

// If adding elf
if(!empty($_POST['add'])) {
    $name = $_POST['name'];
    $fav_toy = $_POST['fav_toy'];
    $elf = new Elf();
    if(!$elf->addElf($name, $fav_toy)) {
        throw new Exception("Failed to create new elf.");
    }
    header('location: ' . $_SERVER['PHP_SELF']);
}

// If deleting elf
if(!empty($_POST['delete'])) {
    $id = $_POST['id'];
    $elf = new Elf();
    if(!$elf->deleteElf($id)) {
        throw new Exception("Failed to delete elf.");
    }
}

require_once(SERVER_ROOT . "/templates/header.php");

?>
    <main>
        <h1>Santa's Elves</h1>
        <p>This is an example that utilizes the elf database abstraction layer to perform database updates.</p>
        <p>(/pages/ crud.php, crud.js, Elf.php)</p>
        <div style="max-width: 800px; margin: 0 auto;">
            <h3>Add Elf</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="name" placeholder="Name" maxlength="255" required/>
                <input type="text" name="fav_toy" placeholder="Favourite Toy" maxlength="255" required/>
                <input type="hidden" name="add" value="true" />
                <input type="submit" value="Add" />
            </form>
            <table id="elves" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Favourite Toy</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $elves = DB::run("SELECT * FROM santas_elves")->fetchAll();
                foreach($elves as $elf) {
                    ?>
                    <tr class="elf <?php echo $elf['id']; ?>">
                        <td><?php echo $elf['name']; ?></td>
                        <td><?php echo $elf['fav_toy']; ?></td>
                        <td align="right">
                            <a href="#" class="delete-elf" data-id="<?php echo $elf['id']; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </main>
<?php require_once(SERVER_ROOT . "/templates/footer.php"); ?>