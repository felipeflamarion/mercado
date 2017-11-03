CREATE TABLE IF NOT EXISTS tipo_produto(
	id SERIAL,
    descricao VARCHAR(25) UNIQUE NOT NULL,
    percentual_imposto NUMERIC NOT NULL,
    CONSTRAINT pk_tipo_produto PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS produto(
	id SERIAL,
    descricao VARCHAR(50) UNIQUE NOT NULL,
    preco NUMERIC NOT NULL,
    tipo_produto INTEGER NOT NULL,
    CONSTRAINT fk_produto_tipo_produto FOREIGN KEY (tipo_produto) REFERENCES tipo_produto(id),
    CONSTRAINT pk_produto PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS venda(
	id SERIAL,
    dt_abertura TIMESTAMP DEFAULT NOW(),
    dt_conclusao TIMESTAMP,
    CONSTRAINT pk_venda PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS item(
	venda INTEGER NOT NULL,
    produto INTEGER NOT NULL,
    quantidade INTEGER NOT NULL,
    CONSTRAINT fk_item_venda FOREIGN KEY (venda) REFERENCES venda(id),
    CONSTRAINT fk_item_produto FOREIGN KEY (produto) REFERENCES produto(id),
    CONSTRAINT pk_item PRIMARY KEY (venda, produto)
);
