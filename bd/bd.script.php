<?php

$tipo_produto = '''
CREATE TABLE tipo_produto(
	id SERIAL,
    descricao VARCHAR(25) NOT NULL,
    percentual_imposto INTEGER NOT NULL,
    CONSTRAINT pk_tipo_produto PRIMARY KEY (id)
)
''';

$produto = '''
CREATE TABLE produto(
	id SERIAL,
    descricao VARCHAR(50) NOT NULL,
    preco NUMERIC NOT NULL,
    tipo_produto INTEGER NOT NULL,
    CONSTRAINT fk_produto_tipo_produto FOREIGN KEY (tipo_produto) REFERENCES tipo_produto(id),
    CONSTRAINT pk_produto PRIMARY KEY (id)
)
''';
