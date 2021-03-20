<?php

include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.HOTELCLASS_PATH);


$objHotel = new clsHotel();


if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{

	if ($_POST["action"] == "addHotel")
{

	echo $objHotel->addHotel($_POST);

}

}
