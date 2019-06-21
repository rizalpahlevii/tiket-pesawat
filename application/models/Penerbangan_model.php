<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penerbangan_model extends CI_Model
{
    public function tmp_penerbanganNonWhere(){
        $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
        $this->db->from('penerbangan');
        $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
        $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
        return $this->db->get()->result();
    }

    public function tmp_penerbangan()
    {
        $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat,pesawat.image, bandara.kota_bandara, bandara.nama_bandara");
        $this->db->from('penerbangan');
        $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
        $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
        $this->db->where('penerbangan.tgl_penerbangan >=', date('Y-m-d'));
        return $this->db->get()->result();
    }
    public function tmp_penerbanganValid()
    {
        $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat, bandara.kota_bandara, bandara.nama_bandara");
        $this->db->from('penerbangan');
        $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
        $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
        $this->db->where('penerbangan.id_penerbangan NOT IN ( SELECT id_penerbangan FROM tarif_penerbangan)');
        $this->db->where('penerbangan.tgl_penerbangan >=', date('Y-m-d'));
        return $this->db->get()->result();
    }
    public function tmp_penerbanganById($where)
    {
        $this->db->select("penerbangan.id_penerbangan, penerbangan.tgl_penerbangan, penerbangan.asal, penerbangan.tujuan, penerbangan.jam_berangkat, penerbangan.jam_tiba, pesawat.type_pesawat, bandara.kota_bandara, bandara.nama_bandara");
        $this->db->from('penerbangan');
        $this->db->join('pesawat', 'pesawat.id_pesawat = penerbangan.id_pesawat');
        $this->db->join('bandara', 'bandara.id_bandara = penerbangan.id_bandara');
        $this->db->where($where);
        return $this->db->get();
    }
    public function delete($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    public function buat_kode()
    {
        $this->db->select('Right(penerbangan.id_penerbangan,5) as kode ', false);
        $this->db->order_by('id_penerbangan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('penerbangan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi  = "PNB" . $kodemax;
        return $kodejadi;
    }
}
