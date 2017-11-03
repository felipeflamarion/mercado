INSERT INTO tipo_produto (id, descricao, percentual_imposto) VALUES
    (1, 'Higiene', 13),
    (2, 'Bebida', 25),
    (3, 'Bebida Alcoolica', 45),
    (4, 'Cereal', 15),
    (5, 'Massa', 25),
    (6, 'Frio', 30),
    (7, 'Lácteo', 32),
    (8, 'Carne', 40),
    (9, 'Embutido', 28),
    (10, 'Hortifruti', 17);
ALTER SEQUENCE tipo_produto_id_seq OWNED BY tipo_produto.id RESTART WITH 11;

INSERT INTO produto(id, descricao, preco, tipo_produto) VALUES
	(1, 'Arroz Dona Francisca 5 KG', 9.80, 4),
    (2, 'Feijao Quiriri 1 KG', 4.25, 4),
    (3, 'Papel Toalha K-Limpeza', 3.25, 1),
    (4, 'Maracuja Joinville 1L', 14.85, 3),
    (5, 'Cerveja Lokal 350 ML', 1.30, 3),
    (6, 'Laranjinha Agua da Serra', 2.25, 2),
    (7, 'Macarrao Itinga', 3.10, 5),
    (8, 'Queijo Prato Guanabara', 2.75, 6),
    (9, 'Queijo Cheddar Guanabara', 4.10, 6),
    (10, 'Leite Vila Nova', 1.79, 7),
    (11, 'File de Peixe Espinheiros 1KG', 16.25, 8),
    (12, 'Sobrecoxa de Frango Floresta 1KG', 12.90, 8),
    (13, 'Salsicha Boehmerwald 5KG', 32.90, 9),
    (14, 'Melancia', 5.85, 10),
    (15, 'Abacaxi', 3.90, 10);
ALTER SEQUENCE produto_id_seq OWNED BY produto.id RESTART WITH 16;
