<?php

App::uses('AppHelper', 'View/Helper');

class ComponentsHelper extends AppHelper {

	public $helpers = array('Html', 'Form', 'Paginator');

	private function _commonInclude ( ){

                echo $this->Html->css('/bootwit/css/bootstrap.min');

                //echo $this->Html->script('/bootwit/js/jquery',array('inline' => true, 'plugin' => true));
                //echo $this->Html->script('/bootwit/js/foundation',array('inline' => true));
                //echo $this->Html->script('/bootwit/js/app',array('inline' => true));
                //echo $this->Html->script('/bootwit/js/modernizr.foundation',array('inline' => true));
                //echo $this->Html->script('/bootwit/js/jquery.foundation.alerts',array('inline' => true));
        }
}
