<?php

namespace App\Data\Subsidiary;

interface InterfaceData{

    public function clearAllCash();

    public function clearCash($condition = []);

}