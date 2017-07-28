<?php
/*
 * Copyright (C) PowerOn Sistemas
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace PowerOn\Authorization;

use PowerOn\Utility\Lang;
/**
 * AuthorizerException
 * @author Lucas Sosa
 * @version 0.1
 */
class AuthorizationException extends \Exception {
    /**
     * Informacion adicional del error ocurrido
     * @var array
     */
    private $_context = [];
    
    /**
     * Crea una excepción de tipo authorization
     * @param string $name Nombre del error para traducir
     * @param integer $code Código de error
     * @param array $context Información adicional del error
     */
    public function __construct($name, $code, array $context = []) {
        Lang::configure(Lang::STRICT_MODE);
        Lang::load('authorization', NULL, dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . 'langs');
        
        $this->_context = $context;
        
        parent::__construct(Lang::get('authorization.' . $name), $code);
    }
    
    /**
     * Devuelve la información adicional del error
     * @return array
     */
    public function getContext() {
        return $this->_context;
    }
}