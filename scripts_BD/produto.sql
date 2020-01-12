CREATE TABLE public.produto (
  id_produto SERIAL NOT NULL,
  nome_produto CHAR(100) NOT NULL,
  vlr_unitario MONEY NOT NULL,
  cod_barras CHAR(20) NOT NULL,
  CONSTRAINT produto_pkey PRIMARY KEY(id_produto)
) ;


ALTER TABLE public.produto
  OWNER TO postgres;

