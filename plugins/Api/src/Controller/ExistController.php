<?php

namespace Api\Controller;

use Api\Controller\AppController;
use App\Controller\Component\ExistUaComponent;
use Cake\Log\Log;

/**
 * Class ExistController
 * @package Api\Controller
 * @property ExistUaComponent $ExistUa
 */
class ExistController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * @param string $type
     * @return \Cake\Http\Response
     */
    public function getManufacturers($type = 'cars')
    {
        Log::info("Type : {$type}");
        return $this->json($this->ExistUa->getVehicles($type));
    }

    public function getGeneralModels($type = 'cars', $manufacturer = null)
    {
        Log::info("Type : {$type}, Manufacturer : {$manufacturer}");
        return $this->json($this->ExistUa->getGeneralModels($type, $manufacturer));
    }

    public function getModels($type = 'cars', $manufacturer = null, $model = null)
    {
        Log::info("Type : {$type}, Manufacturer : {$manufacturer}, Model : {$model}");
        return $this->json($this->ExistUa->getModels($type, $manufacturer, $model));
    }

    public function getModifications($type = 'cars', $model = null)
    {
        Log::info("Type : {$type}, Model : {$model}");
        return $this->json($this->ExistUa->getModifications($type, $model));
    }

    public function getParts($type = 'cars', $model = null, $modification = null)
    {
        Log::info("Type : {$type}, Model : {$model}, Modification : {$modification}");
        return $this->json($this->ExistUa->getParts($type, $model, $modification));
    }

}
