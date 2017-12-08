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

print_r($this->words);

        foreach ($this->words as $word) {
            $this->findKeyDegree($word);
            $this->findKeySubCate($word);
        }

        print_r($this->scoreDegree);
        print_r($this->scoreSubCate);

        if(count($this->scoreDegree) > 0) {
            print_r("score degree > 0");
            $this->output['id_degree'] = $this->findMoreDegree();
        } else {
            // default
            print_r("score degree not value");
        }

        if(count($this->scoreSubCate) > 1) {
            print_r("score sub cate > 1");
            $this->output['id_ref_cate'] = $this->findMoreSubCate();
        } else {
            // default
            print_r("score sub cate not value");
        }

//        return $this->scoreSubCate;
    }

    private function findKeyDegree($keyword) {
        $key_degree = $this->key_degree($keyword);

        // update value
        if($key_degree !== false) {
            print_r($key_degree);
            if(isset($this->scoreDegree[$key_degree['id_degree']])) {
                $this->scoreDegree[$key_degree['id_degree']] += 1;
            } else {
                $this->scoreDegree[$key_degree['id_degree']] = 1;
            }
        }

    }

    private function findKeySubCate($keyword) {
        $key_category = $this->key_category($keyword);

        // update value
        if($key_category !== false) {
            print_r($key_category);
            $this->scoreSubCate[] = $key_category;
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
        $sql = "select id_degree, keyword_degree from key_degree WHERE LOWER(keyword_degree)=:word";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':word', strtolower($keyword));
        $stmt->execute();
        return $stmt->fetch();
    }

    private function key_category($keyword) {
        $sql = "SELECT * 
                FROM key_category
                JOIN ref_category category ON key_category.id_key = category.id_key 
                WHERE LOWER(keyword)=:word";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':word', strtolower($keyword));
        $stmt->execute();
        return $stmt->fetch();
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
        foreach ($this->scoreSubCate as $key => $value) {
            if($current < $value) {
                $id = $key;
                $current = $value;
            }
        }
        return $id;
    }
}