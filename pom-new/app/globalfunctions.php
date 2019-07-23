<?php

function ModulePermissionChecker($user_id = null, $account_id = null, $module_name = null) {
    return true;
}

function PostLoginChecker() {
    if (\Session::has('user_data')) {
        return true;
    } else {
        return false;
    }
}

function status_count() {
    $account_id = \Session::get('account_data');
    $mast_id = \Session::get('master_id');
    $user_account_type = \Session::get('account_type');
    $global_status = "";
    
    // po-over view
    if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) {
        $fw_mast_id_post = $mast_id[0]->FWDR_ID;
        if (!empty($fw_mast_id_post)) {
            $global_status['fw_status_count'] = \DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME,tbl_cfg_workflow_status.SHOW_CHECKBOX, IFNULL(STAT_TABLE.po_count,0) AS PO_COUNT
						FROM tbl_cfg_workflow_status LEFT JOIN 
							(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_purchase_order.PO_ID) AS po_count FROM tbl_tran_purchase_order 
            			JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID       
            
        				JOIN tbl_cfg_workflow_status ON tbl_tran_purchase_order.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
 
            				WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post
            				GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
					ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'PO' ORDER BY STATUS_SEQUENCE");
            $global_status['count_booking_data'] = \DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
        BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
        (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
        JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
        GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
        ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Booking' ORDER BY STATUS_SEQUENCE");
            $global_status['count_shipping_data'] = \DB::select("SELECT tbl_cfg_workflow_status.STATUS_ID,tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID

GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Shipping' ORDER BY STATUS_SEQUENCE");
        }
    } elseif ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {
        $cust_mast_id_post = $mast_id[0]->CUSTOMER_ID;
        if (!empty($cust_mast_id_post)) {
            $global_status['fw_status_count'] = \DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME,tbl_cfg_workflow_status.SHOW_CHECKBOX, IFNULL(STAT_TABLE.po_count,0) AS PO_COUNT FROM tbl_cfg_workflow_status LEFT JOIN (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_purchase_order.PO_ID) AS po_count FROM tbl_tran_purchase_order JOIN tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID JOIN tbl_cfg_workflow_status ON tbl_tran_purchase_order.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'PO' ORDER BY STATUS_SEQUENCE");
            $global_status['count_booking_data'] = \DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
        BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
        (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
        JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
        GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
        ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Booking' ORDER BY STATUS_SEQUENCE");

            $global_status['count_shipping_data'] = \DB::select("SELECT tbl_cfg_workflow_status.STATUS_ID,tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID

GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Shipping' ORDER BY STATUS_SEQUENCE");
        }
    }

    return $global_status;
}
