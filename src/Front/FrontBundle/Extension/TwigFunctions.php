<?php

namespace Front\FrontBundle\Extension;

class TwigFunctions extends \Twig_Extension {

    public function getFilters() {
        return array(
            'truncate' => new \Twig_Filter_Method($this, 'truncate'),
            'no_title' => new \Twig_Filter_Method($this, 'no_title'),
            'nl2br' => new \Twig_Filter_Method($this, 'nl2br'),
            'next_report' => new \Twig_Filter_Method($this, 'next_report'),
            'clear_class' => new \Twig_Filter_Method($this, 'clear_class'),
        );
    }
    
    public function getFunctions() {
        return array(
            'format_date' => new \Twig_Function_Method($this, 'format_date'),
        );
    }
    
    

    public function format_date($date, $with_minutes_seconds=false, $only_format=false) {
        $minutes_seconds = '';
        $date_format = \Front\FrontBundle\Security\Auth::getAuthParam('date_format');
        if($only_format) {
            return strtolower(str_replace(array('Y', 'm', 'd'), array('YY', 'mm', 'dd'), $date_format));
        }
        if($with_minutes_seconds) {
            $minutes_seconds = ' H:i:s';
        }
        return date($date_format.$minutes_seconds, strtotime($date));
    }
    
    public function next_report($last_sent, $frequency) {
        $return = false;
        switch($frequency) {
            case 'weekly':
                $return = date('Y-m-d', strtotime('+1 week', strtotime($last_sent)));
                break;
            case 'monthly':
                $return = date('Y-m-d', strtotime('+1 month', strtotime($last_sent)));
                break;
            case 'quarterly':
                $return = date('Y-m-d', strtotime('+3 month', strtotime($last_sent)));
                break;
        }
        return $return;
    }

    public function no_title($sentence) {
        return strlen($sentence)==0?'No title':$sentence;
    }
    
    public function clear_class($class_name) {
        $class_name = str_replace(array('.', ':', ';', '=', '^', '*', '#', '@', '/', '|', '>', '<', ',', '"', "'", '\\', '&', '$', '{', '}', '[', ']', '(', ')', '+', '`', '~', '!'), array('_', '', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', "_", '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_'), $class_name);
        return $class_name;
    }

    public function nl2br($content) {
        return nl2br($content);
    }

    public function truncate($sentence, $start, $end, $concat = null) {
        if(\strlen($sentence)>=$end) {
            $return = substr($sentence, $start, $end).$concat;
        } else {
            $return = $sentence;
        }
        return $return;
    }

    public function getName() {
        return 'twig_functions';
    }

}