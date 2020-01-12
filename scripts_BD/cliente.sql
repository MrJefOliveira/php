CREATE TABLE public.cliente (
  id_cliente SERIAL NOT NULL,
  nome_cliente CHAR(100) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email CHAR(100),
  CONSTRAINT cliente_pkey PRIMARY KEY(id_cliente) 
) ;


ALTER TABLE public.cliente
  OWNER TO postgres;

