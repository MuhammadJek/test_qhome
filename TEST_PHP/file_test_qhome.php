<?php
class Test
{
    function mergeSortArray($a, $b)
    {
        $merged = $a;
        for ($i = 0; $i < count($b); $i++) {
            $merged[count($merged)] = $b[$i];
        }

        for ($i = 0; $i < count($merged) - 1; $i++) {
            for ($j = 0; $j < count($merged) - $i - 1; $j++) {
                if ($merged[$j] > $merged[$j + 1]) {
                    $temp = $merged[$j];
                    $merged[$j] = $merged[$j + 1];
                    $merged[$j + 1] = $temp;
                }
            }
        }

        return $merged;
    }
    function getMissingData($arr)
    {
        $missing = array();
        for ($i = 1; $i < count($arr); $i++) {
            $diff = $arr[$i] - $arr[$i - 1];
            if ($diff > 1) {
                for ($j = 1; $j < $diff; $j++) {
                    $missing[count($missing)] = $arr[$i - 1] + $j;
                }
            }
        }
        return $missing;
    }
    function insertMissingData($arrayC, $arrayI)
    {
        $result = array();
        $arrIndex = 0;
        $missingIndex = 0;

        while ($arrIndex < count($arrayC) && $missingIndex < count($arrayI)) {
            if ($arrayC[$arrIndex] < $arrayI[$missingIndex]) {
                $result[count($result)] = $arrayC[$arrIndex];
                $arrIndex++;
            } else {
                $result[count($result)] = $arrayI[$missingIndex];
                $missingIndex++;
            }
        }

        while ($arrIndex < count($arrayC)) {
            $result[count($result)] = $arrayC[$arrIndex];
            $arrIndex++;
        }

        while ($missingIndex < count($arrayI)) {
            $result[count($result)] = $arrayI[$missingIndex];
            $missingIndex++;
        }

        return $result;
    }
    public function main()
    {
        $a = array(11, 36, 65, 135, 98);
        $b = array();
        $b[0] = 81;
        $b[1] = 23;
        $b[2] = 50;
        $b[3] = 155;

        echo "Array a: " . implode(", ", $a) . "<br>";
        echo "Array b: " . implode(", ", $b) . "<br>";
        $c = $this->mergeSortArray($a, $b);
        echo "1. Ini adalah Array A dan B secara ascending : " . implode(",", $c) . "<br>";
        $i = $this->getMissingData($c);
        echo "2. Angka yang hilang: ";
        for ($x = 0; $x < count($i); $x++) {
            echo $i[$x] . " ";
        }
        echo "<br>";
        $d = $this->insertMissingData($c, $i);
        echo "3. Ini Hasil Akhir mergeSortArray dan insertMissingData  : " . implode(",", $d) . "<br>";
    }
}

$t = new Test();
$t->main();
