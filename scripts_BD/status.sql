CREATE TABLE public.status (
  id_status SERIAL,
  descricao CHAR(50),
  CONSTRAINT status_pkey PRIMARY KEY(id_status)
) ;


ALTER TABLE public.status
  OWNER TO postgres;
  
  INSERT INTO public.status (descricao) values ('Aberto');
  INSERT INTO public.status (descricao) values ('Pago');
  INSERT INTO public.status (descricao) values ('Cancelado');
