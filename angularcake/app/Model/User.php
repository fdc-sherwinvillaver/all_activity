<?php  
/**
* 
*/
class User extends AppModel {
    public $validate = array(
    	'first_name' => array(
    		'rule' => 'notEmpty',
    		'required' => true,
    		'message' => 'This field cannot be empty'
    	),
    	'last_name' => array(
    		'rule' => 'notEmpty',
    		'required' => true,
    		'message' => 'This field cannot be empty'
    	),
    	'middle_name' => array(
    		'rule' => 'notEmpty',
    		'required' => true,
    		'message' => 'This field cannot be empty'
    	),
        'username' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'This field cannot be empty'
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'This field cannot be empty'
        )
    );

    public function fieldsNotNull($check){
        pr($check); exit;
    }
}
?>