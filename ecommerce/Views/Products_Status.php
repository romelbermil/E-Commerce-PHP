<?php if ((time() - strtotime($row->posted_date)) < (1 * 86400)){
	echo '<span class="newprod_home"><img src="Resources/ico/new.png" alt="New Product"></span>';
}
else{
	echo '<span class="oldprod_home"><img src="Resources/ico/add_to_cart.png" alt="New Product"></span>';
}

if ((time() - strtotime($result['posted_date'])) < (1 * 86400)){
	echo '<span class="newprod_home"><img src="Resources/ico/new.png" alt="New Product"></span>';
}
else{
	echo '<span class="oldprod_home"><img src="Resources/ico/add_to_cart.png" alt="New Product"></span>';
}
?>

