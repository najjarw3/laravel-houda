<?php

if (!function_exists('transformStatus')) {
    /**
     * @param integer $status
     * @return string
     */
    function transformStatus($status)
    {
        switch ($status){
            case 0 : return 'Invalide';
            case 1 : return 'Valide';
            default : return null;
        }
    }
}

if (!function_exists('transformCreated')) {
   /**
    * @param DateTime $date
   * @return string
    */
   function transformCreated($date)
   {
       return $date->format('d-M-Y');
   }

}
