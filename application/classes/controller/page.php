<?php defined('SYSPATH') or die('No direct script access.');

  class Controller_Page extends Controller_Layoutdefault {

      public function action_index()
      {
        // Get the name of our requested page
          $page = $this->request->param('page');
          $this->template->body_class = __($page);

          switch($page){
          /*
            case "about":
              $this->template->meta_title = __('Contact Us About Our Professional Website Development and Maintenance Services');
              $this->template->meta_description = __('Contact W3Geekery about our web design and development services, site maintenance services, domain name, website, and email hosting.');
              $this->template->meta_keywords = __('Web design, web development, web hosting, site maintenance, geekery, jquery, ajax, freelance');
                $this->template->footer_scripts = array('/media/js/site-min.js',);
                $this->template->body_class = __('about');
                $newpage="about";
                break;
            */
            case "portfolio":
            case "examples":
              $this->template->meta_title = __('A Sampling of Our Portfolio and Some Client Testimonials');
              $this->template->meta_description = __('A Sampling of Our Portfolio and Some Client Testimonials');
              $this->template->meta_keywords = __('Portfolio, Web design, web development, web hosting, site maintenance, geekery, jquery, ajax, freelance');
              $this->template->footer_scripts = array(
                '/media/js/site-min.js',
              );
              $this->template->styles = array(
                '/media/js/syntaxhighlighter3/styles/shThemeDefault.css'=>'screen',
                '/media/js/syntaxhighlighter3/styles/shCore.css'=>'screen',
              );

              if ($this->request->param('example')) {
                $example = $this->request->param('example');
                $newpage = "example_".$example;
              } else {
                $newpage = "portfolio";
              }
              break;

            case "contact":
              $this->template->meta_title = __('Contact Us About Our Professional Website Development and Maintenance Services');
              $this->template->meta_description = __('Contact W3Geekery about our web design and development services, site maintenance services, domain name, website, and email hosting.');
              $this->template->meta_keywords = __('Web design, web development, web hosting, site maintenance, geekery, jquery, ajax, freelance');
                $newpage="contact";
                $this->template->styles = array("/media/css/validationEngine.jquery.css"=>"screen");
                $this->template->footer_scripts = array(
                '/media/js/jquery.validationEngine.js',
                '/media/js/jquery.validationEngine-en.js',
                '/media/js/jquery.watermark-3.1.min.js',
                '/media/js/jquery.easing.1.3.js',
                '/media/js/jquery.twitter.search.js',
                '/media/js/site-min.js');
                break;

            default:
              $this->template->meta_title = __('Professional Website Development and Maintenance Services');
              $this->template->meta_description = __('W3Geekery offers web design and development services, site maintenance services, domain name, website, and email hosting, all with a personal touch.');
              $this->template->meta_keywords = __('Web design, web development, web hosting, site maintenance, geekery, jquery, ajax, freelance');
                $this->template->footer_scripts = array('/media/js/jquery.easing.1.3.js','/media/js/jquery.twitter.search.js','/media/js/site-min.js',);
                $body_class = ($page)?$page:'index';
                $this->template->body_class = __($body_class);

                $newpage = "home";
          }

          $this->template->content = View::factory('page/'. $newpage );

      }

  }
