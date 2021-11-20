<?php

namespace Lib\DB;

class Where
{
    private $whereConditions;
    private $finalWhereString;

    public function __construct($requested)
    {
        $this->whereConditions = $requested;
    }

    public function getFinalWhereString()
    {
        $this->finalWhereString = $this->buildWhereString();
        return $this->finalWhereString;
    }

    private function buildWhereString()
    {
        $request ='';
        if(is_string($this->whereConditions)) {
            $request .= $this->whereConditions;
        } elseif (is_array($this->whereConditions)) {
            foreach ($this->whereConditions as $value) {
                if (is_string($value)) {
                    if (!empty($request)) {
                        $request.= ' AND ';
                    }
                    $request.=' '.$value;
                } elseif (is_array($value)) {
                    if (!empty($request)) {
                        $request.= ' AND ';
                    }
                    foreach($value as $key=>$internalValue){
                        if(!is_int($key)){
                            $request.=' '.$key.' = '.$internalValue;
                        } else {
                            if(is_string($internalValue)) {
                                $request.=' '.$internalValue;
                            } elseif (is_array($internalValue)) {
                                foreach ($internalValue as $insideKey => $deepInsideValue) {
                                    $request.=' '.$insideKey.' = '.$deepInsideValue;
                                }
                            }
                        }
                    }
                }
            }
        }
        return  $request;
    }

}

//private function buildWhereString()
//{
//    if(is_string($this->conditions)) {
//        $this->whereString = $this->conditions;
//    } elseif (is_array($this->conditions)) {
//        foreach ($this->conditions as $value) {
//            if (is_string($value)) {
//                if(!empty($this->whereString)) {
//                    $this->whereString .= ' AND ';
//                }
//                $this->whereString .= $value;
//            } else {
//                $temp = '';
//                for ($i = 0; $i < 4; $i++) {
//                    if ($i != 3) {
//                        $temp .= $value[$i];
//                    } else {
//                        if(!empty($this->whereString)) {
//                            if (isset($value[$i])) {
//                                $temp = ' ' . $value[$i] . ' ' . $temp;
//                            } else {
//                                $temp = ' AND ' . $temp;
//                            }
//                        }
//                    }
//                }
//            }
//        }
//    }
//    return  $this->whereString;
//}