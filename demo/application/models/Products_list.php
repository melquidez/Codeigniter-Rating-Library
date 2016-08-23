<?php

class Products_list extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}


	public function getProducts($esc = null){

		$q = !is_null($esc) ? $this->db->get_where('products', array('p_slug' => $esc)) : $this->db->get('products');

		if($q->num_rows() > 0){
			return $q->result();
		} else{
			return flase;
		}
	}

	public function getProductRatings($product){
		$q = $this->db->get_where('product_ratings', array('r_rated_product' => $product));
		if($q->num_rows() > 0){
			return $q->result_array();
		} else{
			return false;
		}
	}


	public function insertRating($ratingData){
		$this->db->insert('product_ratings', $ratingData);
	}


	public function updateProduct($product, $avg){
		$this->db->set('p_rating', $avg)
				->where('p_slug', $product)
				->update('products');
	}


	public function resetRating(){
		$this->db->set('p_rating', 0);
		$this->db->update('products');
		$this->db->truncate('product_ratings');
	}
}