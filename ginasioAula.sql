use sportgymdb;

create table if not exists ginasioAula(
IDginasio int unsigned,
IDaula int unsigned,
constraint pk_ginasioAula_IDginasioAula primary key (IDginasio, IDaula),
constraint fk_ginasioAula_IDginasio foreign key (IDginasio) references ginasio (IDginasio),
constraint fk_ginasioAula_IDaula foreign key (IDaula) references aula (IDaula)
)engine=InnoDB;