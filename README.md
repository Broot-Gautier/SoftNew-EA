# Modificaciones al easyappointments.

# Vista del calendario por default.

**Objetivo**: Acortar la vista del calendario, suponemos que un evento de este tipo se realiza durante el dia y en horarios apropiados, ejemplo, pensamos en comenzar por default a las 7 A.M y terminar a las 6:30 PM.

**Soluciòn transitoria pero bien**
La forma de solucionar el problema de tener un horario tan largo, fue ir directamente al javascript(fullcalendar.js) encargado de rellenar estos **< tr data-time** le puse un contador por el momento, pero pienso hacerlo mas elegante de forma de poder setearlo desde los settings el tamaño del calendario pedido.
- Lo anterior fue implementado en las lineas [17044] en dnde existen contadores para setear lo dicho anteriormente.

# Eliminar la posibilidad de ver por mes

**Objetivo**: No ver por meses, ya que el evento no durarà mas de una semana; solo dejamos vista diaria(util para el usuario para ver reuniones en dia de evento) y por semana.

**Soluciòn transitoria**
La forma de solucionar el problema, es ir a fullcalendar.js y ponerle una restriccion simplemente sobre el boton, el boton no se mostrarà si tiene la etiqueta 'month'->mes. 
- Lo anterior implementado en la linea 9380.

# Eliminar default horarios de cada usuario

Al añadir un nuevo usuario, este tiene por default algunos periodos definidos cuando se instala EA, para modificar esto vamos a **assets/sql/data.sql** y simplemente modificamos los JSON que hay. **Esto lo hize pero no reinicie la BD por lo que falta probar y quizas tiene algun error**

# Regenerar password

**Objetivo**: Enviar un mail decente al usuario al querer reestablecer su contraseña debido al extravio de la misma.

**Solucion**: Estamos usando la API de sendgrid <a href="www.sendgrid.com"></a>, mediante esta enviamos un mail con el token o nueva contraseña. Las modificaciones estan en el controlador de usuario, en la funcion ajax_forgot_password. se seteò el mail correspondiente.

# Invitar masivamente a usuarios desde lista de correos.

**Objetivo**: invitar a muchos usuarios mediante una lista de correos.

**Solucion**: pensamos en usar el mismo sendgrid pero con baterias. existe un repo <a href="https://github.com/gstjohn/codeigniter-sendgrid-newsletter"></a> que entrega un par de librerias que dan mas funciones y usabilidad para el usuario. **ESTO NO**
**Solucion2**: automatizar el proceso mediante un controlador, al cual le pasamos como parametro todos los mails qe deben ser invitados.

**mientras:** le llegan a los usuarios token de acceso, esto es mediante una invitaciòn. La idea principal es generar un auto-registro de usuarios invitados, asi no dejarle la pega al admin.
Que tenemos hecho:
- [X] Enviar mail con token
- [ ] Generar link de registro para usuarios invitados. estos deben poderse inscribir a la pagina mediante este link. ahi debiera aparecerle todo lo que tiene q ver con inscribir a un usuario.
- [ ] Hacer vista para ingresar una lista de correos.