<?php
//1. EXIT HERE IS NOT CALLED FROM INDEX



//2. STOP HERE IF NO SESSION ADMIN



//3. A 'crud-action' will be sent when we update/insert/delete



//4. CALL CRUD FUNCTION




/**
 * CREATE - READ - UPDATE - DELETE
 * -----------------------------------------------------------------------------
 * $params attribute will be used only when we READ data
 * For UPDATE/INSERT/DELETE we don't use $params array
 */
function crud($crud_action, $params = []) {


	if(empty($crud_action)) {
		return false;
	}


	//START SWITCH
	switch($crud_action) {


		/* READ (ALL) PAGES
		-----------------------------------------------------------*/
		case 'show_pages' :

			show("PAGES", true);

		break;


		/* READ (ONE) PAGE
		-----------------------------------------------------------*/
		case 'page_detail' :

			show("PAGE DETAIL", true);
			
		break;


		/* UPDATE/NEW PAGE
		-----------------------------------------------------------*/
		case 'update-page' :
		case 'insert-page' :

			show("UPDATE/INSERT PAGE", true);

		break;



		/* DELETE PAGE
		-----------------------------------------------------------*/
		case 'delete-page' :

			show("DELETE PAGE", true);

		break;
		
		
		
		/* UPDATE SETTINGS
		-----------------------------------------------------------*/
		case 'update-settings' :
			
			show("UPDATE SETTINGS", true);

		break;


	} //END SWITCH


	return $results;


}