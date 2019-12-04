-- Vendedor, Cliente, Imovel de Aluguel --

select vendedor.vendedor_id, vendedor.nome, cliente.cliente_id, cliente.nome, cliente.cpf,
imovel.imovel_id, imovel.endereco, imovel.numero, imovel.bairro, imovel.cep
from aluguel inner join vendedor on (aluguel.vendedor_id = vendedor.vendedor_id) inner join cliente on (cliente.cliente_id = aluguel.cliente_id) inner join imovel on (aluguel.imovel_id = imovel.imovel_id) and imovel.imovel_id = 1;