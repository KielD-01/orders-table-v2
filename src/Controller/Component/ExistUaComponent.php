<?php

namespace App\Controller\Component;

use Cake\Cache\Cache;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Log\Log;
use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\build_query;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ExistUaComponent
 * @package App\Controller\Component
 */
class ExistUaComponent extends Component
{

    private $caching = false;

    private $endpoint = 'https://exist.ua/api/v1/catalogs/autoparts';

    private $requestData = [
        'slashes' => [],
        '?' => []
    ];

    /** @var Client */
    private $http;

    const TYPES = ['trucks', 'cars', 'commercial', 'moto'];

    public function initialize(array $config)
    {
        $this->http = new Client(['headers' => [
            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36'
        ]]);

        if (array_key_exists('caching', $config)) {
            $this->caching = (bool)$config['caching'];
        }

        $this->checkCacheExist();
    }

    public function setCaching($state = false)
    {
        $this->caching = $state;
        return $this;
    }

    public function getVehicles($type = null)
    {
        $this->setType($type);
        return $this->sendRequest($this->buildUrl(), $type ? $type : 'vehicles');
    }

    public function getGeneralModels($type = null, $manufacturer = null)
    {

        if ($type && $manufacturer) {
            $this->setType($type);
            $this->requestData['slashes'][] = 'car_models_general';
            $this->requestData['?']['manufacture__slug'] = $manufacturer;

            return $this->sendRequest($this->buildUrl(), $manufacturer ? "{$type}_{$manufacturer}_general_models" : 'general_models');
        }

        return $this->noContent();
    }

    public function getModels($type = null, $manufacturer = null, $model = null)
    {
        if ($type && $manufacturer && $model) {
            $this->setType($type);
            $this->requestData['slashes'][] = 'car_models';
            $this->requestData['?']['manufacture__slug'] = $manufacturer;
            $this->requestData['?']['general_model_slug'] = $model;

            return $this->sendRequest($this->buildUrl(), $manufacturer ? "{$type}_{$manufacturer}_models" : 'models');
        }

        return $this->noContent();
    }

    public function getModifications($type = null, $model = null)
    {
        if ($type && $model) {
            $this->setType($type);
            $this->requestData['slashes'][] = 'modifications';
            $this->requestData['?']['car_model__slug'] = $model;

            return $this->sendRequest($this->buildUrl(), $model ? "{$type}_{$model}_mods" : 'mods');
        }

        return $this->noContent();
    }

    public function getParts($type = null, $model = null, $modification = null)
    {
        if ($type && $model) {
            $this->setType($type);
            $this->requestData['slashes'][] = "catalog/tree/{$modification}";
            $this->requestData['?']['car_model__slug'] = $model;

            return $this->sendRequest($this->buildUrl(), $model && $modification ? "{$type}_{$model}_{$modification}_parts" : 'parts');
        }

        return $this->noContent();
    }

    /** Internal functionality */

    private function noContent()
    {
        return ['data' => [], 'seo' => []];
    }

    /**
     * @param null $type
     * @return $this
     */
    private function setType($type = null)
    {
        if (in_array(mb_strtolower($type), self::TYPES)) {
            $this->requestData['?']["is_{$type}"] = 1;
        } else {
            $this->requestData['?']["is_cars"] = 1;
        }

        return $this;
    }

    private function checkCacheExist()
    {
        if (!Configure::read('Cache.exist_component')) {
            Configure::write('Cache.exist_component', [
                'className' => 'File',
                'prefix' => false,
                'path' => CACHE . 'exist_component/',
                'serialize' => true,
                'duration' => '+1 week',
            ]);
        }
    }

    private function buildUrl()
    {
        $slashes = implode('/', $this->requestData['slashes']);
        $query = build_query($this->requestData['?']);

        return "{$this->endpoint}/{$slashes}/?{$query}";
    }

    private function sendRequest($url, $cacheKey = false)
    {

        Log::info("Sending request to `{$url}`");

        if ($this->caching) {
            if ($cacheKey) {
                if (($cached = Cache::read($cacheKey, 'exist_component')) !== false) {
                    return $cached;
                }

                $data = $this->parseContent($this->http->get($url));
                Cache::write($cacheKey, $data, 'exist_component');

                return $data;
            }

            $data = $this->parseContent($this->http->get($url));
            Cache::write($url, $data, 'exist_component');

            return $data;
        }

        return $this->parseContent($this->http->get($url));
    }

    private function parseContent(ResponseInterface $response, $json = true)
    {
        return $json ?
            json_decode($response->getBody()->getContents(), 1) :
            $response->getBody()->getContents();
    }

}
