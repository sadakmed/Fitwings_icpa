<?php 

require_once 'view/header.php';

if (isset($_GET['page'])) 
	
	require_once 'view/'.$_GET['page'].'.php';

else
    
    require_once 'view/plan.php';


require_once 'view/footer.php';