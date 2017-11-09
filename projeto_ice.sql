--
-- PostgreSQL database dump
--
-- Alterado pelo maurilio em 09/11/2017
-- Dumped from database version 9.4.5
-- Dumped by pg_dump version 9.4.0
-- Started on 2016-01-06 16:56:39

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;


--
-- TOC entry 203 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2224 (class 0 OID 0)
-- Dependencies: 203
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 179 (class 1259 OID 16659)
-- Name: aluno; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE aluno (
    matricula character varying NOT NULL,
    id_pessoa bigint NOT NULL,
    id_usuario bigint,
    data_inclusao timestamp without time zone DEFAULT now(),
    usuario_inclusao character varying(20) NOT NULL,
    data_alteracao timestamp without time zone,
    usuario_alteracao character varying(20)
);


ALTER TABLE aluno OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16776)
-- Name: avaliacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE avaliacao (
    matricula character varying NOT NULL,
    id_turma integer NOT NULL,
    id_curso bigint NOT NULL,
    id_periodo_letivo integer NOT NULL,
    id_disciplina bigint NOT NULL,
    id_serie bigint NOT NULL,
    id_etapa integer NOT NULL,
    id_modelo_avaliacao integer NOT NULL,
    valor_nota numeric(5,2),
    valor_falta integer
);


ALTER TABLE avaliacao OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 16671)
-- Name: curso; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE curso (
    id_curso bigint NOT NULL,
    nome character varying NOT NULL,
    nome_reduzido character varying,
    data_inicio date
);


ALTER TABLE curso OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 16669)
-- Name: curso_id_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE curso_id_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE curso_id_curso_seq OWNER TO postgres;

--
-- TOC entry 2225 (class 0 OID 0)
-- Dependencies: 180
-- Name: curso_id_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE curso_id_curso_seq OWNED BY curso.id_curso;


--
-- TOC entry 183 (class 1259 OID 16682)
-- Name: disciplina; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE disciplina (
    id_disciplina bigint NOT NULL,
    nome character varying NOT NULL,
    nome_reduzido character varying NOT NULL,
    sigla character varying,
    codigo character varying,
    credito_academico smallint NOT NULL,
    credito_financeiro smallint NOT NULL
);


ALTER TABLE disciplina OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 16680)
-- Name: disciplina_id_disciplina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disciplina_id_disciplina_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE disciplina_id_disciplina_seq OWNER TO postgres;

--
-- TOC entry 2226 (class 0 OID 0)
-- Dependencies: 182
-- Name: disciplina_id_disciplina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE disciplina_id_disciplina_seq OWNED BY disciplina.id_disciplina;


--
-- TOC entry 200 (class 1259 OID 16786)
-- Name: etapa_avaliacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE etapa_avaliacao (
    id_modelo_avaliacao integer NOT NULL,
    id_etapa integer NOT NULL,
    tipo_etapa character(1) NOT NULL,
    descricao character varying(20) NOT NULL
);


ALTER TABLE etapa_avaliacao OWNER TO postgres;

--
-- TOC entry 2227 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN etapa_avaliacao.tipo_etapa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN etapa_avaliacao.tipo_etapa IS 'N - Nota
F - Falta';


--
-- TOC entry 199 (class 1259 OID 16784)
-- Name: etapa_avaliacao_id_etapa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE etapa_avaliacao_id_etapa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE etapa_avaliacao_id_etapa_seq OWNER TO postgres;

--
-- TOC entry 2228 (class 0 OID 0)
-- Dependencies: 199
-- Name: etapa_avaliacao_id_etapa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE etapa_avaliacao_id_etapa_seq OWNED BY etapa_avaliacao.id_etapa;


--
-- TOC entry 190 (class 1259 OID 16722)
-- Name: funcionario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE funcionario (
    id_funcionario bigint NOT NULL,
    id_pessoa bigint NOT NULL,
    data_inclusao timestamp without time zone DEFAULT now(),
    usuario_inclusao character varying(20) NOT NULL,
    data_alteracao timestamp without time zone,
    usuario_alteracao character varying(20),
    professor boolean DEFAULT true NOT NULL
);


ALTER TABLE funcionario OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16720)
-- Name: funcionario_id_funcionario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE funcionario_id_funcionario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE funcionario_id_funcionario_seq OWNER TO postgres;

--
-- TOC entry 2229 (class 0 OID 0)
-- Dependencies: 189
-- Name: funcionario_id_funcionario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE funcionario_id_funcionario_seq OWNED BY funcionario.id_funcionario;


