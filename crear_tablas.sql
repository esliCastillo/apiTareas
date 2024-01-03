
CREATE TABLE Usuarios
   (
	id_usuario int IDENTITY(1,1) PRIMARY KEY,
	usuario varchar(255) NOT NULL,
	nombre varchar(255) NOT NULL,
	apellido varchar(255) NOT NULL,
	fecha_creacion datetime DEFAULT GETDATE(),
   );

CREATE TABLE Tareas
   (
      id_tarea int IDENTITY(1,1) PRIMARY KEY,
      titulo varchar(255) NOT NULL,
      descripcion text,
	  id_usuario_asignado int,
	  fecha_creacion datetime DEFAULT GETDATE(),
	  estado varchar(50) DEFAULT 'pendiente',
	  CONSTRAINT FK_tareas_usuarios FOREIGN KEY (id_usuario_asignado) REFERENCES Usuarios (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
   );

