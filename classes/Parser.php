<?php

class Parser 
{

    const TVLINE_REGEXP = '/^(?P<time>\d{1,2}[.|:]\d{2})[ |,|;|\t](?P<programm>.*)/i';

    public function __construct($text) {
        
        $lines = explode ("\r\n", $text);

        $this->content =  $lines;

        $this->parsed = $this->parseLines($lines);
    }

    public function getContent() {
        return $this->content;
    }

    public function parseLines($lines) {

        $this->content = [];
        foreach($lines as $line) {
            $this->content[] = $this->parseLine($line);
        }
    }

    private function parseLine($line) 
    {
        
        if (preg_match(self::TVLINE_REGEXP, trim($line), $matches)) {
            
            $time = strtotime($matches['time']);
            $programm = $matches['programm'];

            return ['time' => $time, 'programm' => $programm, 'source' => $line ];

        } else {
            
            return $line;
        }

    }
    
}