--
-- TOC entry 194 (class 1259 OID 16751)
-- Name: matricula_turma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE matricula_turma (
    matricula character varying NOT NULL,
    id_turma integer NOT NULL,
    id_curso bigint NOT NULL,
    id_periodo_letivo integer NOT NULL,
    id_disciplina bigint NOT NULL,
    id_serie bigint NOT NULL,
    nota numeric(4,2),
    faltas smallint,
    id_situacao bigint
);


ALTER TABLE matricula_turma OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16636)
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE migration OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16612)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16767)
-- Name: modelo_avaliacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE modelo_avaliacao (
    id_modelo_avaliacao integer NOT NULL,
    descricao character varying(50) NOT NULL,
    formula character varying
);


ALTER TABLE modelo_avaliacao OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16765)
-- Name: modelo_avaliacao_id_modelo_avaliacao_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE modelo_avaliacao_id_modelo_avaliacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE modelo_avaliacao_id_modelo_avaliacao_seq OWNER TO postgres;

--
-- TOC entry 2230 (class 0 OID 0)
-- Dependencies: 196
-- Name: modelo_avaliacao_id_modelo_avaliacao_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE modelo_avaliacao_id_modelo_avaliacao_seq OWNED BY modelo_avaliacao.id_modelo_avaliacao;


--
-- TOC entry 175 (class 1259 OID 16628)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE password_resets OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16693)
-- Name: periodo_letivo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE periodo_letivo (
    id_periodo_letivo integer NOT NULL,
    descricao character varying NOT NULL,
    data_inicio date NOT NULL,
    data_fim date
);


ALTER TABLE periodo_letivo OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16691)
-- Name: periodo_letivo_id_periodo_letivo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE periodo_letivo_id_periodo_letivo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE periodo_letivo_id_periodo_letivo_seq OWNER TO postgres;

--
-- TOC entry 2231 (class 0 OID 0)
-- Dependencies: 184
-- Name: periodo_letivo_id_periodo_letivo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE periodo_letivo_id_periodo_letivo_seq OWNED BY periodo_letivo.id_periodo_letivo;


--
-- TOC entry 192 (class 1259 OID 16732)
-- Name: pessoa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pessoa (
    id_pessoa bigint NOT NULL,
    tipo_pessoa character(1) NOT NULL,
    cpf_cnpj character varying(18) NOT NULL,
    nome character varying(150) NOT NULL,
    nome_fantasia character varying(150),
    logradouro character varying(50) NOT NULL,
    numero character varying(20) NOT NULL,
    complemento character varying(50),
    bairro character varying(50) NOT NULL,
    id_cidade integer NOT NULL,
    id_estado integer NOT NULL,
    id_pais integer,
    cep character varying(9) NOT NULL,
    numero_identidade character varying(20),
    orgao_identidade character varying(20),
    emissao_identidade date,
    data_inclusao timestamp without time zone DEFAULT now(),
    usuario_inclusao character varying(20) NOT NULL,
    data_alteracao timestamp without time zone,
    usuario_alteracao character varying(20),
    id_pessoa_pai bigint,
    id_pessoa_mae bigint,
    id_pessoa_responsavel bigint,
    id_prefixo_endereco integer,
    data_nascimento date
);


ALTER TABLE pessoa OWNER TO postgres;

--
-- TOC entry 2232 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN pessoa.tipo_pessoa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN pessoa.tipo_pessoa IS 'F - física
J - Jurídica';


--
-- TOC entry 191 (class 1259 OID 16730)
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pessoa_id_pessoa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pessoa_id_pessoa_seq OWNER TO postgres;

--
-- TOC entry 2233 (class 0 OID 0)
-- Dependencies: 191
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pessoa_id_pessoa_seq OWNED BY pessoa.id_pessoa;


--
-- TOC entry 202 (class 1259 OID 16794)
-- Name: prefixo_endereco; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE prefixo_endereco (
    id_prefixo_endereco integer NOT NULL,
    descricao character varying(30) NOT NULL
);


ALTER TABLE prefixo_endereco OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16792)
-- Name: prefixo_endereco_id_prefixo_endereco_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE prefixo_endereco_id_prefixo_endereco_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prefixo_endereco_id_prefixo_endereco_seq OWNER TO postgres;

