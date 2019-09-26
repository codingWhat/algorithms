<?php
//find one lcs -- longest common subsequence

class LCS {

    private $lookup;

    public function do($str1, $str2)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);
        $this->makeDistanceMap($str1, $str2, $len1, $len2);

        echo $this->findOneLcs($str1, $str2, $len1, $len2);
    }

    public function makeDistanceMap($str1, $str2, $len1, $len2)
    {
        for ($i = 0; $i <= $len1; $i++) {
            $this->lookup[$i][0] = 0;
        }

        for ($j = 0; $j <= $len2; $j++) {
            $this->lookup[0][$j] = 0;
        }

        for ($i = 1; $i <= $len1; $i++) {
            for ($j = 1; $j <= $len2; $j++ ) {

                if ($str1[$i-1] == $str2[$j-1]) {
                    $this->lookup[$i][$j] = $this->lookup[$i-1][$j] + 1;
                } else{
                    $this->lookup[$i][$j] = max($this->lookup[$i-1][$j], $this->lookup[$i][$j-1]);
                }
            }
        }
    }

    public function findOneLcs($str1, $str2, $len1, $len2)
    {
        if ($len2 == 0 || $len1 == 0) {
            return "";
        }

        if ($str1[$len1-1] == $str2[$len2-1]) {
            return $this->findOneLcs($str1, $str2, $len1-1, $len2-1) . $str1[$len1 - 1];
        }

        if ($this->lookup[$len1-1][$len2] > $this->lookup[$len1][$len2-1]) {
           return $this->findOneLcs($str1, $str2, $len1 -1, $len2);
        } else {
           return  $this->findOneLcs($str1, $str2, $len1, $len2 - 1);
        }
    }
}

$lcs = new LCS();
$lcs->do("XMJYAUZ", "MZJAWXU");