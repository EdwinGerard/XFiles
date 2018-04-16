<?php
if (!empty($_POST['delete'])){

    $fileName = $_POST['filedir'].$_POST['filename'];
    if (file_exists($fileName)) {
        unlink($fileName);
    }

}
if (!empty($_POST['envoyer'])){
    $filePath = $_POST['chemin'];
    $newContend = $_POST['contend'];
    $file = fopen($filePath, "w");
    fwrite($file, $newContend);
    fclose($file);
}
?>
<?php include('inc/head.php'); ?>

<?php
$path = 'files';
$allDir = scandir($path);
for($i = 2; $i < count($allDir); $i++) {?>
    <?php
    $allFiles = scandir($path . '/' . $allDir[$i]);
    for ($j = 2; $j < count($allFiles); $j++) {
        ?>
        <div class="caption">
            <a href="<?= 'files/'.$allDir[ $i ].'/'.$allFiles[$j]; ?>">files/<?= $allDir[ $i ]; ?>/<?= $allFiles[$j]; ?></a>
            <form action="edit.php" method="post">
                <input type="hidden" name="filename" value="<?= $path.'/'.$allDir[$i].'/'.$allFiles[$j]; ?>">
                <input type="submit" name="modify" value="Modify">
            </form>
            <form action="" method="post">
                <input type="hidden" name="filename" value="<?= $allFiles[$j]; ?>">
                <input type="hidden" name="filedir" value="<?= $path . '/' . $allDir[$i] . '/'; ?>">
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>
        <?php
    }
    ?>
    <?php
}
?>

<?php include('inc/foot.php'); ?>