--
-- TOC entry 2234 (class 0 OID 0)
-- Dependencies: 201
-- Name: prefixo_endereco_id_prefixo_endereco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE prefixo_endereco_id_prefixo_endereco_seq OWNED BY prefixo_endereco.id_prefixo_endereco;


--
-- TOC entry 193 (class 1259 OID 16746)
-- Name: professor_turma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE professor_turma (
    id_funcionario bigint NOT NULL,
    id_turma integer NOT NULL,
    id_curso bigint NOT NULL,
    id_periodo_letivo integer NOT NULL,
    id_disciplina bigint NOT NULL,
    id_serie bigint NOT NULL
);


ALTER TABLE professor_turma OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16702)
-- Name: serie; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE serie (
    id_serie bigint NOT NULL,
    nome bigint
);


ALTER TABLE serie OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 16760)
-- Name: situacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE situacao (
    id_situacao bigint NOT NULL,
    descricao bigint NOT NULL,
    matricula_turma boolean NOT NULL,
    considera_matriculado boolean,
    gera_cobranca boolean,
    acessa_portal boolean,
    permite_trancamento boolean
);


ALTER TABLE situacao OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16709)
-- Name: turma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE turma (
    id_turma integer NOT NULL,
    id_curso bigint NOT NULL,
    id_periodo_letivo integer NOT NULL,
    id_disciplina bigint NOT NULL,
    id_serie bigint NOT NULL,
    nome character varying NOT NULL,
    data_inicio date NOT NULL,
    data_fim date,
    data_inclusao timestamp without time zone DEFAULT now(),
    usuario_inclusao character varying(20) NOT NULL,
    data_alteracao timestamp without time zone,
    usuario_alteracao character varying(20),
    id_modelo_avaliacao integer
);


ALTER TABLE turma OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 16707)
-- Name: turma_id_turma_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE turma_id_turma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE turma_id_turma_seq OWNER TO postgres;

--
-- TOC entry 2235 (class 0 OID 0)
-- Dependencies: 187
-- Name: turma_id_turma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE turma_id_turma_seq OWNED BY turma.id_turma;


--
-- TOC entry 178 (class 1259 OID 16643)
-- Name: user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE "user" OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 16641)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO postgres;

--
-- TOC entry 2236 (class 0 OID 0)
-- Dependencies: 177
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- TOC entry 174 (class 1259 OID 16617)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(60) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone NOT NULL,
    updated_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 16615)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- TOC entry 2237 (class 0 OID 0)
-- Dependencies: 173
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1993 (class 2604 OID 16674)
-- Name: id_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY curso ALTER COLUMN id_curso SET DEFAULT nextval('curso_id_curso_seq'::regclass);


--
-- TOC entry 1994 (class 2604 OID 16685)
-- Name: id_disciplina; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disciplina ALTER COLUMN id_disciplina SET DEFAULT nextval('disciplina_id_disciplina_seq'::regclass);


--
-- TOC entry 2004 (class 2604 OID 16789)
-- Name: id_etapa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY etapa_avaliacao ALTER COLUMN id_etapa SET DEFAULT nextval('etapa_avaliacao_id_etapa_seq'::regclass);


--
-- TOC entry 1998 (class 2604 OID 16725)
-- Name: id_funcionario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY funcionario ALTER COLUMN id_funcionario SET DEFAULT nextval('funcionario_id_funcionario_seq'::regclass);


--
-- TOC entry 2003 (class 2604 OID 16770)
-- Name: id_modelo_avaliacao; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY modelo_avaliacao ALTER COLUMN id_modelo_avaliacao SET DEFAULT nextval('modelo_avaliacao_id_modelo_avaliacao_seq'::regclass);


--
-- TOC entry 1995 (class 2604 OID 16696)
-- Name: id_periodo_letivo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY periodo_letivo ALTER COLUMN id_periodo_letivo SET DEFAULT nextval('periodo_letivo_id_periodo_letivo_seq'::regclass);


--
-- TOC entry 2001 (class 2604 OID 16735)
-- Name: id_pessoa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoa ALTER COLUMN id_pessoa SET DEFAULT nextval('pessoa_id_pessoa_seq'::regclass);


--
-- TOC entry 2005 (class 2604 OID 16797)
-- Name: id_prefixo_endereco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY prefixo_endereco ALTER COLUMN id_prefixo_endereco SET DEFAULT nextval('prefixo_endereco_id_prefixo_endereco_seq'::regclass);


