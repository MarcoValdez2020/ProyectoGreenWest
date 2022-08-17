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
        
        Spark.get("/direccion/actualizar/:id_usuario/:estado/:municipio/:calle/:numero_exterior/:numero_interno", (request, response) -> {
            String id_usuario = request.params(":id_usuario");
            String estado = request.params(":estado");
            String municipio = request.params(":municipio");
            String calle = request.params(":calle");
            int numero_exterior = Integer.parseInt(request.params(":numero_exterior"));
            int numero_interno = Integer.parseInt(request.params(":numero_interno"));
            final String lQuery = new LUpdate()
                    .table("direccion")
                    .update("estado", estado)
                    .update("municipio", municipio)
                    .update("calle", calle)
                    .update("numero_exterior", numero_exterior)
                    .update("numero_interno", numero_interno)
                    .where("id_usuario", "=", id_usuario)
                    .getQuery();
            HIKARI_POOL.execute(connection -> {
                connection.prepareStatement(lQuery).execute();
                return null;
            });
            return "Actualizado";
        });
    }
}
