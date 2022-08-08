/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package inicioSesion;

import net.royalmind.library.lightquery.HikariPool;
import net.royalmind.library.lightquery.queries.LUpdate;
import spark.Spark;

/**
 *
 * @author Yobiz
 */
public class Actualizar {
    
    public Actualizar(final HikariPool HIKARI_POOL){
        Spark.get("/cuenta/actualizar/:usuario", (request, response) -> {
            String usuario = request.params(":usuario");
            final String lQuery = new LUpdate()
                    .table("cuenta")
                    .update("usuario", "Juanito")
                    .update("password", "12343df")
                    .where("usuario", "=", "Elena")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado";
        });
       
        Spark.get("/usuario/actualizar/:nombre", (request, response) -> {
            String usuario = request.params(":nombre");
            final String lQuery = new LUpdate()
                    .table("usuario")
                    .update("nombre", "")
                    .update("apellidoP", "")
                    .update("apellidoM", "")
                    .update("correo", "")
                    .update("nacimiento", "")
                    .update("palabra_clave", "")
                    .where("nombre", "=", "_")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado";
        });
        
        Spark.get("/direccion/actualizar/:id_usuario", (request, response) -> {
            String usuario = request.params(":id_usuario");
            final String lQuery = new LUpdate()
                    .table("direccion")
                    .update("estado", "")
                    .update("municipio", "")
                    .update("calle", "")
                    .update("numero_exterior", "")
                    .update("numero_interno", "")
                    .update("coor_lantitud", "")
                    .update("coor_longitud", "")
                    .where("nombre", "=", "_")
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado";
        });
    }
}
