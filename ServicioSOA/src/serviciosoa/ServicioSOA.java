package serviciosoa;

import Contenedores.ActualizarC;
import Contenedores.ConsultaC;
import Contenedores.EliminarC;
import contenedores.AgregarC;
import datosPersonales.*;
import inicioSesion.Actualizar;
import inicioSesion.Consultar;
import inicioSesion.Cuenta;
import inicioSesion.Eliminar;
import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.SimpleSourceBuilder;

import spark.Spark;

public class ServicioSOA {

    private static final HikariPool HIKARI_POOL = new HikariPool(
            new SimpleSourceBuilder()
            .setUrl("jdbc:mysql://localhost:3306/bdgreenwest?useSSL=false")
            .setUser("root").setPassword("")
            .build()
    );
    public static void main(String[] args) {
        Spark.port(6969);

        Spark.get("/", (request, response) -> "Si hay conexion con el servicio");
        
        /* Login */
        Cuenta cuenta = new Cuenta(HIKARI_POOL);
        Consultar consultar = new Consultar(HIKARI_POOL);
        Eliminar eliminar = new Eliminar(HIKARI_POOL);
        Actualizar actualizar = new Actualizar(HIKARI_POOL);
        
        /* Datos Personales*/
        ActualizarUsuario actusuario= new ActualizarUsuario(HIKARI_POOL);
        ConsultarUsuario conusuario= new ConsultarUsuario(HIKARI_POOL);
        EliminarUsuario elimusuario= new EliminarUsuario(HIKARI_POOL);
        
        /* Contenedores */
        AgregarC agregarc = new AgregarC(HIKARI_POOL);
        EliminarC eliminarc = new EliminarC(HIKARI_POOL);
        ActualizarC actualizarc = new ActualizarC(HIKARI_POOL);
        ConsultaC consultarc = new ConsultaC(HIKARI_POOL);
    }
    
}
