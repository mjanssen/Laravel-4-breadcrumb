<?php

namespace Mj\Breadcrumb;

use Illuminate\Config\Repository;
use Config;

class Breadcrumb
{
    /*
    | A small breadcrumb class. The class can be edited to your use your own
    | style-classes.
    */

    /**
     * Illuminate config repository.
     *
     * @var Illuminate\Config\Repository
     */
    protected $config;

    private $separator;
    private $breadcrumb = array();

    /**
     * Create a new profiler instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->config = Config::get('Breadcrumb::config');

        $this->separator = ($this->config['enable_separator'] === true)
                            ? '<span class="divider">'.$this->config['default_separator'].'</span>'
                            : '';
    }

    public function generate($ucfirst = true)
    {
        $output = '';
        $count  = 1;

        $totalBreadcrumbs = count($this->breadcrumbs);

        $output .= '<div itemscope itemtype="http://schema.org/WebPage">';
        $output .= '<ol class="breadcrumb" itemprop="breadcrumb">';
        foreach ($this->breadcrumbs as $key => $value) {

            $title = $ucfirst===true ? ucfirst($key) : $key;
            
            if ($count === $totalBreadcrumbs) {
                $output .= '<li class="active">' . $title . '</li>';
            } elseif (empty($value)) {
                $output .= '<li>' . $title . '</li>';
            } else {
                $output .= '<li><a href="' . $value . '">' . $title . '</a>';
            }

            if ($count < $totalBreadcrumbs) {
                $output .= ' ' . $this->separator . '</li>';
            }

            $count++;
        }
        $output .= '</ol>';
        $output .= '</div>';
        $output .= '<div class="clearfix"></div>';

        return $output;
    }
    
    public function addBreadcrumb($title, $uri = null)
    {
        $this->breadcrumbs[$title] = $uri;

        return $this;
    }

    public function setseparator($separator)
    {
        $this->separator = $separator;

        return $this;
    }
}
