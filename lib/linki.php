<div id="APPlinki" class="clearfix">
	<?php
	$prac = mysql_query('SELECT * FROM `linki`');
	while($p = mysql_fetch_assoc($prac)) { 
	?>
	<div class="link">
		<a href="<?php echo $p['url']; ?>"><img src="static/img/links/<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>"></a>
		<h4><a href="<?php echo $p['url']; ?>"><?php echo $p['name']; ?></a></h4>
		<p><?php echo $p['opis']; ?></p>
	</div><!-- .person -->
	<?php } ?>
</div><!-- #APPlinki -->