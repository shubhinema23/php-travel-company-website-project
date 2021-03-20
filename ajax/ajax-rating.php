<?php

include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.RATINGCLASS_PATH);


$objRating = new clsRating();


if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{

	if ($_POST["action"] == "addRating")
{

	echo $objRating->addRating($_POST);

}

}
