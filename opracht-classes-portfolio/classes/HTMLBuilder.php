<?php

class HTMLBuilder{
    public $call_build_header, $call_build_footer , $call_build_body;
    public function __construct($call_build_header,  $call_build_body,$call_build_footer) {
        $this->call_build_header = $call_build_header;
        $this-> call_build_footer = $call_build_footer;
        $this->  call_build_body =  $call_build_body;
        $this->buildHeader();
        $this->buildBody();
        $this->buildFooter();
        
    }
    public function buildHeader(){
        $css_elements = $this->buildCssLinks();
        include "html/" . $this->call_build_header;
    }
    public function buildFooter(){
        $js_elements = $this->buildJsLinks();
        
        include "html/" . $this->call_build_footer;
        
    }
    public function buildBody(){
        include "html/" . $this->call_build_body;
        
    }
    function findFiles($dir ,  $file){
        return glob($dir . "/*." . $file);
        }
        private function buildJsLinks() {
        $js_array = $this->findFiles("js", "js");
        $js_elements = array();
        foreach( $js_array as $js_item){
        $js_element= "<script src='" . $js_item . "'></script>";
        array_push($js_elements,  $js_element);
        }
        return implode ("\n" ,   $js_elements );
        }
        private  function buildCssLinks() {
        $Css_version = "1.0";
        $css_array = $this->findFiles("css", "css");
        $css_elements = array();
        foreach ( $css_array  as $css_item ) {
        $css_element = "<link rel='stylesheet' type='text/css' href='" . $css_item . "?v=" . $Css_version . "'>";
        array_push($css_elements,   $css_element);
        }
        return implode ("\n" ,   $css_elements );
        }
        }
        ?>