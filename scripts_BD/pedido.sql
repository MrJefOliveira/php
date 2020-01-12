CREATE TABLE public.pedido (
  id_pedido SERIAL NOT NULL,
  id_cliente BIGINT NOT NULL,
  id_produto BIGINT NOT NULL,
  dt_pedido DATE NOT NULL,
  qtd INTEGER NOT NULL,
  id_status BIGINT NOT NULL,
  CONSTRAINT pedido_pkey PRIMARY KEY(id_pedido),
  FOREIGN KEY (id_cliente) REFERENCES public.cliente(id_cliente) ON DELETE CASCADE,
  FOREIGN KEY (id_produto) REFERENCES public.produto(id_produto) ON DELETE CASCADE,
  FOREIGN KEY (id_status) REFERENCES public.status(id_status)
) ;


ALTER TABLE public.pedido
  OWNER TO postgres;

