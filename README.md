# Examen para Desarrollador Backend: Creación de una API de Tareas
Este examen práctico proporcionará una buena visión de las habilidades técnicas del desarrollador 
en el manejo de PHP con CodeIgniter, la integración con SQL Server y la creación de APIs Rest. 
Además, permite evaluar la capacidad para escribir código claro y bien documentado, así como la 
habilidad para manejar aspectos de seguridad y manejo de errores en el desarrollo de aplicaciones 
web.

Para darle seguridad se verifica la autorizacion para consumir los endpoints, se coloca en **Authorization** como **Bearer** y la clave esta en el archvio **.env**

- http://localhost:8080/Tareas

Para crear una nueva tarea selecciona el metodo **POST** con la url descrita y el body seleccionamos **form-urlencoded** e ingresamos los valores deseados.

> **titulo** -> Coloca el titulo con el que se identificara la tarea.

> **descripcion** -> Coloca una breve descripcion de lo que se realizara en la tarea.

Esto devolvera un objeto JSON con la informacion ingrsada

`
{
    "titulo": "mantenimiento 3",
    "descripcion": "mantenimiento a equipos"
}
`

- http://localhost:8080/Tareas

Para listar todas las tareas selecciona el metodo **GET** con la url descrita

Esto devolvera un objeto JSON con todas las tareas que se encuentran en la base de datos

`
[
    {
        "id_tarea": 4,
        "titulo": "mantenimiento",
        "descripcion": "mantenimiento a equipos",
        "id_usuario_asignado": null,
        "fecha_creacion": "2024-01-02 23:34:23.933",
        "estado": "pendiente"
    },
    {
        "id_tarea": 6,
        "titulo": "actualizando 1",
        "descripcion": "asdadfsd",
        "id_usuario_asignado": 1,
        "fecha_creacion": "2024-01-02 23:50:21.227",
        "estado": "terminado"
    }
]
`

- http://localhost:8080/Tareas/{id}

Para listar el detalle de una sola tarea selecciona el metodo **GET** con la url descrita y colocamos el id de la tarea a mostrar

Esto devolvera un objeto JSON con el detalle de la tarea ingresada

`
[
    {
        "id_tarea": 4,
        "titulo": "mantenimiento",
        "descripcion": "mantenimiento a equipos",
        "id_usuario_asignado": null,
        "fecha_creacion": "2024-01-02 23:34:23.933",
        "estado": "pendiente"
    }
]
`

- http://localhost:8080/Tareas/{id}

Para eliminar una sola tarea selecciona el metodo **DELETE** con la url descrita y colocamos el id de la tarea a eliminar

Esto devolvera un objeto JSON con el detalle de la accion

`
{
    "status": 200,
    "error": null,
    "messages": {
        "success": "Data Deleted"
    }
}
`

- http://localhost:8080/Tareas/{id}

Para actualizar una tarea selecciona el metodo **PUT** con la url descrita y el body seleccionamos **form-urlencoded** e ingresamos los valores deseados.

> **titulo** -> Coloca el titulo con el que se identificara la tarea.

> **descripcion** -> Coloca una breve descripcion de lo que se realizara en la tarea.

> **id_usuario_asignado** -> Se colocara el id del usuario al que se asignara la tarea (esto tiene relacion directa con la tabla Usuarios de la base de datos)

> **estado** -> Coloca el estado en el que se encuentra la tarea (por defecto se le asigna pendiente)

Para este caso solo va a actualizar los datos que se introduscan, si no es introducido algun dato este se ignorara y no se actualizara

Esto devolvera un objeto JSON con el detalle de la accion

`
{
    "status": 200,
    "error": null,
    "messages": {
        "success": "Data Updated"
    }
}
`
