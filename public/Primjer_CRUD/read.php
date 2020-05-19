<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM stud ORDER BY mbrStud DESC LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$studs = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_studs = $pdo->query('SELECT COUNT(*) FROM stud')->fetchColumn();
?>

<?=template_header('Read')?> 

<div class="content read">
    <h2>Lista studenata <span class="pagination">Ukupno studenata: <?=$num_studs?> </span></h2>
	<a href="create.php" class="create-contact">Create Contact</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Ime</td>
                <td>Prezime</td>
                <td>Datum rodjenja</td>
                <td>Email</td>
                <td>Datum upisa</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studs as $s): ?>
            <tr>
                <td><?=$s['mbrStud']?></td>
                <td><?=$s['imeStud']?></td>
                <td><?=$s['prezStud']?></td>
                <td><?=$s['datRodStud']?></td>
                <td><?=$s['email']?></td>
                <td><?=$s['created_at']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$s['mbrStud']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$s['mbrStud']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_studs): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>

