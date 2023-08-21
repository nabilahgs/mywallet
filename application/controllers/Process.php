<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller
{
    public function index()
    {
    }

    public function add_account()
    {
        $data = array(
            'account_name'     => $this->input->post('account_name', TRUE),
            'credit'           => $this->input->post('credit', TRUE),
        );

        $this->models->tambah($data, 'tb_account');


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Account added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/account');
    }

    public function delete_account($id_account)
    {
        $where = array(
            'id_account'    => $id_account
        );
        $this->models->hapus($where, 'tb_account');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">Account deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('home/account');
    }

    public function update_account()
    {
        $where = array(
            'id_account'    => $this->input->post('id_account', TRUE)
        );

        $data = array(
            'account_name'           => $this->input->post('account_name', TRUE),
        );

        $this->models->edit($where, $data, 'tb_account');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Account edited successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('home/account');
    }

    public function transfer_credit()
    {
        $credit = $this->input->post('credit', TRUE);
        $source = $this->input->post('source', TRUE);
        $destination = $this->input->post('destination', TRUE);

        $s = $this->db->query("SELECT * FROM tb_account WHERE id_account = $source")->row_array();
        $d = $this->db->query("SELECT * FROM tb_account WHERE id_account = $destination")->row_array();

        $data_source = array(
            'credit'           => $s['credit'] - $credit,
        );
        $data_destination = array(
            'credit'           => $d['credit'] + $credit,
        );

        $where_source = array(
            'id_account'    => $this->input->post('source', TRUE)
        );

        $where_destination = array(
            'id_account'    => $this->input->post('destination', TRUE)
        );

        $this->models->edit($where_source, $data_source, 'tb_account');
        $this->models->edit($where_destination, $data_destination, 'tb_account');

        date_default_timezone_set("Asia/Jakarta");
        $data_log = array(
            'type'              => 3,
            'log_description'   => "Transfer from " . $s['account_name'] . " to " . $d['account_name'],
            'nominal'           => $credit,
            'date_log'              => date("Y-m-d")
        );
        $this->models->tambah($data_log, 'tb_log');


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Credit transfered successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('home/account');
    }
    public function add_category()
    {
        $data = array(
            'category_name'           => $this->input->post('category_name', TRUE),
        );

        $this->models->tambah($data, 'tb_category');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Category added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/category');
    }

    public function delete_category($id_category)
    {
        $where = array(
            'id_category'    => $id_category
        );
        $this->models->hapus($where, 'tb_category');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">Category deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/category');
    }

    public function update_category()
    {
        $where = array(
            'id_category'    => $this->input->post('id_category', TRUE)
        );

        $data = array(
            'category_name'           => $this->input->post('category_name', TRUE),
        );

        $this->models->edit($where, $data, 'tb_category');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Category edited successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/category');
    }

    public function add_budgeting()
    {
        $data = array(
            'id_category'       => $this->input->post('id_category', TRUE),
            'nominal'           => $this->input->post('nominal', TRUE),
            'date_added'        =>  date('Y/m/d h:i:sa'),
            'date_edited'       =>  date('Y/m/d h:i:sa'),
        );

        $this->models->tambah($data, 'tb_budgeting');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Budgeting added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/budgeting');
    }

    public function delete_budgeting($id_budgeting)
    {
        $where = array(
            'id_budgeting'    => $id_budgeting
        );
        $this->models->hapus($where, 'tb_budgeting');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">Budgeting deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/budgeting');
    }

    public function update_budgeting()
    {
        $where = array(
            'id_budgeting'    => $this->input->post('id_budgeting', TRUE)
        );

        $data = array(
            'nominal'           => $this->input->post('nominal', TRUE),
        );

        $this->models->edit($where, $data, 'tb_budgeting');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">Budgeting edited successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/budgeting');
    }

    public function add_spendings()
    {
        $id_category       = $this->input->post('id_category', TRUE);
        $id_account       = $this->input->post('id_account', TRUE);
        $nominal           = $this->input->post('nominal', TRUE);
        $description       = $this->input->post('description', TRUE);

        $data = array(
            'id_category'       => $id_category,
            'id_account'        => $id_account,
            'nominal'           => $nominal,
            'description'       => $description,
            'date'              => date($this->input->post('date_spends', TRUE))

        );

        $bud = $this->db->query("SELECT * FROM tb_budgeting WHERE id_category = $id_category")->row_array();
        $where_bud = array(
            'id_category'   => $id_category
        );

        $data_budget = array(
            'nominal' => $bud['nominal'] - $nominal
        );
        $this->models->edit($where_bud, $data_budget, 'tb_budgeting');

        $cat = $this->db->query("SELECT * FROM tb_category WHERE id_category = $id_category")->row_array();
        $acc = $this->db->query("SELECT * FROM tb_account WHERE id_account = $id_account")->row_array();

        $where_acc = array(
            'id_account'   => $id_account
        );

        $data_acc = array(
            'credit' => $acc['credit'] - $nominal
        );
        $this->models->edit($where_acc, $data_acc, 'tb_account');

        date_default_timezone_set("Asia/Jakarta");
        $data_log = array(
            'type'              => 2,
            'log_description'   => "Spending on " . $cat['category_name'] . " for " . $description . " from " . $acc['account_name'],
            'nominal'           => $nominal,
            'date_log'              => date($this->input->post('date_spends', TRUE))
        );
        $this->models->tambah($data_log, 'tb_log');

        $this->models->tambah($data, 'tb_spendings');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">spendings added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/spendings');
    }

    public function delete_spendings($id_spendings)
    {
        $where = array(
            'id_spendings'    => $id_spendings
        );
        $this->models->hapus($where, 'tb_spendings');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">spendings deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/spendings');
    }

    public function update_spendings()
    {
        $where = array(
            'id_spendings'    => $this->input->post('id_spendings', TRUE)
        );

        $data = array(
            'nominal'           => $this->input->post('nominal', TRUE),
        );

        $this->models->edit($where, $data, 'tb_spendings');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">spendings edited successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/spendings');
    }

    public function add_income()
    {
        $id_account       = $this->input->post('id_account', TRUE);
        $nominal           = $this->input->post('nominal', TRUE);
        $description       = $this->input->post('description', TRUE);

        $data = array(
            'id_account'        => $id_account,
            'nominal'           => $nominal,
            'description'       => $description,
            'date'              => date($this->input->post('date_spends', TRUE))
        );

        date_default_timezone_set("Asia/Jakarta");
        $data_log = array(
            'type'              => 1,
            'log_description'   => "Income from " . $description,
            'nominal'           => $nominal,
            'date_log'              => date($this->input->post('date_spends', TRUE))
        );
        $this->models->tambah($data_log, 'tb_log');

        $this->models->tambah($data, 'tb_income');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">income added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/income');
    }

    public function delete_income($id_income)
    {
        $where = array(
            'id_income'    => $id_income
        );
        $this->models->hapus($where, 'tb_income');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">income deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/income');
    }

    public function update_income()
    {
        $where = array(
            'id_income'    => $this->input->post('id_income', TRUE)
        );

        $data = array(
            'nominal'           => $this->input->post('nominal', TRUE),
        );

        $this->models->edit($where, $data, 'tb_income');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">income edited successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
        redirect('home/income');
    }
}
