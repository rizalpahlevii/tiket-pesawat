<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboard_model extends CI_Model{

        public function getQueryChart(){
            return $this->db->query("SELECT
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=1)AND (YEAR(tgl_booking)=2019))),0) AS `Januari`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=2)AND (YEAR(tgl_booking)=2019))),0) AS `Februari`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=3)AND (YEAR(tgl_booking)=2019))),0) AS `Maret`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=4)AND (YEAR(tgl_booking)=2019))),0) AS `April`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=5)AND (YEAR(tgl_booking)=2019))),0) AS `Mei`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=6)AND (YEAR(tgl_booking)=2019))),0) AS `Juni`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=7)AND (YEAR(tgl_booking)=2019))),0) AS `Juli`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=8)AND (YEAR(tgl_booking)=2019))),0) AS `Agustus`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=9)AND (YEAR(tgl_booking)=2019))),0) AS `September`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=10)AND (YEAR(tgl_booking)=2019))),0) AS `Oktober`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=11)AND (YEAR(tgl_booking)=2019))),0) AS `November`,
  ifnull((SELECT count(id_booking) FROM (booking)WHERE((Month(tgl_booking)=12)AND (YEAR(tgl_booking)=2019))),0) AS `Desember`
 FROM booking GROUP BY YEAR(tgl_booking)");
        }
    }
?>