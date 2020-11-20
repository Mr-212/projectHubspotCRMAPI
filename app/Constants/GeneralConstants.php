<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/20/20
 * Time: 4:51 PM
 */

namespace App\Constants;


class GeneralConstants
{
    //yes/no constant
    const NO = 'No';
    const YES = 'Yes';

    //Mortgage TYpe Constant
    const FHA = 'FHA';
    const VA = 'VA';
    const USDA = 'USDA';
    const CONVENTIONAL = 'Conventional';
    const NON_QM = 'Non-QM';

    //stage constants
    const BEFORE_DUE_DILIGENCE = 'Before Due Diligence';
    const BEFORE_DUE_DILIGENCE_EXPIRE = 'Before Due Diligence Expire';
    const HOUSE_BOOKED = 'House Booked';
    const HOUSE_CANCELLED = 'Hose Cancelled';
    const DROPOUT_CLIENT = 'Dropout Client';

}