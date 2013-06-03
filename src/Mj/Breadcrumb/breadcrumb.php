<?php

namespace Mj\Breadcrumb;

class Breadcrumb
{
    /*
    | A small breadcrumb class. The class can be edited to your use your own
    | style-classes.
    */

    private $breadcrumb = array();
    private $seperator  = '<span class="divider">/</span>';

    public function generate($ucfirst = true)
    {
        $output = '';
        $count = 1;
        $output .= '<div itemscope itemtype="http://schema.org/WebPage">';
        $output .= '<ul class="breadcrumb" itemprop="breadcrumb">';
        foreach ($this->breadcrumbs as $key => $value) {
            
            if ($count != count($this->breadcrumbs)) {
                $output .= '<li><a href="' . $value . '">' . ($ucfirst? ucfirst($key) : $key) . '</a>';
            } else {
                $output .= '<li class="active">' . ($ucfirst? ucfirst($key) : $key) . '</li>';
            }

            if ($count != count($this->breadcrumbs)) {
                $output .= ' ' . $this->seperator . '</li>';
            }

            $count++;
        }
        $output .= '</ul>';
        $output .= '</div>';
        $output .= '<div class=\"clearfix\"></div>';

        return $output;
    }
    
    public function addBreadcrumb($title, $uri = null)
    {
        $this->breadcrumbs[$title] = $uri;

        return $this;
    }

    public function setSeperator($seperator)
    {
        $this->seperator = $seperator;

        return $this;
    }
}
