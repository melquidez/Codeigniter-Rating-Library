<?php

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Products_list', 'products', TRUE);
	}

	public function landing($pages = 'product_list', $product = null){
		$this->load->helper('url');

		if(!file_exists(APPPATH . 'views/pages/' . $pages . '.php')){
			show_404();
		}

		$data['list'] = $this->products->getProducts();
		$data['product'] = $this->products->getProducts($product);

		$data['title'] = ucfirst(preg_replace("/(\_+)/", " ", $pages));
		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $pages, $data);
		$this->load->view('templates/footer');
	}



	/**
	 *
	 * @param string $product get the product slug
	 * @param int $rate get the rate
	 *
	 */

	public function addRating($product, $rate){
		$this->load->helper('url');
		$this->load->library('ratings'); // load the rating library..

		if(empty($product) && empty($rate)){
			redirect(base_url());
		}

		$rateData = array(
			'r_rating'			=> $rate,
			'r_rated_product'	=> $product
		);

		$this->products->insertRating($rateData); //insert the rating in product_rating
		$query = $this->products->getProductRatings($product); // get the rating where product name is product
		$rating = $this->ratings->rating($query, 'r_rating'); // computes the rating and return the average rating..
		if($rating){
			$this->products->updateProduct($product, $rating); // update the product table to set the average rating..
			redirect(base_url());
		}
	}



	public function resetMe(){
		$this->load->helper('url');
		$this->products->resetRating();
		redirect(base_url());
	}
}
