<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MPaketsoal extends CI_Model {
	var $table = 'tb_paket';
	var $column_order = array('id_paket','nm_paket','deskripsi','status','jumlah_soal','durasi');
	var $column_search = array('nm_paket','deskripsi','jumlah_soal');
	var $order = array('id_paket'=>'desc');

	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('id_paket',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function insertpaketsoal( $data ) {
		$this->db->insert( 'tb_paket', $data );
	}
 
	public function getpaketsoal() {
		$this->db->select( '*' )->from( 'tb_paket' );
		$this->db->where( 'status', 1 );
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getpaket_by_id($idpaket) {
		$this->db->select( '*' )->from( 'tb_paket' );
		$this->db->where('id_paket',$idpaket);
		$this->db->where( 'status', 1 );
		$query = $this->db->get();

		return $query->result_array();
	}

	public function droppaket( $id ) {
		$this->db->set( 'status', 0 );
		$this->db->where( 'id_paket', $id );
		$this->db->update( 'tb_paket' );
	}

	function rubahpaket( $id, $data ) {
		$this->db->where( 'id_paket', $id );
		$this->db->update( 'tb_paket', $data );
	}

	function hitung_semua() {
		$this->db->from( $this->table );
		return $this->db->count_all_results();
	}

	function hitung_filter() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_datatables() {
		$this->_get_datatables_query();
		if ( $_POST['length'] != -1 )
		$this->db->limit( $_POST['length'], $_POST['start'] );
		$query = $this->db->get();
		return $query->result();
	}

	private function _get_datatables_query() {

		$this->db->from( $this->table );

		$i = 0;

		foreach ( $this->column_search as $item ) // loop column
			{
			if ( $_POST['search']['value'] ) // if datatable send POST for search
				{

				if ( $i===0 ) // first loop
					{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like( $item, $_POST['search']['value'] );
				}
				else {
					$this->db->or_like( $item, $_POST['search']['value'] );
				}

				if ( count( $this->column_search ) - 1 == $i ) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if ( isset( $_POST['order'] ) ) // here order processing
			{
			$this->db->order_by( $this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir'] );
		}
		else if ( isset( $this->order ) ) {
				$order = $this->order;
				$this->db->order_by( key( $order ), $order[key( $order )] );
			}
	}

	#Start function insert add soal pakert#
	public function insert_soal_paket($mmpaket)
	{

		 $this->db->insert_batch('tb_mm-paketbank',$mmpaket);
		echo "masuk model";
		var_dump($mmpaket);
	}
	#END function insert add soal pakert#


}
?>
