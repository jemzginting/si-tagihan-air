# Host: localhost  (Version 5.6.21)
# Date: 2019-07-07 21:27:26
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_login"
#

CREATE TABLE `tb_login` (
  `no_kontrol` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(3) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`no_kontrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "tb_login"
#

REPLACE INTO `tb_login` VALUES ('199810271234','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-05'),('admin','e10adc3949ba59abbe56e057f20f883e',1,'2019-07-03'),('B 080 0068 00001','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-03'),('B 080 0068 00008','e10adc3949ba59abbe56e057f20f883e',2,NULL),('B 080 0068 00009','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-03'),('B 080 0068 00010','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-03'),('B 080 0068 00011','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-03'),('jemz','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-04'),('jemzx','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-07'),('raisa2','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-04'),('theo','e10adc3949ba59abbe56e057f20f883e',2,'2019-07-03');

#
# Structure for table "tb_keluhan"
#

CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_permohon` varchar(50) DEFAULT NULL,
  `alamat_permohon` varchar(200) DEFAULT NULL,
  `tanggal_permohon` date DEFAULT NULL,
  `no_agenda` varchar(50) DEFAULT NULL,
  `ukuran_meter` varchar(20) DEFAULT NULL,
  `merek_meter` varchar(50) DEFAULT NULL,
  `seri_meter` varchar(50) DEFAULT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `tgl_pk` date DEFAULT NULL,
  `tgl_meter` date DEFAULT NULL,
  `tgl_pasang` date DEFAULT NULL,
  `jenis_keluhan` varchar(255) DEFAULT NULL,
  `catatan` text,
  `no_kontrol` varchar(50) DEFAULT NULL,
  `reply_keluhan` text,
  PRIMARY KEY (`id_keluhan`),
  KEY `no_kontrol` (`no_kontrol`),
  CONSTRAINT `tb_keluhan_ibfk_1` FOREIGN KEY (`no_kontrol`) REFERENCES `tb_login` (`no_kontrol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "tb_keluhan"
#

REPLACE INTO `tb_keluhan` VALUES (1,'Jemz','saptamarga','2019-07-03','123','23','23','23','2333-12-23','3122-02-02','0000-00-00','2121-02-23','rekening_kemahalan','12312','B 080 0068 00010','yo gek dbeneri, selu be kamutu'),(2,'Jemz','saptamarga','2019-07-03','12','12','23','23','0001-02-01','0122-02-02','0002-02-02','0002-02-02','air_tidak_keluar','23123','B 080 0068 00010','yayaya'),(3,'Jemz','saptamarga','2019-07-03','qwe','23','23','23','0002-12-02','0002-02-02','0002-02-02','0002-02-02','masalah_meteran','asdas','theo','baik akan dikerjakan'),(4,'theo','palembang','2019-07-05','213','23','23','123','2001-02-23','2012-02-02','2014-02-02','2001-02-02','rekening_kemahalan','mahal nian om','theo','yo sabar kamutu');

#
# Structure for table "tb_himbauan"
#

CREATE TABLE `tb_himbauan` (
  `id_himbauan` int(11) NOT NULL AUTO_INCREMENT,
  `no_kontrol` varchar(50) DEFAULT NULL,
  `lama_tunggakan` int(3) DEFAULT NULL,
  `awal` int(3) DEFAULT NULL,
  `akhir` int(3) DEFAULT NULL,
  `total_tunggakan` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_himbauan`),
  KEY `no_kontrol` (`no_kontrol`),
  CONSTRAINT `tb_himbauan_ibfk_1` FOREIGN KEY (`no_kontrol`) REFERENCES `tb_login` (`no_kontrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_himbauan"
#

REPLACE INTO `tb_himbauan` VALUES (1,'jemz',1,2,2,3000000,'yes'),(2,'theo',2,1,2,4000000,'yes'),(3,'199810271234',1,1,1,200000,'yes');

#
# Structure for table "tb_pelanggan"
#

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT,
  `no_kontrol` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(30) DEFAULT NULL,
  `aktif` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `no_kontrol` (`no_kontrol`),
  CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`no_kontrol`) REFERENCES `tb_login` (`no_kontrol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "tb_pelanggan"
#

REPLACE INTO `tb_pelanggan` VALUES (1,'raisa2','raisa','sinila','018230123',NULL),(2,'jemz','jemz','palembang','082131231312','Ya'),(3,'admin','admin','palembang','918239231',NULL),(4,'theo','theo','palembang','08182313','Ya'),(5,'199810271234','Disharlin Orvio Riensi','perumahan bukit sejahtera polygon blok EK-01','089621940494','Y'),(6,'jemzx','jemz','sapta','sapta','Y');

#
# Structure for table "tb_tagihan"
#

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(5) NOT NULL AUTO_INCREMENT,
  `no_kontrol` varchar(50) DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `tahun` int(6) DEFAULT NULL,
  `st_awal` int(4) DEFAULT NULL,
  `st_akhir` int(4) DEFAULT NULL,
  `pemakaian` int(4) DEFAULT NULL,
  `lunas` varchar(10) DEFAULT NULL,
  `aktif` varchar(10) DEFAULT NULL,
  `tarif` varchar(4) DEFAULT NULL,
  `biaya` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `no_kontrol` (`no_kontrol`),
  CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`no_kontrol`) REFERENCES `tb_login` (`no_kontrol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "tb_tagihan"
#

REPLACE INTO `tb_tagihan` VALUES (4,'theo',1,2019,3000,3000,6,'tidak','ya','1A',1000000),(5,'theo',3,2019,2000,2000,8,'ya','ya','1A',2000000),(6,'theo',2,2019,2000,2000,8,'tidak','ya','1A',3000000),(7,'jemz',2,2019,2000,2000,8,'tidak','ya','1A',3000000),(8,'199810271234',1,2019,2122,222,34,'tidak','ya','1A',200000);
