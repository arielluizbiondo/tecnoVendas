DROP database tecnovendas;
CREATE DATABASE tecnovendas;
use tecnovendas;

create table usuario(
    idus int primary key auto_increment,
    nomeus varchar(80),
    tipo varchar(13),
    login varchar(10),
    senha varchar(10)
);

create table venda(
    idvenda int primary key auto_increment,
    nomecli varchar(60),
    cpfcli char(11) unique,
    datavenda datetime default now(),
    total float,
    idus int
);
alter table venda add constraint fk_idus_usuario 
foreign key (idus) references usuario(idus);

create table produto(
    idproduto int primary key auto_increment,
    nomepro varchar(100),
    fab varchar(45),
    preco double,
    estoque int,
    estoqueNovo int
);


create table contadorEstoque(
    idproduto int primary key auto_increment,
    nomepro varchar(100),
    fab varchar(45),
    preco double,
    estoque int
);

delimiter $

create trigger cont_estoque
after insert on produto
for each row
begin

    insert into tecnovendas.contadorEstoque values(null, new.nomepro, new.fab, new.preco, new.estoque);
end
$

delimiter ;
  
---------------

delimiter $
create trigger subtrai_estoque
after update on contadorEstoque
for each row
begin
    update produto 
    set estoqueNovo = NEW.estoque
    where idproduto = NEW.idproduto;
end
$

delimiter ;