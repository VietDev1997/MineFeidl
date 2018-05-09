<?php


class MineSweeper
{
    public $inputMap;
    public $arayMap;

    public function getInputMap()
    {
        return $this->inputMap;
    }

    public function setInputMap($inputMap)
    {
        $this->inputMap = $inputMap;
    }

    public function changeNumber()
    {

        for ($i = 0; $i < count($this->inputMap); $i++) {
            for ($j = 0; $j < count($this->inputMap[$i]); $j++) {
                if ($this->inputMap[$i][$j] === '.') {
                    $next_point = $this->getPoint(array($i, $j));
                    $mines = $this->countMines($next_point);
                    $this->inputMap[$i][$j] = $mines;

                }
            }
            print "<br/>";

        }
        $a = $this->inputMap;
        return $a;
    }

    // mảng lưu các tọa độ
    private function getPoint(array $point)
    {
        return array(
            array($point[0] - 1, $point[1] - 1),
            array($point[0] - 1, $point[1]),
            array($point[0] - 1, $point[1] + 1),
            array($point[0], $point[1] - 1),
            array($point[0], $point[1] + 1),
            array($point[0] + 1, $point[1] - 1),
            array($point[0] + 1, $point[1]),
            array($point[0] + 1, $point[1] + 1),
        );
    }

    // đếm
    private function countMines(array $spots)
    {
        $mines = 0;
        foreach ($spots as $spot) {
            if ($this->isValidSpot($spot) AND $this->isMine($spot)) {
                $mines++;
            }
        }
        return $mines;
    }

    // kiem tra toa do
    private function isValidSpot(array $spot)
    {
        if (!array_key_exists($spot[0], $this->inputMap) ||
            !array_key_exists($spot[1], $this->inputMap[$spot[0]])) {
            return FALSE;
        }
        return TRUE;
    }

    // kiem tra bom
    private function isMine(array $spot)
    {
        if ($this->inputMap[$spot[0]][$spot[1]] === "*") {
            return TRUE;
        }
        return FALSE;
    }
}

