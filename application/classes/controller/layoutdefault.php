<?php
 defined('SYSPATH') or die('No direct script access.');

 class Controller_LayoutDefault extends Controller_Template
  {
     public $template = 'common/default';



     /**
      * Initialize properties before running the controller methods (actions),
      * so they are available to our action.
      */

     public function before()
      {

/*
Log::instance()->add(Log::NOTICE, 'Action: '.$this->request->action());
Log::instance()->add(Log::NOTICE, 'Page: '.$this->request->param('page'));
*/
         // Run anything that need ot run before this.
         parent::before();

         if($this->auto_render)
          {
            // Initialize empty values
            $this->template->meta_title       = '';
            $this->template->meta_keywords    = '';
            $this->template->meta_description = '';
            $this->template->meta_copyright   = '';
            $this->template->header           = '';
            $this->template->body_class       = '';
            $this->template->content          = '';
            $this->template->footer           = '';
            $this->template->styles           = array();
            $this->template->scripts          = array();
            $this->template->footer_scripts   = array();
          }
      }


     /**
      * Fill in default values for our properties before rendering the output.
      */
     public function after()
      {
         if($this->auto_render)
          {
             // Define defaults
             $styles                  = array('/media/css/site.css' => 'all','/media/css/blueprint/screen.css' => 'screen');
             $scripts                 = array('http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js');
             $footer_scripts          = array();

             // Add defaults to template variables.
             $this->template->styles  = array_reverse(array_merge($this->template->styles, $styles));
             $this->template->scripts = array_reverse(array_merge($this->template->scripts, $scripts));
             $this->template->footer_scripts = array_reverse(array_merge($this->template->footer_scripts, $footer_scripts));
           }

         // Run anything that needs to run after this.
         parent::after();
      }
 }
