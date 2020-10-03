<?php 
class CompileText 
{
    public function __construct ($content) {
        $this->content = $content->content;
    }

    public function getText() {
        $result = [];

        foreach($this->content as $item) {
            if(is_array($item)) {
                $result[] = "   ". date('H:i', $item['time']) ."   " . $item['programm'];
            } else {
                $result[] = $item;
            }
        }

        return join("\r\n", $result);
    }
}