create database Imoveis;

use Imoveis;

create table vendedor(
    vendedor_id int not null auto_increment,
    -- Informações Pessoais --
    nome varchar(200) not null,
    contato varchar(11),
    -- Informações da Conta --
    email varchar(100) not null,
    user varchar(200) not null,
    senha varchar(32) not null,
    primary key(vendedor_id)
);

create table cliente(
    cliente_id int not null auto_increment,
    -- Informações Pessoais --
    nome varchar(200) not null,
    contato varchar(11) not null,
    cpf varchar(11) not null,
    email varchar(100) not null,
    -- Informações da Conta --
    user varchar(200),
    senha varchar(32),
    primary key(cliente_id)
);

create table imovel(
    imovel_id int not null auto_increment,
    endereco varchar(200) not null,
    numero varchar(200) not null,
    bairro varchar(200) not null,
    cep varchar(8) not null,
    complemento varchar(200) not null,
    valor_imovel int not null,
    status boolean not null,
    vendedor_id int not null,
    primary key(imovel_id)
);

create table aluguel(
    aluguel_id int not null auto_increment,
    data_inicial date not null,
    data_final date not null,
    valor_aluguel int not null,
    vendedor_id int not null,
    cliente_id int not null,
    imovel_id int not null,
    primary key(aluguel_id),
    foreign key(vendedor_id) references vendedor(vendedor_id),
    foreign key(cliente_id) references cliente(cliente_id),
    foreign key(imovel_id) references imovel(imovel_id)
);