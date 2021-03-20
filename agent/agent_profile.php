<?php
include_once(dirname(dirname(__FILE__)).'/includes/include-agent-session.php');
include_once(dirname(dirname(__FILE__)).'/includes/include-header.php');
$agentID = $objSession->getMemberID();

?>
<h1>this is agent profile Page</h1>


<a href="add_package.php">Add Package</a>
<br>
<br>

<a href="tour-mytour.php">My Packages</a>
<br>
<br>

<a href="tour-queries-agent.php">
	Traveller Queries
</a>
<br>
<br>

<a href="tour-agent-mybids.php">
	My Sended Bids
</a>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
		left sidebar
		</div>
		<div class="col-lg-6">
		center
		</div>
		<div class="col-lg-3">
		right sidebar
		</div>
	</div>
</div>