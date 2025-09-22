<?php
function smarty_function_widget_homeproduct_data($params, $smarty){
    $modelTemplate = $smarty->tpl_vars['modelTemplate']->value instanceof frontend_model_template ? $smarty->tpl_vars['modelTemplate']->value : new frontend_model_template();
    $collection = new plugins_homeproduct_public($modelTemplate);
    $modelTemplate->addConfigFile(
        [component_core_system::basePath().'/plugins/homeproduct/i18n/'],
        ['public_local_']);
    $modelTemplate->configLoad();
    $smarty->assign('homeproduct',$collection->getHomeProduct());
}