--
-- TOC entry 1996 (class 2604 OID 16712)
-- Name: id_turma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma ALTER COLUMN id_turma SET DEFAULT nextval('turma_id_turma_seq'::regclass);


--
-- TOC entry 1990 (class 2604 OID 16646)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- TOC entry 1989 (class 2604 OID 16620)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2193 (class 0 OID 16659)
-- Dependencies: 179
-- Data for Name: aluno; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aluno (matricula, id_pessoa, id_usuario, data_inclusao, usuario_inclusao, data_alteracao, usuario_alteracao) FROM stdin;
\.


--
-- TOC entry 2212 (class 0 OID 16776)
-- Dependencies: 198
-- Data for Name: avaliacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY avaliacao (matricula, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie, id_etapa, id_modelo_avaliacao, valor_nota, valor_falta) FROM stdin;
\.


--
-- TOC entry 2195 (class 0 OID 16671)
-- Dependencies: 181
-- Data for Name: curso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY curso (id_curso, nome, nome_reduzido, data_inicio) FROM stdin;
2	Educação para Jovens e Adultos	EJA	2010-03-01
1	Ensino Fundamental	Ensino Fundamental	2015-12-01
\.


--
-- TOC entry 2238 (class 0 OID 0)
-- Dependencies: 180
-- Name: curso_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('curso_id_curso_seq', 2, true);


--
-- TOC entry 2197 (class 0 OID 16682)
-- Dependencies: 183
-- Data for Name: disciplina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY disciplina (id_disciplina, nome, nome_reduzido, sigla, codigo, credito_academico, credito_financeiro) FROM stdin;
\.


--
-- TOC entry 2239 (class 0 OID 0)
-- Dependencies: 182
-- Name: disciplina_id_disciplina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disciplina_id_disciplina_seq', 1, false);


--
-- TOC entry 2214 (class 0 OID 16786)
-- Dependencies: 200
-- Data for Name: etapa_avaliacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY etapa_avaliacao (id_modelo_avaliacao, id_etapa, tipo_etapa, descricao) FROM stdin;
\.


--
-- TOC entry 2240 (class 0 OID 0)
-- Dependencies: 199
-- Name: etapa_avaliacao_id_etapa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('etapa_avaliacao_id_etapa_seq', 1, false);


--
-- TOC entry 2204 (class 0 OID 16722)
-- Dependencies: 190
-- Data for Name: funcionario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY funcionario (id_funcionario, id_pessoa, data_inclusao, usuario_inclusao, data_alteracao, usuario_alteracao, professor) FROM stdin;
\.


--
-- TOC entry 2241 (class 0 OID 0)
-- Dependencies: 189
-- Name: funcionario_id_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('funcionario_id_funcionario_seq', 1, false);


--
-- TOC entry 2208 (class 0 OID 16751)
-- Dependencies: 194
-- Data for Name: matricula_turma; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY matricula_turma (matricula, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie, nota, faltas, id_situacao) FROM stdin;
\.


--
-- TOC entry 2190 (class 0 OID 16636)
-- Dependencies: 176
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migration (version, apply_time) FROM stdin;
m000000_000000_base	1452082807
m130524_201442_init	1452082812
\.


--
-- TOC entry 2186 (class 0 OID 16612)
-- Dependencies: 172
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migrations (migration, batch) FROM stdin;
2014_10_12_000000_create_users_table	1
2014_10_12_100000_create_password_resets_table	1
\.


--
-- TOC entry 2211 (class 0 OID 16767)
-- Dependencies: 197
-- Data for Name: modelo_avaliacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY modelo_avaliacao (id_modelo_avaliacao, descricao, formula) FROM stdin;
\.


--
-- TOC entry 2242 (class 0 OID 0)
-- Dependencies: 196
-- Name: modelo_avaliacao_id_modelo_avaliacao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('modelo_avaliacao_id_modelo_avaliacao_seq', 1, false);


--
-- TOC entry 2189 (class 0 OID 16628)
-- Dependencies: 175
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2199 (class 0 OID 16693)
-- Dependencies: 185
-- Data for Name: periodo_letivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY periodo_letivo (id_periodo_letivo, descricao, data_inicio, data_fim) FROM stdin;
\.


--
-- TOC entry 2243 (class 0 OID 0)
-- Dependencies: 184
-- Name: periodo_letivo_id_periodo_letivo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('periodo_letivo_id_periodo_letivo_seq', 1, false);


