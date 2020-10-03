<?php 
class TextPrepare
{
    function __construct($text) {
        $text = iconv('Windows-1251', 'UTF-8', file_get_contents('08.txt'));

        $listOfRegexps = [
            ['/\r\n {7}/', ' '],
            ['/ +/', ' '],
            
            ['/ (\r\n)/', '$1'],
            ['/(\r\n) /', '$1'],
            ['/\.(\r\n)/', '$1'],
            ['/\.?\S?\[(\d+\+)\]/', ' $1'],
            ['/(\r\n)\r\n/', '$1'],
            
            ['/\f/', ''],
            
            
            ['/ПРЕМЬЕРА\. /', ''],
            ['/РУССКАЯ СЕРИЯ\. /', ''],
            ['/НОЧНОЙ СЕАНС\. /', ''],
            ['/"60 Минут"\. Ток-шоу с Ольгой Скабеевой и Евгением Поповым/', '"60 минут"'],
            ['/"Кто против\?"\. Ток-шоу/', '"Кто против?"'],
        ];

        foreach ($listOfRegexps as $currentRegexp) {
            $text = preg_replace ( $currentRegexp[0],  $currentRegexp[1], $text);
        }
        
        $this->text = $text;
    }


    public function getText() {
        return $this->text;
    }
}
