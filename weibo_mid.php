<?php

class weibo_mid {

    static private $str62key = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    static private function intToEncode62($int){
        $s62 = '';
        $r = 0;
        while($int != 0) {
            $r = $int % 62;
            $s62 = self::$str62key{$r}.$s62;
            $int = floor($int/62);
        }
        return $s62;
    }

    static private function encode62ToInt($str62) {
    $i10 = 0;
    for ($i = 0; $i < strlen($str62); $i++) {
        $n = strlen($str62) - $i - 1;
        $i10 += intval(strpos(self::$str62key, $str62{$i}) * pow(62, $n));
    }
    return $i10;
    }

    static public function id2mid($id) {
        $mid = "";
        for ($i = strlen($id)-7; $i > -7; $i = $i - 7) {
            $offset = $i < 0 ? 0 : $i;
            $len = $i < 0 ? (strlen($id) % 7) :7;
            $str = self::intToEncode62(substr($id,$offset, $len));
            $mid = $str.$mid;
        }
        return $mid;
    }

    static public function mid2id($str62) {
    $id = "";
    for ($i = strlen($str62) - 4; $i > -4; $i = $i -4) {
        $offset = $i < 0 ? 0 : $i;
        $len = $i < 0 ? (strlen($str62) % 4) : 4;
        $str = self::encode62ToInt(substr($str62, $offset, $len));
        if ($offset > 0) {$str = str_pad($str, 7, '0', STR_PAD_LEFT);}
        $id = $str.$id;
    }
    return $id; 
    }

    static public function test() {
        $id = '4079365341980588';
            $mid = weibo_mid::id2mid($id);
            echo "id: {$id}\n";       
            echo "mid: {$mid}\n";
            echo "weibo_id: ".weibo_mid::mid2id($mid)."\n\n";
    
        $id = '4090576556902043';
            $mid = weibo_mid::id2mid($id);
            echo "id: {$id}\n";
            echo "mid: {$mid}\n";
            echo "weibo_id: ".weibo_mid::mid2id($mid)."\n\n";

        $id = '4090556357444653';
            $mid = weibo_mid::id2mid($id);
            echo "id: {$id}\n";
            echo "mid: {$mid}\n";
            echo "weibo_id: ".weibo_mid::mid2id($mid)."\n\n";

        $id = '4090528670600488';
            $mid = weibo_mid::id2mid($id);
            echo "id: {$id}\n";
            echo "mid: {$mid}\n";
            echo "weibo_id: ".weibo_mid::mid2id($mid)."\n\n";

    }
}

?>