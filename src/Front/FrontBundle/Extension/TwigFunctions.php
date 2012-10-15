<?php

namespace Front\FrontBundle\Extension;

class TwigFunctions extends \Twig_Extension {

    public function getFilters() {
        return array(
            'truncate' => new \Twig_Filter_Method($this, 'truncate'),
            'no_title' => new \Twig_Filter_Method($this, 'no_title'),
            'nl2br' => new \Twig_Filter_Method($this, 'nl2br'),
            'days_ago' => new \Twig_Filter_Method($this, 'days_ago'),
            'clear_class' => new \Twig_Filter_Method($this, 'clear_class'),
        );
    }

    public function days_ago($date) {
        $timestamp = strtotime($date);
        $now = time();
        $diff = $now-$timestamp;
        $days = $diff/60/60/24;
        if(floor($days) == 1) {
            $ret = 'Ieri';
        } elseif(floor($days) > 1) {
            $ret = floor($days).' zile in urma';
        } elseif(floor($days) == 0) {
            $hours = $diff/60/60;
            if(floor($hours) == 1) {
                $ret = 'acum o ora';
            } elseif(floor($hours) > 1) {
                $ret = 'acum '.floor($hours).' ore';
            } elseif(floor($hours) == 0) {
                $minutes = $diff/60;
                if(floor($minutes) == 1) {
                    $ret = 'acum o minuta';
                } elseif(floor($minutes) > 1) {
                    $ret = 'acum '.floor($minutes).' minute';
                } elseif(floor($minutes) == 0) {
                    $ret = 'acum '.$diff.' secunde';
                }
            }
            
        }
        return $ret;
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