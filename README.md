Participantes:
-Maria Jose Giannaccini
-Juan Pablo Chiclana Urraco
![DIAGRAMA](diagrama_base_datos.png)
Descripcion:
Elegimos realizar una pagina de pedidos en un local de comidas rapidas. Va a constar inicialmente de dos tablas: una llamada product, la cual contiene un id de tipo primary, auto incremental; un name, de tipo varchar; un price y una description del producto.
Y una segunda tabla llamada orders, que se relaciona con la tabla producto a traves de su clave foranea id_product. Tambien cuenta con su id de tipo primary auto incremental; una cant_products; un total, que va a definir el total a pagar y una date, de tipo date. 
