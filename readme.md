## Rutas API Cliente

A continuación te listo las rutas de la api con su correspondiente:

- Listado de Clientes:
	
	URL: http://localhost/api/public/api/cliente </br>
	Metodo: GET

- Ver datos del Cliente:

	URL: http://localhost/api/public/api/cliente/{idcliente} </br>
	Metodo: GET

- Alta de Cliente:

	URL: http://localhost/api/public/api/cliente </br>
	Metodo: POST </br>
	Parametros: </br>
		{
			"cli_apellido": "Rivera",
			"cli_nombre": "Joaquin",
			"cli_dni": "34992826",
			"cli_email": "joa@info.com"
		}

- Modificar Cliente:

	URL: http://localhost/api/public/api/cliente/{idcliente} </br>
	Metodo: PUT </br>
	Parametros: </br>
		{
			"cli_apellido": "Rivera",
			"cli_nombre": "Joaquin",
			"cli_dni": "34992826",
			"cli_email": "joa@info.com"
		}

- Eliminar Cliente:
	URL: http://localhost/api/public/api/cliente/{idcliente} </br>
	Metodo: DELETE


