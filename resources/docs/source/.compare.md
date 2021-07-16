---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://sportodos.com/docs/collection.json)

<!-- END_INFO -->

#Gestion de Espacios deportivos

clase que permita la gestion de los diferentes espacios deportivos lista, crea , edita y elimina
<!-- START_5ffbd56eef6f5b82480a82e95f5bf95d -->
## Formulario para crear un espacio deportivo

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/espacio/nuevo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/espacio/nuevo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/espacio/nuevo`


<!-- END_5ffbd56eef6f5b82480a82e95f5bf95d -->

<!-- START_bbe0da4171484c24e4129fa0203f442b -->
## Funcion que llama al servicio de creacion de espacio y crea el espacio deportivo en el sistema

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/espacio/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/espacio/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/espacio/crear`


<!-- END_bbe0da4171484c24e4129fa0203f442b -->

<!-- START_ab78b967f1a1b41f2cbaa4ad93c48c86 -->
## Formulario de edicion de un espacio deportivo en especifico

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/espacio/editar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":19}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/espacio/editar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 19
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/espacio/editar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del espacio deportivo en el sistema
    
<!-- END_ab78b967f1a1b41f2cbaa4ad93c48c86 -->

<!-- START_991a7998ca4c0a897f066c7a4e1592ce -->
## Funcion que llama al servicio de edicios de espacio y edita el espacio deportivo en el sistema

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/espacio/actualizar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":8}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/espacio/actualizar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 8
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/espacio/actualizar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del espacio deportivo en el sistema
    
<!-- END_991a7998ca4c0a897f066c7a4e1592ce -->

<!-- START_e48eb1d3e645d3b0bf1aaa4857b3734f -->
## Vista del detalle de un  espacio deportivo especifico

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/espacio/detalle/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":4}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/espacio/detalle/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 4
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/espacio/detalle/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del espacio deportivo en el sistema
    
<!-- END_e48eb1d3e645d3b0bf1aaa4857b3734f -->

#Gestion de Login y Logout

clase que permita la gestion de los diferentes espacios deportivos lista, crea , edita y elimina
<!-- START_08c823bfb89664197c8ce562c3c1912c -->
## Vista de ingreso al sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET administrador/login`


<!-- END_08c823bfb89664197c8ce562c3c1912c -->

<!-- START_34fbdd1e18d983b18f6705864e920d8b -->
## Funcion pra cerrar la sesion en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/logout`


<!-- END_34fbdd1e18d983b18f6705864e920d8b -->

#Gestion de Servicios

clase que permita la gestion de los diferentes servicios lista, crea , edita y elimina
<!-- START_007ed23d47113cfeb52e946bd7783989 -->
## Vista con el listado de servicios disponibles

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/servicios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/servicios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/servicios`


<!-- END_007ed23d47113cfeb52e946bd7783989 -->

<!-- START_63bc65c0e0c0ebb5f0d7554d4e7a6875 -->
## Formulario para crear un nuevo servicio

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/servicios/nuevo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/servicios/nuevo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/servicios/nuevo`


<!-- END_63bc65c0e0c0ebb5f0d7554d4e7a6875 -->

<!-- START_ff048b4fa72fc5bcead08d6e77395479 -->
## Funcion que llama el servicio de crear un servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/servicios/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/servicios/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/servicios/crear`


<!-- END_ff048b4fa72fc5bcead08d6e77395479 -->

<!-- START_79e91c3b9e24f0dbf4844bbe688ed7ec -->
## Funcion que llama a editar un servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/servicios/actualizar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":14}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/servicios/actualizar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 14
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/servicios/actualizar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del servicio en el sistema
    
<!-- END_79e91c3b9e24f0dbf4844bbe688ed7ec -->

<!-- START_5d3b13e6b472f5f9ac889efefa0d0d41 -->
## Funcion que llama el servicio de eliminar

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/servicios/eliminar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":18}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/servicios/eliminar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 18
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/servicios/eliminar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del servicio en el sistema
    
<!-- END_5d3b13e6b472f5f9ac889efefa0d0d41 -->

#Gestion de las barreras deportivas

clase que permita la gestion de las barreras deportivas  lista, crea , edita y elimina
<!-- START_c07e89a54906474318b6d03ee003580f -->
## Funcion que muestra el listado de barreras y permite ve las acciones que se le pueden hacer a cada una de ellas

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/deportebarrera" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportebarrera"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/deportebarrera`


<!-- END_c07e89a54906474318b6d03ee003580f -->

<!-- START_a1b7ad8996e6fc319126ca30968d2980 -->
## Funcion que muestra el formulario de creacion de una barrera

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/deportebarrera/nuevo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportebarrera/nuevo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/deportebarrera/nuevo`


