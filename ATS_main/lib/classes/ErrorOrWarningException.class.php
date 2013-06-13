<?php

class ErrorOrWarningException extends Exception {
    protected $_Context = null;
    public function getContext() {
    	return $this->_Context;
    }
    public function setContext( $value ) {
    	$this->_Context = $value;
    }

    public function __construct( $code, $message, $file, $line, $context ) {
    	parent::__construct( $message, $code );

    	$this->file = $file;
    	$this->line = $line;
    	$this->setContext( $context );
    }
}
?>