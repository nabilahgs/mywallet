<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Home",
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array()

		);
		$this->load->view('temp/header', $data);
		$this->load->view('home_view', $data);
		$this->load->view('temp/footer', $data);
	}

	public function account()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Account",
			'acc'		=> $this->db->get('tb_account')->result(),
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array()
		);
		$this->load->view('temp/header', $data);
		$this->load->view('account', $data);
		$this->load->view('temp/footer', $data);
	}

	public function category()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Category",
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array(),
			'cat'		=> $this->db->get('tb_category')->result()
		);
		$this->load->view('temp/header', $data);
		$this->load->view('category', $data);
		$this->load->view('temp/footer', $data);
	}

	public function budgeting()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Budgeting",
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array(),
			'sum_bud'		=> $this->db->query("SELECT SUM(nominal) as sumbud FROM tb_budgeting")->row_array(),
			'cat'		=> $this->db->get('tb_category')->result(),
			'bud'		=>  $this->db->query(
				"SELECT tb_budgeting.*, tb_category.*
							   FROM tb_budgeting
						 INNER JOIN tb_category
								 ON tb_budgeting.id_category = tb_category.id_category"
			)->result()
			// 'bud'		=> $this->db
			// 	->join('tb_budgeting', 'tb_budgeting.id_category = tb_category.id_category')->result(),
			// 'bud'		=> $this->db->get('tb_budgeting')->result()
		);
		$this->load->view('temp/header', $data);
		$this->load->view('budgeting', $data);
		$this->load->view('temp/footer', $data);
	}

	public function spendings()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Spendings",
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array(),
			'sum_bud'		=> $this->db->query("SELECT SUM(nominal) as sumbud FROM tb_budgeting")->row_array(),
			'spends'		=> $this->db->query("SELECT * FROM tb_spendings ORDER BY date DESC")->result(),
			// 'spends'		=> $this->db->get('tb_spendings')->result(),
			'bud'		=>  $this->db->query(
				"SELECT tb_budgeting.*, tb_category.*
							   FROM tb_budgeting
						 INNER JOIN tb_category
								 ON tb_budgeting.id_category = tb_category.id_category"
			)->result(),
			'acc'		=> $this->db->get('tb_account')->result(),

			// 'bud'		=> $this->db
			// 	->join('tb_budgeting', 'tb_budgeting.id_category = tb_category.id_category')->result(),
			// 'bud'		=> $this->db->get('tb_budgeting')->result()
		);
		$this->load->view('temp/header', $data);
		$this->load->view('spendings', $data);
		$this->load->view('temp/footer', $data);
	}

	public function income()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Income",
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array(),
			'acc'		=> $this->db->get('tb_account')->result(),
			'income'		=> $this->db->get('tb_income')->result(),
			// 'bud'		=> $this->db
			// 	->join('tb_budgeting', 'tb_budgeting.id_category = tb_category.id_category')->result(),
			// 'bud'		=> $this->db->get('tb_budgeting')->result()
		);
		$this->load->view('temp/header', $data);
		$this->load->view('income', $data);
		$this->load->view('temp/footer', $data);
	}

	public function log()
	{
		$data = array(
			'user' 		=> "Nabilah",
			'title'		=> "Log",
			'sum'		=> $this->db->query("SELECT SUM(credit) as sumie FROM tb_account")->row_array(),
			'log'		=> $this->db->query("SELECT * FROM tb_log ORDER BY date_log DESC")->result(),
			// 'log'		=> $this->db->get('tb_log')->result()
			// 'bud'		=> $this->db
			// 	->join('tb_budgeting', 'tb_budgeting.id_category = tb_category.id_category')->result(),
			// 'bud'		=> $this->db->get('tb_budgeting')->result()
		);
		$this->load->view('temp/header', $data);
		$this->load->view('log', $data);
		$this->load->view('temp/footer', $data);
	}
}
