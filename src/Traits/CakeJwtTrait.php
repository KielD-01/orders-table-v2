<?php
/**
 * Created by PhpStorm.
 * User: romankozin
 * Date: 07.03.18
 * Time: 02:12
 */

namespace App\Traits;

/**
 * Trait CakeJwtTrait
 * @package App\Traits
 */
trait CakeJwtTrait
{

    private $defaults = [
        'exp' => 14400
    ];

    public function jwt(){}
}
