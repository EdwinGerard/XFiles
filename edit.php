<?php include('inc/head.php'); ?>

<?php
if (isset($_POST['modify'])){
    $fileName = $_POST['filename'];
    echo $fileName;
    $file = fopen($fileName, "r");
    ?>
    <form action="index.php" method="post">
        <label for="contend">Contenu : </label>
        <textarea name="contend"><?= $contents = fread($file, filesize($fileName)); ?></textarea>
        <input type="hidden" name="chemin" value="<?= $fileName; ?>">
        <input type="submit" name="envoyer" value="Envoyer">
    </form>
    <?php
    fclose($file);
}
?>

<?php include('inc/foot.php'); ?>
