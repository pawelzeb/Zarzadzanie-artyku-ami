
<?php require_once('config.php'); 
//załadowanie pliku z danymi konfiguracyjnymi sql
?>
<?php 		
			
	
			$result	=	$db->query("SELECT * FROM artykulyprojekt ORDER BY id DESC ");
			$result->execute();
			//przygotowanie zapytania celem pobrania danych z tabeli "artykulyprojekt", posortowanie ich malejąco
			?>
<?php	if(isset($_SESSION['user_id'])) { ?>	
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>1Lp#</th>
					<th>Autor</th>
					<th>Id</th>
					<th>Tytuł</th>
					<th>Treść</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
					$n  =   1;
					while($val  =   $result->fetch(PDO::FETCH_ASSOC)){ 
				?>
				<tr>
					<td><?php echo $n++; ?></td>
					
					<td><?php echo $val['autor']; ?></td>
					<td><?php echo $val['id']; ?></td>
					<td><?php echo $val['tytul']; ?>
<?php echo '- '. ('<a href="https://zwikjawor.pl/projekt/edit_article.php?id='.$val['id'].'">'.'edytuj</a>').'/ <a href="https://zwikjawor.pl/projekt/del_article.php?id='.$val['id'].'"</a>'; ?>usuń</td> 
					<td><?php echo $val['tekst']; ?></td>

				</tr>
				<?php 
//sprawdzenie czy istnieje sesja użytkownika, jeżeli tak, zostają zaczytane dane
					}
					
					
				
				?>
			</tbody>
		</table>
		
		
<?php	
}
?>
	



