<?php

include("../config/constants.php");

include_once ($_SERVER['DOCUMENT_ROOT'].FolderName.PACKAGECLASS_PATH);

$objPackage = new clsPackage();


if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{

	if ($_POST["action"] == "addtravelpackage")
{

	echo $objPackage->AddTravelPackage($_POST);

}


	if ($_POST["action"] == "searchFilter")
{




	$arrTravelPkg = $objPackage->getTravelPackage($_POST);

		foreach ($arrTravelPkg as $package) {

		    $tabledata .= '<tr>';

				$tabledata .= '<td>' . $package['pkg_Title'] . '</td>';
				$tabledata .= '<td>' . $package['pkg_AddedBy'] . '</td>';
				$tabledata .= '<td>' . $package['catname'] . '</td>';
				$tabledata .= '<td>' . $package['pkg_City'] . '</td>';
			

	        $tabledata .= '</tr>';

       }

    echo $tabledata;


}


}

?>