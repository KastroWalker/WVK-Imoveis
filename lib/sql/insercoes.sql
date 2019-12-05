use Imoveis;

insert into vendedor (nome, contato, email, user, senha)
values ('Kauan', '8699988775566', 'admin@gmail.com', 'admin', md5('admin'));

insert into cliente (nome, contato, cpf, email, user, senha) 
values ('Victor', '86996857412', '27204138368', 'cliente@gmail.com', 'cliente', md5('cliente'));

insert into imovel (endereco, numero, bairro, cep, complemento, valor_imovel, status)
values ('Rua James Clark', '565', 'Nossa Senhora de Fátima', '64202200', 'Em frente a rua arco iris', 10000, true);

insert into aluguel (data_inicial, data_final, valor_aluguel, vendedor_id, cliente_id, imovel_id)
values ('2019-10-10', '2019-12-10', 200, 1, 1, 1);