<?php

App::uses('AppHelper', 'View/Helper');

class BaseHelper extends AppHelper {

	public $helpers = array('Form', 'Html');

        //FormHelper::button(string $title, array $options = array())
	public function button( $title = 'untitled', $type = null ,  $options = array() ) {
                // type  .btn-large, .btn-small, or .btn-mini

                $valid_type = array( "large", "small", "mini" );

                if ( !is_null($type) && in_array($type, $valid_type)) {
                        $checkedType = 'btn-'.$type;
                } else {
                        $checkedType = 'btn';
                }
                $classes = array( 'class' => $checkedType);
                $options = array_merge($options, $classes);
                $button = $this->Form->button('A Button', $options);

                return $button;
        }

}
