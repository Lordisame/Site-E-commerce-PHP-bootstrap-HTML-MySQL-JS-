
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Store</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    	<?php
    		if ($_SESSION['role']="admin") {
    			?>
    				<a class="nav-link" href="./admin-logout.php">Sign out</a>
    			<?php
    		}

    	?>
      
    </li>
  </ul>
</nav>