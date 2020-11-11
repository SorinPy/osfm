<?php

namespace App\Libraries;

class CustomValidationRules 
{

    //--------------------------------------------------------------------

	/**
	 * Required
	 *
	 * @param mixed $str Value
	 *
	 * @return boolean          True if valid, false if not
	 */
	public function no_space($str = null): bool
	{
		$pattern = '/ /';
        $result = preg_match($pattern, $str);

        if ($result)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}

	//--------------------------------------------------------------------

}