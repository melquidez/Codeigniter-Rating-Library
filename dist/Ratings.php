<?php

/**
 * 
 * @author Melquidez Lazaro <melquidezlazaro@gmail.com>
 * @version 1.0.0
 * @example call this by using the $this->ratings->rating([$query, $column], $limit)
 * 
 */

class Ratings{
    
    
    
    /**
     * 
     * @param array $query Select table where the rating stored.
     * @param string $column column name where the submitted rating is stored.
     * @param int $column it allows you to extends the rating, if you don't like the 5 ratings.
     * @return int $column returns the rating average.
     * 
     */
    public function rating($query, $column, $limit = 5){
        try{
            if(!is_array($query)){
                throw new Exception("Argument 1 must be an Array, " . gettype($query) ." given..");
                return false;
            }else{
                $t = array();
                $c = array();
                foreach($query as $r){
                    $n = $r[$column];
                    for($i = 1; $i <= $limit; $i++){
                        if($n == $i){
                            $x = count($n); // 1
                            $t[] = $n * $x; // t = n * x
                        }
                    }
                    $c[] = $n;
                }
                $avg = array_sum($t) / count($c);
                return $avg;
            }
        } catch(Exeption $e){
            return 'Message: ' . $e->getMessage();
        }
    }
}