<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_smartphone extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function _get_datatables_query()
	{
		$table = 'tbl_smartphone';
		$order = array('merk' => 'asc','seri' => 'asc','ram' => 'asc','rom' => 'asc');
		$column_order = array('id','merk','seri','display','kamera_depan','kamera_belakang','ram','rom','cpu','chipset','os','baterai','harga','foto');
		$column_search = array('id','merk','seri','display','kamera_depan','kamera_belakang','ram','rom','cpu','chipset','os','baterai','harga','foto');

		$this->db->from('tbl_smartphone');
		// $this->db->order_by('merk', 'ASC');
		// $this->db->order_by('seri', 'ASC');
		// $this->db->order_by('ram', 'ASC');
		// $this->db->order_by('rom', 'ASC');	
		$i = 0;
		foreach ($column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($column_search) - 1 == $i) //last loop
				{
					$this->db->group_end(); //close bracket
				}
			}
			$i++;
		}
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($order))
		{
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all()
	{
		$this->db->from('tbl_smartphone');
		return $this->db->count_all_results();
	}
	public function get_by_id($id)
	{
		$this->db->from($this->$table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function seg($rowperpage,$rowno)
	{
		$this->db->from('tbl_smartphone')->limit($rowperpage,$rowno);
		$this->db->order_by('merk', 'ASC');
		$this->db->order_by('seri', 'ASC');
		$this->db->order_by('ram', 'ASC');
		$this->db->order_by('rom', 'ASC');
		$q = $this->db->get();
		return $q->result_array();
	}
	public function getanysmart($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_smartphone');
		$this->db->where_in('id', $id);
		$query = $this->db->get();

		return $query->result();
	}

	public function list_smartphone()
	{
		// $query = $this->db->get('tbl_smartphone');
		// return $query->result();
		$this->db->select('*');
		$this->db->from('tbl_smartphone');
		$this->db->order_by('merk', 'ASC');
		$this->db->order_by('seri', 'ASC');
		$this->db->order_by('ram', 'ASC');
		$this->db->order_by('rom', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_smartphone($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_smartphone');
		$this->db->where('id', $id);

		$q = $this->db->get();
		return $q->row();
	}

	public function insert_smartphone($data)
	{
		$this->db->insert('tbl_smartphone', $data);
		return $this->db->insert_id();
	}

	public function update_smartphone($id,$data)
	{
		$this->db->where('id', $id);
		return $this->db->update('tbl_smartphone', $data);
	}

	public function delete_smartphone($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tbl_smartphone');
	}

	public function count_smartphone()
	{
		$this->db->select('*');
		$this->db->from('tbl_smartphone');
		$r = $this->db->get();
		return $r->num_rows();
	}

	public function get_foto($id)
	{
		$this->db->select('foto');
		$this->db->from('tbl_smartphone');
		$this->db->where('id', $id);

		$q = $this->db->get();
		return $q->row();
	}

	public function filter_smart($param,$cari_merk,$rowperpage,$rowno)
	{
		$this->db->select('*')->limit($rowperpage,$rowno);;
		$this->db->from('tbl_smartphone');
		if ($param == "harga_rendah") {
			$sort = $this->db->order_by('harga', 'asc');
		} elseif ($param == "harga_tinggi") {
			$sort = $this->db->order_by('harga', 'desc');
		} elseif ($param == "ram_tinggi") {
			$sort = $this->db->order_by('ram', 'desc');
		} elseif ($param == "ram_rendah") {
			$sort = $this->db->order_by('ram', 'asc');
		} elseif ($param == "rom_tinggi") {
			$sort = $this->db->order_by('rom', 'desc');
		} elseif ($param == "rom_rendah") {
			$sort = $this->db->order_by('rom', 'asc');
		}
		if (empty($cari_merk)) {
			$by_merk = '';
		} else {
			$by_merk = $this->db->where('merk', $cari_merk);
		}
		
		$sort;
		$query = $this->db->get();
		return $query->result();
	}

	public function bymerk()
	{
		$this->db->select('merk');
		$this->db->from('tbl_smartphone');
		$this->db->group_by('merk');
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all_by_merk($merk)
	{
		$this->db->select('*');
		$this->db->from('tbl_smartphone');
		$this->db->where('merk', $merk);
		$r = $this->db->get();
		return $r->num_rows();
	}

}

/* End of file M_smartphone.php */
/* Location: ./application/models/M_smartphone.php */