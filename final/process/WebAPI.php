<?php

class WebAPI
{
    private $conn;
    private $book;
    private $words;
    private $scoreDegree;
    private $scoreSubCate;
    private $output;

    /**
     * WebAPI constructor.
     * @param PDO $conn
     * @param $book
     */
    public function __construct(PDO $conn, $book)
    {
        $this->conn = $conn;
        $this->book = $book;
        $this->words = [];
        $this->scoreDegree = [];
        $this->scoreSubCate = [];
        $this->output = [];
    }



    public function process() {
        $this->cut_word();
        $this->toLower();
//print_r($this->words);

        $this->findKeyDegree($this->words);
        $this->findKeySubCate($this->words);

//        print_r($this->scoreDegree);
//        print_r($this->scoreSubCate);

        if(count($this->scoreDegree) > 0) {
//            print_r("score degree > 0");
            $this->output['id_degree'] = $this->findMoreDegree();
        } else {
            // default
//            print_r("score degree not value");
        }

        if(count($this->scoreSubCate) > 0) {
//            print_r("score sub cate > 0<br>");
            $this->output['id_ref_cate'] = $this->findMoreSubCate();
        } else {
            // default
//            print_r("score sub cate not value<br>");
        }

        return $this->output;
    }

    private function findKeyDegree($keyword) {
        $key_degree = $this->key_degree($keyword);

        // update value
        if($key_degree !== false) {
//            print_r($key_degree);
            if(count($key_degree) > 0) {
                foreach ($key_degree as $value) {
                    if(isset($this->scoreDegree[$value['id_degree']])) {
                        $this->scoreDegree[$value['id_degree']] += 1;
                    } else {
                        $this->scoreDegree[$value['id_degree']] = 1;
                    }
                }
            }
        }

    }

    private function findKeySubCate($keyword) {
        $key_category = $this->key_category($keyword);

        // update value
        if($key_category !== false) {
//            print_r($key_category);
            if(count($key_category) > 0) {
                foreach ($key_category as $value) {
                    $this->scoreSubCate[] = $value;
//                    if(isset($this->scoreDegree[$value['id_degree']])) {
//                        $this->scoreDegree[$value['id_degree']] += 1;
//                    } else {
//                        $this->scoreDegree[$value['id_degree']] = 1;
//                    }
                }
            }

//            if(isset($this->scoreSubCate[$key_category['digit_sub']])) {
//                $this->scoreSubCate[$key_category['digit_sub']] += 1;
//            } else {
//                $this->scoreSubCate[$key_category['digit_sub']] = 1;
//            }
        }
    }

    private function cut_word()
    {
        $this->words = explode(' ', $this->book);
        foreach ($this->words as $word) {
            $arr = explode('.', $word);
            if(count($arr) > 0) {
                foreach ($arr as $val) {
                    if(!in_array($val, $this->words)) {
                        array_push($this->words, $val);
                    }
                }
            }
        }
    }

    private function degree() {
        $sql = "select * from degree";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function key_degree($keyword) {
        $sql = "select id_degree, keyword_degree from key_degree WHERE LOWER(keyword_degree) in(" . $this->arrToString($keyword) . ")";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function key_category($keyword) {
        $sql = "SELECT * 
                FROM key_category
                JOIN ref_category category ON key_category.id_key = category.id_key 
                WHERE LOWER(keyword) in(". $this->arrToString($keyword).")";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function findMoreDegree() {
        $current = 0;
        $id = 0;
        foreach ($this->scoreDegree as $key => $value) {
            if($current < $value) {
                $id = $key;
                $current = $value;
            }
        }


        return $id;
    }

    private function findMoreSubCate() {
        $current = 0;
        $id = 0;
        $digit_sub = [];
        foreach ($this->scoreSubCate as $key => $value) {
            if(isset($digit_sub[$value['digit_sub']]['count'])) {
                $digit_sub[$value['digit_sub']]['count'] += 1;
            } else {
                $digit_sub[$value['digit_sub']]['count'] = 1;
            }
            $digit_sub[$value['digit_sub']]['id_ref_cate'] = $value['id_ref_cate'];
        }

        foreach ($digit_sub as $key => $value) {
            if($current < $value['count']) {
                $id = $key;
                $current = $value['count'];
            }
        }

//        print_r($digit_sub[$id]['count'] . "<br>");
        if(count($digit_sub[$id]['count']) == 0) {
            // default
            return '1';
        }

        return $digit_sub[$id]['id_ref_cate'];
    }

    private function toLower()
    {
        $arr = [];
        foreach ($this->words as $word) {
            $arr[] = strtolower($word);
        }
        $this->words = $arr;
    }

    private function arrToString($arr) {
        $str = "";
        for($i = 0; $i < count($arr); $i++) {
            if($i != 0) {
                $str .= ",";
            }
            $str .= "'$arr[$i]'";

        }
        return $str;
    }

}