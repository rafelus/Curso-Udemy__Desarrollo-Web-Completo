// Metodos de propiedad
const reproductor = {
    reproducir: function(id){
        console.log(`Reproduciendo Canción con el ID: ${id}.`);
    },
    pausa: function(){
        console.log('Pausando...');
    },
    crearPlaylist: function(nombre){
        console.log(`Creada la Playlist con nombre: ${nombre}.`);
    },
    reproducirPlaylist: function(nombre){
        console.log(`Reproduciendo la Playlist con nombre: ${nombre}.`);
    },
}

// Agregar metodos al constructor
reproductor.borrarCancion = function(id){
    console.log(`Borrando la canción con el ID: ${id}`);
};

reproductor.reproducir(3840);
reproductor.pausa();
reproductor.borrarCancion(20);
reproductor.crearPlaylist('Estopa');
reproductor.reproducirPlaylist('Estopa');