--
-- TOC entry 2206 (class 0 OID 16732)
-- Dependencies: 192
-- Data for Name: pessoa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pessoa (id_pessoa, tipo_pessoa, cpf_cnpj, nome, nome_fantasia, logradouro, numero, complemento, bairro, id_cidade, id_estado, id_pais, cep, numero_identidade, orgao_identidade, emissao_identidade, data_inclusao, usuario_inclusao, data_alteracao, usuario_alteracao, id_pessoa_pai, id_pessoa_mae, id_pessoa_responsavel, id_prefixo_endereco, data_nascimento) FROM stdin;
1	F	052.554.177-26	MAURILIO DE OUTEIRO LIMA	MAURILIO DE OUTEIRO LIMA	LUCIARA	200	200	CAMPO GRANDE	1	1	1	23095040			\N	\N	maurilio	\N		\N	\N	\N	1	1981-05-08
\.


--
-- TOC entry 2244 (class 0 OID 0)
-- Dependencies: 191
-- Name: pessoa_id_pessoa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pessoa_id_pessoa_seq', 1, true);


--
-- TOC entry 2216 (class 0 OID 16794)
-- Dependencies: 202
-- Data for Name: prefixo_endereco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY prefixo_endereco (id_prefixo_endereco, descricao) FROM stdin;
1	Rua
2	Estrada
3	Entrada
4	Travessa
5	Avenida
6	Praia
7	Praça
8	Alameda
9	Outros
\.


--
-- TOC entry 2245 (class 0 OID 0)
-- Dependencies: 201
-- Name: prefixo_endereco_id_prefixo_endereco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('prefixo_endereco_id_prefixo_endereco_seq', 9, true);


--
-- TOC entry 2207 (class 0 OID 16746)
-- Dependencies: 193
-- Data for Name: professor_turma; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY professor_turma (id_funcionario, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie) FROM stdin;
\.


--
-- TOC entry 2200 (class 0 OID 16702)
-- Dependencies: 186
-- Data for Name: serie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY serie (id_serie, nome) FROM stdin;
\.


--
-- TOC entry 2209 (class 0 OID 16760)
-- Dependencies: 195
-- Data for Name: situacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY situacao (id_situacao, descricao, matricula_turma, considera_matriculado, gera_cobranca, acessa_portal, permite_trancamento) FROM stdin;
\.


--
-- TOC entry 2202 (class 0 OID 16709)
-- Dependencies: 188
-- Data for Name: turma; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY turma (id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie, nome, data_inicio, data_fim, data_inclusao, usuario_inclusao, data_alteracao, usuario_alteracao, id_modelo_avaliacao) FROM stdin;
\.


--
-- TOC entry 2246 (class 0 OID 0)
-- Dependencies: 187
-- Name: turma_id_turma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('turma_id_turma_seq', 1, false);


--
-- TOC entry 2192 (class 0 OID 16643)
-- Dependencies: 178
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at) FROM stdin;
1	maurilio	z6CMtIPEilShnMVxnOIxTsBuHtQJjWf7	$2y$13$UiQsmdbd43ZXFRYC5bzbW.sFiY4rE7MGi.EBM/C4bgLfo2pWbeIPy	\N	maurilio.lima@gmail.com	10	1452082867	1452082867
\.


--
-- TOC entry 2247 (class 0 OID 0)
-- Dependencies: 177
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id_seq', 1, true);


--
-- TOC entry 2188 (class 0 OID 16617)
-- Dependencies: 174
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, name, email, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2248 (class 0 OID 0)
-- Dependencies: 173
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- TOC entry 2024 (class 2606 OID 16668)
-- Name: Key1; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY aluno
    ADD CONSTRAINT "Key1" PRIMARY KEY (matricula);


--
-- TOC entry 2048 (class 2606 OID 16759)
-- Name: Key10; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY matricula_turma
    ADD CONSTRAINT "Key10" PRIMARY KEY (matricula, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie);


--
-- TOC entry 2050 (class 2606 OID 16764)
-- Name: Key11; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY situacao
    ADD CONSTRAINT "Key11" PRIMARY KEY (id_situacao);


--
-- TOC entry 2052 (class 2606 OID 16775)
-- Name: Key12; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY modelo_avaliacao
    ADD CONSTRAINT "Key12" PRIMARY KEY (id_modelo_avaliacao);


