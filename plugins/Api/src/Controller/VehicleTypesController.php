<?php

namespace Api\Controller;

use Api\Controller\AppController;
use App\Model\Table\VehicleTypesTable;

/**
 * Class VehicleTypesController
 * @package Api\Controller
 * @property VehicleTypesTable $VehicleTypes
 */
class VehicleTypesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('VehicleTypes');
    }

    /**
     * @return \Cake\Http\Response
     */
    public function getVehicleTypes()
    {
        return $this->json(['vehicleTypes' => $this->VehicleTypes->find()->toArray()]);
    }
}
