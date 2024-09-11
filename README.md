Participantes:
-Maria Jose Giannaccini
-Juan Pablo Chiclana Urraco
![DIAGRAMA](diagrama_base_datos.png)
Descripcion:
Elegimos realizar una pagina de pedidos en un local de comidas rapidas. Va a constar inicialmente de dos tablas: una llamada producto, la cual contiene un id de tipo primary, auto incremental; un nombre, de tipo varchar; un precio y una descripcion del producto.
Y una segunda tabla llamada pedidos, que se relaciona con la tabla producto a traves de su clave foranea id_producto. Tambien cuenta con su id de tipo primary auto incremental; una cantidad_productos; un total, que va a definir el total a pagar y una fecha, de tipo date. 
