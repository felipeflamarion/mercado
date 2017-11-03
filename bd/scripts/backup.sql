--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.14
-- Dumped by pg_dump version 10.0

-- Started on 2017-11-03 17:14:18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2041 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 179 (class 1259 OID 16955)
-- Name: item; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE item (
    venda integer NOT NULL,
    produto integer NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE item OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16930)
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produto (
    id integer NOT NULL,
    descricao character varying(50) NOT NULL,
    preco numeric NOT NULL,
    tipo_produto integer NOT NULL
);


ALTER TABLE produto OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 16928)
-- Name: produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produto_id_seq OWNER TO postgres;

--
-- TOC entry 2042 (class 0 OID 0)
-- Dependencies: 175
-- Name: produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produto_id_seq OWNED BY produto.id;


--
-- TOC entry 174 (class 1259 OID 16917)
-- Name: tipo_produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tipo_produto (
    id integer NOT NULL,
    descricao character varying(25) NOT NULL,
    percentual_imposto numeric NOT NULL
);


ALTER TABLE tipo_produto OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 16915)
-- Name: tipo_produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_produto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_produto_id_seq OWNER TO postgres;

--
-- TOC entry 2043 (class 0 OID 0)
-- Dependencies: 173
-- Name: tipo_produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_produto_id_seq OWNED BY tipo_produto.id;


--
-- TOC entry 178 (class 1259 OID 16948)
-- Name: venda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE venda (
    id integer NOT NULL,
    dt_abertura timestamp without time zone DEFAULT now(),
    dt_conclusao timestamp without time zone
);


ALTER TABLE venda OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 16946)
-- Name: venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE venda_id_seq OWNER TO postgres;

--
-- TOC entry 2044 (class 0 OID 0)
-- Dependencies: 177
-- Name: venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE venda_id_seq OWNED BY venda.id;


--
-- TOC entry 1900 (class 2604 OID 16933)
-- Name: produto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto ALTER COLUMN id SET DEFAULT nextval('produto_id_seq'::regclass);


--
-- TOC entry 1899 (class 2604 OID 16920)
-- Name: tipo_produto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_produto ALTER COLUMN id SET DEFAULT nextval('tipo_produto_id_seq'::regclass);


--
-- TOC entry 1901 (class 2604 OID 16951)
-- Name: venda id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venda ALTER COLUMN id SET DEFAULT nextval('venda_id_seq'::regclass);


--
-- TOC entry 2033 (class 0 OID 16955)
-- Dependencies: 179
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY item (venda, produto, quantidade) FROM stdin;
\.


--
-- TOC entry 2030 (class 0 OID 16930)
-- Dependencies: 176
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY produto (id, descricao, preco, tipo_produto) FROM stdin;
\.


--
-- TOC entry 2028 (class 0 OID 16917)
-- Dependencies: 174
-- Data for Name: tipo_produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_produto (id, descricao, percentual_imposto) FROM stdin;
\.


--
-- TOC entry 2032 (class 0 OID 16948)
-- Dependencies: 178
-- Data for Name: venda; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY venda (id, dt_abertura, dt_conclusao) FROM stdin;
\.


--
-- TOC entry 2045 (class 0 OID 0)
-- Dependencies: 175
-- Name: produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produto_id_seq', 1, false);


--
-- TOC entry 2046 (class 0 OID 0)
-- Dependencies: 173
-- Name: tipo_produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_produto_id_seq', 1, false);


--
-- TOC entry 2047 (class 0 OID 0)
-- Dependencies: 177
-- Name: venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('venda_id_seq', 1, false);


--
-- TOC entry 1914 (class 2606 OID 16959)
-- Name: item pk_item; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item
    ADD CONSTRAINT pk_item PRIMARY KEY (venda, produto);


--
-- TOC entry 1908 (class 2606 OID 16938)
-- Name: produto pk_produto; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT pk_produto PRIMARY KEY (id);


--
-- TOC entry 1904 (class 2606 OID 16925)
-- Name: tipo_produto pk_tipo_produto; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_produto
    ADD CONSTRAINT pk_tipo_produto PRIMARY KEY (id);


--
-- TOC entry 1912 (class 2606 OID 16954)
-- Name: venda pk_venda; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY venda
    ADD CONSTRAINT pk_venda PRIMARY KEY (id);


--
-- TOC entry 1910 (class 2606 OID 16940)
-- Name: produto produto_descricao_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT produto_descricao_key UNIQUE (descricao);


--
-- TOC entry 1906 (class 2606 OID 16927)
-- Name: tipo_produto tipo_produto_descricao_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_produto
    ADD CONSTRAINT tipo_produto_descricao_key UNIQUE (descricao);


--
-- TOC entry 1917 (class 2606 OID 16965)
-- Name: item fk_item_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item
    ADD CONSTRAINT fk_item_produto FOREIGN KEY (produto) REFERENCES produto(id);


--
-- TOC entry 1916 (class 2606 OID 16960)
-- Name: item fk_item_venda; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY item
    ADD CONSTRAINT fk_item_venda FOREIGN KEY (venda) REFERENCES venda(id);


--
-- TOC entry 1915 (class 2606 OID 16941)
-- Name: produto fk_produto_tipo_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT fk_produto_tipo_produto FOREIGN KEY (tipo_produto) REFERENCES tipo_produto(id);


--
-- TOC entry 2040 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-11-03 17:14:18

--
-- PostgreSQL database dump complete
--

