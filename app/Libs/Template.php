<?php

/**
 * Class Template
 * @todo Generate template and parse template tags
 * @author Francis Rodrigues <francis@tosystems.net>
 */

namespace app\Libs;

class Template {
    /**
     * @var String
     */
    protected $file;
    protected $values = array();
    protected $themeName;

    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    public function setTheme($theme) {
        $this->themeName = $theme;
    }

    public function setFile($file, $params = null) {
        if (is_object($params) AND isset($params->folder))
            $file = $params->folder . DS . $file;

        $this->file = $file;
    }

    public function output() {
        $themeFile = THEMEDIR . DS . $this->themeName . DS . $this->file . '.tpl';

        if (!file_exists($themeFile))
            return print_r(sprintf('Error loading template file %s', $this->file));

        $output = file_get_contents($themeFile);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "[@{$key}]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}