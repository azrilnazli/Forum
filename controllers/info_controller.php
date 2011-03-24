<?php 
/**
 * viewPath | APP/views/info/*
 **/
Class InfoController extends AppController{
    var $name = 'Info';
    var $uses = null; // no database call
    var $layout = 'forum'; // APP/views/layouts/forum.ctp
    var $helpers = array('SiteModule');
    var $viewPath = 'info'; // folder name in APP/views/info
    
    function index(){}
    function about_us(){}
    function contact_us(){}
    function faq(){}
}