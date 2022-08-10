/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package datosPersonales;

import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LUpdate;
import spark.Spark;

/**
 *
 * @author Marco Valdez
 */
public class ActualizarUsuario {
    public ActualizarUsuario(final HikariPool HIKARI_POOL){
        Spark.get("/usuario/actualizarusuario/:nombre/:apellidoP/:apellidoM/:correo/:id_cuenta", (request, response) -> {
            String id = request.params(":id_cuenta");
            String nombre = request.params(":nombre");
            String apellidoP = request.params(":apellidoP");
            String apellidoM = request.params(":apellidoM");
            String correo = request.params(":correo");
            final String lQuery = new LUpdate()
                    .table("usuario")
                    .update("nombre", nombre)
                    .update("apellidoP", apellidoP)
                    .update("apellidoM", apellidoM)
                    .update("correo", correo)
                    .where("id_cuenta", "=",id )
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Usuario Actualizado";
        });
    }
}
