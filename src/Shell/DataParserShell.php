<?php

namespace App\Shell;

use App\Model\Entity\Vehicle;
use App\Model\Table\VehiclesTable;
use Cake\Cache\Cache;
use Cake\Console\Shell;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Shell\Helper\ProgressHelper;
use Cake\Utility\Inflector;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Psr\Http\Message\ResponseInterface;
use phpQuery;
use phpQueryObject;

/**
 * Class DataParserShell
 * @package App\Shell
 * @property VehiclesTable $Vehicles
 */
class DataParserShell extends Shell
{

    private $_cars = 'https://exist.ua/unicat/';

    private $_domain = 'https://exist.ua';

    /**
     * @var ProgressHelper
     */
    private $_progress;

    /**
     * @var VehiclesTable
     */
    private $Vehicles;

    /**
     * @var Client
     */
    private $_http;

    private $_types = [
        'cars', 'trucks',
        'commercial', 'moto'
    ];

    public function main()
    {
        Log::info('Initializing HTTP Client');
        $this->_http = new Client(['cookies' => new CookieJar(), 'headers' => [
            'user-agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36'
        ]]);

        Log::info('Fetching main page');
        $this->Vehicles = TableRegistry::get('vehicles');
        $this->getData();
    }

    /**
     * @param null $url
     * @param null $key
     * @param bool $json
     * @return mixed|string $data
     */
    protected function parseResponse($url = null, $key = null, $json = false)
    {

        $data = Cache::read($key, 'cached_data');

        if (!$data) {

            $response = $this->_http->get($url);

            Log::info("No Data cached");
            $data = $json ?
                json_decode($response->getBody()->getContents(), 1) :
                $response->getBody()->getContents();

            Cache::write($key, $data, 'cached_data');
        }

        return $data;
    }

    private function getData()
    {
        $this->getManufacturers();
    }

    private function getManufacturers()
    {
        $links = [];

        foreach ($this->_types as $index => $type) {
            Log::info("Fetching `{$type}`");

            $page = phpQuery::newDocumentHTML(
                $this->parseResponse("{$this->_domain}/unicat/{$type}", $type)
            );

            foreach ($page->find("li a[href*='/unicat/{$type}/']") as $catID => $manufacturerObject) {
                if ($catID != 0) {
                    $manufacturerObject = pq($manufacturerObject);
                    $links[$type][] = $manufacturerObject->attr('href');

                    $vehicle = $this->Vehicles->findOrCreate([
                        'title' => trim($manufacturerObject->text()),
                        'link' => $manufacturerObject->attr('href'),
                        'vehicle_type_id' => $index + 1
                    ]);

                    $this->getModels($vehicle, $type);
                }
            }
        }
    }

    private function getModels(Vehicle $vehicle, $type)
    {
        $vehicle = $this->Vehicles->get($vehicle->id, ['contain' => 'VehicleTypes']);
        Log::info("Fetching Models for {$vehicle->title}");
        $models_page = phpQuery::newDocumentHTML(
            $this->parseResponse("{$this->_domain}{$vehicle->link}?all=1", "{$vehicle->vehicle_type->title}_{$vehicle->title}")
        );

        $inflected = Inflector::dasherize($vehicle->title);
        foreach ($models_page->find("li a[href*='/unicat/{$type}/{$inflected}/']") as $mainModel) {
            $modelName = pq($mainModel);
            Log::info($modelName->attr('href'));
        }

    }

}
