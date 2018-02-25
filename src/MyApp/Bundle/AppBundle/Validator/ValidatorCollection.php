<?php

namespace MyApp\Bundle\AppBundle\Validator;

class ValidatorCollection
{

    public function existAllParams($param1, $param2) : bool
    {
        if($param1 === '' || $param2 === '') {
            return false;
        }

        return true;
    }

    public function isDivisionByZero($param2) : bool
    {
        if($param2 == 0) {
            return true;
        }

        return false;
    }

    public function isNumericParamType($param1, $param2) : bool
    {

        if(filter_var($param1, FILTER_VALIDATE_INT) && $param2 == '0'){
            return true;
        }

        if(!filter_var($param1, FILTER_VALIDATE_INT) || !filter_var($param2, FILTER_VALIDATE_INT)) {
            return false;
        }

        return true;
    }

}