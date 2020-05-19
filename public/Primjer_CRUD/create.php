<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $imeStud = isset($_POST['imeStud']) ? $_POST['imeStud'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $prezStud = isset($_POST['prezStud']) ? $_POST['prezStud'] : '';
    $datRodStud = isset($_POST['datRodStud']) ? $_POST['datRodStud'] : '';
    $created_at = isset($_POST['created_at']) ? $_POST['created_at'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO stud(imeStud,prezStud,email,datRodStud,created_at,pbrStan,slikaStud,jmbgStud) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $randomjmbg=rand(1001990111111,3012020999999);
    $stmt->execute([$imeStud,$prezStud,$email,$datRodStud,$created_at,10000, 0, $randomjmbg]);
    // Output message
    $msg = 'Uspjesno dodan student '.$imeStud.' '.$prezStud;
}
?>

<?=template_header('Unesi novog studenta')?>

<div class="content update">
	<h2>Unesi studenta</h2>
    <form action="create.php" method="post">
        <label for="id">Maticni broj</label>
        <label for="name">Ime</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id" readonly="true">
        <input type="text" name="imeStud" placeholder="Ivan" id="imeStud">
        
        <label for="email">Email</label>
        <label for="prezStud">Prezime</label>
        <input type="email" name="email" placeholder="johndoe@example.com" id="email">
        <input type="text" name="prezStud" placeholder="Ivanovic" id="prezStud">
        
        <label for="datRodStud">Datum rodjenja</label>
        <label for="created_at">Datum upisa</label>
        <input type="date" name="datRodStud" id="datRodStud" value="">
        <input type="datetime-local" name="created_at" value="<?=date('Y-m-d\TH:i')?>" id="created_at">
        
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

