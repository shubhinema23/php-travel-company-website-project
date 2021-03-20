<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-traveller-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$MemberID = $objSession->getMemberID();
$memberName = $objSession->getMemberName();

?>

<div class="container-fluid">
<h1>Welcome <?php echo $memberName; ?></h1>





<div class="card mt-5">
	<div class="card-title">
		<h3>This Is Traveller Profile Page</h3>
	</div>
	<div class="card-header">
		<a href="add_travelquery.php" class="text-white btn btn-info mr-2">Add Travel Query</a>
		<a href="../tours.php" class="text-white btn btn-info mr-2">All Packages</a>
		<a href="tour-suppliers.php" class="text-white btn btn-info mr-2">All Suppliers</a>
		<a href="tour-queries-traveller.php" class="text-white btn btn-info">My Queries</a>
	</div>
	<div class="card-body">
	</div>
</div>


</div>


	<?php
	include_once(dirname(dirname(__FILE__)).'/includes/include-footer.php');

	?> 



