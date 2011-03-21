<?php
/**
 * BoardController for displaying forum using
 * 960.gs CSS
 * FILE   | APP/controllers/board_controller.php
 * VIEW | APP/views/board/*
 * @author Azril Nazli Alias
 */ 
Class BoardController extends AppController {

    var $name = 'Board';
    var $uses = NULL; // no database yet
    var $layout = 'forum'; // APP/views/layouts/forum.ctp
    
    function index(){}

} // BoardController