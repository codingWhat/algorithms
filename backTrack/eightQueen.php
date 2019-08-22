<?php
//利用回溯算法求解八皇后问题
//任何两个皇后不能处于同一条横行，纵行或斜线上


class Queen {

    public $result = [];

    public function cal8queen($row = 0)
    {
        if ($row == 8) {
            $this->printItems();
            return;
        }

        for ($col = 0; $col < 8; $col++) {
            if ($this->isOk($row, $col)) {
                $this->result[$row] = $col;
                $this->cal8queen($row+1);
            }
        }

    }

    public function isOk($row, $col)
    {

        $left = $col - 1;
        $right  = $col + 1;
        for ($i = $row -1 ; $i >= 0; $i-- ) {

                if ($this->result[$i] == $col)  return false;

                if ($left >= 0 && $this->result[$i] == $left) return false;

                if ($right < 8 && $this->result[$i] == $right) return false;

                $left--;
                $right++;

        }


        return true;
    }

    public function printItems()
    {
        for ($i = 0; $i < 8; $i++ ) {

            for ($j = 0; $j < 8; $j++) {
                if ($this->result[$i] == $j) {
                    echo "Q";
                }else {
                    echo  "*";
                }
            }

            echo PHP_EOL;
        }

        echo PHP_EOL . PHP_EOL;
    }
}

$q = new Queen;
$q->cal8queen();