<!-- END_a1b7ad8996e6fc319126ca30968d2980 -->

<!-- START_ab1b068c956d85daf81cab5597dc54ae -->
## Funcion que crea  la barrera deportiva enviando los datos de la barrera al servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deportebarrera/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportebarrera/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deportebarrera/crear`


<!-- END_ab1b068c956d85daf81cab5597dc54ae -->

<!-- START_fa78fcd08e83d4e4d5f8b535b9e61e86 -->
## Funcion que edita una barrera deportiva enviando los datos de la barrera al servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deportebarrera/actualizar/ea" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportebarrera/actualizar/ea"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deportebarrera/actualizar/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la barrera a editar

<!-- END_fa78fcd08e83d4e4d5f8b535b9e61e86 -->

<!-- START_28ea4da293d76d1cf7eab160ea83cc94 -->
## Funcion para eliminar una barrera esta funcion hace el llamado al servicio de eliminacion

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deportebarrera/eliminar/suscipit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportebarrera/eliminar/suscipit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deportebarrera/eliminar/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la barrera a eliminar

<!-- END_28ea4da293d76d1cf7eab160ea83cc94 -->

#Gestion de las posiciones deportivas

clase que permita la gestion posiciones deportivas  lista, crea , edita y elimina
<!-- START_58f3d000540abbd9d092110fe00de6c3 -->
## Funcion que retorna el listado de posiciones cargadas en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/deporteposicion" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deporteposicion"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/deporteposicion`


<!-- END_58f3d000540abbd9d092110fe00de6c3 -->

<!-- START_e5e8e279975e6fca5bb8ac777a1ebc26 -->
## Formulario para crear una nueva posicion deportiva

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/deporteposicion/nuevo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deporteposicion/nuevo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/deporteposicion/nuevo`


<!-- END_e5e8e279975e6fca5bb8ac777a1ebc26 -->

<!-- START_8ed728c6d37da32164f09dc7d2b75ade -->
## Funcion para crear una posicion deportiva  por medio del servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deporteposicion/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deporteposicion/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deporteposicion/crear`


<!-- END_8ed728c6d37da32164f09dc7d2b75ade -->

<!-- START_ebd7f18e2b159f3b9fed49dcca67369b -->
## Funcion para actualizar una posicion deportiva y enviarla al servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deporteposicion/actualizar/accusantium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deporteposicion/actualizar/accusantium"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deporteposicion/actualizar/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la de la posicion a editar

<!-- END_ebd7f18e2b159f3b9fed49dcca67369b -->

<!-- START_e934cbb726be6f83e8e165af3b449201 -->
## Funcion para elimianr una posicion deportiva

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deporteposicion/eliminar/saepe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deporteposicion/eliminar/saepe"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deporteposicion/eliminar/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador de la de la posicion a eliminar

<!-- END_e934cbb726be6f83e8e165af3b449201 -->

#Gestion de los deportes

clase que permita la gestion de los diferentes  deportes  lista, crea , edita y elimina
<!-- START_eb4939ce05e7454a2a7f30e6fd0bbfb6 -->
## Funcion para mostrar el listado de deportes registrados en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/deportes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/deportes`


<!-- END_eb4939ce05e7454a2a7f30e6fd0bbfb6 -->

<!-- START_7885726c4ec74ac3777b5487d1fcb382 -->
## Formulario de creacion de un deporte

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/deportes/nuevo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportes/nuevo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/deportes/nuevo`


<!-- END_7885726c4ec74ac3777b5487d1fcb382 -->

<!-- START_98f4736b29ccbcbdf633774b32d09e7a -->
## Funcion para crear un deporte y enviar la creacion a los servicios

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deportes/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportes/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deportes/crear`


<!-- END_98f4736b29ccbcbdf633774b32d09e7a -->

<!-- START_ba00c84021240804c1c8b0dc664e23ea -->
## Funcion para editar un deporte y consumir su servicio

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deportes/actualizar/suscipit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportes/actualizar/suscipit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deportes/actualizar/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del deporte a actualizar

<!-- END_ba00c84021240804c1c8b0dc664e23ea -->

<!-- START_9eb66d2b5e049bb0a88923dde421f478 -->
## Funcion para eliminar un deporte

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/deportes/eliminar/vitae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/deportes/eliminar/vitae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/deportes/eliminar/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | identificador del deporte a eliminar

<!-- END_9eb66d2b5e049bb0a88923dde421f478 -->

#Gestion de puntos de encuentro

clase que permita la gestion de los diferentes puntos de encuentro lista, crea , edita y elimina
<!-- START_2af5601f326ec8bcfdbdfb82382357a8 -->
## Vista con el listado de puntos de encuentro en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos`


