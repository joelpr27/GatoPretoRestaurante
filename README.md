# Ressenyes del restaurant

Para las reseñas las cargo por js al entrar en la página de reseñas y las añado utilizando la una api donde le envío la id del pedido, la valoración y la reseña. Una vez con esto las añado por php haciendo un update del pedido

El filtro de reseñas lo he echo totalmente con js pudiendo ordenar por nombre o por valoración o los dos.


# Programa de fidelitat

Los puntos los calculo desde JS donde los muestro directamente por html en un input el cula despues se envia por POST a php y desde aquí se crea ya el pedido con los puntos directamente, he tendió el problema que primero quería hacer un update de el último pedido para añadir los puntos, pero en el plesk se ejecutsba primero el update que el insert de el pedido y modificaba el penúltimo pedido en vez de el que estaba creando

# Propines

Las propinas las calculo directamente en js cojiendo el valor de el precio total del pedido en html, una vez con la propina calculo el unos cuantos porcentajes que me han parecido los que más se pueden usar.

# Filtre de Productes

El filtro de producto lo he hecho totalmente con js cojiendo la id de cada sección de productos de una categoría y el título de esta y aplicandoles una clase para hacer que desaparecieran
