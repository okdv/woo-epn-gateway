<?php

class WC_EPN_Gateway extends WC_Payment_Gateway {

    public function __construct() {
        // Meta data
        $this->id = "woo-epn-gateway";
        $this->icon = '';
        $this->has_fields = true;
        $this->method_title = "eProcessingNetwork Gateway";
        $this->method_description = "Process payments via the eProcessingNetwork API";
        // Only support payments at this time
        $this->supports = array(
            "products"
        );
        // Options fields
        $this->init_form_fields();
        // Load settings
        $this->init_settings();
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->enabled = $this->get_option('enabled');
        $this->testmode = 'yes' === $this->get_option('testmode');
        $this->username = $this->testmode ? $this->get_option('test_username') : $this->get_option("username");
        $this->password = $this->testmode ? $this->get_option('test_password') : $this->get_option('password');
        $this->key = $this->testmode ? $this->get_option('test_key') : $this->get_option('key');

        // Save settings
        add_action("woocommerce_update_options_payment_gateways_" . $this->id, array($this,"process_admin_options"));
        
        // Load custom JavaScript
        add_action( 'wp_enqueue_scripts', array( $this, 'payment_scripts' ) );

    }

    public function init_form_fields(){

        $this->form_fields = array(
            'enabled' => array(
                'title'       => 'Enable/Disable',
                'label'       => 'Enable eProcessingNetwork Gateway',
                'type'        => 'checkbox',
                'description' => '',
                'default'     => 'no'
            ),
            'title' => array(
                'title'       => 'Title',
                'type'        => 'text',
                'description' => 'This controls the title which the user sees during checkout.',
                'default'     => 'Credit Card',
                'desc_tip'    => true,
            ),
            'description' => array(
                'title'       => 'Description',
                'type'        => 'textarea',
                'description' => 'This controls the description which the user sees during checkout.',
                'default'     => 'Process credit card payment reliably, quickly, and safely',
            ),
            'testmode' => array(
                'title'       => 'Test mode',
                'label'       => 'Enable Test Mode',
                'type'        => 'checkbox',
                'description' => 'Place the payment gateway in test mode using test API keys.',
                'default'     => 'yes',
                'desc_tip'    => true,
            ),
            'test_username' => array(
                'title'       => 'Test Username',
                'description' => "ePNAccount",
                'type'        => 'text',
                'default'     => '080880'
            ),
            // Using text for test fields
            'test_password' => array(
                'title'       => 'Test Password',
                'type'        => 'text',
                'default'     => '080880pw'
            ),
            'test_key' => array(
                'title'       => 'Test Key',
                'description' => 'RestrictKey',
                'type'        => 'text',
                'default'     => 'yFqqXJh9Pqnugfr'
            ),
            // Using passwords for production fields
            'username' => array(
                'title'       => 'Username',
                'description' => "ePNAccount",
                'type'        => 'text'
            ),
            'password' => array(
                'title'       => 'Password',
                'type'        => 'password'
            ),
            'key' => array(
                'title'       => 'Key',
                'description' => 'RestrictKey',
                'type'        => 'password'
            )
        );
    }

    public function payment_fields() {

    }

    public function payment_scripts() {

    }

    public function validate_fields() {

    }
    
    public function process_payment($order_id) {

    }

    public function webhook() {

    }
}