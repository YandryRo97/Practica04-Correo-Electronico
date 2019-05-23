# Practica04-Correo-Electronico
Con base al archivo Práctica 04 – Creación de una aplicación web usando PHP y Base de
Datos, se pide realizar los siguientes ajustes:

a)    Agregar  roles  a  la  tabla  usuario. Un usuario puede tener un  rol  de “admin”  o
“user”
b)    Los  usuarios  con  rol  de  “admin”  pueden  únicamente:  modificar,  eliminar  y cambiar la contraseña de cualquier usuario de la base de datos.
c)    Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña
de su usuario.

Luego, con base a estos ajustes realizados, se pide desarrollar una aplicación web usando PHP y Base de Datos que permita gestionar (enviar y recibir) mensajes electrónicos entre usuarios de la aplicación. De los mensajes electrónicos se desea conocer la fecha y hora, remitente, destinatario, asunto y mensaje. Para lo cuál, se pide como mínimo los siguientes requerimientos:
 



INSTRUCCIONES
 
Usuario con  rol de user:

d)    Visualizar  en su pagina  principal  (index.php)  el listado de todos  los  mensajes electrónicos recibidos, ordenados por los más recientes.
e)	Visualizar el listado de todos los mensajes electrónicos enviados, ordenados por los más recientes.
f)     Enviar mensajes electrónicos a otros usuarios de la aplicación web.
g)    Buscar todos los mensajes electrónicos recibidos. La búsqueda se realizará por el correo del usuario remitente y se deberá aplicar Ajax para la búsqueda.
h)    Buscar todos los mensajes electrónicos enviados. La búsqueda se realizará por el correo del usuario destinatario y se deberá aplicar Ajax para la búsqueda.
i)     Modificar los datos del usuario.
j)     Cambiar la contraseña del usuario.
k)    Agregar un avatar (fotografía) a la cuenta del usuario. Usuario con rol de admin:
l)     No puede recibir ni enviar mensajes electrónicos.
m)   Visualizar  en su pagina  principal  (index.php)  el listado de todos  los  mensajes electrónicos, ordenados por los más recientes.
n)    Eliminar los mensajes electrónicos de los usuarios con rol “user”.
o)    Eliminar, modificar y cambiar contraseña de los usuarios con rol “user”. 

1.- DIAGRAMA E-R
![image](https://user-images.githubusercontent.com/34008925/58238375-bfa74200-7d0c-11e9-9d69-92402cd13a96.png)