<!-- END_2af5601f326ec8bcfdbdfb82382357a8 -->

<!-- START_8bbd39fddf9a3f8d44820eab9bbcddc0 -->
## Vista con el listado de puntos de encuentro en el sistema en formato de tabla

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos/listado" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/listado"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos/listado`


<!-- END_8bbd39fddf9a3f8d44820eab9bbcddc0 -->

<!-- START_82d33c03300eeb8ccbc74ea21532aae3 -->
## Vista con el listado de puntos de encuentro en el sistema en formato de cajas

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos/listadocajas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/listadocajas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos/listadocajas`


<!-- END_82d33c03300eeb8ccbc74ea21532aae3 -->

<!-- START_6010c64699552bbe6de5ef22276f1ae9 -->
## Formulario para crear un nuevo punto de encuentro

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos/nuevo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/nuevo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos/nuevo`


<!-- END_6010c64699552bbe6de5ef22276f1ae9 -->

<!-- START_4bc5234869ea72d12d266da409e7a9bf -->
## Funcion que llama al servicio de creacion de punto de encuentro

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/puntos/crear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/crear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/puntos/crear`


<!-- END_4bc5234869ea72d12d266da409e7a9bf -->

<!-- START_52159fbeeb929bd2d56ffc5712dcab64 -->
## Formulario de edicion de un pinto de encuentro en especifico

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos/editar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":15}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/editar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 15
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos/editar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del punto de encuentro en el sistema
    
<!-- END_52159fbeeb929bd2d56ffc5712dcab64 -->

<!-- START_594456a03e3cabe02a8b0a822a6624d1 -->
## Funcion para llamar al servicio de actualizacion de punto de encuentro

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/puntos/actualizar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":10}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/actualizar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 10
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/puntos/actualizar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del punto de encuentro en el sistema
    
<!-- END_594456a03e3cabe02a8b0a822a6624d1 -->

<!-- START_34ff6212b1c7e2cd003712c4784b5522 -->
## Funcion para eliminar un punto de encuentro

> Example request:

```bash
curl -X POST \
    "http://sportodos.com/administrador/puntos/eliminar/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":14}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/eliminar/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 14
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administrador/puntos/eliminar/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del punto de encuentro en el sistema
    
<!-- END_34ff6212b1c7e2cd003712c4784b5522 -->

<!-- START_18424f263ac2631b733f70d29b72c8a3 -->
## Vista con el detalle de un punto de encuentro

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos/detalle/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":15}'

```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/detalle/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 15
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos/detalle/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | identificador del punto de encuentro en el sistema
    
<!-- END_18424f263ac2631b733f70d29b72c8a3 -->

<!-- START_95b1451066ddae4140e4802f3a9fbcc1 -->
## Funcion para eliminar una imagen dentro de un punto de encuentro

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/puntos/eliminarimagen" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/puntos/eliminarimagen"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/puntos/eliminarimagen`

`POST administrador/puntos/eliminarimagen`

`PUT administrador/puntos/eliminarimagen`

`PATCH administrador/puntos/eliminarimagen`

`DELETE administrador/puntos/eliminarimagen`

`OPTIONS administrador/puntos/eliminarimagen`


<!-- END_95b1451066ddae4140e4802f3a9fbcc1 -->

#Home sistema

clase que muestra el home del sistema
<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Vista de las opciones de home en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_a292bd15dd37c29f908fab20d1bcaa2e -->
## Vista de las opciones de home en el sistema

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador`


<!-- END_a292bd15dd37c29f908fab20d1bcaa2e -->

#Listado de Ciudades y Zonas

 clase para traer el listado de ciudades y de zonas dentro de sportodos
<!-- START_643b4bc1e73bb77c5f62df9efa5375a2 -->
## Funcion que trae el listado de ciudades consumiendo los servicios

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/ciudades" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/ciudades"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/ciudades`


<!-- END_643b4bc1e73bb77c5f62df9efa5375a2 -->

<!-- START_4e71294dd1ad156c5c335d548607dee8 -->
## Funcion que trae el listado de zonas consumiendo los servicios

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/zonas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/zonas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/zonas`


<!-- END_4e71294dd1ad156c5c335d548607dee8 -->

#Vista parametrizacion

esta seccion se utiliza para mostrar la vista con los botones de parametrizacion
<!-- START_a51d8e01a7146b10b76e8e483cec9440 -->
## Vista de parametizacion

> Example request:

```bash
curl -X GET \
    -G "http://sportodos.com/administrador/parametrizacion" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportodos.com/administrador/parametrizacion"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET administrador/parametrizacion`


<!-- END_a51d8e01a7146b10b76e8e483cec9440 -->


