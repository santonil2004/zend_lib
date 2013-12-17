<?php

class form extends Zend_Form {

    public $statusDecorators = array(
        'ViewHelper',
        'Errors',
        array('Description', array('tag' => 'p', 'class' => 'description')),
        array('HtmlTag', array('class' => 'controls')),
        array('Label', array('class' => 'width170 float-lft', 'requiredSuffix' => ' *',)),
        array(array('elementDiv' => 'HtmlTag'), array('tag' => 'div', 'class' => 'control-group')),
    );

    public function __construct($options = null) {
        parent::__construct($options);

        $this->setMethod('post');
        $this->setAttrib('id', 'sales-tax-form');
        $this->setAction('/underwriting/Dashboard/save-overidden-sales-tax');

        $this->addElement('checkbox', 'is_sales_tax_included', array('label' => 'Sales Tax Included'));
        $this->getElement('is_sales_tax_included')
                ->setAttrib('class', 'width150 float-lft is_sales_tax_included-1')
                ->setDecorators($this->statusDecorators);

        $this->addElement('text', 'sales_tax_amount', array('label' => 'Sales Tax Amount'));
        $this->getElement('sales_tax_amount')
                ->addValidator('float')
                ->addFilter('StringTrim')
                ->setAttrib('class', 'width150 float-lft sales_tax_amount-1')
                ->setDecorators($this->statusDecorators);


        $this->addElement('select', 'payment_type_contract', array('label' => '  Payment Type'));
        $payment_type = $this->getElement('payment_type_contract')
                ->setAttrib('class', 'width150 float-lft')
                ->setDecorators($this->statusDecorators);

        $payment_type->addMultiOption('Monthly', 'Monthly');
        $payment_type->addMultiOption('Weekly', 'Weekly');

        $payment_type->setValue('Monthly');

        /**
         * Form Element type Text
         *
         * Zend_Form_Element_Text FirstPaymentDate
         */
        $this->addElement('text', 'first_payment_date', array(
            'label' => 'First Payment Date',
            'class' => 'required fundmod-input120'
        ));
        
        $this->getElement('first_payment_date')
                ->setRequired(true)
                ->addFilter('StringTrim')
                ->setDecorators($this->statusDecorators);
    }

}