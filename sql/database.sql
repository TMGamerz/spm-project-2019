CREATE TABLE pengguna (
  IDPengguna varchar(11) NOT NULL PRIMARY KEY,
  NamaPengguna varchar(256) NOT NULL,
  KataLaluan varchar(256) NOT NULL
);

CREATE TABLE pembekal (
  KodPembekal varchar(11) NOT NULL PRIMARY KEY,
  NamaPembekal varchar(256) NOT NULL,
  TelefonPembekal varchar(256) NOT NULL
);

CREATE TABLE item (
  KodItem varchar(11) NOT NULL PRIMARY KEY,
  NamaItem varchar(256) NOT NULL,
  KodPembekal varchar(11) NOT NULL,
  HargaPerItem varchar(256) NOT NULL
);

CREATE TABLE jualan (
  KodJualan varchar(11) not null PRIMARY KEY,
  TarikhJualan date not null,
  KodItem varchar(11) not null,
  KuantitiItemDijual int(255) not null,
  HargaJualan decimal(8,2) not null,
  IDPengguna varchar(11) not null
);