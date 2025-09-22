<?php
/*
 # -- BEGIN LICENSE BLOCK ----------------------------------
 #
 # This file is part of MAGIX CMS.
 # MAGIX CMS, The content management system optimized for users
 # Copyright (C) 2008 - 2021 magix-cms.com <support@magix-cms.com>
 #
 # OFFICIAL TEAM :
 #
 #   * Gerits Aurelien (Author - Developer) <aurelien@magix-cms.com> <contact@aurelien-gerits.be>
 #
 # Redistributions of files must retain the above copyright notice.
 # This program is free software: you can redistribute it and/or modify
 # it under the terms of the GNU General Public License as published by
 # the Free Software Foundation, either version 3 of the License, or
 # (at your option) any later version.
 #
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 # GNU General Public License for more details.
 #
 # You should have received a copy of the GNU General Public License
 # along with this program.  If not, see <http://www.gnu.org/licenses/>.
 #
 # -- END LICENSE BLOCK -----------------------------------
 #
 # DISCLAIMER
 #
 # Do not edit or add to this file if you wish to upgrade MAGIX CMS to newer
 # versions in the future. If you wish to customize MAGIX CMS for your
 # needs please refer to http://www.magix-cms.com for more information.
 */
/**
 * MAGIX CMS
 * @category plugins
 * @package homeproduct
 * @copyright  MAGIX CMS Copyright (c) 2008 - 2021 Gerits Aurelien,
 * http://www.magix-cms.com,  http://www.magix-cjquery.com
 * @license Dual licensed under the MIT or GPL Version 3 licenses.
 * @version 2.0.0
 * @author: Salvatore Di Salvo
 * @name plugins_homeproduct_public
 */
class plugins_homeproduct_public extends plugins_homeproduct_db {
    /**
     * @var frontend_model_template $template
     * @var frontend_model_data $data
     * @var frontend_model_catalog $modelCatalog
     * @var frontend_db_catalog $dbCatalog
     * @var component_format_math $math
     */
    protected
        $template,
        $data,
        $modelCatalog,
        $dbCatalog,
        $math;

    /**
     * @var array $conf
     */
    protected
        $conf;

    /**
     * @var string $lang
     */
    protected
        $lang;
    /**
     * @var string $controller
     */
    public string $controller;

    /**
     * plugins_homeproduct_public constructor.
     * @param null|object|frontend_model_template $t
     */
    public function __construct($t = null) {
        $this->template = $t instanceof frontend_model_template ? $t : new frontend_model_template();
		$this->data = new frontend_model_data($this);
        $this->modelCatalog = new frontend_model_catalog($this->template);
        $this->dbCatalog = new frontend_db_catalog();
        $this->math = new component_format_math();
        $this->lang = $this->template->lang;
    }

	/**
	 * Assign data to the defined variable or return the data
	 * @param string $type
	 * @param string|int|null $id
	 * @param string|null $context
	 * @param bool|string $assign
	 * @return mixed
	 */
	private function getItems(string $type, $id = null, string $context = null, $assign = true) {
		return $this->data->getItems($type, $id, $context, $assign);
	}

    /**
     * Load modules attached to homeproduct
     */
    private function loadModules() {
        if(!isset($this->module)) $this->module = new frontend_model_module();
        if(!isset($this->mods)) $this->mods = $this->module->load_module('homeproduct');
    }

    /**
     * @param array $params
     * @return array
     */
    public function getHomeProduct(): array {
        $hcs = $this->getItems('homeHcs',array('limit'=>12),'one', false);
        $product = new frontend_controller_catalog();

        $hcs = $product->getProductList(null,false, [], $hcs['listids']);///$hcs['listids']
        //print_r($hcs);
        return $hcs;
    }
}