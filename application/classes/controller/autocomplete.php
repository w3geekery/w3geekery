<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Autocomplete extends Controller {

    public function getMatches($ar_input)
    {
        $file = APPPATH.'data/data.csv';
        $ar_data = str_getcsv(file_get_contents($file));
        $match = array_intersect($ar_input, $ar_data);
        return array_unique($match);
    }

    public function action_index()
    {
        $text = Arr::get($_GET,'ac_search');
        $text = urldecode($text);
        $words = preg_split('/[^\w]+/',$text);

        $result = $this->getMatches($words);

        if (count($result) >= 1) {
            sort($result);
        } else {
            $result = false;
        }

        $json = json_encode(array('matches' => $result));
        Log::instance()->add(Log::NOTICE, '$json: '.$json);
        $this->response->headers('Content-Type', 'application/json');
        $this->response->body($json);
    }
}