--
-- TOC entry 2054 (class 2606 OID 16783)
-- Name: Key13; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY avaliacao
    ADD CONSTRAINT "Key13" PRIMARY KEY (matricula, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie, id_etapa, id_modelo_avaliacao);


--
-- TOC entry 2056 (class 2606 OID 16791)
-- Name: Key14; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY etapa_avaliacao
    ADD CONSTRAINT "Key14" PRIMARY KEY (id_etapa, id_modelo_avaliacao);


--
-- TOC entry 2058 (class 2606 OID 16799)
-- Name: Key15; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY prefixo_endereco
    ADD CONSTRAINT "Key15" PRIMARY KEY (id_prefixo_endereco);


--
-- TOC entry 2026 (class 2606 OID 16679)
-- Name: Key2; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY curso
    ADD CONSTRAINT "Key2" PRIMARY KEY (id_curso);


--
-- TOC entry 2028 (class 2606 OID 16690)
-- Name: Key3; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY disciplina
    ADD CONSTRAINT "Key3" PRIMARY KEY (id_disciplina);


--
-- TOC entry 2030 (class 2606 OID 16701)
-- Name: Key4; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodo_letivo
    ADD CONSTRAINT "Key4" PRIMARY KEY (id_periodo_letivo);


--
-- TOC entry 2032 (class 2606 OID 16706)
-- Name: Key5; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY serie
    ADD CONSTRAINT "Key5" PRIMARY KEY (id_serie);


--
-- TOC entry 2035 (class 2606 OID 16719)
-- Name: Key6; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT "Key6" PRIMARY KEY (id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie);


--
-- TOC entry 2037 (class 2606 OID 16729)
-- Name: Key7; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY funcionario
    ADD CONSTRAINT "Key7" PRIMARY KEY (id_funcionario);


--
-- TOC entry 2043 (class 2606 OID 16745)
-- Name: Key8; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT "Key8" PRIMARY KEY (id_pessoa);


--
-- TOC entry 2045 (class 2606 OID 16750)
-- Name: Key9; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY professor_turma
    ADD CONSTRAINT "Key9" PRIMARY KEY (id_funcionario, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie);


--
-- TOC entry 2013 (class 2606 OID 16640)
-- Name: migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 2015 (class 2606 OID 16658)
-- Name: user_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- TOC entry 2017 (class 2606 OID 16656)
-- Name: user_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- TOC entry 2019 (class 2606 OID 16652)
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 2021 (class 2606 OID 16654)
-- Name: user_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- TOC entry 2007 (class 2606 OID 16627)
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2009 (class 2606 OID 16625)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2022 (class 1259 OID 16666)
-- Name: IX_aluno_pessoa; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_aluno_pessoa" ON aluno USING btree (id_pessoa);


--
-- TOC entry 2046 (class 1259 OID 16757)
-- Name: IX_matricula_turma_situacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_matricula_turma_situacao" ON matricula_turma USING btree (id_situacao);


--
-- TOC entry 2033 (class 1259 OID 16717)
-- Name: IX_modelo_avaliacao; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_modelo_avaliacao" ON turma USING btree (id_modelo_avaliacao);


--
-- TOC entry 2038 (class 1259 OID 16741)
-- Name: IX_pessoa_mae; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_pessoa_mae" ON pessoa USING btree (id_pessoa_mae);


--
-- TOC entry 2039 (class 1259 OID 16740)
-- Name: IX_pessoa_pai; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_pessoa_pai" ON pessoa USING btree (id_pessoa_pai);


--
-- TOC entry 2040 (class 1259 OID 16743)
-- Name: IX_pessoa_prefixo_endereco; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_pessoa_prefixo_endereco" ON pessoa USING btree (id_prefixo_endereco);


--
-- TOC entry 2041 (class 1259 OID 16742)
-- Name: IX_pessoa_responsavel; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "IX_pessoa_responsavel" ON pessoa USING btree (id_pessoa_responsavel);


--
-- TOC entry 2010 (class 1259 OID 16634)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- TOC entry 2011 (class 1259 OID 16635)
-- Name: password_resets_token_index; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX password_resets_token_index ON password_resets USING btree (token);


--
-- TOC entry 2074 (class 2606 OID 16870)
-- Name: Relationship20; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY avaliacao
    ADD CONSTRAINT "Relationship20" FOREIGN KEY (matricula, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie) REFERENCES matricula_turma(matricula, id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie);


