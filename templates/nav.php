<nav>
    <ul class="actions">
        <li><a href="#" class="toggleNav"><i class="fa fa-bars large"></i></a></li>
    </ul>
</nav>
<nav class="sideNav offScreenRight">
    <div class="sideActions">
        <a href="#" class="toggleNav"><i class="fa fa-close large"></i></a>
        <h1><a href="<?php echo ROOT;?>"><img src="<?php echo ROOT;?>/images/home.png" alt="Merry Christmas!" style="max-width: 90%; margin-right: 50px;" /></a></h1>
    </div>
    <ul class="items">
        <li><a href="<?php echo ROOT;?>/index.php">Home</a></li>
        <li>
            <a href="<?php echo ROOT;?>/pages/loop.php">Loop</a>
            <a class="toggleDrop" href="#" data-for="loopDrop"><i class="fa fa-caret-down"></i></a>
            <ul id="loopDrop" class="dropdown offScreenTop">
                <li><a href="#">Dropdown 1</a></li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
            </ul>
        </li>
        <li><a href="<?php echo ROOT;?>/pages/crud.php">CRUD</a></li>
    </ul>
</nav>
<div id="overlay" class="overlay offScreenRight"></div>