--
-- TOC entry 2071 (class 2606 OID 16850)
-- Name: aluno_matricula_turma; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY matricula_turma
    ADD CONSTRAINT aluno_matricula_turma FOREIGN KEY (matricula) REFERENCES aluno(matricula);


--
-- TOC entry 2059 (class 2606 OID 16800)
-- Name: aluno_pessoa; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aluno
    ADD CONSTRAINT aluno_pessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa(id_pessoa);


--
-- TOC entry 2075 (class 2606 OID 16880)
-- Name: avaliacao_etapa_avaliacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY avaliacao
    ADD CONSTRAINT avaliacao_etapa_avaliacao FOREIGN KEY (id_etapa, id_modelo_avaliacao) REFERENCES etapa_avaliacao(id_etapa, id_modelo_avaliacao);


--
-- TOC entry 2069 (class 2606 OID 16840)
-- Name: funcionario_professor_turma; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY professor_turma
    ADD CONSTRAINT funcionario_professor_turma FOREIGN KEY (id_funcionario) REFERENCES funcionario(id_funcionario);


--
-- TOC entry 2073 (class 2606 OID 16860)
-- Name: matricula_turma_situacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY matricula_turma
    ADD CONSTRAINT matricula_turma_situacao FOREIGN KEY (id_situacao) REFERENCES situacao(id_situacao);


--
-- TOC entry 2064 (class 2606 OID 16865)
-- Name: modelo_avaliacao_turma; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT modelo_avaliacao_turma FOREIGN KEY (id_modelo_avaliacao) REFERENCES modelo_avaliacao(id_modelo_avaliacao);


--
-- TOC entry 2076 (class 2606 OID 16875)
-- Name: modelo_etapa_avaliacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY etapa_avaliacao
    ADD CONSTRAINT modelo_etapa_avaliacao FOREIGN KEY (id_modelo_avaliacao) REFERENCES modelo_avaliacao(id_modelo_avaliacao);


--
-- TOC entry 2066 (class 2606 OID 16810)
-- Name: pessoa_mae; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pessoa_mae FOREIGN KEY (id_pessoa_mae) REFERENCES pessoa(id_pessoa);


--
-- TOC entry 2065 (class 2606 OID 16805)
-- Name: pessoa_pai; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pessoa_pai FOREIGN KEY (id_pessoa_pai) REFERENCES pessoa(id_pessoa);


--
-- TOC entry 2068 (class 2606 OID 16885)
-- Name: pessoa_prefixo_endereco; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pessoa_prefixo_endereco FOREIGN KEY (id_prefixo_endereco) REFERENCES prefixo_endereco(id_prefixo_endereco);


--
-- TOC entry 2067 (class 2606 OID 16815)
-- Name: pessoa_responsavel; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pessoa
    ADD CONSTRAINT pessoa_responsavel FOREIGN KEY (id_pessoa_responsavel) REFERENCES pessoa(id_pessoa);


--
-- TOC entry 2060 (class 2606 OID 16820)
-- Name: turma_curso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT turma_curso FOREIGN KEY (id_curso) REFERENCES curso(id_curso);


--
-- TOC entry 2062 (class 2606 OID 16830)
-- Name: turma_disciplina; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT turma_disciplina FOREIGN KEY (id_disciplina) REFERENCES disciplina(id_disciplina);


--
-- TOC entry 2072 (class 2606 OID 16855)
-- Name: turma_matricula_turma; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY matricula_turma
    ADD CONSTRAINT turma_matricula_turma FOREIGN KEY (id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie) REFERENCES turma(id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie);


--
-- TOC entry 2061 (class 2606 OID 16825)
-- Name: turma_periodo_letivo; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT turma_periodo_letivo FOREIGN KEY (id_periodo_letivo) REFERENCES periodo_letivo(id_periodo_letivo);


--
-- TOC entry 2070 (class 2606 OID 16845)
-- Name: turma_professor_turma; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY professor_turma
    ADD CONSTRAINT turma_professor_turma FOREIGN KEY (id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie) REFERENCES turma(id_turma, id_curso, id_periodo_letivo, id_disciplina, id_serie);


--
-- TOC entry 2063 (class 2606 OID 16835)
-- Name: turma_serie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY turma
    ADD CONSTRAINT turma_serie FOREIGN KEY (id_serie) REFERENCES serie(id_serie);


--
-- TOC entry 2223 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-01-06 16:56:41

--
-- PostgreSQL database dump complete
--

